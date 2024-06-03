<div id="deleteConfirmationModal" class="modal">

    <div class="modalAdd-content">

        <span class="close" data-modal="deleteConfirmationModal">&times;</span>
        <h4>Confirmar Eliminación</h4>
        <p>¿Estás seguro de que deseas eliminar este estudiante?</p>
        <div>
            <button id="confirmDelete" class="btn btn-danger">Eliminar</button>
            <button class="cancel-btn" data-modal="deleteConfirmationModal">Cancelar</button>
        </div>

    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        var btnConfirmDelete = document.getElementById('confirmDelete');

        // Esto debería reemplazar cualquier onclick existente con este más específico
        btnConfirmDelete.onclick = function(event) {
            var modal = document.getElementById('deleteConfirmationModal');
            var studentId = modal.getAttribute('data-student-id');

            $.get("../users/delete-student.php", { ID: studentId }, function(data) {
                $('#users-table').load('/TC2005B_602_01/IngeniaLab/src/users/students.php');
                modal.style.display = 'none'; // Cierra la modal después de la acción
            }).fail(function() {
                alert('Error al eliminar estudiante');
            });
        };
    });

    function openDeleteConfirmation(idStudent) {
        var modal = document.getElementById('deleteConfirmationModal');
        modal.style.display = "block";
        modal.setAttribute('data-student-id', idStudent);
    }

</script>