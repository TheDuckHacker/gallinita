<html>
<head>
    <title>Página de Inicio de Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #d3d3d3, #f0f0f0);
        }
        .container {
            display: flex;
            width: 800px;
            height: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            animation: fadeIn 0.25s ease-in-out;
        }
        .left {
            background-color: #e2630f;
            color: white;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
            animation: fadeIn 0.375s ease-in-out;
        }
        .left img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            animation: fadeIn 0.5s ease-in-out;
        }
        .left h2 {
            margin: 0;
            font-size: 2em;
            animation: fadeIn 0.625s ease-in-out;
        }
        .left p {
            margin: 10px 0;
            animation: fadeIn 0.75s ease-in-out;
        }
        .left button {
            background-color: transparent;
            border: 2px solid white;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            animation: fadeIn 0.875s ease-in-out;
        }
        .right {
            background-color: white;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
            animation: fadeIn 1s ease-in-out;
        }
        .right h2 {
            margin: 0;
            font-size: 2em;
            margin-bottom: 20px;
            animation: fadeIn 1.125s ease-in-out;
        }
        .right input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            animation: fadeIn 1.25s ease-in-out;
        }
        .right input[type="text"], .right input[type="password"] {
            padding-left: 40px;
        }
        .right .input-container {
            position: relative;
            width: 100%;
            animation: fadeIn 1.375s ease-in-out;
        }
        .right .input-container i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }
        .right .forgot-password {
            align-self: flex-end;
            margin-bottom: 20px;
            color: #aaa;
            cursor: pointer;
            animation: fadeIn 1.5s ease-in-out;
        }
        .right button {
            background-color: #e2630f;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            width: 100%;
            animation: fadeIn 1.625s ease-in-out;
        }
        .right .social-login {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            animation: fadeIn 1.75s ease-in-out;
        }
        .right .social-login i {
            font-size: 1.5em;
            margin: 0 10px;
            cursor: pointer;
            color: #aaa;
        }
    </style>
</head>
<body>
    <<form action="iniciophp.php" method="POST">

        <div class="container">
            <div class="left">
                <img alt="Logo de empresa" src="LOGITO.jpg" width="150" height="150">
                <h2>¡Hola, Bienvenido!</h2>
                <p>INDUSTRIA AVÍCOLA</p>
                <p>"San Sebastián"</p>
            </div>
            <div class="right">
                <h2>Iniciar Sesión</h2>
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nombre" placeholder="nombre" required>
                </div>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" name="login">Iniciar Sesión</button>
            </div>
        </div>
    </form>
</body>
</html>