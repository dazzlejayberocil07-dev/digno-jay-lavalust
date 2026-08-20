<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>

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
        }

        .navbar {
            background: #14532d;
            height: 70px;
            padding: 0 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 20px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 8px;
        }

        .nav-links a {
            color: #bbf7d0;
            text-decoration: none;
            padding: 9px 15px;
            border-radius: 7px;
            font-size: 14px;
        }

        .nav-links a:hover {
            background: #166534;
            color: white;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
        }

        .profile {
            background: white;
            border-radius: 18px;
            padding: 45px;
            box-shadow: 0 8px 30px rgba(20, 83, 45, 0.08);
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 22px;
            padding-bottom: 30px;
            border-bottom: 1px solid #dcfce7;
        }

        .avatar {
            width: 85px;
            height: 85px;
            flex-shrink: 0;
            background: #16a34a;
            color: white;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            font-weight: bold;
            box-shadow: 0 6px 15px rgba(22, 163, 74, 0.2);
        }

        .profile-header h1 {
            font-size: 28px;
            margin-bottom: 8px;
            color: #14532d;
        }

        .profile-header p {
            color: #64748b;
            font-size: 14px;
        }

        .section-title {
            margin: 30px 0 15px;
            font-size: 14px;
            color: #166534;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            font-weight: bold;
        }

        .profile-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .info-box {
            background: #f8fffa;
            border: 1px solid #dcfce7;
            border-radius: 12px;
            padding: 19px 20px;
        }

        .info-box:hover {
            border-color: #86efac;
        }

        .label {
            display: block;
            color: #6b7280;
            font-size: 12px;
            margin-bottom: 7px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .value {
            color: #14532d;
            font-size: 15px;
            font-weight: bold;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .home-link {
            color: #166534;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .home-link:hover {
            color: #15803d;
        }

        .back-button {
            display: inline-block;
            padding: 12px 19px;
            background: #16a34a;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
        }

        .back-button:hover {
            background: #15803d;
        }

        footer {
            text-align: center;
            color: #86a68f;
            font-size: 13px;
            margin-top: 35px;
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 0 5%;
            }

            .container {
                margin: 30px auto;
            }

            .profile {
                padding: 28px;
            }

            .profile-header {
                align-items: flex-start;
            }

            .profile-header h1 {
                font-size: 23px;
            }

            .profile-info {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column-reverse;
                align-items: stretch;
                gap: 15px;
            }

            .back-button {
                text-align: center;
            }

            .home-link {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="logo">
            Student Portal
        </div>

        <div class="nav-links">
            <a href="<?= site_url('student'); ?>">Home</a>
            <a href="<?= site_url('student/profile'); ?>">Profile</a>
        </div>

    </nav>

    <main class="container">

        <section class="profile">

            <div class="profile-header">

                <div class="avatar">
                    <?= strtoupper(substr($student['name'], 0, 1)); ?>
                </div>

                <div>
                    <h1><?= $student['name']; ?></h1>
                    <p><?= $student['course']; ?></p>
                </div>

            </div>

            <div class="section-title">
                Student Information
            </div>

            <div class="profile-info">

                <div class="info-box">
                    <span class="label">Student ID</span>
                    <span class="value">
                        <?= $student['student_id']; ?>
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">Year Level</span>
                    <span class="value">
                        <?= $student['year']; ?>
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">Section</span>
                    <span class="value">
                        <?= $student['section']; ?>
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">Course</span>
                    <span class="value">
                        <?= $student['course']; ?>
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">Email</span>
                    <span class="value">
                        <?= $student['email']; ?>
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">Contact Number</span>
                    <span class="value">
                        <?= $student['contact']; ?>
                    </span>
                </div>

            </div>

            <div class="actions">

                <a class="home-link" href="<?= site_url('student'); ?>">
                    ← Return to Student Home
                </a>

                <a class="back-button" href="<?= site_url('student'); ?>">
                    Back to Home
                </a>

            </div>

        </section>

        <footer>
            Student Information System
        </footer>

    </main>

</body>
</html>