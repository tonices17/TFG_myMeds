<!DOCTYPE html>
<html>

<head>
    <title>Bienvenido a nuestra aplicación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 20px 0;
        }

        .header h1 {
            color: #333333;
        }

        .content {
            text-align: center;
        }

        .content p {
            color: #666666;
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            padding: 20px 0;
            color: #999999;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Bienvenido, {{ $user->name }}!</h1>
        </div>
        <div class="content">
            <p>Gracias por registrarte en nuestra aplicación. Esperamos que disfrutes de tu experiencia.</p>
            <p>Si tienes alguna pregunta, no dudes en ponerte en contacto con nuestro equipo de soporte.</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 myMeds. Todos los derechos reservados.</p>
        </div>
    </div>
</body>

</html>