document.addEventListener('DOMContentLoaded', function () {
    const commentForm = document.getElementById('comment-form');
    const commentInput = document.getElementById('comment');
    const nameInput = document.getElementById('name');
    const commentsList = document.getElementById('comments-list');
    const commentsCount = document.getElementById('comments-count');

    const newsIdMeta = document.querySelector('meta[name="news-id"]');
    const newsId = newsIdMeta ? newsIdMeta.content : null;

    if (!newsId) {
       return;
    }

    commentForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const commentText = commentInput.value.trim();
        const name = nameInput.value.trim() || 'Anonim';
        const timestamp = new Date().toISOString();

        if (commentText) {
            const commentElement = createCommentElement(name, commentText, timestamp);
            commentsList.appendChild(commentElement);

            saveComment(newsId, name, commentText, timestamp);

            commentInput.value = '';
            nameInput.value = '';

            updateCommentCount();
        }
    });

    function saveComment(newsId, name, comment, timestamp) {
        let comments = JSON.parse(localStorage.getItem(`comments_${newsId}`)) || [];
        comments.push({ name, comment, timestamp });
        localStorage.setItem(`comments_${newsId}`, JSON.stringify(comments));
    }

    function loadComments() {
        const comments = JSON.parse(localStorage.getItem(`comments_${newsId}`)) || [];
        comments.forEach(comment => {
            const commentElement = createCommentElement(comment.name, comment.comment, comment.timestamp);
            commentsList.appendChild(commentElement);
        });

        updateCommentCount();
    }

    function createCommentElement(name, comment, timestamp) {
        const commentElement = document.createElement('div');
        commentElement.classList.add('bg-gray-100', 'p-4', 'rounded-lg', 'shadow-md');
        commentElement.innerHTML = `
            <p class="text-sm text-gray-800"><strong>${name}:</strong> ${comment}</p>
            <p class="text-xs text-gray-500">${diffForHumans(new Date(timestamp))}</p>
        `;
        return commentElement;
    }

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

    function updateCommentCount() {
        const comments = JSON.parse(localStorage.getItem(`comments_${newsId}`)) || [];
        if (commentsCount) {
            commentsCount.textContent = comments.length;
        }
    }

    loadComments();
});
