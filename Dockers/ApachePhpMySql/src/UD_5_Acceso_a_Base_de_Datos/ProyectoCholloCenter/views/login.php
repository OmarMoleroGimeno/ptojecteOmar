<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Onest:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background-color: #212121;
            font-family: "Inter", sans-serif;
            font-weight: 400;
        }
        h1 {
            color: white;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            padding-top: 60px;
            width: 400px;
            background: linear-gradient(#212121, #212121) padding-box,
                        linear-gradient(145deg, transparent 35%,#e81cff, #40c9ff) border-box;
            border: 2px solid transparent;
            padding: 32px 24px;
            font-size: 14px;
            font-family: inherit;
            color: white;
            display: flex;
            flex-direction: column;
            gap: 20px;
            box-sizing: border-box;
            border-radius: 16px;
        }

        .form-container button:active {
            scale: 0.95;
        }

        .form-container .form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-container .form-group {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .form-container .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #717171;
            font-weight: 600;
            font-size: 12px;
        }

        .form-container .form-group input {
            padding: 12px 16px;
            border-radius: 8px;
            color: #fff;
            font-family: inherit;
            background-color: transparent;
            border: 1px solid #414141;
        }

        .form-container .form-group textarea {
            padding: 12px 16px;
            border-radius: 8px;
            resize: none;
            color: #fff;
            height: 96px;
            border: 1px solid #414141;
            background-color: transparent;
            font-family: inherit;
        }

        .form-container .form-group input::placeholder {
            opacity: 0.5;
        }

        .form-container .form-group input:focus {
            outline: none;
            border-color: #e81cff;
        }

        .form-container .form-group textarea:focus {
            outline: none;
            border-color: #e81cff;
        }

        .form-container .form-submit-btn {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            align-self: flex-start;
            font-family: inherit;
            color: #717171;
            font-weight: 600;
            width: 40%;
            background: #313131;
            border: 1px solid #414141;
            padding: 12px 16px;
            font-size: inherit;
            gap: 8px;
            margin-top: 8px;
            cursor: pointer;
            border-radius: 6px;
        }

        .form-container .form-submit-btn:hover {
            background-color: #fff;
            border-color: #fff;
        }




    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
    </div>
    <div class="container">
        <div class="form-container">
        <form class="form" action="../controllers/loginController.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required="">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required="">
            </div>
            <button class="form-submit-btn" type="submit">Iniciar sessión</button>
        </form>
        </div>
    </div>
</body>
</html>
