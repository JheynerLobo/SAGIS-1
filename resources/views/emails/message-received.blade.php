<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos de Ingreso SAGIS</title>
</head>
<body>
    <h1>Buenas ingeniero(a): {{$person->name}} {{$person->lastname}}, con los siguientes datos podra
    ingresar al aplicativo SAGIS:</h1>
    <p>Link de la aplicación: <strong>https://sagis-production.up.railway.app/login</strong></p>
    <p>Correo electrónico: <strong>{{ $userParams['email'] }}</strong> </p>
    <p>Contraseña:<strong>password</strong></p>
</body>
</html>