<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Profile</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 50px auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.10);
        }

        h1 {
            text-align: center;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        .profile {
            text-align: center;
            margin-bottom: 25px;
        }

        .profile-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #333;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: bold;
        }

        .profile-name {
            font-size: 22px;
            font-weight: bold;
        }

        .profile-course {
            color: #777;
            margin-top: 5px;
        }

        .info {
            margin-top: 25px;
        }

        .info-item {
            padding: 14px;
            margin-bottom: 10px;
            background: #f7f7f7;
            border-radius: 8px;
        }

        .label {
            display: block;
            font-size: 13px;
            color: #777;
            margin-bottom: 5px;
        }

        .value {
            font-size: 16px;
            font-weight: bold;
        }

        .navigation {
            text-align: center;
            margin-top: 25px;
        }

        .navigation a {
            display: inline-block;
            text-decoration: none;
            background: #333;
            color: white;
            padding: 10px 18px;
            margin: 5px;
            border-radius: 6px;
        }

        .navigation a:hover {
            background: #555;
        }

        .footer {
            text-align: center;
            color: #888;
            font-size: 13px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Student Profile</h1>

        <p class="subtitle">
            Personal Student Information
        </p>

        <div class="profile">

            <div class="profile-icon">
                <?= strtoupper(substr($student['name'], 0, 1)); ?>
            </div>

            <div class="profile-name">
                <?= $student['name']; ?>
            </div>

            <div class="profile-course">
                <?= $student['course']; ?>
            </div>

        </div>

        <div class="info">

            <div class="info-item">
                <span class="label">Student ID</span>
                <span class="value">
                    <?= $student['student_id']; ?>
                </span>
            </div>

            <div class="info-item">
                <span class="label">Year Level</span>
                <span class="value">
                    <?= $student['year']; ?>
                </span>
            </div>

            <div class="info-item">
                <span class="label">Section</span>
                <span class="value">
                    <?= $student['section']; ?>
                </span>
            </div>

            <div class="info-item">
                <span class="label">Email</span>
                <span class="value">
                    <?= $student['email']; ?>
                </span>
            </div>

        </div>

        <div class="navigation">
            <a href="<?= site_url('student'); ?>">Home</a>
            <a href="<?= site_url('student/profile'); ?>">Student Profile</a>
        </div>

    </div>

    <p class="footer">
        LavaLust Student Information System
    </p>

</div>

</body>
</html>