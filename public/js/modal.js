function onShow(modalId, imageUrl) {
    const modal = document.getElementById(modalId);
    const modalImage = document.getElementById('modal-image');
    const modalContent = modal.querySelector('.relative');

    modalImage.src = imageUrl;

    modal.classList.remove('opacity-0', 'pointer-events-none');
    modal.classList.add('opacity-100', 'pointer-events-auto');
    modalContent.classList.remove('scale-90');
    modalContent.classList.add('scale-100');

    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            onHide(modalId);
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            onHideModal(modalId);
        }
    });
}

function onHide(modalId) {
    const modal = document.getElementById(modalId);
    const modalContent = modal.querySelector('.relative');

    modal.classList.remove('opacity-100', 'pointer-events-auto');
    modal.classList.add('opacity-0', 'pointer-events-none');
    modalContent.classList.remove('scale-100');
    modalContent.classList.add('scale-90');
}

function onShowModal(modalId) {
    const modal = document.getElementById(modalId);
    const modalContent = modal.querySelector('.relative');

    modal.classList.remove('opacity-0', 'pointer-events-none');
    modal.classList.add('opacity-100', 'pointer-events-auto');
    modalContent.classList.remove('scale-90');
    modalContent.classList.add('scale-100');

    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            onHide(modalId);
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            onHideModal(modalId);
        }
    });
}

function onHideModal(modalId) {
    const modal = document.getElementById(modalId);
    const modalContent = modal.querySelector('.relative');

    modal.classList.remove('opacity-100', 'pointer-events-auto');
    modal.classList.add('opacity-0', 'pointer-events-none');
    modalContent.classList.remove('scale-100');
    modalContent.classList.add('scale-90');
}
