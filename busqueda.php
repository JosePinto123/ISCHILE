<?php

    //$mysqli = new mysqli("localhost","id15291021_joselol123","tmg[03lDVq&e(gmZ","id15291021_base");
    $mysqli = new mysqli("localhost","root","","login_tuto");

    $salida = "";
    $query = "SELECT * FROM informaciontiendas ORDER By cantidadPosts DESC";

    if(isset($_POST["consulta"])){
        $q = $mysqli->real_escape_string($_POST["consulta"]);
        $query = "SELECT username, fullname, fotoPerfil, estrellas, tipoCuenta, biografia FROM informaciontiendas 
        WHERE username LIKE '%".$q."%' OR fullname LIKE '%".$q."%' OR tipoCuenta
        LIKE '%".$q."%' OR biografia LIKE '%".$q."%'";
    }
    $resultado = $mysqli->query($query);

    if($resultado->num_rows > 0){
        $salida.="<table class='tabla_datos'>
                    <thead>
                        <tr class='tr'>
                            <td>Foto</td>
                            <td>Usuario</td>
                            <td>Nombre</td>
                            <td>Categoría</td>
                        </tr>
                    </thead>
                    <tbody>";

        while($fila = $resultado->fetch_assoc()){
            $salida.="<tr class='tr-abajo'>
                        <td><img class='imagenxd' src=".$fila["fotoPerfil"]."></td>
                        <td><a style='color:black;' href='/shops.php?id=".$fila["username"]."'>".$fila["username"]."</a></td>
                        <td>".$fila["fullname"]."</td>
                        <td>".$fila["tipoCuenta"]."</td>
                    </tr>";
        }
        $salida.="</tbody></table>";
    } else {
        $salida.="No encontrado :( ";
    }
    echo $salida;
    $mysqli->close();
?>