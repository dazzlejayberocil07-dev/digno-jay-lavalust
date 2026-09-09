```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products | LavaLust System</title>

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
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #111827;
            padding: 24px 16px;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 10px 28px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            background: #2563eb;
            color: white;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 800;
            box-shadow: 0 5px 15px rgba(37, 99, 235, .25);
        }

        .brand-text h2 {
            color: white;
            font-size: 15px;
            font-weight: 700;
        }

        .brand-text p {
            color: #6b7280;
            font-size: 10px;
            margin-top: 2px;
        }

        .section-title {
            color: #6b7280;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 12px;
            margin: 18px 0 8px;
        }

        .nav {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .nav a {
            height: 44px;
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 0 13px;
            color: #9ca3af;
            text-decoration: none;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 500;
            transition: .2s ease;
        }

        .nav a:hover {
            background: #1f2937;
            color: white;
        }

        .nav a.active {
            background: #2563eb;
            color: white;
            box-shadow: 0 5px 15px rgba(37, 99, 235, .2);
        }

        .nav-icon {
            width: 22px;
            text-align: center;
            font-size: 16px;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;
            padding: 28px 34px;
        }

        /* =========================
           HEADER
        ========================= */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header-left h1 {
            font-size: 24px;
            color: #111827;
            font-weight: 750;
        }

        .header-left p {
            margin-top: 4px;
            color: #6b7280;
            font-size: 13px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 7px 12px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 9px;
        }

        .user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
        }

        .user-info strong {
            display: block;
            font-size: 11px;
            color: #111827;
        }

        .user-info span {
            display: block;
            font-size: 9px;
            color: #9ca3af;
        }

        .add-btn {
            height: 40px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 0 15px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 650;
            transition: .2s ease;
        }

        .add-btn:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        /* =========================
           STATISTICS
        ========================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 22px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 17px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .025);
        }

        .stat-label {
            color: #6b7280;
            font-size: 11px;
            font-weight: 600;
        }

        .stat-value {
            color: #111827;
            font-size: 21px;
            font-weight: 750;
            margin-top: 4px;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            border-radius: 9px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        /* =========================
           PRODUCT PANEL
        ========================= */

        .panel {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .035);
            overflow: hidden;
        }

        .panel-header {
            padding: 20px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }

        .panel-title h2 {
            font-size: 16px;
            color: #111827;
        }

        .panel-title p {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 4px;
        }

        .record-badge {
            padding: 6px 10px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
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
            min-width: 900px;
            border-collapse: collapse;
        }

        thead {
            background: #f9fafb;
        }

        th {
            padding: 12px 18px;
            text-align: left;
            color: #6b7280;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 14px 18px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 12px;
            color: #374151;
            vertical-align: middle;
        }

        tbody tr {
            transition: .15s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .id {
            color: #2563eb;
            font-weight: 700;
        }

        .product {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .product-image {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .product-name {
            color: #111827;
            font-weight: 650;
        }

        .description {
            max-width: 250px;
            color: #6b7280;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .price {
            color: #111827;
            font-weight: 700;
        }

        .quantity {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 6px;
            background: #f3f4f6;
            color: #374151;
            font-size: 11px;
            font-weight: 700;
        }

        .created {
            color: #9ca3af;
            font-size: 11px;
        }

        /* =========================
           ACTIONS
        ========================= */

        .actions {
            display: flex;
            gap: 5px;
        }

        .action {
            width: 31px;
            height: 31px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            text-decoration: none;
            font-size: 12px;
            transition: .2s ease;
        }

        .edit {
            background: #fff7ed;
            color: #ea580c;
        }

        .edit:hover {
            background: #ffedd5;
        }

        .delete {
            background: #fef2f2;
            color: #dc2626;
        }

        .delete:hover {
            background: #fee2e2;
        }

        /* =========================
           EMPTY
        ========================= */

        .empty {
            padding: 65px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 55px;
            height: 55px;
            margin: 0 auto 12px;
            border-radius: 12px;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .empty h3 {
            font-size: 14px;
            color: #111827;
        }

        .empty p {
            margin-top: 4px;
            font-size: 11px;
            color: #9ca3af;
        }

        /* =========================
           FOOTER
        ========================= */

        .panel-footer {
            padding: 15px 22px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .panel-footer p {
            color: #9ca3af;
            font-size: 10px;
        }

        .footer-add {
            color: #2563eb;
            text-decoration: none;
            font-size: 11px;
            font-weight: 650;
        }

        .footer-add:hover {
            text-decoration: underline;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .user-box {
                display: none;
            }
        }

        @media (max-width: 800px) {

            .sidebar {
                width: 70px;
                padding: 20px 9px;
            }

            .brand {
                justify-content: center;
                padding: 5px 0 25px;
            }

            .brand-text,
            .section-title,
            .nav a span:not(.nav-icon) {
                display: none;
            }

            .nav a {
                justify-content: center;
                padding: 0;
            }

            .main {
                margin-left: 70px;
                padding: 22px;
            }
        }

        @media (max-width: 600px) {

            .main {
                padding: 15px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .header-right {
                width: 100%;
            }

            .add-btn {
                width: 100%;
                justify-content: center;
            }

            .stats {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .stat-card {
                padding: 13px;
            }

            .stat-value {
                font-size: 18px;
            }

            .panel-header {
                align-items: flex-start;
                gap: 10px;
            }

            .panel-footer {
                align-items: flex-start;
                gap: 8px;
                flex-direction: column;
            }
        }
    </style>

</head>

<body>

<!-- =========================
     SIDEBAR
========================= -->

<aside class="sidebar">

    <div class="brand">

        <div class="brand-icon">
            PS
        </div>

        <div class="brand-text">
            <h2>Product System</h2>
            <p>LavaLust System</p>
        </div>

    </div>


    <div class="section-title">
        Main
    </div>

    <nav class="nav">

        <a href="<?= site_url('products'); ?>" class="active">
            <span class="nav-icon">📦</span>
            <span>Products</span>
        </a>

        <a href="<?= site_url('products/create'); ?>">
            <span class="nav-icon">＋</span>
            <span>Add Product</span>
        </a>

    </nav>


    <div class="section-title">
        System
    </div>

    <nav class="nav">

        <a href="#">
            <span class="nav-icon">👤</span>
            <span>Users</span>
        </a>

        <a href="#">
            <span class="nav-icon">⚙</span>
            <span>Settings</span>
        </a>

        <a href="#">
            <span class="nav-icon">↪</span>
            <span>Logout</span>
        </a>

    </nav>

</aside>


<!-- =========================
     MAIN
========================= -->

<main class="main">

    <!-- HEADER -->

    <header class="header">

        <div class="header-left">

            <h1>Products</h1>

            <p>
                Manage your products and monitor inventory.
            </p>

        </div>


        <div class="header-right">

            <div class="user-box">

                <div class="user-avatar">
                    U
                </div>

                <div class="user-info">
                    <strong>Administrator</strong>
                    <span>Product Manager</span>
                </div>

            </div>


            <a
                href="<?= site_url('products/create'); ?>"
                class="add-btn">

                ＋ Add Product

            </a>

        </div>

    </header>


    <!-- STATISTICS -->

    <section class="stats">

        <div class="stat-card">

            <div>
                <div class="stat-label">
                    Total Products
                </div>

                <div class="stat-value">
                    <?= count($products); ?>
                </div>
            </div>

            <div class="stat-icon">
                📦
            </div>

        </div>


        <div class="stat-card">

            <div>
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

            <div class="stat-icon">
                📊
            </div>

        </div>


        <div class="stat-card">

            <div>
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

            <div class="stat-icon">
                ✓
            </div>

        </div>


        <div class="stat-card">

            <div>
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

            <div class="stat-icon">
                ⚠
            </div>

        </div>

    </section>


    <!-- PRODUCT PANEL -->

    <section class="panel">

        <div class="panel-header">

            <div class="panel-title">

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


        <!-- FOOTER -->

        <div class="panel-footer">

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

</main>

</body>

</html>
```
