<!DOCTYPE html>
<html>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Agregar Usuario</h2>
            
            <form action="insert-estudiante.php" method="POST">
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
                        
                            require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';

                            $pdo = Database::connect();
                            $query = 'SELECT * FROM Carreras';

                            foreach ($pdo->query($query) as $row) {

                                echo "<option value='" . $row['ID'] . "'>" . $row['ID'] . ' - ' . $row['carrera'] . "</option>";

                            }
                        
                        ?>
                    </select>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn-accept">Aceptar</button>
                    <button type="button" class="btn-cancel">Cancelar</button>
                </div>
            </form>
        </div>
        
    </div>
</html>