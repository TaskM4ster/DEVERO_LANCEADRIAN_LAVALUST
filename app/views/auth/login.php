<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Merchant Login | KALAKAL 1521</title>

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
            position: relative;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
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

        .harbor-compass {
            position: absolute;
            top: 50%;
            left: 50%;
            width: min(70vw, 620px);
            height: min(70vw, 620px);
            transform: translate(-50%, -50%);
            color: var(--rope);
            opacity: 0.06;
            pointer-events: none;
        }

        .login-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            padding: 40px;
            background: var(--card);
            border: 1px solid var(--parchment-deep);
            border-top: 6px solid transparent;
            border-image: linear-gradient(90deg, var(--brass-light), var(--brass)) 1;
            border-radius: 10px;
            box-shadow: 0 18px 44px rgba(16, 28, 40, 0.22);
        }

        .logo {
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            border: 3px solid var(--brass);
            border-radius: 50%;
            background: linear-gradient(160deg, var(--navy) 0%, var(--navy-deep) 100%);
            color: var(--brass-light);
        }

        .logo svg {
            width: 30px;
            height: 30px;
        }

        h1 {
            margin-bottom: 8px;
            color: var(--navy);
            font-family: 'IM Fell English', Georgia, serif;
            font-weight: 400;
            font-size: 27px;
            letter-spacing: 1px;
        }

        .rule {
            width: 90px;
            height: 8px;
            margin-bottom: 16px;
            opacity: .55;
            background-image: repeating-linear-gradient(
                -35deg,
                var(--rope) 0px,
                var(--rope) 2px,
                transparent 2px,
                transparent 5px
            );
        }

        .subtitle {
            margin-bottom: 26px;
            color: var(--ink-soft);
            font-style: italic;
            line-height: 1.5;
        }

        .message,
        .error {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 13px 14px;
            margin-bottom: 20px;
            border-radius: 4px;
            line-height: 1.4;
            font-size: 14.5px;
        }

        .message svg,
        .error svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .message {
            color: var(--low-ink);
            background: var(--low-bg);
            border-left: 4px solid var(--low-ink);
        }

        .error {
            color: var(--empty-ink);
            background: var(--empty-bg);
            border-left: 4px solid var(--empty-ink);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: var(--navy);
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--parchment-deep);
            border-radius: 6px;
            background: #fffdf8;
            color: var(--ink);
            font-size: 16px;
        }

        input:focus {
            outline: none;
            border-color: var(--brass);
            box-shadow: 0 0 0 3px rgba(182, 133, 44, 0.2);
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
            color: var(--ink-soft);
            cursor: pointer;
        }

        .toggle-password:hover {
            background: rgba(182, 133, 44, 0.14);
            color: var(--brass);
        }

        .toggle-password:focus-visible {
            outline: 2px solid var(--brass);
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
            border-radius: 6px;
            background: linear-gradient(180deg, var(--brass-light), var(--brass));
            color: #2b1c11;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .35), 0 3px 8px rgba(43, 28, 17, .22);
            transition: transform .15s ease, box-shadow .15s ease;
        }

        .submit-button:hover,
        .submit-button:focus-visible {
            transform: translateY(-1px);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .35), 0 5px 12px rgba(43, 28, 17, .3);
        }

        .submit-button:active {
            transform: translateY(0);
        }

        .submit-button:focus-visible {
            outline: 2px solid var(--navy);
            outline-offset: 2px;
        }

        .footer-note {
            margin-top: 22px;
            color: var(--ink-soft);
            font-size: 13px;
            font-style: italic;
            text-align: center;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 30px 24px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .submit-button {
                transition: none;
            }
        }
    </style>
</head>

<body>
    <svg class="harbor-compass" viewBox="0 0 200 200" aria-hidden="true" focusable="false">
        <circle cx="100" cy="100" r="94" fill="none" stroke="currentColor" stroke-width="1"/>
        <circle cx="100" cy="100" r="72" fill="none" stroke="currentColor" stroke-width="1"/>
        <path d="M100 6 L109 90 L100 100 L91 90 Z" fill="currentColor"/>
        <path d="M100 194 L109 110 L100 100 L91 110 Z" fill="currentColor"/>
        <path d="M6 100 L90 91 L100 100 L90 109 Z" fill="currentColor"/>
        <path d="M194 100 L110 91 L100 100 L110 109 Z" fill="currentColor"/>
        <circle cx="100" cy="100" r="4" fill="currentColor"/>
    </svg>

    <div class="login-card">
        <div class="logo">
            <svg viewBox="0 0 48 48" aria-hidden="true" focusable="false">
                <path d="M6 30 L42 30 L37 40 L11 40 Z" fill="none" stroke="currentColor" stroke-width="2"/>
                <line x1="24" y1="30" x2="24" y2="6" stroke="currentColor" stroke-width="2"/>
                <path d="M24 8 L38 22 L24 22 Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                <path d="M24 14 L12 22 L24 22 Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
            </svg>
        </div>

        <h1>Kalakal 1521</h1>
        <div class="rule"></div>

        <p class="subtitle">
            Authorized merchants only. No stowaways.
        </p>

        <?php if (isset($_GET['blocked'])): ?>
            <div class="message">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4M12 17h.01" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="2"/></svg>
                <span>The harbor guards stopped you. Please sign in first.</span>
            </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="error">
                <svg viewBox="0 0 24 24" aria-hidden="true"><line x1="6" y1="6" x2="18" y2="18" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><line x1="18" y1="6" x2="6" y2="18" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>
                <span><?= htmlspecialchars($error) ?></span>
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