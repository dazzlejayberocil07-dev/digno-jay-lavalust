
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Student Portal</title>

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

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 420px;

            background: white;

            border: 1px solid #dcfce7;

            border-radius: 18px;

            padding: 35px;

            box-shadow: 0 8px 30px rgba(20, 83, 45, .08);
        }

        .logo {
            text-align: center;

            color: #14532d;

            font-size: 22px;

            font-weight: bold;

            margin-bottom: 25px;
        }

        .login-header {
            margin-bottom: 28px;

            text-align: center;
        }

        .login-header h1 {
            color: #14532d;

            font-size: 30px;

            margin-bottom: 8px;
        }

        .login-header p {
            color: #64748b;

            font-size: 14px;

            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;

            color: #14532d;

            font-size: 12px;

            font-weight: bold;

            text-transform: uppercase;

            letter-spacing: 0.05em;

            margin-bottom: 9px;
        }

        input {
            width: 100%;

            padding: 13px 15px;

            background: #f8fffa;

            color: #1f2937;

            border: 1px solid #dcfce7;

            border-radius: 8px;

            font-size: 14px;

            transition: 0.2s;
        }

        input::placeholder {
            color: #94a3b8;
        }

        input:focus {
            outline: none;

            border-color: #86efac;

            background: white;

            box-shadow: 0 0 0 3px rgba(134, 239, 172, 0.2);
        }

        .login-button {
            width: 100%;

            padding: 13px;

            background: #16a34a;

            color: white;

            border: none;

            border-radius: 8px;

            font-weight: bold;

            cursor: pointer;

            font-size: 14px;

            transition: 0.2s;
        }

        .login-button:hover {
            background: #15803d;
        }

        .login-button:active {
            transform: translateY(1px);
        }

        .error {
            background: #fef2f2;

            color: #b91c1c;

            border: 1px solid #fecaca;

            padding: 12px;

            border-radius: 8px;

            margin-bottom: 20px;

            font-size: 13px;

            line-height: 1.5;
        }

        .footer {
            text-align: center;

            margin-top: 25px;

            padding-top: 20px;

            border-top: 1px solid #dcfce7;

            color: #6b7280;

            font-size: 12px;
        }

        @media (max-width: 500px) {

            body {
                padding: 15px;
            }

            .login-card {
                padding: 28px 22px;
            }

            .login-header h1 {
                font-size: 26px;
            }

        }

    </style>

</head>

<body>

    <div class="login-card">

        <div class="logo">
            Student Portal
        </div>


        <div class="login-header">

            <h1>Login</h1>

            <p>
                Login to access the Student Portal.
            </p>

        </div>


        <?php if (isset($error)): ?>

            <div class="error">
                <?= htmlspecialchars($error); ?>
            </div>

        <?php endif; ?>


        <form
            action="<?= site_url('login/authenticate'); ?>"
            method="POST"
        >

            <div class="form-group">

                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter username"
                    required
                >

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required
                >

            </div>


            <button
                type="submit"
                class="login-button"
            >
                Login
            </button>

        </form>


        <div class="footer">

            Student Information System &copy; <?= date('Y'); ?>

        </div>

    </div>

</body>

</html>

