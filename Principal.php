<!DOCTYPE html>
<html lang="en">

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "topclass";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            $sql = "SELECT id_p, imagen, descripcion, fecha_registro FROM publicaciones";
            $sql = "SELECT * FROM publicaciones ORDER BY fecha_registro DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<div class="card-container">';
                while ($row = $result->fetch_assoc()) {
                    echo '<br>';
                    echo '<div class="card">';
                    echo '<div class="card-content">';
                    echo '<img src="data:image/jpeg;base64,' . $row['imagen'] . '" alt="Imagen del producto">';
                    echo '<p>"Usuario": <span data-id="' . $row['id_p'] . '">' . $row['descripcion'] . '</span></p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">No se encontraron publicaciones.</p>';
            }
            echo '</div>';

            $conn->close();
            ?>
          
</body>

</html>