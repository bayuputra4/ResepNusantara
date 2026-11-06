javascript
// KODINGAN WEEK 3 (DOM & EVENT)
// Contoh: Fitur Pencarian Sederhana

// 1. DOM Selector (Memilih Elemen HTML)
const searchForm = document.querySelector("#search-form");
const searchInput = document.querySelector("#search-input");

// 2. Event Listener (Menangkap aksi user)
searchForm.addEventListener("submit", function(e) {
    e.preventDefault(); // Mencegah halaman reload

    // Ambil kata yang diketik user
    const keyword = searchInput.value.toLowerCase();
    
    // Logika filter (Contoh simulasi)
    if (keyword === "tempe") {
        alert("Menampilkan resep Tempe!");
    } else {
        alert("Mencari resep: " + keyword);
    }
});
