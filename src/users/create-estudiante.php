<div id="addStudentModal" class="modal">

    <div class="modalAdd-content">
        <span class="close" data-modal="addStudentModal">&times;</span>
        <h2>Agregar Usuario</h2>
        
        <form id="addStudentForm">
            <div class="form-group">
                <label for="firstname">Nombre</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="lastname">Matricula</label>
                <input type="text" id="matricula" name="matricula" required>
            </div>
            <div class="form-group">
                <label for="phone">Correo institucional</label>
                <input type="text" id="mail" name="mail" required>
            </div>
            <div class="form-group">
                <label for="select">Carrera</label>
                <select id="carrera" name="carrera" required>
                    <option value="">Selecciona carrera</option>
                    <?php
                        require_once $_SERVER['DOCUMENT_ROOT'].'/TC2005B_602_01/IngeniaLab/config/database.php';

                        $pdo = Database::connect();
                        $query = 'SELECT * FROM Carreras';

                        foreach ($pdo->query($query) as $row) {
                            echo "<option value='" . $row['ID'] . "'>" . $row['ID'] . ' - ' . $row['carrera'] . "</option>";
                        }
                        Database::disconnect();
                    ?>
                </select>
            </div>
            <div class="form-buttons">
                <button type="submit" class="btn-accept">Aceptar</button>
                <button type="button" class="cancel-btn" data-modal="addStudentModal">Cerrar</button>
            </div>
        </form>
        <div id="message"></div>
    </div>
    
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modal = document.getElementById('addStudentModal');
        var closeModalBtns = document.querySelectorAll('.close, .cancel-btn');
        var form = document.getElementById('addStudentForm');
        var messageDiv = document.getElementById('message');

        closeModalBtns.forEach(function(btn) {
            btn.onclick = function() {
                modal.style.display = 'none';
                window.location.reload();  // Recargar la página al cerrar la ventana modal
            }
        });

        form.onsubmit = function(event) {
            event.preventDefault();

            var formData = new FormData(form);

            fetch('/TC2005B_602_01/IngeniaLab/src/users/insert-estudiante.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    messageDiv.innerHTML = '<p style="color:green;">' + data.message + '</p>';
                    form.reset();
                    setTimeout(function() {
                        modal.style.display = 'none';
                        window.location.reload();  // Recargar la página después de mostrar el mensaje de éxito
                    }, 1500);  // Espera 1.5 segundos antes de cerrar la ventana modal y recargar la página
                } else {
                    messageDiv.innerHTML = '<p style="color:red;">' + data.message + '</p>';
                }
            })
            .catch(error => {
                messageDiv.innerHTML = '<p style="color:red;">Error al procesar la solicitud.</p>';
            });
        };
    });
</script>
