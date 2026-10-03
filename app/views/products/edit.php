<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Trade Goods | KALAKAL 1521</title>

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

            --parchment: #f1e3c3;
            --parchment-deep: #e6d3a4;
            --card: #fbf4de;

            --navy: #1c2c3d;
            --navy-deep: #101c28;

            --brass: #b6852c;
            --brass-light: #dcae57;
            --rope: #8a6a41;

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
            padding: 35px 20px;
        }

        button, input, textarea {
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

        .container {
            width: min(680px, 100%);
            margin: auto;
        }

        .heading {
            margin-bottom: 24px;
        }

        .heading h1 {
            color: var(--navy);
            font-family: 'IM Fell English', Georgia, serif;
            font-weight: 400;
            font-size: 29px;
            margin-bottom: 8px;
        }

        .heading-rule {
            width: 110px;
            height: 8px;
            margin-bottom: 12px;
            opacity: .55;
            background-image: repeating-linear-gradient(
                -35deg,
                var(--rope) 0px,
                var(--rope) 2px,
                transparent 2px,
                transparent 5px
            );
        }

        .heading p {
            color: var(--ink-soft);
        }

        .form-card {
            position: relative;
            background: var(--card);
            padding: 32px;
            border: 1px solid var(--parchment-deep);
            border-top: 6px solid var(--brass-light);
            border-radius: 8px;
            box-shadow: 0 14px 34px rgba(43, 28, 17, 0.14);
        }

        .errors {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background: var(--empty-bg);
            color: var(--empty-ink);
            padding: 15px 18px;
            margin-bottom: 24px;
            border-radius: 4px;
            border-left: 4px solid var(--empty-ink);
        }

        .errors svg {
            width: 19px;
            height: 19px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .errors strong {
            display: block;
            margin-bottom: 6px;
        }

        .errors ul {
            list-style: none;
        }

        .errors li {
            position: relative;
            padding-left: 14px;
            margin-top: 3px;
        }

        .errors li::before {
            content: '—';
            position: absolute;
            left: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            color: var(--navy);
            margin-bottom: 7px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--parchment-deep);
            border-radius: 6px;
            background: #fffdf8;
            color: var(--ink);
            font-size: 16px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: var(--brass);
            box-shadow: 0 0 0 3px rgba(182, 133, 44, 0.2);
        }

        .input-icon-wrapper {
            position: relative;
        }

        .input-icon-wrapper input {
            padding-left: 40px;
        }

        .input-icon-wrapper svg {
            position: absolute;
            top: 50%;
            left: 12px;
            width: 18px;
            height: 18px;
            transform: translateY(-50%);
            color: var(--rope);
            pointer-events: none;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }

        .save-button,
        .back-button {
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: 700;
            text-decoration: none;
            font-size: 15px;
            transition: transform .15s ease, box-shadow .15s ease, background-color .15s ease;
        }

        .save-button {
            border: none;
            background: linear-gradient(180deg, var(--brass-light), var(--brass));
            color: #2b1c11;
            cursor: pointer;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .35), 0 3px 8px rgba(43, 28, 17, .22);
        }

        .save-button:hover,
        .save-button:focus-visible {
            transform: translateY(-1px);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .35), 0 5px 12px rgba(43, 28, 17, .3);
        }

        .save-button:active {
            transform: translateY(0);
        }

        .back-button {
            background: var(--parchment-deep);
            color: var(--navy);
            border: 1px solid var(--rope);
        }

        .back-button:hover,
        .back-button:focus-visible {
            background: var(--brass-light);
        }

        @media (max-width: 600px) {
            .row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-card {
                padding: 24px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .save-button,
            .back-button {
                transition: none;
            }
        }
    </style>
</head>

<body>
<?php
    $product = $product ?? [];
    $errors = $errors ?? [];
?>

<div class="container">
    <div class="heading">
        <h1>Edit the Cargo Record</h1>
        <div class="heading-rule"></div>
        <p>Correct the manifest before the captain notices.</p>
    </div>

    <div class="form-card">
        <?php if (!empty($errors)): ?>
            <div class="errors">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4M12 17h.01" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="2"/></svg>
                <div>
                    <strong>The quartermaster found a problem:</strong>

                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <form
            action="<?= site_url(
                'products/update/' . (int) $product['id']
            ) ?>"
            method="post"
        >
            <div class="form-group">
                <label for="product_name">Product Name</label>

                <input
                    type="text"
                    id="product_name"
                    name="product_name"
                    maxlength="100"
                    value="<?= htmlspecialchars(
                        $product['product_name'] ?? ''
                    ) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="description">Description</label>

                <textarea
                    id="description"
                    name="description"
                ><?= htmlspecialchars(
                    $product['description'] ?? ''
                ) ?></textarea>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="price">Price (coins)</label>

                    <div class="input-icon-wrapper">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M9.5 9.2c0-1.1 1-2 2.5-2s2.5.9 2.5 2c0 1.1-1 1.6-2.5 2s-2.5.9-2.5 2c0 1.1 1 2 2.5 2s2.5-.9 2.5-2" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/></svg>
                        <input
                            type="number"
                            id="price"
                            name="price"
                            min="0"
                            step="0.01"
                            value="<?= htmlspecialchars(
                                $product['price'] ?? ''
                            ) ?>"
                            required
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>

                    <div class="input-icon-wrapper">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="8" width="17" height="12" fill="none" stroke="currentColor" stroke-width="1.6"/><line x1="3.5" y1="14" x2="20.5" y2="14" stroke="currentColor" stroke-width="1.4"/><line x1="12" y1="8" x2="12" y2="20" stroke="currentColor" stroke-width="1.4"/></svg>
                        <input
                            type="number"
                            id="quantity"
                            name="quantity"
                            min="0"
                            step="1"
                            value="<?= htmlspecialchars(
                                $product['quantity'] ?? ''
                            ) ?>"
                            required
                        >
                    </div>
                </div>
            </div>

            <div class="actions">
                <button class="save-button" type="submit">
                    Update Manifest
                </button>

                <a class="back-button" href="<?= site_url('products') ?>">
                    Cancel Voyage
                </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>