function updateTime() {
    // Array nama hari dan bulan dalam Bahasa Indonesia
    const days = [
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu",
    ];
    const months = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
    ];

    // Ambil tanggal dan waktu sekarang
    const now = new Date();

    // Format tanggal
    const dayName = days[now.getDay()];
    const day = String(now.getDate()).padStart(2, "0");
    const month = months[now.getMonth()];
    const year = now.getFullYear();

    // Format waktu
    const hours = String(now.getHours()).padStart(2, "0");
    const minutes = String(now.getMinutes()).padStart(2, "0");
    const seconds = String(now.getSeconds()).padStart(2, "0");

    // Update elemen HTML dengan waktu yang diformat
    document.getElementById(
        "current-date"
    ).innerHTML = `${dayName}, ${day} ${month} ${year}`;
    document.getElementById(
        "current-time"
    ).innerHTML = `${hours}:${minutes}:${seconds}`;
}

// Jalankan updateTime setiap detik
setInterval(updateTime, 1000);

// Panggil updateTime langsung agar tidak ada delay awal
updateTime();
