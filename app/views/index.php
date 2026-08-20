<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>

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
            letter-spacing: 0.3px;
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
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
        }

        .message {
            background: #ecfdf5;
            border: 1px solid #86efac;
            color: #166534;
            padding: 15px 18px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 14px;
            text-align: left;
            box-shadow: 0 3px 12px rgba(22, 101, 52, 0.06);
        }

        .message strong {
            display: block;
            margin-bottom: 4px;
            color: #14532d;
        }

        .welcome {
            background: white;
            border-radius: 18px;
            padding: 45px;
            box-shadow: 0 8px 30px rgba(20, 83, 45, 0.08);
        }

        .welcome-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #dcfce7;
        }

        .welcome-text h1 {
            font-size: 32px;
            margin-bottom: 10px;
            color: #14532d;
        }

        .welcome-text p {
            color: #64748b;
            font-size: 15px;
            line-height: 1.6;
        }

        .avatar {
            width: 75px;
            height: 75px;
            flex-shrink: 0;
            background: #16a34a;
            color: white;
            border-radius: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 27px;
            font-weight: bold;
            box-shadow: 0 6px 15px rgba(22, 163, 74, 0.2);
        }

        .student-card {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .info-box {
            background: #f8fffa;
            border: 1px solid #dcfce7;
            border-radius: 12px;
            padding: 18px 20px;
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
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .status {
            color: #64748b;
            font-size: 13px;
        }

        .button {
            display: inline-block;
            background: #16a34a;
            color: white;
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
        }

        .button:hover {
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

            .welcome {
                padding: 28px;
            }

            .welcome-header {
                align-items: flex-start;
            }

            .welcome-text h1 {
                font-size: 25px;
            }

            .student-card {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
            }

            .button {
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

        <?php if (isset($_SESSION['middleware_message'])): ?>

            <div class="message">

                <strong>
                    Access Notice
                </strong>

                <?= htmlspecialchars($_SESSION['middleware_message']); ?>

            </div>

            <?php unset($_SESSION['middleware_message']); ?>

        <?php endif; ?>


        <section class="welcome">

            <div class="welcome-header">

                <div class="welcome-text">

                    <h1>
                        Welcome,
                        <?= htmlspecialchars($student['name'] ?? 'Student'); ?>!
                    </h1>

                    <p>
                        Welcome to your student information page.
                        You can view your student details and profile here.
                    </p>

                </div>


                <div class="avatar">

                    <?= strtoupper(
                        substr(
                            $student['name'] ?? 'Student',
                            0,
                            1
                        )
                    ); ?>

                </div>

            </div>


            <div class="student-card">

                <div class="info-box">

                    <span class="label">
                        Student ID
                    </span>

                    <span class="value">
                        <?= htmlspecialchars($student['student_id'] ?? 'N/A'); ?>
                    </span>

                </div>


                <div class="info-box">

                    <span class="label">
                        Course
                    </span>

                    <span class="value">
                        <?= htmlspecialchars($student['course'] ?? 'N/A'); ?>
                    </span>

                </div>


                <div class="info-box">

                    <span class="label">
                        Year Level
                    </span>

                    <span class="value">
                        <?= htmlspecialchars($student['year'] ?? 'N/A'); ?>
                    </span>

                </div>


                <div class="info-box">

                    <span class="label">
                        Section
                    </span>

                    <span class="value">
                        <?= htmlspecialchars($student['section'] ?? 'N/A'); ?>
                    </span>

                </div>


                <div class="info-box">

                    <span class="label">
                        Email
                    </span>

                    <span class="value">
                        <?= htmlspecialchars($student['email'] ?? 'N/A'); ?>
                    </span>

                </div>


                <div class="info-box">

                    <span class="label">
                        Contact Number
                    </span>

                    <span class="value">
                        <?= htmlspecialchars($student['contact'] ?? 'N/A'); ?>
                    </span>

                </div>

            </div>


            <div class="actions">

                <span class="status">
                    Student Information System
                </span>

                <a
                    class="button"
                    href="<?= site_url('student/profile'); ?>"
                >
                    View Student Profile →
                </a>

            </div>

        </section>


        <footer>
            Student Information System
        </footer>

    </main>

</body>
</html>