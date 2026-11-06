javascript
// KODINGAN WEEK 4 (FETCH API & JSON)
// Contoh: Mengambil data resep dari resep.json

async function ambilDataResep() {
    // 1. Tampilkan Loading
    console.log("Loading: Mengambil data...");

    try {
        // 2. Fetch API (Mengambil data dari file lokal)
        const response = await fetch('../resep.json');
        
        // Cek jika response error
        if (!response.ok) throw new Error("Gagal ambil data");

        // 3. Ubah ke JSON
        const data = await response.json();

        // 4. Tampilkan hasil
        console.log("Berhasil! Jumlah resep: " + data.resep.length);
        
    } catch (error) {
        // 5. Error Handling
        console.error("Error: " + error.message);
    }
}

// Jalankan fungsi
ambilDataResep();
