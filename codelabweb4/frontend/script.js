document.addEventListener('DOMContentLoaded', () => {
    const doaList = document.getElementById('doa-list'); // Target untuk daftar doa
    const searchInput = document.getElementById('doa-search'); // Input untuk pencarian doa

    // Membuat dan menambahkan pesan loading
    const loadingMessage = document.createElement('p');
    loadingMessage.textContent = "Memuat data...";
    doaList.appendChild(loadingMessage);

    // // Fungsi untuk mengambil data doa dari API
    // async function fetchDoa() {
    //     try {
    //         // Pastikan URL ini mengarah ke backend PHP yang benar
    //         const response = await fetch('http://localhost:8888/.php'); // API endpoint PHP
    //         const result = await response.json();

    //         // Menghapus pesan loading setelah data dimuat
    //         loadingMessage.remove();

    //         // Jika data berhasil diambil
    //         if (response.ok && result.data.length > 0) {
    //             renderDoa(result.data); // Render data ke daftar doa
    //         } else {
    //             doaList.innerHTML = '<p>Tidak ada doa yang tersedia.</p>';
    //         }
    //     } catch (error) {
    //         console.error('Gagal mengambil data:', error);
    //         loadingMessage.remove();
    //         doaList.innerHTML = '<p>Terjadi kesalahan saat memuat data.</p>';
    //     }
    // }

    // Fungsi untuk merender data doa ke dalam HTML
    function renderDoa(data) {
        doaList.innerHTML = ''; // Bersihkan daftar sebelum render ulang
        data.forEach(doa => {
            const doaItem = document.createElement('div');
            doaItem.className = 'doa-item';
            doaItem.textContent = doa.judul;

            // Tambahkan event klik untuk menampilkan isi doa
            doaItem.addEventListener('click', () => {
                alert(`Isi Doa:\n\n${doa.isi}`);
            });

            doaList.appendChild(doaItem);
        });
    }

    // Fungsi untuk filter data pada pencarian
    function filterDoa(query) {
        const doaItems = document.querySelectorAll('.doa-item');
        doaItems.forEach(item => {
            const itemText = item.textContent.toLowerCase();
            item.style.display = itemText.includes(query) ? 'block' : 'none';
        });
    }

    // Event Listener untuk Pencarian
    searchInput.addEventListener('input', (event) => {
        const query = event.target.value.toLowerCase();
        filterDoa(query);
    });

    // Panggil fungsi untuk memuat doa
    fetchDoa();
});
