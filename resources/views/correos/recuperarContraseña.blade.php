<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><b>Prophysio Huejutla</b></center>

    <center><b>Recuperacion de contraseña</b></center>

    <p>Hola <b>{{ $cuenta['name'] }}</b> usted ha solicitado la recuperación de su contraseña en caso de no requerirla solo ignore este mensaje.</p>
    
    <p>Tu contraseña actualmente para iniciar sesion en Prophysio Huejutla es: <b>{{ $cuenta['contrasena'] }}</b></p>

    <p>Gracias por su preferencia, estamos a sus órdenes…</p>

    <center><b>Atentamente:</b></center>
    <center>Lic. Lizbeth Mendoza</center>
</body>
</html>