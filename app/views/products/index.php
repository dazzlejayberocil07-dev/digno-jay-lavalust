
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products | Student Portal</title>

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
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
        }

        /* =========================
           MESSAGE
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
           PAGE HEADER
        ========================= */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            color: #14532d;
            font-size: 30px;
            margin-bottom: 6px;
        }

        .page-header p {
            color: #64748b;
            font-size: 14px;
        }

        .add-btn {
            background: #16a34a;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .add-btn:hover {
            background: #15803d;
        }

        /* =========================
           STATISTICS
        ========================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border: 1px solid #dcfce7;
            border-radius: 14px;
            padding: 18px;
            box-shadow: 0 5px 20px rgba(20, 83, 45, .05);
        }

        .stat-label {
            color: #64748b;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .stat-value {
            color: #14532d;
            font-size: 24px;
            font-weight: bold;
        }

        /* =========================
           PRODUCT CARD
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h2 {
            color: #14532d;
            font-size: 20px;
            margin-bottom: 5px;
        }

        .card-header p {
            color: #64748b;
            font-size: 14px;
        }

        .record-badge {
            background: #ecfdf5;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        /* =========================
           TABLE
        ========================= */

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        thead {
            background: #f8fffa;
        }

        th {
            padding: 14px 18px;
            text-align: left;
            color: #14532d;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 1px solid #dcfce7;
        }

        td {
            padding: 15px 18px;
            border-bottom: 1px solid #f0fdf4;
            font-size: 13px;
            color: #374151;
            vertical-align: middle;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #f8fffa;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* =========================
           PRODUCT
        ========================= */

        .id {
            color: #16a34a;
            font-weight: bold;
        }

        .product {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .product-image {
            width: 38px;
            height: 38px;
            border-radius: 9px;
            background: #ecfdf5;
            color: #16a34a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .product-name {
            color: #14532d;
            font-weight: bold;
        }

        .description {
            max-width: 250px;
            color: #64748b;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .price {
            color: #14532d;
            font-weight: bold;
        }

        .quantity {
            display: inline-flex;
            padding: 6px 10px;
            border-radius: 7px;
            background: #ecfdf5;
            color: #166534;
            font-size: 12px;
            font-weight: bold;
        }

        .created {
            color: #6b7280;
            font-size: 12px;
        }

        /* =========================
           ACTIONS
        ========================= */

        .actions {
            display: flex;
            gap: 6px;
        }

        .action {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            transition: 0.2s;
        }

        .edit {
            background: #ecfdf5;
            color: #16a34a;
        }

        .edit:hover {
            background: #dcfce7;
        }

        .delete {
            background: #fef2f2;
            color: #dc2626;
        }

        .delete:hover {
            background: #fee2e2;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty {
            padding: 60px 20px;
            text-align: center;
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
            font-size: 16px;
            color: #14532d;
        }

        .empty p {
            margin-top: 5px;
            font-size: 13px;
            color: #6b7280;
        }

        /* =========================
           CARD FOOTER
        ========================= */

        .card-footer {
            padding: 18px 30px;
            background: #f8fffa;
            border-top: 1px solid #dcfce7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-footer p {
            color: #6b7280;
            font-size: 12px;
        }

        .footer-add {
            color: #16a34a;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
        }

        .footer-add:hover {
            text-decoration: underline;
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
           RESPONSIVE
        ========================= */

        @media (max-width: 850px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .page-header {
                align-items: flex-start;
                gap: 15px;
            }
        }

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

            .page-header {
                flex-direction: column;
            }

            .page-header h1 {
                font-size: 26px;
            }

            .add-btn {
                width: 100%;
                text-align: center;
            }

            .stats {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .stat-card {
                padding: 15px;
            }

            .card-header {
                padding: 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .card-footer {
                padding: 18px 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
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

            <div>

                <h1>Products</h1>

                <p>
                    Manage your products and monitor inventory.
                </p>

            </div>

            <a
                href="<?= site_url('products/create'); ?>"
                class="add-btn">

                + Add Product

            </a>

        </div>


        <!-- STATISTICS -->

        <section class="stats">

            <div class="stat-card">

                <div class="stat-label">
                    Total Products
                </div>

                <div class="stat-value">
                    <?= count($products); ?>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Total Stock
                </div>

                <div class="stat-value">

                    <?php
                    $totalQuantity = 0;

                    foreach ($products as $product) {
                        $totalQuantity += (int) $product['quantity'];
                    }

                    echo $totalQuantity;
                    ?>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Available Items
                </div>

                <div class="stat-value">

                    <?php
                    $available = 0;

                    foreach ($products as $product) {
                        if ((int) $product['quantity'] > 0) {
                            $available++;
                        }
                    }

                    echo $available;
                    ?>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Out of Stock
                </div>

                <div class="stat-value">

                    <?php
                    $outOfStock = 0;

                    foreach ($products as $product) {
                        if ((int) $product['quantity'] <= 0) {
                            $outOfStock++;
                        }
                    }

                    echo $outOfStock;
                    ?>

                </div>

            </div>

        </section>


        <!-- PRODUCT CARD -->

        <section class="card">

            <div class="card-header">

                <div>

                    <h2>Product List</h2>

                    <p>
                        All products currently stored in the system.
                    </p>

                </div>

                <div class="record-badge">
                    <?= count($products); ?> Records
                </div>

            </div>


            <!-- TABLE -->

            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>

                    </thead>


                    <tbody>

                    <?php if (!empty($products)): ?>

                        <?php foreach ($products as $product): ?>

                            <tr>

                                <td class="id">
                                    #<?= htmlspecialchars($product['id']) ?>
                                </td>


                                <td>

                                    <div class="product">

                                        <div class="product-image">
                                            📦
                                        </div>

                                        <div class="product-name">
                                            <?= htmlspecialchars($product['product_name']) ?>
                                        </div>

                                    </div>

                                </td>


                                <td class="description">
                                    <?= htmlspecialchars($product['description']) ?>
                                </td>


                                <td class="price">
                                    ₱<?= htmlspecialchars($product['price']) ?>
                                </td>


                                <td>

                                    <span class="quantity">
                                        <?= htmlspecialchars($product['quantity']) ?>
                                    </span>

                                </td>


                                <td class="created">
                                    <?= htmlspecialchars($product['created_at']) ?>
                                </td>


                                <td>

                                    <div class="actions">

                                        <a
                                            href="<?= site_url('products/edit/' . $product['id']); ?>"
                                            class="action edit"
                                            title="Edit">

                                            ✎

                                        </a>


                                        <a
                                            href="<?= site_url('products/delete/' . $product['id']); ?>"
                                            class="action delete"
                                            title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this product?');">

                                            🗑

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="7">

                                <div class="empty">

                                    <div class="empty-icon">
                                        📦
                                    </div>

                                    <h3>No Products Found</h3>

                                    <p>
                                        Start by adding your first product.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>


            <!-- CARD FOOTER -->

            <div class="card-footer">

                <p>
                    Product information is retrieved dynamically from the database.
                </p>

                <a
                    href="<?= site_url('products/create'); ?>"
                    class="footer-add">

                    + Add another product

                </a>

            </div>

        </section>


        <!-- FOOTER -->

        <div class="footer">

            Student Information System &copy; <?= date('Y'); ?>

        </div>

    </main>

</body>

</html>

