
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Users | Student Portal</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0fdf4;
            color: #1f2937;
            min-height: 100vh;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #14532d;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 8%;
            color: white;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 8px;
        }

        .nav-links a {
            color: #bbf7d0;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.2s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: #166534;
            color: white;
        }

        /* =========================
           MAIN CONTAINER
        ========================= */

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
        }

        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h1 {
            color: #14532d;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .page-header p {
            color: #64748b;
            font-size: 14px;
        }

        /* =========================
           MESSAGE BOX
        ========================= */

        .message {
            background: #ecfdf5;
            border: 1px solid #86efac;
            color: #166534;
            padding: 15px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* =========================
           USERS CARD
        ========================= */

        .card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(20, 83, 45, .08);
            overflow: hidden;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 30px;
            border-bottom: 1px solid #dcfce7;
        }

        .card-title h2 {
            font-size: 20px;
            color: #14532d;
            margin-bottom: 6px;
        }

        .card-title p {
            color: #64748b;
            font-size: 14px;
        }

        .record-count {
            padding: 7px 12px;
            background: #ecfdf5;
            color: #166534;
            border: 1px solid #bbf7d0;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        thead {
            background: #f8fffa;
        }

        th {
            color: #14532d;
            text-align: left;
            padding: 14px 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid #dcfce7;
        }

        td {
            padding: 15px 20px;
            font-size: 13px;
            color: #374151;
            border-bottom: 1px solid #f0fdf4;
        }

        tbody tr {
            transition: 0.15s ease;
        }

        tbody tr:hover {
            background: #f8fffa;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* =========================
           TABLE CONTENT
        ========================= */

        .id {
            color: #16a34a;
            font-weight: bold;
        }

        .name {
            color: #14532d;
            font-weight: 600;
        }

        .email {
            color: #64748b;
        }

        .username {
            display: inline-block;
            padding: 6px 10px;
            background: #ecfdf5;
            color: #166534;
            border: 1px solid #dcfce7;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
        }

        /* =========================
           USER ICON
        ========================= */

        .user-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: #ecfdf5;
            color: #16a34a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty {
            text-align: center;
            padding: 60px 20px;
            color: #6b7280;
        }

        .empty-icon {
            width: 55px;
            height: 55px;
            margin: 0 auto 12px;
            border-radius: 12px;
            background: #ecfdf5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .empty h3 {
            color: #14532d;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .empty p {
            font-size: 13px;
            color: #6b7280;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            padding: 18px 30px;
            background: #f8fffa;
            border-top: 1px solid #dcfce7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer p {
            font-size: 12px;
            color: #6b7280;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 14px;
            background: #16a34a;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 12px;
            font-weight: bold;
            transition: 0.2s ease;
        }

        .back-btn:hover {
            background: #15803d;
        }

        /* =========================
           FOOTER BELOW CARD
        ========================= */

        .page-footer {
            text-align: center;
            margin-top: 30px;
            color: #6b7280;
            font-size: 12px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 650px) {

            .navbar {
                height: auto;
                padding: 15px 5%;
                flex-direction: column;
                gap: 12px;
            }

            .nav-links {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .nav-links a {
                padding: 8px 12px;
            }

            .container {
                margin: 30px auto;
                padding: 15px;
            }

            .page-header h1 {
                font-size: 26px;
            }

            .card-header {
                padding: 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .footer {
                padding: 18px 20px;
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }

            .back-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

</head>

<body>

    <!-- =========================
         NAVBAR
    ========================== -->

    <nav class="navbar">

        <div class="logo">
            Student Portal
        </div>

        <div class="nav-links">

            <a href="<?= site_url('student'); ?>">
                Home
            </a>

            <a href="<?= site_url('student/profile'); ?>">
                Profile
            </a>

            <a href="<?= site_url('products'); ?>">
                Products
            </a>

            <a href="<?= site_url('users'); ?>" class="active">
                Users
            </a>

        </div>

    </nav>


    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="container">

        <!-- PAGE HEADER -->

        <div class="page-header">

            <h1>Users</h1>

            <p>
                Manage and view registered users in the system.
            </p>

        </div>


        <!-- USERS CARD -->

        <section class="card">

            <!-- CARD HEADER -->

            <div class="card-header">

                <div class="card-title">

                    <h2>User Records</h2>

                    <p>
                        List of users retrieved from the database.
                    </p>

                </div>

                <div class="record-count">
                    <?= count($users); ?> Records
                </div>

            </div>


            <!-- TABLE -->

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Username</th>
                        </tr>

                    </thead>


                    <tbody>

                        <?php if (!empty($users)): ?>

                            <?php foreach ($users as $user): ?>

                                <tr>

                                    <td class="id">
                                        #<?= htmlspecialchars($user['id']) ?>
                                    </td>

                                    <td class="name">
                                        <?= htmlspecialchars($user['firstname']) ?>
                                    </td>

                                    <td class="name">
                                        <?= htmlspecialchars($user['lastname']) ?>
                                    </td>

                                    <td class="email">
                                        <?= htmlspecialchars($user['email']) ?>
                                    </td>

                                    <td>

                                        <span class="username">
                                            @<?= htmlspecialchars($user['username']) ?>
                                        </span>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="5">

                                    <div class="empty">

                                        <div class="empty-icon">
                                            👥
                                        </div>

                                        <h3>No Users Found</h3>

                                        <p>
                                            There are currently no registered users.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>


            <!-- CARD FOOTER -->

            <div class="footer">

                <p>
                    Data retrieved dynamically from the MySQL database.
                </p>

                <a
                    href="<?= site_url('student'); ?>"
                    class="back-btn">

                    ← Back to Dashboard

                </a>

            </div>

        </section>


        <!-- PAGE FOOTER -->

        <div class="page-footer">

            Student Information System &copy; <?= date('Y'); ?>

        </div>

    </main>

</body>

</html>

