<!-- Contenido del email -->
<!DOCTYPE html>
<html lang="en">
<head menu=5>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje recibido</title>
</head>
<body>
    <p>Recibiste un mensaje de: {{ $msg['nombre'] }} </p>
     <p> Teléfono: {{ $msg['telefono'] }} Correo: {{ $msg['correo'] }}</p>
    <p><strong>Contenido: </strong>{{ $msg['mensaje'] }}</p>
    
</body>
</html>