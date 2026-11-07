// ============================================
// RESEPKU - WEEK 4 : API LOKAL (resep.json)
// Masakan Rumahan Indonesia untuk Pemula
// ============================================

// ============================================
// 1. KONFIGURASI
// ============================================
const API_URL = "resep.json";

// ============================================
// 2. SELECTOR ELEMEN DOM
// ============================================
const menuToggle = document.querySelector("#menu-toggle");
const navbar = document.querySelector("#navbar");
const searchForm = document.querySelector("#search-form");
const searchInput = document.querySelector("#search-input");
const resepContainer = document.querySelector("#resep-container");

// Modal
const modalOverlay = document.querySelector("#modal-overlay");
const modalClose = document.querySelector("#modal-close");
const modalGambar = document.querySelector("#modal-gambar");
const modalJudul = document.querySelector("#modal-judul");
const modalInfo = document.querySelector("#modal-info");
const modalBahan = document.querySelector("#modal-bahan");
const modalLangkah = document.querySelector("#modal-langkah");

// Data global
let semuaResep = [];
let dataResepSekarang = [];

// ============================================
// 3. FUNGSI: LOADING STATE
// ============================================
function tampilkanLoading() {
    resepContainer.innerHTML = `
        <div class="loading">
            <div class="spinner"></div>
            <p>Memuat resep rumahan...</p>
        </div>
    `;
}

// ============================================
// 4. FUNGSI: ERROR STATE
// ============================================
function tampilkanError(pesan) {
    resepContainer.innerHTML = `
        <div class="error-state">
            <div class="error-icon">⚠️</div>
            <h3>Gagal Memuat Data</h3>
            <p>${pesan}</p>
            <button class="btn-retry" id="btn-retry">🔄 Coba Lagi</button>
        </div>
    `;

    document.querySelector("#btn-retry").addEventListener("click", muatResep);
}

// ============================================
// 5. FUNGSI: RENDER KARTU RESEP (PAKAI EMOJI)
// ============================================
function renderResep(data) {
    resepContainer.innerHTML = "";

    if (!data || data.length === 0) {
        resepContainer.innerHTML = `
            <p class="no-result">😔 Resep tidak ditemukan.<br>Coba kata kunci lain, misal: "telur", "tempe", "mie".</p>
        `;
        return;
    }

    dataResepSekarang = data;

    data.forEach(function(resep) {
        const bahanPreview = resep.bahan.slice(0, 3).join(", ");

        const isImage = resep.gambar && /\.(jpg|jpeg|png|webp|gif|svg)$/i.test(resep.gambar);
        const mediaHtml = isImage
            ? `<div class="kartu-gambar">
                 <img src="${resep.gambar}" alt="${resep.judul}" loading="lazy">
                 <span class="badge-kategori">${resep.kategori}</span>
               </div>`
            : `<div class="kartu-emoji">${resep.gambar}</div>`;

        const kartu = document.createElement("article");
        kartu.className = "kartu-resep";
        kartu.innerHTML = `
            ${mediaHtml}
            <div class="kartu-body">
                <h3>${resep.judul}</h3>
                <div class="kartu-meta">
                    <span>⏱️ ${resep.estimasi}</span>
                    <span>🎯 ${resep.tingkat}</span>
                    <span>🍽️ ${resep.porsi}</span>
                </div>
                <p class="kartu-bahan">🥕 <strong>Bahan:</strong> ${bahanPreview}...</p>
                <a href="#" class="btn-detail" data-id="${resep.id}">Lihat Resep →</a>
            </div>
        `;
        resepContainer.appendChild(kartu);
    });

    document.querySelectorAll(".btn-detail").forEach(function(btn) {
        btn.addEventListener("click", function(e) {
            e.preventDefault();
            const id = parseInt(this.dataset.id);
            bukaModal(id);
        });
    });
}

// ============================================
// 6. FUNGSI: MUAT RESEP DARI FILE JSON
// ============================================
async function muatResep() {
    tampilkanLoading();

    try {
        const response = await fetch(API_URL);

        if (!response.ok) {
            throw new Error("File resep tidak ditemukan.");
        }

        const data = await response.json();
        semuaResep = data.resep;
        renderResep(semuaResep);

    } catch (error) {
        console.error("Error:", error);
        tampilkanError("Tidak dapat memuat resep. Coba refresh halaman.");
    }
}

// ============================================
// 7. FUNGSI: CARI RESEP (PAKAI WORD BOUNDARY)
// Solusi: "ayam" tidak akan memunculkan "bayam"
// ============================================
function cariResep(keyword) {
    const key = keyword.toLowerCase().trim();

    // Buat pola regex dengan word boundary (\b)
    // \bayam\b → cocok dengan "ayam" tapi TIDAK "bayam"
    const regex = new RegExp(`\\b${key}\\b`, "i");

    const hasil = semuaResep.filter(function(resep) {
        const cocokJudul = regex.test(resep.judul);
        const cocokBahan = resep.bahan.some(function(b) {
            return regex.test(b);
        });
        const cocokKategori = regex.test(resep.kategori);
        return cocokJudul || cocokBahan || cocokKategori;
    });

    renderResep(hasil);
}

// ============================================
// 8. FUNGSI: FILTER KATEGORI
// ============================================
function filterKategori(kategori) {
    const hasil = semuaResep.filter(function(resep) {
        return resep.kategori === kategori;
    });
    renderResep(hasil);
}

// ============================================
// 9. FUNGSI: BUKA MODAL DETAIL (PAKAI EMOJI)
// ============================================
function bukaModal(id) {
    const resep = dataResepSekarang.find(function(r) {
        return r.id === id;
    });

    if (!resep) return;

    const isImage = resep.gambar && /\.(jpg|jpeg|png|webp|gif|svg)$/i.test(resep.gambar);
    if (isImage) {
        modalGambar.innerHTML = `
            <div class="modal-gambar-wrap">
                <img src="${resep.gambar}" alt="${resep.judul}">
                <span class="badge-kategori">${resep.kategori}</span>
            </div>
        `;
    } else {
        modalGambar.innerHTML = `<div class="modal-emoji">${resep.gambar}</div>`;
    }
    modalJudul.textContent = resep.judul;
    modalInfo.textContent = `⏱️ ${resep.estimasi} | 🎯 ${resep.tingkat} | 🍽️ ${resep.porsi}`;

    modalBahan.innerHTML = "";
    resep.bahan.forEach(function(b) {
        const li = document.createElement("li");
        li.textContent = b;
        modalBahan.appendChild(li);
    });

    modalLangkah.innerHTML = resep.langkah.replace(/\. /g, ".<br>");

    modalOverlay.classList.add("active");
}

// ============================================
// 10. EVENT: TUTUP MODAL
// ============================================
modalClose.addEventListener("click", function() {
    modalOverlay.classList.remove("active");
});

modalOverlay.addEventListener("click", function(e) {
    if (e.target === modalOverlay) {
        modalOverlay.classList.remove("active");
    }
});

// ============================================
// 11. EVENT: MENU MOBILE
// ============================================
menuToggle.addEventListener("click", function() {
    navbar.classList.toggle("active");
});

document.querySelectorAll("nav a").forEach(function(link) {
    link.addEventListener("click", function() {
        navbar.classList.remove("active");
    });
});

// ============================================
// 12. EVENT: PENCARIAN
// ============================================
searchForm.addEventListener("submit", function(e) {
    e.preventDefault();
    const keyword = searchInput.value.trim();

    if (keyword === "") {
        renderResep(semuaResep);
        return;
    }

    cariResep(keyword);
});

// ============================================
// 13. EVENT: KLIK KATEGORI
// ============================================
document.querySelectorAll(".kategori-card").forEach(function(card) {
    card.addEventListener("click", function() {
        const kategori = this.dataset.kategori;
        filterKategori(kategori);
        document.querySelector("#resep-populer").scrollIntoView({ behavior: "smooth" });
    });
});

// ============================================
// 14. INIT
// ============================================
muatResep();