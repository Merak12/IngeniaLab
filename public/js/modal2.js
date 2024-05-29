// Get the modal
var modal = document.getElementById("modalEdit");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Function to open the modal and populate the form
function openEditModal(id) {
    // Fetch the student data using the data-id attribute
    var row = document.querySelector(`tr[data-id='${id}']`);
    var nombre = row.querySelector("td:nth-child(1)").innerText;
    var correo = row.querySelector("td:nth-child(2)").innerText;
    var carrera = row.querySelector("td:nth-child(3)").innerText;
    
    // Fill the form
    document.getElementById('editID').value = id;
    document.getElementById('editNombre').value = nombre;
    document.getElementById('editCorreo').value = correo;
    document.getElementById('editCarrera').value = carrera;
    
    // Open the modal
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Add event listener to the form to handle submission
document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // Add your AJAX code here to submit the form data and update the student record in the database
    // Example:
    // var formData = new FormData(this);
    // fetch('/path/to/update-script.php', {
    //     method: 'POST',
    //     body: formData
    // }).then(response => response.json())
    // .then(data => {
    //     if (data.success) {
    //         // Update the table row with new data
    //         var row = document.querySelector(`tr[data-id='${data.id}']`);
    //         row.querySelector("td:nth-child(1)").innerText = data.nombre;
    //         row.querySelector("td:nth-child(2)").innerText = data.correo;
    //         row.querySelector("td:nth-child(3)").innerText = data.carrera;
    //         modal.style.display = "none";
    //     } else {
    //         // Handle error
    //         alert('Error updating student');
    //     }
    // });
    modal.style.display = "none";
});
