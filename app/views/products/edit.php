
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Product | Student Portal</title>

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
            max-width: 900px;
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
           CARD
        ========================= */

        .card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(20, 83, 45, .08);
            overflow: hidden;
        }

        .card-header {
            padding: 25px 30px;
            border-bottom: 1px solid #dcfce7;
        }

        .card-header h2 {
            color: #14532d;
            font-size: 20px;
            margin-bottom: 6px;
        }

        .card-header p {
            color: #64748b;
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
            color: #14532d;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dcfce7;
            border-radius: 10px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            color: #1f2937;
            background: #f8fffa;
            transition: 0.2s;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #86efac;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, .08);
            background: white;
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
            border-top: 1px solid #dcfce7;
        }

        button,
        .cancel {
            padding: 12px 18px;
            border-radius: 9px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        button {
            background: #16a34a;
            color: white;
        }

        button:hover {
            background: #15803d;
        }

        .cancel {
            background: #14532d;
            color: white;
        }

        .cancel:hover {
            background: #166534;
        }

        /* =========================
           INFORMATION NOTE
        ========================= */

        .info-note {
            margin-top: 20px;
            padding: 15px 18px;
            background: #ecfdf5;
            border: 1px solid #86efac;
            border-radius: 10px;
            color: #166534;
            font-size: 13px;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #6b7280;
            font-size: 12px;
        }

        /* =========================
           MOBILE
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

            .card-header,
            .form-body {
                padding: 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
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

            <a href="<?= site_url('products'); ?>" class="active">
                Products
            </a>

            <a href="#">
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

            <h1>Edit Product</h1>

            <p>
                Update the information of this product.
            </p>

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


                <!-- INFORMATION NOTE -->

                <div class="info-note">

                    <strong>Note:</strong>
                    Make sure all product information is correct before saving your changes.

                </div>

            </div>

        </div>


        <!-- FOOTER -->

        <div class="footer">

            Student Information System &copy; <?= date('Y'); ?>

        </div>

    </main>

</body>

</html>

