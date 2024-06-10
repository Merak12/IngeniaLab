document.addEventListener('DOMContentLoaded', function() {
    var btnConfirmDeleteStudent = document.getElementById('confirmDeleteStudent');
    var btnConfirmDeleteTeacher = document.getElementById('confirmDeleteTeacher');

    btnConfirmDeleteStudent.onclick = function(event) {
        var modal = document.getElementById('deleteConfirmationModal');
        var studentId = modal.getAttribute('data-student-id');

        $.get("../users/delete-student.php", { ID: studentId }, function(data) {
            loadCurrentView();
            modal.style.display = 'none';
        }).fail(function() {
            alert('Error al eliminar estudiante');
        });
    };

    btnConfirmDeleteTeacher.onclick = function(event) {
        var modal = document.getElementById('deleteTeacherConfirmationModal');
        var teacherId = modal.getAttribute('data-teacher-id');

        $.get("../users/delete-teacher.php", { ID: teacherId }, function(data) {
            loadCurrentView();
            modal.style.display = 'none';
        }).fail(function() {
            alert('Error al eliminar maestro');
        });
    };
});

function openDeleteTeacherConfirmation(idTeacher) {
    var modal = document.getElementById('deleteTeacherConfirmationModal');
    modal.style.display = "block";
    modal.setAttribute('data-teacher-id', idTeacher);
}
