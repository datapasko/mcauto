<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>McAuto13 - concesionario de coches</h1>

    @if(isset($details['subject']))
        <p>Asunto: <strong> {{ $details['subject'] }} </strong></p>
    @endif

    @if(isset($details['name']))
        <p>Nombre: <strong>{{ $details['name'] }} </strong></p>
    @endif
    
    @if(isset($details['email']))
        <p>Correo: <strong> {{ $details['email'] }} </strong></p>
    @endif
    
    @if(isset($details['phone']))
        <p>Telefono: <strong> {{ $details['phone'] }} </strong></p>
    @endif
    
    @if(isset($details['message']))
        <p>Mensaje: <strong> {{ $details['message'] }} </strong></p>
    @endif
    
    @if(isset($details['service']))
        <p>Tipo de servicio: <strong> {{ $details['service'] }} </strong></p>
    @endif
    
    @if(isset($details['registration']))
        <p>Matricula: <strong> {{ $details['registration'] }} </strong></p>
    @endif
    
    @if(isset($details['model']))
        <p>Modelo de coche: <strong> {{ $details['model'] }} </strong></p>
    @endif

</body>
</html>