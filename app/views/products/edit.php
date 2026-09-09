<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Trade Goods | KALAKAL 1521</title>

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
            padding: 35px 20px;
        }

        .container {
            width: min(680px, 100%);
            margin: auto;
        }

        .heading {
            margin-bottom: 22px;
        }

        .heading h1 {
            color: #4a2c1b;
            margin-bottom: 7px;
        }

        .heading p {
            color: #705843;
        }

        .form-card {
            background: #fffaf0;
            padding: 32px;
            border-radius: 14px;
            border-top: 7px solid #d8a34c;
            box-shadow: 0 10px 28px rgba(64, 42, 25, 0.14);
        }

        .errors {
            background: #f7d4cf;
            color: #8c2f25;
            padding: 15px 18px;
            margin-bottom: 22px;
            border-radius: 8px;
        }

        .errors ul {
            padding-left: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbb895;
            border-radius: 7px;
            background: #fffdf8;
            color: #3f2d20;
            font-size: 16px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #8b4513;
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.15);
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
            padding: 12px 18px;
            border-radius: 7px;
            font-weight: bold;
            text-decoration: none;
            font-size: 15px;
        }

        .save-button {
            border: none;
            background: #8b4513;
            color: white;
            cursor: pointer;
        }

        .save-button:hover {
            background: #a55b25;
        }

        .back-button {
            background: #e4d2af;
            color: #4a2c1b;
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
        <p>Correct the manifest before the captain notices.</p>
    </div>

    <div class="form-card">
        <?php if (!empty($errors)): ?>
            <div class="errors">
                <strong>The quartermaster found a problem:</strong>

                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
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

                <div class="form-group">
                    <label for="quantity">Quantity</label>

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