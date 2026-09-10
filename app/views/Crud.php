<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentRole = $_SESSION['user']['role'] ?? 'user';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SUPER CRUD</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(circle at top right, #173d2b 0%, transparent 35%),
                radial-gradient(circle at bottom left, #0d281c 0%, transparent 35%),
                #080b09;
            color: #e8f5e9;
            min-height: 100vh;
        }

        .header {
            background: rgba(5, 8, 6, 0.95);
            border-bottom: 1px solid #1e6b43;
            padding: 22px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .sword-icon {
            font-size: 35px;
            transform: rotate(-35deg);
        }

        .logo h2 {
            margin: 0;
            color: #4ade80;
            letter-spacing: 2px;
            font-size: 22px;
        }

        .logo span {
            display: block;
            color: #899b91;
            font-size: 11px;
            letter-spacing: 3px;
            margin-top: 3px;
        }

        .blade-line {
            height: 3px;
            width: 75px;
            background: #35d06f;
            margin-top: 6px;
            border-radius: 5px;
        }

        .logout-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #7f1d1d;
            color: white;
            padding: 10px 17px;
            text-decoration: none;
            border-radius: 7px;
            font-weight: 600;
            border: 1px solid #b91c1c;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #991b1b;
            transform: translateY(-2px);
            box-shadow: 0 0 15px rgba(220, 38, 38, 0.25);
        }

        .container {
            width: 92%;
            max-width: 1200px;
            margin: 45px auto;
        }

        .title-section {
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-bottom: 25px;
        }

        .title-section h1 {
            margin: 0;
            font-size: 34px;
            color: #f1f8f3;
            letter-spacing: 1px;
        }

        .title-section p {
            margin: 7px 0 0;
            color: #84958b;
            font-size: 14px;
        }

        .top-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #168a4b;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 7px;
            font-weight: 600;
            border: 1px solid #31c96b;
            transition: 0.2s;
            box-shadow: 0 0 15px rgba(30, 200, 100, 0.12);
        }

        .top-btn:hover {
            background: #20aa5c;
            transform: translateY(-2px);
            box-shadow: 0 0 20px rgba(30, 200, 100, 0.25);
        }

        .table-card {
            background: rgba(13, 18, 15, 0.96);
            border: 1px solid #20352a;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #10271b;
            color: #58e58b;
            padding: 16px;
            text-align: left;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 1px solid #245b3d;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #1c2a22;
            color: #d5dfd8;
            font-size: 14px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #102119;
        }

        .id-number {
            color: #4ade80;
            font-weight: bold;
        }

        .role {
            display: inline-block;
            padding: 5px 11px;
            border-radius: 20px;
            background: #123c27;
            color: #55e88a;
            border: 1px solid #246b42;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .edit-btn,
        .delete-btn {
            display: inline-block;
            padding: 8px 13px;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }

        .edit-btn {
            background: #145da0;
            border: 1px solid #277bc2;
        }

        .edit-btn:hover {
            background: #1976c9;
            transform: translateY(-1px);
        }

        .delete-btn {
            background: #9d2525;
            border: 1px solid #c83a3a;
            margin-left: 5px;
        }

        .delete-btn:hover {
            background: #c83232;
            transform: translateY(-1px);
        }

        .empty {
            text-align: center !important;
            padding: 40px !important;
            color: #718078 !important;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            color: #526159;
            font-size: 12px;
            letter-spacing: 1px;
        }

        .footer strong {
            color: #36c96d;
        }

        @media (max-width: 850px) {

            .container {
                width: 96%;
                margin-top: 25px;
            }

            .title-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 18px;
            }

            .table-card {
                overflow-x: auto;
            }

            table {
                min-width: 900px;
            }

            .header {
                padding: 18px 4%;
            }

            .logout-btn {
                padding: 8px 12px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <div class="header">

        <div class="logo">

            <div class="sword-icon">
                ⚔️
            </div>

            <div>
                <h2>Roronoa Users</h2>
                <span>THREE SWORD STYLE • SANTORYU</span>
                <div class="blade-line"></div>
            </div>

        </div>

        <a href="/logout"
           class="logout-btn"
           onclick="return confirm('Are you sure you want to logout?');">
            🚪 Logout
        </a>

    </div>

    <div class="container">

        <div class="title-section">

            <div>
                <h1>SUPER CRUD</h1>
                <p>Manage your users like a true swordsman.</p>
            </div>

            <?php if ($currentRole === 'admin'): ?>

                <a href="/users/create" class="top-btn">
                    ⚔ + Add User
                </a>

            <?php endif; ?>

        </div>

        <div class="table-card">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                <?php if (!empty($users)): ?>

                    <?php foreach ($users as $user): ?>

                        <tr>

                            <td>
                                <span class="id-number">
                                    #<?= htmlspecialchars($user['id']); ?>
                                </span>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['firstname']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['lastname']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['email']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['contact']); ?>
                            </td>

                            <td>
                                <span class="role">
                                    <?= htmlspecialchars($user['role']); ?>
                                </span>
                            </td>

                            <td>

                                <?php if ($currentRole === 'admin'): ?>

                                    <a
                                        href="/users/edit/<?= $user['id']; ?>"
                                        class="edit-btn">
                                        ⚔ Edit
                                    </a>

                                    <a
                                        href="/users/delete/<?= $user['id']; ?>"
                                        class="delete-btn"
                                        onclick="return confirm('Are you sure you want to delete this user?');">
                                        🗡 Delete
                                    </a>

                                <?php else: ?>

                                    <span style="color: #526159;">
                                        No action
                                    </span>

                                <?php endif; ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="7" class="empty">
                            No users found.
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

        <div class="footer">
            <strong>NOTHING HAPPENED.</strong> • CRUD SYSTEM
        </div>

    </div>

</body>
</html>
