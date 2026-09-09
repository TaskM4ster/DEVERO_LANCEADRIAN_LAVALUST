<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KALAKAL 1521 | Trade Goods</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Georgia, "Times New Roman", serif;
        }

        body {
            min-height: 100vh;
            color: #3f2d20;
            background: #efe2c6;
        }

        header {
            padding: 22px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #4a2c1b;
            color: #fff8e7;
        }

        .brand h1 {
            font-size: 25px;
            letter-spacing: 2px;
        }

        .brand p {
            margin-top: 4px;
            color: #e6c98f;
            font-size: 14px;
        }

        .logout {
            padding: 10px 16px;
            color: white;
            text-decoration: none;
            border: 1px solid #d9b46d;
            border-radius: 7px;
        }

        .logout:hover {
            background: #6b4027;
        }

        main {
            width: min(1150px, 92%);
            margin: 35px auto;
        }

        .welcome {
            margin-bottom: 25px;
        }

        .welcome h2 {
            margin-bottom: 7px;
            font-size: 30px;
        }

        .welcome p {
            color: #705843;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(2, minmax(180px, 260px));
            gap: 15px;
            margin-bottom: 25px;
        }

        .summary-card {
            padding: 18px;
            background: #fffaf0;
            border-left: 5px solid #a45c2a;
            border-radius: 9px;
            box-shadow: 0 5px 14px rgba(64, 42, 25, 0.09);
        }

        .summary-card span {
            display: block;
            color: #80664e;
            font-size: 14px;
        }

        .summary-card strong {
            display: block;
            margin-top: 6px;
            font-size: 27px;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .toolbar h3 {
            font-size: 22px;
        }

        .add-button {
            padding: 12px 18px;
            color: white;
            background: #8b4513;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
        }

        .add-button:hover {
            background: #a55b25;
        }

        .message {
            padding: 14px;
            margin-bottom: 18px;
            color: #315b2c;
            background: #dcebd5;
            border-radius: 7px;
        }

        .table-container {
            overflow-x: auto;
            background: #fffaf0;
            border-radius: 12px;
            box-shadow: 0 8px 22px rgba(64, 42, 25, 0.12);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 15px;
            color: white;
            background: #6a3d25;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ead9ba;
            vertical-align: top;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #fff4dc;
        }

        .product-name {
            color: #603718;
            font-weight: bold;
        }

        .stock {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .stock-good {
            color: #315b2c;
            background: #dcebd5;
        }

        .stock-low {
            color: #805b00;
            background: #fff0bf;
        }

        .stock-empty {
            color: #8c2f25;
            background: #f7d4cf;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .edit-button,
        .delete-button {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }

        .edit-button {
            color: #382412;
            background: #d8a34c;
        }

        .delete-button {
            color: white;
            background: #8d3028;
        }

        .edit-button:hover {
            background: #e3b65f;
        }

        .delete-button:hover {
            background: #a43b31;
        }

        .empty {
            padding: 50px 20px;
            color: #725d48;
            text-align: center;
        }

        .empty h3 {
            margin-bottom: 8px;
        }

        /* Delete confirmation modal */

        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 1000;
            display: none;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: rgba(40, 25, 15, 0.72);
            backdrop-filter: blur(3px);
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-card {
            width: min(440px, 100%);
            padding: 30px;
            background: #fffaf0;
            border-top: 7px solid #8d3028;
            border-radius: 14px;
            text-align: center;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.32);
            animation: modalAppear 0.2s ease;
        }

        @keyframes modalAppear {
            from {
                opacity: 0;
                transform: translateY(15px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-icon {
            width: 65px;
            height: 65px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 18px;
            color: #8d3028;
            background: #f7d4cf;
            border-radius: 50%;
            font-size: 30px;
            font-weight: bold;
        }

        .modal-card h3 {
            margin-bottom: 10px;
            color: #4a2c1b;
            font-size: 24px;
        }

        .modal-card p {
            color: #705843;
            line-height: 1.6;
        }

        .modal-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 25px;
        }

        .cancel-delete,
        .confirm-delete {
            padding: 11px 17px;
            border: none;
            border-radius: 7px;
            font-weight: bold;
            cursor: pointer;
        }

        .cancel-delete {
            color: #4a2c1b;
            background: #e4d2af;
        }

        .confirm-delete {
            color: white;
            background: #8d3028;
        }

        .cancel-delete:hover {
            background: #d7c197;
        }

        .confirm-delete:hover {
            background: #a43b31;
        }

        @media (max-width: 650px) {
            header,
            .toolbar {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .summary {
                grid-template-columns: 1fr;
            }

            .modal-actions {
                flex-direction: column-reverse;
            }

            .modal-actions form,
            .cancel-delete,
            .confirm-delete {
                width: 100%;
            }
        }
    </style>
</head>

<body>
<?php
    $products = $products ?? [];
    $totalStock = 0;

    foreach ($products as $item) {
        $totalStock += (int) $item['quantity'];
    }
?>

<header>
    <div class="brand">
        <h1>KALAKAL 1521</h1>
        <p>Trade goods management before barcodes existed.</p>
    </div>

    <a class="logout" href="<?= site_url('logout') ?>">
        Leave the Port
    </a>
</header>

<main>
    <section class="welcome">
        <h2>Trade Goods Manifest</h2>

        <p>
            Welcome aboard,
            <?= htmlspecialchars(
                $_SESSION['username'] ?? 'Merchant',
                ENT_QUOTES,
                'UTF-8'
            ) ?>.
            Mind the cargo—and the rough seas.
        </p>
    </section>

    <?php if (!empty($success)): ?>
        <div class="message">
            <?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <section class="summary">
        <div class="summary-card">
            <span>Types of Trade Goods</span>
            <strong><?= count($products) ?></strong>
        </div>

        <div class="summary-card">
            <span>Total Items in the Cargo Hold</span>
            <strong><?= $totalStock ?></strong>
        </div>
    </section>

    <div class="toolbar">
        <h3>Current Cargo</h3>

        <a
            class="add-button"
            href="<?= site_url('products/create') ?>"
        >
            + Add Trade Goods
        </a>
    </div>

    <div class="table-container">
        <?php if (empty($products)): ?>
            <div class="empty">
                <h3>The cargo hold is empty.</h3>
                <p>Add trade goods before the next voyage begins.</p>
            </div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Trade Good</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td>
                                <?= (int) $product['id'] ?>
                            </td>

                            <td class="product-name">
                                <?= htmlspecialchars(
                                    $product['product_name'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $product['description']
                                        ?: 'No description',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>
                            </td>

                            <td>
                                <?= number_format(
                                    (float) $product['price'],
                                    2
                                ) ?>
                                coins
                            </td>

                            <td>
                                <?php if ((int) $product['quantity'] === 0): ?>
                                    <span class="stock stock-empty">
                                        Lost at Sea (0)
                                    </span>

                                <?php elseif ((int) $product['quantity'] <= 5): ?>
                                    <span class="stock stock-low">
                                        Running Low
                                        (<?= (int) $product['quantity'] ?>)
                                    </span>

                                <?php else: ?>
                                    <span class="stock stock-good">
                                        In the Hold
                                        (<?= (int) $product['quantity'] ?>)
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?= date(
                                    'M d, Y',
                                    strtotime($product['created_at'])
                                ) ?>
                            </td>

                            <td>
                                <div class="actions">
                                    <a
                                        class="edit-button"
                                        href="<?= site_url(
                                            'products/edit/' .
                                            $product['id']
                                        ) ?>"
                                    >
                                        Edit
                                    </a>

                                    <button
                                        type="button"
                                        class="delete-button"
                                        data-url="<?= htmlspecialchars(
                                            site_url(
                                                'products/delete/' .
                                                $product['id']
                                            ),
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>"
                                        data-name="<?= htmlspecialchars(
                                            $product['product_name'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>"
                                        onclick="openDeleteModal(this)"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</main>

<div
    class="modal-overlay"
    id="deleteModal"
    aria-hidden="true"
>
    <div
        class="modal-card"
        role="dialog"
        aria-modal="true"
        aria-labelledby="deleteTitle"
    >
        <div class="modal-icon">!</div>

        <h3 id="deleteTitle">Throw Cargo Overboard?</h3>

        <p id="deleteMessage">
            Are you sure you want to move this product to the
            lost-at-sea records?
        </p>

        <div class="modal-actions">
            <button
                type="button"
                class="cancel-delete"
                onclick="closeDeleteModal()"
            >
                Keep the Cargo
            </button>

            <form id="deleteForm" method="post">
                <button type="submit" class="confirm-delete">
                    Move to Lost-at-Sea
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');
    const deleteMessage = document.getElementById('deleteMessage');

    function openDeleteModal(button) {
        const productName = button.dataset.name;
        const deleteUrl = button.dataset.url;

        deleteForm.action = deleteUrl;

        deleteMessage.textContent =
            'Are you sure you want to move "' +
            productName +
            '" to the lost-at-sea records?';

        deleteModal.classList.add('show');
        deleteModal.setAttribute('aria-hidden', 'false');

        document.body.style.overflow = 'hidden';
    }

    function closeDeleteModal() {
        deleteModal.classList.remove('show');
        deleteModal.setAttribute('aria-hidden', 'true');

        document.body.style.overflow = '';
    }

    deleteModal.addEventListener('click', function (event) {
        if (event.target === deleteModal) {
            closeDeleteModal();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeDeleteModal();
        }
    });
</script>
</body>
</html>