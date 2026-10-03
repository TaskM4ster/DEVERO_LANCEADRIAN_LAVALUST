<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KALAKAL 1521 | Trade Goods</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IM+Fell+English:ital@0;1&family=Crimson+Pro:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>
        :root {
            --ink: #2b1c11;
            --ink-soft: #5c4530;
            --text-accent: #5c3d22;

            --parchment: #f1e3c3;
            --parchment-deep: #e6d3a4;
            --card: #fbf4de;

            --navy: #1c2c3d;
            --navy-deep: #101c28;

            --brass: #b6852c;
            --brass-light: #dcae57;
            --rope: #8a6a41;

            --seal: #8c2b23;
            --seal-deep: #6d211a;

            --good-bg: #dcebd5;
            --good-ink: #315b2c;
            --low-bg: #fff0bf;
            --low-ink: #805b00;
            --empty-bg: #f7d4cf;
            --empty-ink: #8c2f25;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            color: var(--ink);
            background: var(--parchment);
            font-family: 'Crimson Pro', Georgia, "Times New Roman", serif;
            font-size: 16px;
            line-height: 1.5;
        }

        button, input {
            font-family: inherit;
        }

        ::selection {
            background: var(--brass-light);
            color: var(--navy-deep);
        }

        a:focus-visible,
        button:focus-visible {
            outline: 2px solid var(--brass);
            outline-offset: 2px;
        }

        /* Header */

        header {
            position: relative;
            overflow: hidden;
            padding: 24px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            background: linear-gradient(160deg, var(--navy) 0%, var(--navy-deep) 100%);
            color: #f2e6c8;
            border-bottom: 3px solid var(--brass);
        }

        .header-compass {
            position: absolute;
            top: 50%;
            right: -50px;
            width: 240px;
            height: 240px;
            transform: translateY(-50%);
            color: var(--brass-light);
            opacity: 0.1;
            pointer-events: none;
        }

        .brand {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-mark {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            color: var(--brass-light);
        }

        .brand h1 {
            font-family: 'IM Fell English', Georgia, serif;
            font-weight: 400;
            font-size: 27px;
            letter-spacing: 1.5px;
        }

        .brand p {
            margin-top: 4px;
            color: #d7bd85;
            font-size: 14px;
            font-style: italic;
        }

        .logout {
            position: relative;
            z-index: 1;
            padding: 10px 18px;
            color: #f2e6c8;
            text-decoration: none;
            border: 1px solid var(--brass);
            border-radius: 4px;
            font-size: 14px;
            white-space: nowrap;
            transition: background-color .15s ease, color .15s ease;
        }

        .logout:hover,
        .logout:focus-visible {
            background: var(--brass);
            color: var(--navy-deep);
        }

        /* Main */

        main {
            width: min(1150px, 92%);
            margin: 40px auto 60px;
        }

        .welcome {
            margin-bottom: 30px;
            animation: rise-in .5s ease both;
        }

        @keyframes rise-in {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .welcome h2 {
            font-family: 'IM Fell English', Georgia, serif;
            font-weight: 400;
            font-size: 33px;
            color: var(--navy);
            margin-bottom: 10px;
        }

        .welcome-rule {
            width: 130px;
            height: 8px;
            margin-bottom: 14px;
            opacity: .55;
            background-image: repeating-linear-gradient(
                -35deg,
                var(--rope) 0px,
                var(--rope) 2px,
                transparent 2px,
                transparent 5px
            );
        }

        .welcome p {
            color: var(--ink-soft);
            font-size: 16px;
            max-width: 60ch;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(2, minmax(200px, 300px));
            gap: 16px;
            margin-bottom: 30px;
        }

        .summary-card {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px;
            background: var(--card);
            border: 1px solid var(--parchment-deep);
            border-left: 4px solid var(--brass);
            border-radius: 3px;
            box-shadow: 0 6px 16px rgba(43, 28, 17, .08);
        }

        .summary-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            border-radius: 50%;
            background: var(--parchment);
            color: var(--rope);
        }

        .summary-icon svg {
            width: 24px;
            height: 24px;
        }

        .summary-card span {
            display: block;
            color: var(--ink-soft);
            font-size: 13.5px;
        }

        .summary-card strong {
            display: block;
            margin-top: 3px;
            font-family: 'IM Fell English', Georgia, serif;
            font-weight: 400;
            font-size: 29px;
            color: var(--navy);
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            margin-bottom: 20px;
        }

        .toolbar h3 {
            font-family: 'IM Fell English', Georgia, serif;
            font-weight: 400;
            font-size: 23px;
            color: var(--navy);
        }

        .add-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            color: #2b1c11;
            background: linear-gradient(180deg, var(--brass-light), var(--brass));
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            white-space: nowrap;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .35), 0 3px 8px rgba(43, 28, 17, .22);
            transition: transform .15s ease, box-shadow .15s ease;
        }

        .add-button:hover,
        .add-button:focus-visible {
            transform: translateY(-1px);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .35), 0 5px 12px rgba(43, 28, 17, .3);
        }

        .add-button:active {
            transform: translateY(0);
        }

        .message {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 16px;
            margin-bottom: 20px;
            color: var(--good-ink);
            background: var(--good-bg);
            border-left: 4px solid var(--good-ink);
            border-radius: 3px;
            font-size: 14.5px;
        }

        .message svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        /* Ledger table */

        .table-container {
            overflow-x: auto;
            background: var(--card);
            border: 1px solid var(--parchment-deep);
            border-radius: 6px;
            box-shadow: 0 10px 26px rgba(43, 28, 17, .12);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 14px 16px;
            color: #f2e6c8;
            background: var(--navy);
            text-align: left;
            font-weight: 600;
            font-size: 14.5px;
            letter-spacing: .3px;
        }

        td {
            padding: 15px 16px;
            border-bottom: 1px solid var(--parchment-deep);
            vertical-align: top;
            font-size: 15px;
        }

        tbody tr {
            transition: background-color .12s ease;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover td {
            background: var(--parchment);
        }

        .product-name {
            color: var(--text-accent);
            font-weight: 700;
        }

        .stock {
            display: inline-block;
            padding: 5px 12px;
            border: 1.5px solid currentColor;
            border-radius: 40% 45% 40% 45% / 55% 45% 55% 45%;
            font-size: 13px;
            font-weight: 600;
            transform: rotate(-2deg);
        }

        .stock-good {
            color: var(--good-ink);
            background: var(--good-bg);
        }

        .stock-low {
            color: var(--low-ink);
            background: var(--low-bg);
        }

        .stock-empty {
            color: var(--empty-ink);
            background: var(--empty-bg);
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .edit-button,
        .delete-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 13px;
            border: none;
            border-radius: 4px;
            font-size: 13.5px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: background-color .15s ease, transform .1s ease;
        }

        .edit-button {
            color: var(--navy);
            background: var(--parchment-deep);
            border: 1px solid var(--rope);
        }

        .edit-button:hover,
        .edit-button:focus-visible {
            background: var(--brass-light);
        }

        .delete-button {
            color: #f6e9e2;
            background: var(--seal);
        }

        .delete-button:hover,
        .delete-button:focus-visible {
            background: var(--seal-deep);
        }

        .edit-button:active,
        .delete-button:active {
            transform: scale(.97);
        }

        .empty {
            padding: 60px 20px;
            color: var(--ink-soft);
            text-align: center;
        }

        .empty svg {
            width: 50px;
            height: 50px;
            margin-bottom: 14px;
            color: var(--rope);
            opacity: .75;
        }

        .empty h3 {
            font-family: 'IM Fell English', Georgia, serif;
            font-weight: 400;
            font-size: 21px;
            color: var(--navy);
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
            background: rgba(16, 28, 40, .78);
            backdrop-filter: blur(3px);
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-card {
            width: min(440px, 100%);
            padding: 32px;
            background: var(--card);
            border-top: 6px solid var(--seal);
            border-radius: 6px;
            text-align: center;
            box-shadow: 0 24px 60px rgba(0, 0, 0, .35);
            animation: modal-appear .18s ease;
        }

        @keyframes modal-appear {
            from { opacity: 0; transform: translateY(12px) scale(.97); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .modal-icon {
            width: 58px;
            height: 58px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 16px;
            color: var(--seal);
            background: var(--empty-bg);
            border-radius: 50%;
        }

        .modal-icon svg {
            width: 28px;
            height: 28px;
        }

        .modal-card h3 {
            font-family: 'IM Fell English', Georgia, serif;
            font-weight: 400;
            margin-bottom: 10px;
            color: var(--navy);
            font-size: 22px;
        }

        .modal-card p {
            color: var(--ink-soft);
            line-height: 1.6;
            font-size: 15px;
        }

        .modal-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 24px;
        }

        .cancel-delete,
        .confirm-delete {
            padding: 11px 18px;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color .15s ease;
        }

        .cancel-delete {
            color: var(--navy);
            background: var(--parchment-deep);
        }

        .cancel-delete:hover,
        .cancel-delete:focus-visible {
            background: var(--brass-light);
        }

        .confirm-delete {
            color: #f6e9e2;
            background: var(--seal);
        }

        .confirm-delete:hover,
        .confirm-delete:focus-visible {
            background: var(--seal-deep);
        }

        /* Responsive: manifest becomes stacked cargo cards */

        @media (max-width: 780px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead {
                display: none;
            }

            tbody tr {
                margin: 14px;
                border: 1px solid var(--parchment-deep);
                border-radius: 6px;
                padding: 6px 12px;
            }

            tbody tr:hover td {
                background: transparent;
            }

            td {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 14px;
                padding: 10px 2px;
                border-bottom: 1px dashed var(--parchment-deep);
            }

            tr td:last-child {
                border-bottom: none;
            }

            td::before {
                content: attr(data-label);
                flex-shrink: 0;
                color: var(--text-accent);
                font-weight: 600;
                font-size: 13.5px;
            }

            td.actions-cell {
                flex-direction: column;
                align-items: stretch;
            }

            td.actions-cell::before {
                margin-bottom: 8px;
            }

            .actions {
                justify-content: stretch;
            }

            .actions .edit-button,
            .actions .delete-button {
                flex: 1;
                justify-content: center;
            }
        }

        @media (max-width: 650px) {
            header,
            .toolbar {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .header-compass {
                display: none;
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

        @media (prefers-reduced-motion: reduce) {
            .welcome,
            .modal-card {
                animation: none;
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
    <svg class="header-compass" viewBox="0 0 200 200" aria-hidden="true" focusable="false">
        <circle cx="100" cy="100" r="94" fill="none" stroke="currentColor" stroke-width="1"/>
        <circle cx="100" cy="100" r="72" fill="none" stroke="currentColor" stroke-width="1"/>
        <path d="M100 6 L109 90 L100 100 L91 90 Z" fill="currentColor"/>
        <path d="M100 194 L109 110 L100 100 L91 110 Z" fill="currentColor"/>
        <path d="M6 100 L90 91 L100 100 L90 109 Z" fill="currentColor"/>
        <path d="M194 100 L110 91 L100 100 L110 109 Z" fill="currentColor"/>
        <circle cx="100" cy="100" r="4" fill="currentColor"/>
    </svg>

    <div class="brand">
        <svg class="brand-mark" viewBox="0 0 48 48" aria-hidden="true" focusable="false">
            <path d="M6 30 L42 30 L37 40 L11 40 Z" fill="none" stroke="currentColor" stroke-width="2"/>
            <line x1="24" y1="30" x2="24" y2="6" stroke="currentColor" stroke-width="2"/>
            <path d="M24 8 L38 22 L24 22 Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
            <path d="M24 14 L12 22 L24 22 Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
        </svg>

        <div>
            <h1>Kalakal 1521</h1>
            <p>Trade goods management before barcodes existed.</p>
        </div>
    </div>

    <a class="logout" href="<?= site_url('logout') ?>">
        Leave the Port
    </a>
</header>

<main>
    <section class="welcome">
        <h2>Trade Goods Manifest</h2>
        <div class="welcome-rule"></div>

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
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12l5 5L20 6" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <section class="summary">
        <div class="summary-card">
            <div class="summary-icon">
                <svg viewBox="0 0 48 48" aria-hidden="true"><rect x="7" y="12" width="34" height="28" fill="none" stroke="currentColor" stroke-width="2.4"/><line x1="7" y1="26" x2="41" y2="26" stroke="currentColor" stroke-width="2"/><line x1="24" y1="12" x2="24" y2="40" stroke="currentColor" stroke-width="2"/></svg>
            </div>
            <div>
                <span>Types of Trade Goods</span>
                <strong><?= count($products) ?></strong>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon">
                <svg viewBox="0 0 48 48" aria-hidden="true"><line x1="24" y1="8" x2="24" y2="38" stroke="currentColor" stroke-width="2.4"/><line x1="10" y1="14" x2="38" y2="14" stroke="currentColor" stroke-width="2.4"/><path d="M10 14 L4 26 A6 6 0 0 0 16 26 Z" fill="none" stroke="currentColor" stroke-width="2"/><path d="M38 14 L32 26 A6 6 0 0 0 44 26 Z" fill="none" stroke="currentColor" stroke-width="2"/><line x1="16" y1="40" x2="32" y2="40" stroke="currentColor" stroke-width="2.4"/></svg>
            </div>
            <div>
                <span>Total Items in the Cargo Hold</span>
                <strong><?= $totalStock ?></strong>
            </div>
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
                <svg viewBox="0 0 48 48" aria-hidden="true"><path d="M6 22 L42 22 L37 38 L11 38 Z" fill="none" stroke="currentColor" stroke-width="2"/><line x1="24" y1="22" x2="24" y2="4" stroke="currentColor" stroke-width="2"/><path d="M24 6 L36 18 L24 18 Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
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
                            <td data-label="ID">
                                <?= (int) $product['id'] ?>
                            </td>

                            <td data-label="Trade Good" class="product-name">
                                <?= htmlspecialchars(
                                    $product['product_name'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>
                            </td>

                            <td data-label="Description">
                                <?= htmlspecialchars(
                                    $product['description']
                                        ?: 'No description',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>
                            </td>

                            <td data-label="Price">
                                <?= number_format(
                                    (float) $product['price'],
                                    2
                                ) ?>
                                coins
                            </td>

                            <td data-label="Quantity">
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

                            <td data-label="Date Added">
                                <?= date(
                                    'M d, Y',
                                    strtotime($product['created_at'])
                                ) ?>
                            </td>

                            <td data-label="Actions" class="actions-cell">
                                <div class="actions">
                                    <a
                                        class="edit-button"
                                        href="<?= site_url(
                                            'products/edit/' .
                                            $product['id']
                                        ) ?>"
                                    >
                                        <svg viewBox="0 0 24 24" width="14" height="14" aria-hidden="true"><path d="M3 21l3-1 11-11-2-2L4 18z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M14 7l3-3 2 2-3 3z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
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
                                        <svg viewBox="0 0 24 24" width="14" height="14" aria-hidden="true"><path d="M3 15c2 0 2-2 4-2s2 2 4 2 2-2 4-2 2 2 4 2 2-2 4-2" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="M12 3v9M9 9l3 3 3-3" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
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
        <div class="modal-icon">
            <svg viewBox="0 0 48 48" aria-hidden="true"><circle cx="24" cy="10" r="4" fill="none" stroke="currentColor" stroke-width="2.4"/><line x1="24" y1="14" x2="24" y2="38" stroke="currentColor" stroke-width="2.4"/><path d="M10 26 A14 14 0 0 0 24 40 A14 14 0 0 0 38 26" fill="none" stroke="currentColor" stroke-width="2.4"/><line x1="14" y1="20" x2="34" y2="20" stroke="currentColor" stroke-width="2.4"/></svg>
        </div>

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