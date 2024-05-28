// Get modal element
var modal = document.getElementById("modal");
// Get open modal button
var openModalBtn = document.getElementById("openModal");
// Get close button
var closeBtn = document.getElementsByClassName("close")[0];
// Get cancel button
var cancelBtn = document.querySelector(".btn-cancel");

// Listen for open click
openModalBtn.addEventListener("click", openModal);
// Listen for close click
closeBtn.addEventListener("click", closeModal);
// Listen for cancel click
cancelBtn.addEventListener("click", closeModal);
// Listen for outside click
window.addEventListener("click", outsideClick);

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

document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
});

document.querySelector('.btn-cancel').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
});

document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault(); // Previene el envío normal del formulario

    var formData = new FormData(this); // Captura los datos del formulario

    fetch('insert-estudiante.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convierte la respuesta a texto
    .then(data => {
        document.querySelector('.modal-content').innerHTML += '<p>' + data + '</p>'; // Añade la respuesta dentro del contenido del modal
    })
    .catch(error => console.error('Error:', error));
});

document.addEventListener('DOMContentLoaded', function() {
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

function deleteUser(userId) {
    fetch('delete-student.php', {
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
