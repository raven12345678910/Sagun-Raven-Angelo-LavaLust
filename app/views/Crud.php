<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Users - Super CRUD</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            background:
                radial-gradient(
                    circle at top,
                    #183d2c 0%,
                    #07100c 40%,
                    #020403 100%
                );
            color: white;
            padding: 40px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .title-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            font-size: 48px;
            color: #4ade80;
            text-shadow:
                0 0 10px #22c55e,
                0 0 25px rgba(34, 197, 94, 0.5);
        }

        h1 {
            font-size: 32px;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .subtitle {
            color: #94a3b8;
            margin-top: 5px;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            transition: 0.3s;
        }

        .add-btn {
            background: #166534;
            color: white;
            border: 1px solid #22c55e;
        }

        .add-btn:hover {
            background: #15803d;
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.5);
            transform: translateY(-2px);
        }

        .logout-btn {
            background: #3f1111;
            color: #fca5a5;
            border: 1px solid #7f1d1d;
        }

        .logout-btn:hover {
            background: #7f1d1d;
            color: white;
        }

        .table-card {
            background: rgba(7, 15, 11, 0.96);
            border: 1px solid #365443;
            border-radius: 16px;
            overflow: hidden;
            box-shadow:
                0 0 25px rgba(34, 197, 94, 0.15),
                0 20px 50px rgba(0, 0, 0, 0.6);
        }

        .table-header {
            padding: 20px 25px;
            border-bottom: 1px solid #365443;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h2 {
            font-size: 18px;
            color: #bbf7d0;
        }

        .count {
            color: #64748b;
            font-size: 13px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #111c17;
            color: #4ade80;
            padding: 16px;
            text-align: left;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            padding: 16px;
            border-top: 1px solid #1f3528;
            color: #d1d5db;
            font-size: 14px;
        }

        tbody tr:hover {
            background: rgba(34, 197, 94, 0.07);
        }

        .id {
            color: #4ade80;
            font-weight: bold;
        }

        .name {
            color: white;
            font-weight: bold;
        }

        .edit-btn,
        .delete-btn {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            transition: 0.2s;
        }

        .edit-btn {
            background: #164e63;
            color: #67e8f9;
            border: 1px solid #155e75;
            margin-right: 5px;
        }

        .edit-btn:hover {
            background: #155e75;
            color: white;
        }

        .delete-btn {
            background: #450a0a;
            color: #fca5a5;
            border: 1px solid #7f1d1d;
        }

        .delete-btn:hover {
            background: #991b1b;
            color: white;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            color: #64748b;
            font-size: 12px;
        }

        @media (max-width: 700px) {
            body {
                padding: 20px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .actions {
                width: 100%;
            }

            .btn {
                flex: 1;
                text-align: center;
            }

            h1 {
                font-size: 24px;
            }

            .logo {
                font-size: 38px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div class="title-area">

            <div class="logo">⚔</div>

            <div>
                <h1>SUPER CRUD</h1>

                <p class="subtitle">
                    User Management System
                </p>
            </div>

        </div>

        <div class="actions">

            <a
                href="/users/create"
                class="btn add-btn"
            >
                + Add User
            </a>

            <a
                href="/logout"
                class="btn logout-btn"
                onclick="return confirm('Are you sure you want to logout?')"
            >
                Logout
            </a>

        </div>

    </div>

    <div class="table-card">

        <div class="table-header">

            <h2>⚔ User Records</h2>

            <span class="count">
                <?= count($users); ?> Users
            </span>

        </div>

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach ($users as $user): ?>

                    <tr>

                        <td class="id">
                            #<?= $user['id']; ?>
                        </td>

                        <td class="name">
                            <?= htmlspecialchars($user['firstname']); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($user['lastname']); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($user['email']); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($user['username']); ?>
                        </td>

                        <td>

                            <a
                                href="/users/edit/<?= $user['id']; ?>"
                                class="edit-btn"
                            >
                                Edit
                            </a>

                            <a
                                href="/users/delete/<?= $user['id']; ?>"
                                class="delete-btn"
                                onclick="return confirm('Are you sure you want to delete this user?')"
                            >
                                Delete
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

    <div class="footer">
        ⚔ Three Swords Style • Super CRUD ⚔
    </div>

</div>

</body>
</html>
