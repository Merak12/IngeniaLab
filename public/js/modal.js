document.addEventListener('DOMContentLoaded', function() {

    function initModal(modalId, openBtnId, closeBtnClass, cancelBtnClass, formId, fetchUrl) {
        var modal = document.getElementById(modalId);
        var openModalBtn = document.getElementById(openBtnId);
        var closeBtn = modal.getElementsByClassName(closeBtnClass)[0];
        var cancelBtn = modal.querySelector(`.${cancelBtnClass}`);
        
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
            if (cancelBtn) cancelBtn.addEventListener("click", closeModal);
            window.addEventListener("click", outsideClick);
        }

        // Initial event attachment
        attachEvents();

        // Form submission handling
        if (formId && fetchUrl) {
            document.getElementById(formId).addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                var formData = new FormData(this); // Capture form data

                fetch(fetchUrl, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text()) // Convert response to text
                .then(data => {
                    modal.querySelector('.modal-content').innerHTML += '<p>' + data + '</p>'; // Append response to modal content
                    location.reload(); // Reload page to reflect changes
                })
                .catch(error => console.error('Error:', error));
            }, { once: true }); // Ensure the event is attached only once
        }
    }

    initModal('modalAdd', 'openModalAdd', 'close', 'btn-cancel', 'addForm', '/IngeniaLab/src/students/insert-estudiante.php');
    initModal('editModal', 'openEditModal', 'close', '', 'editForm', '/path/to/update-script.php');
    initModal('addMachineModal', 'openAddMachineModal', 'close', '', 'btn-cancel', '/IngeniaLab/src/machines/create.php', )

    // Function to open edit modal and pre-fill form
    window.openEditModal = function(id) {
        var modal = document.getElementById("editModal");
        var row = document.querySelector(`tr[data-id='${id}']`);
        var nombre = row.querySelector("td:nth-child(1)").innerText;
        var correo = row.querySelector("td:nth-child(2)").innerText;
        var carrera = row.querySelector("td:nth-child(3)").innerText;

        document.getElementById('editID').value = id;
        document.getElementById('editNombre').value = nombre;
        document.getElementById('editCorreo').value = correo;
        document.getElementById('editCarrera').value = carrera;

        modal.style.display = "block";
    };

    window.deleteUser = function(userId) {
        fetch('/IngeniaLab/src/students/delete-student.php', {
            method: 'POST',
            body: JSON.stringify({ id: userId })
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            location.reload();
        })
        .catch(error => console.error('Error:', error));
    }
});
