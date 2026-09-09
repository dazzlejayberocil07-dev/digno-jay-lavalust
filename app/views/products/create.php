```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product | Student Portal</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 240px;
            height: 100vh;
            background: #111827;
            padding: 25px 18px;
            z-index: 10;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px 30px;
            color: white;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
        }

        .logo-text h2 {
            font-size: 16px;
            font-weight: 700;
        }

        .logo-text span {
            font-size: 11px;
            color: #9ca3af;
        }

        .menu-title {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #6b7280;
            padding: 0 12px;
            margin: 10px 0;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            color: #9ca3af;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.2s ease;
        }

        .menu a:hover {
            background: #1f2937;
            color: white;
        }

        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 16px;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .main {
            margin-left: 240px;
            min-height: 100vh;
            padding: 30px;
        }

        /* =========================
           TOP BAR
        ========================= */

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title h1 {
            font-size: 25px;
            color: #111827;
            margin-bottom: 5px;
        }

        .page-title p {
            color: #6b7280;
            font-size: 14px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            background: white;
            padding: 8px 14px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 13px;
        }

        .user-info span {
            font-size: 13px;
            font-weight: 600;
        }

        /* =========================
           FORM CARD
        ========================= */

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
            max-width: 850px;
        }

        .card-header {
            padding: 22px 24px;
            border-bottom: 1px solid #e5e7eb;
        }

        .card-title h2 {
            font-size: 17px;
            color: #111827;
            margin-bottom: 4px;
        }

        .card-title p {
            color: #6b7280;
            font-size: 13px;
        }

        /* =========================
           FORM
        ========================= */

        .form-body {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .required {
            color: #2563eb;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #fff;
            color: #1f2937;
            font-family: inherit;
            font-size: 13px;
            transition: 0.2s ease;
        }

        input::placeholder,
        textarea::placeholder {
            color: #9ca3af;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.08);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* =========================
           PRICE + QUANTITY
        ========================= */

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        /* =========================
           BUTTONS
        ========================= */

        .buttons {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-top: 5px;
        }

        button,
        .cancel {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 16px;
            border-radius: 7px;
            border: none;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: 0.2s ease;
        }

        button {
            background: #2563eb;
            color: white;
        }

        button:hover {
            background: #1d4ed8;
        }

        .cancel {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #e5e7eb;
        }

        .cancel:hover {
            background: #e5e7eb;
        }

        /* =========================
           FOOTER
        ========================= */

        .card-footer {
            padding: 18px 24px;
            border-top: 1px solid #e5e7eb;
            background: #fafafa;
        }

        .card-footer p {
            font-size: 12px;
            color: #9ca3af;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .logo {
                justify-content: center;
                padding: 10px 0 25px;
            }

            .logo-text,
            .menu-title,
            .menu a span {
                display: none;
            }

            .menu a {
                justify-content: center;
                padding: 13px;
            }

            .main {
                margin-left: 70px;
                padding: 20px;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
            }

            .user-info {
                display: none;
            }

            .page-title h1 {
                font-size: 22px;
            }
        }

        @media (max-width: 600px) {

            .main {
                padding: 15px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .card-header {
                padding: 18px;
            }

            .form-body {
                padding: 18px;
            }

            .card-footer {
                padding: 18px;
            }

            .buttons {
                flex-direction: column;
                align-items: stretch;
            }

            button,
            .cancel {
                width: 100%;
            }
        }
    </style>

</head>

<body>

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar">

        <div class="logo">

            <div class="logo-icon">
                SP
            </div>

            <div class="logo-text">
                <h2>Student Portal</h2>
                <span>LavaLust System</span>
            </div>

        </div>

        <div class="menu-title">
            Navigation
        </div>

        <nav class="menu">

            <a href="<?= site_url('student'); ?>">
                <span class="menu-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <a href="<?= site_url('student/profile'); ?>">
                <span class="menu-icon">👤</span>
                <span>My Profile</span>
            </a>

            <a href="<?= site_url('products'); ?>">
                <span class="menu-icon">📦</span>
                <span>Products</span>
            </a>

            <a href="<?= site_url('products/create'); ?>" class="active">
                <span class="menu-icon">＋</span>
                <span>Add Product</span>
            </a>

            <a href="<?= site_url('users'); ?>">
                <span class="menu-icon">☷</span>
                <span>Users</span>
            </a>

        </nav>

    </aside>


    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="main">

        <!-- TOP BAR -->

        <div class="topbar">

            <div class="page-title">

                <h1>Add Product</h1>

                <p>
                    Add a new product to your inventory.
                </p>

            </div>

            <div class="user-info">

                <div class="avatar">
                    SP
                </div>

                <span>Student Portal</span>

            </div>

        </div>


        <!-- FORM CARD -->

        <section class="card">

            <div class="card-header">

                <div class="card-title">

                    <h2>Product Information</h2>

                    <p>
                        Enter the details of the product you want to add.
                    </p>

                </div>

            </div>


            <div class="form-body">

                <form action="<?= site_url('products/store'); ?>" method="POST">

                    <!-- PRODUCT NAME -->

                    <div class="form-group">

                        <label for="product_name">
                            Product Name <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="product_name"
                            name="product_name"
                            placeholder="Enter product name"
                            required
                        >

                    </div>


                    <!-- DESCRIPTION -->

                    <div class="form-group">

                        <label for="description">
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            placeholder="Enter product description"
                        ></textarea>

                    </div>


                    <!-- PRICE + QUANTITY -->

                    <div class="form-row">

                        <div class="form-group">

                            <label for="price">
                                Price <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                id="price"
                                name="price"
                                step="0.01"
                                min="0"
                                placeholder="Enter price"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label for="quantity">
                                Quantity <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                id="quantity"
                                name="quantity"
                                min="0"
                                placeholder="Enter quantity"
                                required
                            >

                        </div>

                    </div>


                    <!-- BUTTONS -->

                    <div class="buttons">

                        <button type="submit">
                            ✓ Add Product
                        </button>

                        <a
                            href="<?= site_url('products'); ?>"
                            class="cancel">
                            ← Cancel
                        </a>

                    </div>

                </form>

            </div>


            <!-- FOOTER -->

            <div class="card-footer">

                <p>
                    Fields marked with * are required.
                </p>

            </div>

        </section>

    </main>

</body>

</html>
```
