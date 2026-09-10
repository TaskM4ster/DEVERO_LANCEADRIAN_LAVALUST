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
            border: 3px solid #d9b46d;
            border-radius: 50%;
            background: #4a2c1b;
            color: #e6c98f;
            font-size: 30px;
            font-weight: bold;
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

        .message,
        .error {
            padding: 13px;
            margin-bottom: 20px;
            border-radius: 8px;
            line-height: 1.4;
        }

        .message {
            background: #fff0bf;
            color: #795700;
        }

        .error {
            background: #f7d4cf;
            color: #8c2f25;
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

        /*
        |--------------------------------------------------------------------------
        | Password visibility button
        |--------------------------------------------------------------------------
        */
        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 48px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            width: 32px;
            height: 32px;
            padding: 0;
            border: none;
            border-radius: 50%;
            transform: translateY(-50%);
            display: flex;
            justify-content: center;
            align-items: center;
            background: transparent;
            color: #705843;
            cursor: pointer;
        }

        .toggle-password:hover {
            background: rgba(139, 69, 19, 0.10);
            color: #8b4513;
        }

        .toggle-password:focus-visible {
            outline: 2px solid #8b4513;
            outline-offset: 2px;
        }

        .toggle-password svg {
            width: 21px;
            height: 21px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .eye-closed {
            display: none;
        }

        .toggle-password.showing .eye-open {
            display: none;
        }

        .toggle-password.showing .eye-closed {
            display: block;
        }

        /*
        |--------------------------------------------------------------------------
        | Submit button
        |--------------------------------------------------------------------------
        */
        .submit-button {
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

        .submit-button:hover {
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

                <div class="password-wrapper">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        id="togglePassword"
                        aria-label="Show password"
                        aria-pressed="false"
                    >
                        <!-- Visible when the password is hidden -->
                        <svg
                            class="eye-open"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>

                        <!-- Visible when the password is shown -->
                        <svg
                            class="eye-closed"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path d="M3 3l18 18"></path>
                            <path d="M10.6 6.2A10.7 10.7 0 0 1 12 6c6.5 0 10 6 10 6a18 18 0 0 1-3 3.7"></path>
                            <path d="M6.2 6.2C3.5 8 2 12 2 12s3.5 6 10 6a10.8 10.8 0 0 0 4-.8"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="submit-button">
                Enter the Trading Post
            </button>
        </form>

        <p class="footer-note">
            Trade responsibly. The captain is watching.
        </p>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function () {
            const isHidden = passwordInput.type === 'password';

            passwordInput.type = isHidden ? 'text' : 'password';

            togglePassword.classList.toggle('showing', isHidden);
            togglePassword.setAttribute('aria-pressed', String(isHidden));
            togglePassword.setAttribute(
                'aria-label',
                isHidden ? 'Hide password' : 'Show password'
            );
        });
    </script>
</body>

</html>