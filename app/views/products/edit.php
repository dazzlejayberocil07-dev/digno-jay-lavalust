```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Product | Product Management</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 240px;
            background: #1e293b;
            color: white;
            padding: 25px 15px;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 35px;
        }

        .menu-title {
            font-size: 12px;
            color: #94a3b8;
            margin: 20px 10px 8px;
            text-transform: uppercase;
        }

        .sidebar a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #2563eb;
            color: white;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .main {
            margin-left: 240px;
            width: calc(100% - 240px);
            padding: 30px;
        }

        /* =========================
           TOP BAR
        ========================= */

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .topbar h1 {
            font-size: 28px;
            color: #333;
        }

        .topbar p {
            color: #64748b;
            margin-top: 5px;
            font-size: 14px;
        }

        /* =========================
           BACK BUTTON
        ========================= */

        .back-button {
            background: #64748b;
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 7px;
            font-weight: bold;
            font-size: 13px;
            transition: 0.2s;
        }

        .back-button:hover {
            background: #475569;
        }

        /* =========================
           FORM CARD
        ========================= */

        .card {
            background: white;
            max-width: 850px;
            border-radius: 12px;
            padding: 0;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .card-header {
            padding: 25px 30px;
            border-bottom: 1px solid #e5e7eb;
        }

        .card-header h2 {
            font-size: 20px;
            color: #1f2937;
        }

        .card-header p {
            color: #64748b;
            margin-top: 5px;
            font-size: 14px;
        }

        /* =========================
           FORM
        ========================= */

        .form-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            color: #374151;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            color: #333;
            transition: 0.2s;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.08);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* =========================
           PRICE & QUANTITY
        ========================= */

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* =========================
           BUTTONS
        ========================= */

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        button,
        .cancel {
            padding: 11px 18px;
            border-radius: 7px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            transition: 0.2s;
        }

        button {
            background: #2563eb;
            color: white;
        }

        button:hover {
            background: #1d4ed8;
        }

        .cancel {
            background: #64748b;
            color: white;
        }

        .cancel:hover {
            background: #475569;
        }

        /* =========================
           FOOTER
        ========================= */

        .card-footer {
            padding: 18px 30px;
            background: #f8fafc;
            border-top: 1px solid #e5e7eb;
        }

        .card-footer p {
            color: #94a3b8;
            font-size: 12px;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 768px) {

            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
                width: calc(100% - 200px);
                padding: 20px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .card {
                max-width: 100%;
            }

        }

        @media (max-width: 600px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .logo {
                font-size: 0;
                margin-bottom: 30px;
            }

            .logo::before {
                content: "PS";
                font-size: 18px;
                font-weight: bold;
            }

            .menu-title {
                display: none;
            }

            .sidebar a {
                padding: 12px 8px;
                text-align: center;
                font-size: 0;
            }

            .sidebar a::first-letter {
                font-size: 18px;
            }

            .main {
                margin-left: 70px;
                width: calc(100% - 70px);
                padding: 15px;
            }

            .topbar h1 {
                font-size: 24px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .card-header,
            .form-body,
            .card-footer {
                padding: 20px;
            }

            .buttons {
                flex-direction: column;
            }

            button,
            .cancel {
                width: 100%;
                text-align: center;
            }
        }
    </style>

</head>

<body>

<div class="layout">

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar">

        <div class="logo">
            Product System
        </div>

        <div class="menu-title">
            Main
        </div>

        <a href="<?= site_url('products'); ?>" class="active">
            📦 Products
        </a>

        <a href="<?= site_url('products/create'); ?>">
            ➕ Add Product
        </a>

        <div class="menu-title">
            System
        </div>

        <a href="#">
            👤 Users
        </a>

        <a href="#">
            ⚙️ Settings
        </a>

        <a href="#">
            🚪 Logout
        </a>

    </aside>


    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="main">

        <!-- TOP BAR -->

        <div class="topbar">

            <div>

                <h1>Edit Product</h1>

                <p>
                    Update the information of this product.
                </p>

            </div>

            <a
                href="<?= site_url('products'); ?>"
                class="back-button">
                ← Back to Products
            </a>

        </div>


        <!-- FORM CARD -->

        <div class="card">

            <div class="card-header">

                <h2>Product Information</h2>

                <p>
                    Modify the product details below and save your changes.
                </p>

            </div>


            <div class="form-body">

                <form
                    action="<?= site_url('products/update/' . $product['id']); ?>"
                    method="POST"
                >

                    <!-- PRODUCT NAME -->

                    <div class="form-group">

                        <label for="product_name">
                            Product Name
                        </label>

                        <input
                            type="text"
                            id="product_name"
                            name="product_name"
                            value="<?= htmlspecialchars($product['product_name']); ?>"
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
                        ><?= htmlspecialchars($product['description']); ?></textarea>

                    </div>


                    <!-- PRICE & QUANTITY -->

                    <div class="form-row">

                        <div class="form-group">

                            <label for="price">
                                Price
                            </label>

                            <input
                                type="number"
                                id="price"
                                name="price"
                                step="0.01"
                                min="0"
                                value="<?= htmlspecialchars($product['price']); ?>"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label for="quantity">
                                Quantity
                            </label>

                            <input
                                type="number"
                                id="quantity"
                                name="quantity"
                                min="0"
                                value="<?= htmlspecialchars($product['quantity']); ?>"
                                required
                            >

                        </div>

                    </div>


                    <!-- BUTTONS -->

                    <div class="buttons">

                        <button type="submit">
                            ✓ Update Product
                        </button>

                        <a
                            href="<?= site_url('products'); ?>"
                            class="cancel">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>


            <!-- FOOTER -->

            <div class="card-footer">

                <p>
                    Make sure all product information is correct before saving your changes.
                </p>

            </div>

        </div>

    </main>

</div>

</body>

</html>
```
