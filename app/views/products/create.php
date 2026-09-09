
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product | Product Management System</title>

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
            margin-bottom: 22px;
        }

        .page-header h1 {
            font-size: 30px;
            color: #14532d;
            margin-bottom: 7px;
        }

        .page-header p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.5;
        }

        /* =========================
           FORM CARD
        ========================= */

        .card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(20, 83, 45, 0.08);
            overflow: hidden;
        }

        .card-header {
            padding: 28px 32px;
            border-bottom: 1px solid #dcfce7;
        }

        .card-header h2 {
            color: #14532d;
            font-size: 20px;
            margin-bottom: 6px;
        }

        .card-header p {
            color: #64748b;
            font-size: 13px;
        }

        /* =========================
           FORM BODY
        ========================= */

        .form-body {
            padding: 32px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        label {
            display: block;
            color: #374151;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .required {
            color: #16a34a;
        }

        input,
        textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            background: white;
            color: #1f2937;
            font-family: inherit;
            font-size: 14px;
            transition: 0.2s ease;
        }

        input::placeholder,
        textarea::placeholder {
            color: #9ca3af;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.08);
        }

        textarea {
            min-height: 125px;
            resize: vertical;
        }

        /* =========================
           PRICE + QUANTITY
        ========================= */

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        /* =========================
           BUTTONS
        ========================= */

        .buttons {
            margin-top: 28px;
            padding-top: 25px;
            border-top: 1px solid #dcfce7;

            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
        }

        button,
        .cancel {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 12px 19px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: 0.2s ease;
        }

        button {
            background: #16a34a;
            color: white;
            border: none;
        }

        button:hover {
            background: #15803d;
        }

        .cancel {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .cancel:hover {
            background: #dcfce7;
        }

        /* =========================
           CARD FOOTER
        ========================= */

        .card-footer {
            padding: 17px 32px;
            background: #f8fffa;
            border-top: 1px solid #dcfce7;
        }

        .card-footer p {
            color: #86a68f;
            font-size: 12px;
        }

        /* =========================
           INFORMATION NOTE
        ========================= */

        .note {
            margin-top: 18px;
            padding: 14px 17px;
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            color: #166534;
            font-size: 12px;
        }

        .note strong {
            display: block;
            margin-bottom: 3px;
            color: #14532d;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .container {
                margin: 35px auto;
                padding: 15px;
            }

            .card-header {
                padding: 25px;
            }

            .form-body {
                padding: 25px;
            }

            .card-footer {
                padding: 16px 25px;
            }
        }

        @media (max-width: 650px) {

            .container {
                margin: 28px auto;
                padding: 15px;
            }

            .page-header h1 {
                font-size: 26px;
            }

            .card-header {
                padding: 23px;
            }

            .form-body {
                padding: 23px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .buttons {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            button,
            .cancel {
                width: 100%;
            }

            .card-footer {
                padding: 16px 23px;
            }
        }

        @media (max-width: 400px) {

            .page-header h1 {
                font-size: 23px;
            }

            .card-header {
                padding: 20px;
            }

            .form-body {
                padding: 20px;
            }

            .card-footer {
                padding: 15px 20px;
            }
        }

    </style>

</head>

<body>

    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="container">

        <!-- PAGE HEADER -->

        <div class="page-header">

            <h1>
                Add Product
            </h1>

            <p>
                Add a new product to your inventory and manage its information.
            </p>

        </div>


        <!-- FORM CARD -->

        <section class="card">

            <div class="card-header">

                <h2>
                    Product Information
                </h2>

                <p>
                    Enter the details of the product you want to add.
                </p>

            </div>


            <div class="form-body">

                <form
                    action="<?= site_url('products/store'); ?>"
                    method="POST"
                >

                    <!-- PRODUCT NAME -->

                    <div class="form-group">

                        <label for="product_name">

                            Product Name
                            <span class="required">*</span>

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

                                Price
                                <span class="required">*</span>

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

                                Quantity
                                <span class="required">*</span>

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

                        <a
                            href="<?= site_url('products'); ?>"
                            class="cancel"
                        >
                            ← Cancel
                        </a>

                        <button type="submit">
                            ✓ Add Product
                        </button>

                    </div>

                </form>

            </div>


            <!-- CARD FOOTER -->

            <div class="card-footer">

                <p>
                    Fields marked with * are required.
                </p>

            </div>

        </section>


        <!-- INFORMATION NOTE -->

        <div class="note">

            <strong>
                Product Management
            </strong>

            Make sure the product name, price, and quantity are correct before saving.

        </div>

    </main>

</body>

</html>

