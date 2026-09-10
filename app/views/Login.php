<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            background:
                radial-gradient(
                    circle at center,
                    #183d2c 0%,
                    #07100c 45%,
                    #020403 100%
                );

            color: white;
        }

        .login-box {
            width: 400px;
            padding: 40px;

            background: rgba(7, 15, 11, 0.96);

            border: 1px solid #22c55e;
            border-radius: 18px;

            box-shadow:
                0 0 25px rgba(34, 197, 94, 0.25),
                0 20px 60px rgba(0, 0, 0, 0.7);

            position: relative;
        }

        .login-box::before {
            content: "";

            position: absolute;
            top: 0;
            left: 10%;

            width: 80%;
            height: 3px;

            background: #22c55e;

            box-shadow:
                0 0 15px #22c55e;
        }

        .logo {
            text-align: center;

            font-size: 55px;

            color: #4ade80;

            margin-bottom: 5px;

            text-shadow:
                0 0 10px #22c55e,
                0 0 25px rgba(34, 197, 94, 0.5);
        }

        h1 {
            text-align: center;

            font-size: 30px;

            letter-spacing: 4px;

            text-transform: uppercase;

            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;

            color: #94a3b8;

            font-size: 14px;

            margin-bottom: 25px;
        }

        .zoro-line {
            width: 70px;
            height: 3px;

            background: #22c55e;

            margin: 0 auto 30px;

            box-shadow:
                0 0 10px #22c55e;
        }

        label {
            display: block;

            margin-bottom: 8px;

            color: #bbf7d0;

            font-size: 14px;

            font-weight: bold;

            letter-spacing: 1px;
        }

        input {
            width: 100%;

            padding: 14px;

            background: #111c17;

            color: white;

            border: 1px solid #365443;

            border-radius: 8px;

            outline: none;

            font-size: 15px;

            margin-bottom: 20px;
        }

        input::placeholder {
            color: #64748b;
        }

        input:focus {
            border-color: #22c55e;

            box-shadow:
                0 0 10px rgba(34, 197, 94, 0.3);
        }

        button {
            width: 100%;

            padding: 14px;

            border: none;

            border-radius: 8px;

            background: #166534;

            color: white;

            font-size: 15px;

            font-weight: bold;

            letter-spacing: 2px;

            text-transform: uppercase;

            cursor: pointer;

            transition: 0.3s;
        }

        button:hover {
            background: #15803d;

            box-shadow:
                0 0 15px rgba(34, 197, 94, 0.5);

            transform: translateY(-2px);
        }

        .error {
            background: rgba(127, 29, 29, 0.35);

            color: #fca5a5;

            border: 1px solid #7f1d1d;

            padding: 10px;

            border-radius: 8px;

            margin-bottom: 20px;

            text-align: center;
        }

        .footer {
            text-align: center;

            margin-top: 25px;

            color: #64748b;

            font-size: 12px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <!-- Zoro Style Logo -->
    <div class="logo">⚔</div>

    <h1>Login</h1>

    <p class="subtitle">
        User Management System
    </p>

    <div class="zoro-line"></div>


    <!-- Error Message -->
    <?php if (isset($error)): ?>

        <div class="error">
            <?= htmlspecialchars($error); ?>
        </div>

    <?php endif; ?>


    <!-- Login Form -->
    
<form action="/LavaLust/login" method="POST">

        <label>Email</label>

        <input
            type="email"
            name="email"
            placeholder="Enter your email"
            required
        >

        <button type="submit">
            Login
        </button>

    </form>


    <div class="footer">
        ⚔ Three Swords Style ⚔
    </div>

</div>

</body>
</html>
