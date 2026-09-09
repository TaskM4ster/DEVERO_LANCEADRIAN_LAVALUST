<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Merchant Login | KALAKAL 1521</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Georgia, "Times New Roman", serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #3f2d20;
            background: #efe2c6;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 40px;
            background: #fffaf0;
            border-top: 7px solid #8b4513;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(64, 42, 25, 0.18);
        }

        .logo {
            width: 62px;
            height: 62px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            border-radius: 50%;
            background: #4a2c1b;
            color: #e6c98f;
            font-size: 30px;
            font-weight: bold;
            border: 3px solid #d9b46d;
        }

        h1 {
            margin-bottom: 8px;
            color: #4a2c1b;
            letter-spacing: 1px;
        }

        .subtitle {
            margin-bottom: 26px;
            color: #705843;
            line-height: 1.5;
        }

        .message {
            padding: 13px;
            margin-bottom: 20px;
            border-radius: 8px;
            background: #fff0bf;
            color: #795700;
            line-height: 1.4;
        }

        .error {
            padding: 13px;
            margin-bottom: 20px;
            border-radius: 8px;
            background: #f7d4cf;
            color: #8c2f25;
            line-height: 1.4;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #4a2c1b;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbb895;
            border-radius: 8px;
            background: #fffdf8;
            color: #3f2d20;
            font-size: 16px;
        }

        input:focus {
            outline: none;
            border-color: #8b4513;
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.15);
        }

        button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #8b4513;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #a55b25;
        }

        .footer-note {
            margin-top: 22px;
            color: #80664e;
            font-size: 13px;
            text-align: center;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 30px 24px;
            }
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="logo">K</div>

        <h1>KALAKAL 1521</h1>

        <p class="subtitle">
            Authorized merchants only. No stowaways.
        </p>

        <?php if (isset($_GET['blocked'])): ?>
            <div class="message">
                The harbor guards stopped you. Please sign in first.
            </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="post">
            <div class="form-group">
                <label for="username">Merchant Username</label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    autocomplete="username"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password">Secret Passage</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit">
                Enter the Trading Post
            </button>
        </form>

        <p class="footer-note">
            Trade responsibly. The captain is watching.
        </p>
    </div>
</body>
</html>