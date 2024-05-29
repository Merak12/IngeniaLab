document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("modalAdd");
    var openModalBtn = document.getElementById("openModalAdd");
    var closeBtn = document.getElementsByClassName("close")[0];
    var cancelBtn = document.querySelector(".btn-cancel");

    // Function to open modal
    function openModal() {
        modal.style.display = "block";
    }

    // Function to close modal
    function closeModal() {
        modal.style.display = "none";
    }

    // Function to close modal if outside click
    function outsideClick(e) {
        if (e.target == modal) {
            modal.style.display = "none";
        }
    }

    // Attach events
    function attachEvents() {
        openModalBtn.addEventListener("click", openModal);
        closeBtn.addEventListener("click", closeModal);
        cancelBtn.addEventListener("click", closeModal);
        window.addEventListener("click", outsideClick);
    }

    // Initial event attachment
    attachEvents();

    // Form submission handling
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Capture form data

        fetch('/IngeniaLab/src/students/insert-estudiante.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text()) // Convert response to text
        .then(data => {
            document.querySelector('.modalAdd-content').innerHTML += '<p>' + data + '</p>'; // Append response to modal content
            location.reload(); // Reload page to reflect changes
        })
        .catch(error => console.error('Error:', error));
    }, { once: true }); // Ensure the event is attached only once

    // Delete user handling
    function deleteUser(userId) {
        fetch('/IngeniaLab/src/students/delete-student.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id=' + userId
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // muestra un mensaje de éxito o error
            location.reload(); // recarga la página para reflejar los cambios
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // Attach delete button events
    var deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            var userId = this.getAttribute('data-id'); // Suponiendo que cada botón tiene un atributo data-id
            if(confirm('¿Estás seguro de que quieres eliminar este usuario?')) {
                deleteUser(userId);
            }
        });
    });
});
