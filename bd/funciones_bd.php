<?

$host = "localhost";
$usuario = "root";
$contraseña = "";
$bd = "intelcost_bienes";

function conectar(){
    $conn = mysqli_connect($host, $usuario, $contraseña, $bd);

    if (!$conn) {
        die("Error en la conexion a la Base de datos: " . mysqli_connect_error());
    }
}

function consultarPorCiudad(){
    $sql = "SELECT *, ciudad.nombre, ciudad.cod_postal FROM bienes 
    INNER JOIN ciudad ON bienes.id_ciudad = ciudad.id;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // para mostrar informacion
        // while($row = mysqli_fetch_assoc($result)) {
        //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        // }
    } else {
        echo "Sin registros";
    }
}

function consultarPorTipo(){
    $sql = "SELECT *, ciudad.nombre, ciudad.cod_postal FROM bienes 
    INNER JOIN ciudad ON bienes.id_ciudad = ciudad.id;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // para mostrar informacion
        // while($row = mysqli_fetch_assoc($result)) {
        //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        // }
    } else {
        echo "Sin registros";
    }
}
?>