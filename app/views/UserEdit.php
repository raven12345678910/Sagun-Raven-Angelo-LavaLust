<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit User - Super CRUD</title>

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
            padding: 20px;
        }

        .form-box {
            width: 500px;
            padding: 40px;

            background: rgba(7, 15, 11, 0.96);

            border: 1px solid #22c55e;
            border-radius: 18px;

            box-shadow:
                0 0 25px rgba(34, 197, 94, 0.25),
                0 20px 60px rgba(0, 0, 0, 0.7);

            position: relative;
        }

        .form-box::before {
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

            font-size: 50px;

            color: #4ade80;

            margin-bottom: 5px;

            text-shadow:
                0 0 10px #22c55e,
                0 0 25px rgba(34, 197, 94, 0.5);
        }

        h1 {
            text-align: center;

            font-size: 28px;

            letter-spacing: 3px;

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

        .form-group {
            margin-bottom: 20px;
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

            transition: 0.3s;
        }

        input:focus {
            border-color: #22c55e;

            box-shadow:
                0 0 10px rgba(34, 197, 94, 0.3);
        }

        .buttons {
            display: flex;

            gap: 10px;

            margin-top: 25px;
        }

        button,
        .cancel-btn {
            flex: 1;

            padding: 14px;

            border-radius: 8px;

            font-size: 14px;

            font-weight: bold;

            text-align: center;

            text-decoration: none;

            cursor: pointer;

            transition: 0.3s;
        }

        button {
            border: 1px solid #22c55e;

            background: #166534;

            color: white;
        }

        button:hover {
            background: #15803d;

            box-shadow:
                0 0 15px rgba(34, 197, 94, 0.5);

            transform: translateY(-2px);
        }

        .cancel-btn {
            background: #111c17;

            color: #94a3b8;

            border: 1px solid #365443;
        }

        .cancel-btn:hover {
            background: #1f3528;

            color: white;
        }

        .footer {
            text-align: center;

            margin-top: 25px;

            color: #64748b;

            font-size: 12px;
        }

        @media (max-width: 550px) {

            .form-box {
                width: 100%;
                padding: 30px 25px;
            }

            h1 {
                font-size: 24px;
            }

            .buttons {
                flex-direction: column;
            }

        }

    </style>
</head>

<body>

<div class="form-box">

    <!-- ZORO STYLE LOGO -->

    <div class="logo">
        ⚔
    </div>

    <h1>Edit User</h1>

    <p class="subtitle">
        Update User Information
    </p>

    <div class="zoro-line"></div>


    <!-- EDIT FORM -->

    <form action="/LavaLust/users/update/<?= $user['id']; ?>" method="POST">

        <div class="form-group">

            <label>First Name</label>

            <input
                type="text"
                name="firstname"
                value="<?= htmlspecialchars($user['firstname']); ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>Last Name</label>

            <input
                type="text"
                name="lastname"
                value="<?= htmlspecialchars($user['lastname']); ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>Email</label>

            <input
                type="email"
                name="email"
                value="<?= htmlspecialchars($user['email']); ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>Contact</label>

            <input
                type="text"
                name="contact"
                value="<?= htmlspecialchars($user['contact']); ?>"
                required
            >

        </div>


        <div class="buttons">

            <button type="submit">
                ⚔ Update User
            </button>

            <a
                href="/LavaLust/users"
                class="cancel-btn"
            >
                Cancel
            </a>

        </div>

    </form>


    <div class="footer">
        ⚔ Three Swords Style • Super CRUD ⚔
    </div>

</div>

</body>
</html>
