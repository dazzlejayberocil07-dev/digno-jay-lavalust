```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products | Product Management</title>

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
            font-size: 16px;
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

        .add-button {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .add-button:hover {
            background: #1d4ed8;
        }

        /* =========================
           CARD
        ========================= */

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .record-count {
            padding: 7px 12px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            background: #f9fafb;
            color: #6b7280;
            text-align: left;
            padding: 14px 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 15px 20px;
            font-size: 13px;
            color: #374151;
            border-bottom: 1px solid #f1f5f9;
        }

        tbody tr {
            transition: 0.15s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* =========================
           TABLE DATA
        ========================= */

        .product-id {
            color: #2563eb;
            font-weight: 700;
        }

        .product-name {
            color: #111827;
            font-weight: 600;
        }

        .description {
            color: #6b7280;
            max-width: 260px;
        }

        .price {
            color: #111827;
            font-weight: 600;
        }

        .quantity {
            display: inline-block;
            padding: 5px 9px;
            background: #f3f4f6;
            color: #374151;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .created {
            color: #6b7280;
            font-size: 12px;
        }

        /* =========================
           ACTION BUTTONS
        ========================= */

        .actions {
            display: flex;
            gap: 7px;
        }

        .edit,
        .delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 11px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .edit {
            background: #f59e0b;
            color: white;
        }

        .edit:hover {
            background: #d97706;
        }

        .delete {
            background: #dc2626;
            color: white;
        }

        .delete:hover {
            background: #b91c1c;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #6b7280;
        }

        .empty-icon {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .empty p {
            font-size: 13px;
        }

        /* =========================
           CARD FOOTER
        ========================= */

        .card-footer {
            padding: 18px 24px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-footer p {
            font-size: 12px;
            color: #9ca3af;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 13px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .back-btn:hover {
            background: #1d4ed8;
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

            .page-title h1 {
                font-size: 22px;
            }
        }

        @media (max-width: 500px) {

            .main {
                padding: 15px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .add-button {
                width: 100%;
                justify-content: center;
            }

            .card-header {
                align-items: flex-start;
                gap: 10px;
            }

            .card-footer {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }

            .back-btn {
                width: 100%;
                justify-content: center;
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

            <div class="logo-icon">
                PS
            </div>

            <div class="logo-text">
                <h2>Product System</h2>
                <span>LavaLust System</span>
            </div>

        </div>


        <div class="menu-title">
            Main
        </div>


        <nav class="menu">

            <a href="<?= site_url('products'); ?>" class="active">

                <span class="menu-icon">
                    📦
                </span>

                <span>
                    Products
                </span>

            </a>


            <a href="<?= site_url('products/create'); ?>">

                <span class="menu-icon">
                    ➕
                </span>

                <span>
                    Add Product
                </span>

            </a>

        </nav>


        <div class="menu-title">
            System
        </div>


        <nav class="menu">

            <a href="#">

                <span class="menu-icon">
                    👤
                </span>

                <span>
                    Users
                </span>

            </a>


            <a href="#">

                <span class="menu-icon">
                    ⚙️
                </span>

                <span>
                    Settings
                </span>

            </a>


            <a href="#">

                <span class="menu-icon">
                    🚪
                </span>

                <span>
                    Logout
                </span>

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

                <h1>Products</h1>

                <p>
                    Manage your products, inventory, prices and quantities.
                </p>

            </div>


            <a
                href="<?= site_url('products/create'); ?>"
                class="add-button">

                + Add Product

            </a>

        </div>


        <!-- PRODUCT CARD -->

        <section class="card">

            <div class="card-header">

                <div class="card-title">

                    <h2>
                        Product Management
                    </h2>

                    <p>
                        View and manage all products stored in the system.
                    </p>

                </div>


                <div class="record-count">

                    <?= count($products); ?> Records

                </div>

            </div>


            <!-- TABLE -->

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Product Name</th>

                            <th>Description</th>

                            <th>Price</th>

                            <th>Quantity</th>

                            <th>Created</th>

                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php if (!empty($products)): ?>

                        <?php foreach ($products as $product): ?>

                            <tr>

                                <td class="product-id">

                                    #<?= htmlspecialchars($product['id']) ?>

                                </td>


                                <td class="product-name">

                                    <?= htmlspecialchars($product['product_name']) ?>

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
                                            class="edit">

                                            Edit

                                        </a>


                                        <a
                                            href="<?= site_url('products/delete/' . $product['id']); ?>"
                                            class="delete"
                                            onclick="return confirm('Are you sure you want to delete this product?');">

                                            Delete

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

                                    <p>
                                        No products found.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>


            <!-- FOOTER -->

            <div class="card-footer">

                <p>
                    Product records are retrieved dynamically from the MySQL database.
                </p>

                <a
                    href="<?= site_url('products/create'); ?>"
                    class="back-btn">

                    + Add Product

                </a>

            </div>

        </section>

    </main>

</div>

</body>

</html>
```
