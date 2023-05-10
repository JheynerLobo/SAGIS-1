<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos de Ingreso SAGIS</title>
</head>
<body>
    <p>Buenas ingeniero(a): {{$person->name}} {{$person->lastname}}, el <strong>Programa de Ingeniería de Sistemas de la UFPS</strong> le informa que ha sido registrado en el sistema web SAGIS para graduados, con los siguientes datos podrá ingresar al aplicativo SAGIS:</p>
    <p>Correo electrónico: <strong>{{ $userParams['email'] }}</strong> </p>
    <p>Contraseña:<strong>password</strong></p>
</body>
</html>