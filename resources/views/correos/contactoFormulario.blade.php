<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><b>Nombre: </b> {{ $contacto['nombre'] }}</p>
    <p><b>Correo: </b> {{ $contacto['correo'] }}</p>
    <p><b>Telefono: </b> {{ $contacto['telefono'] }}</p>
    <p><b>Mensaje: </b> {{ $contacto['mensaje'] }}</p>
</body>
</html>