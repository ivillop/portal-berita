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

function generateSlug() {
    var title = document.getElementById('title').value;
    var slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
    document.getElementById('slug').value = slug;
}

function searchTable() {
    // Ambil input dari search box
    let input = document.getElementById("table-search").value.toLowerCase();
    // Ambil semua baris dari tabel
    let table = document.getElementById("news-table");
    let rows = table.getElementsByTagName("tr");

    // Looping setiap baris dan sembunyikan baris yang tidak sesuai dengan pencarian
    for (let i = 1; i < rows.length; i++) {
        let row = rows[i];
        let title = row.getElementsByTagName("td")[0].textContent.toLowerCase(); // Kolom Judul
        let slug = row.getElementsByTagName("td")[1].textContent.toLowerCase();  // Kolom Slug
        let body = row.getElementsByTagName("td")[2].textContent.toLowerCase();  // Kolom Isi
        let author = row.getElementsByTagName("td")[3].textContent.toLowerCase(); // Kolom Penulis
        let category = row.getElementsByTagName("td")[4].textContent.toLowerCase(); // Kolom Kategori

        // Cek apakah input sesuai dengan salah satu kolom
        if (title.includes(input) || slug.includes(input) || body.includes(input) || author.includes(input) || category.includes(input)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const commentForm = document.getElementById('comment-form');
    const commentInput = document.getElementById('comment');
    const nameInput = document.getElementById('name');
    const commentsList = document.getElementById('comments-list');
    const commentsCount = document.getElementById('comments-count');

    // Mengambil ID berita dari elemen yang sesuai
    const newsIdMeta = document.querySelector('meta[name="news-id"]');
    const newsId = newsIdMeta ? newsIdMeta.content : null; // Pastikan newsId ada

    if (!newsId) {
       return;
    }

    commentForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const commentText = commentInput.value.trim();
        const name = nameInput.value.trim() || 'Anonim';
        const timestamp = new Date().toISOString(); // Timestamp saat komentar ditambahkan

        if (commentText) {
            // Tambahkan komentar baru ke halaman
            const commentElement = createCommentElement(name, commentText, timestamp);
            commentsList.appendChild(commentElement);

            // Simpan komentar ke localStorage
            saveComment(newsId, name, commentText, timestamp);

            // Kosongkan form
            commentInput.value = '';
            nameInput.value = '';

            // Update jumlah komentar
            updateCommentCount();
        }
    });

    // Fungsi untuk menyimpan komentar ke localStorage berdasarkan newsId
    function saveComment(newsId, name, comment, timestamp) {
        let comments = JSON.parse(localStorage.getItem(`comments_${newsId}`)) || [];
        comments.push({ name, comment, timestamp });
        localStorage.setItem(`comments_${newsId}`, JSON.stringify(comments));
    }

    // Fungsi untuk memuat komentar dari localStorage berdasarkan newsId
    function loadComments() {
        const comments = JSON.parse(localStorage.getItem(`comments_${newsId}`)) || [];
        comments.forEach(comment => {
            const commentElement = createCommentElement(comment.name, comment.comment, comment.timestamp);
            commentsList.appendChild(commentElement);
        });

        // Update jumlah komentar setelah dimuat
        updateCommentCount();
    }

    // Fungsi untuk membuat elemen komentar
    function createCommentElement(name, comment, timestamp) {
        const commentElement = document.createElement('div');
        commentElement.classList.add('bg-gray-100', 'p-4', 'rounded-lg', 'shadow-md');
        commentElement.innerHTML = `
            <p class="text-sm text-gray-800"><strong>${name}:</strong> ${comment}</p>
            <p class="text-xs text-gray-500">${diffForHumans(new Date(timestamp))}</p>
        `;
        return commentElement;
    }

    // Fungsi untuk menghitung perbedaan waktu (mirip diffForHumans)
    function diffForHumans(date) {
        const now = new Date();
        const seconds = Math.floor((now - date) / 1000);
        let interval = Math.floor(seconds / 31536000);

        if (interval >= 1) {
            return interval + " year" + (interval === 1 ? "" : "s") + " ago";
        }
        interval = Math.floor(seconds / 2592000);
        if (interval >= 1) {
            return interval + " month" + (interval === 1 ? "" : "s") + " ago";
        }
        interval = Math.floor(seconds / 86400);
        if (interval >= 1) {
            return interval + " day" + (interval === 1 ? "" : "s") + " ago";
        }
        interval = Math.floor(seconds / 3600);
        if (interval >= 1) {
            return interval + " hour" + (interval === 1 ? "" : "s") + " ago";
        }
        interval = Math.floor(seconds / 60);
        if (interval >= 1) {
            return interval + " minute" + (interval === 1 ? "" : "s") + " ago";
        }
        return "Just now";
    }

    // Fungsi untuk mengupdate jumlah komentar
    function updateCommentCount() {
        const comments = JSON.parse(localStorage.getItem(`comments_${newsId}`)) || [];
        if (commentsCount) { // Pastikan commentsCount ada
            commentsCount.textContent = comments.length;
        }
    }

    // Muat komentar yang tersimpan di localStorage saat halaman di-load
    loadComments();
});
