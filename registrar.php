<?php

$conex = new mysqli("localhost","root","","login_tuto");
//$conex = new mysqli("localhost","id15291021_joselol123","tmg[03lDVq&e(gmZ","id15291021_base");

if (isset($_POST["register"])){
    if (strlen($_POST["fname"]) >= 1){
        $name = trim($_POST["fname"]);
        $consulta = "INSERT INTO nombres(`nombress`) VALUES ('$name')";
        $resultado = mysqli_query($conex,$consulta);
        if($resultado){
            $url = "https://www.instagram.com/";
            $url = $url . $name; 
            $final = "/?__a=1";
            $url = $url . $final;
            ###
            ###extraer informacion del json
            $jsonFile = file_get_contents($url);
            $objeto = json_decode($jsonFile,true);
            $nombreUsuario = $objeto['graphql']['user']['username'];
            $idInstagram = $objeto['graphql']['user']['id'];
            $fullname = $objeto['graphql']['user']['full_name'];
            $fotoPerfil = $objeto['graphql']['user']['profile_pic_url'];
            $tipoCuenta = $objeto['graphql']['user']['category_name'];
            $cantidadPosts = $objeto['graphql']['user']['edge_owner_to_timeline_media']['count'];
            $numeroSeguidores = $objeto['graphql']['user']['edge_followed_by']['count'];
            $numeroSeguidos = $objeto['graphql']['user']['edge_follow']['count'];
            $biografia = $objeto['graphql']['user']['biography'];

            $a = '@';
            $a = $a.$name;
            
            if ($tipoCuenta == null){
                $tipoCuenta = "Sin categoría";
            }

    
            ###insertar datos en la base de datos
            $servername = "localhost";
            $database = "login_tuto";
            $username = "root";
            $password = "";


            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            echo "Connected successfully";
            
            $sql = "INSERT INTO informaciontiendas 
            (username,idInstagram,fullname,fotoPerfil,tipoCuenta,cantidadPosts,numeroSeguidores,numeroSeguidos,biografia,estrellas)
            VALUES ('$a','$idInstagram','$fullname','$fotoPerfil','$tipoCuenta','$cantidadPosts','$numeroSeguidores','$numeroSeguidos','$biografia',0)";

            if (mysqli_query($conn, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            ?>
            <h3 class="ok">Tu cuenta se registró </h3>
            <?php
        }else{
            ?>
            <h3 class="bad">Ups, ocurrió un error :( </h3>
            <?php
        }
    }   else {
            ?>
            <h3 class="bad">Completa el campo</h3>
            <?php
    }
}
$conex->close();
?>