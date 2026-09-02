<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Directory</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,600;1,500&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --paper-outer: #E7E0CB;
            --paper-card: #F4EFE1;
            --ink: #262420;
            --ink-muted: #5C5540;
            --navy: #1F3A5C;
            --stamp: #9C3B2E;
            --line: #C9BFA0;
            --highlight: rgba(224, 196, 84, 0.20);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'IBM Plex Mono', monospace;
            background: var(--paper-outer);
            color: var(--ink);
            line-height: 1.5;
            padding: 56px 24px;
        }

        .container {
            max-width: 920px;
            margin: 0 auto;
            background: var(--paper-card);
            padding: 40px 40px 8px;
            border-radius: 3px;
            box-shadow: 0 1px 3px rgba(38, 36, 32, 0.08), 0 10px 28px rgba(38, 36, 32, 0.07);
        }

        .masthead {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 24px;
            padding-bottom: 32px;
            border-bottom: 3px double var(--navy);
        }

        .title-row {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .title-block h1 {
            font-family: 'Fraunces', serif;
            font-style: italic;
            font-weight: 500;
            font-size: clamp(1.8rem, 3.6vw, 2.5rem);
            letter-spacing: -0.01em;
            color: var(--ink);
            margin-bottom: 6px;
        }

        .title-block p {
            font-size: 0.9rem;
            color: var(--ink-muted);
            max-width: 44ch;
        }

        .stamp {
            border: 2px solid var(--stamp);
            border-radius: 3px;
            color: var(--stamp);
            padding: 10px 20px;
            text-align: center;
            transform: rotate(-2deg);
            flex-shrink: 0;
        }

        .stamp .label {
            font-size: 0.66rem;
            letter-spacing: 0.1em;
            opacity: 0.85;
        }

        .stamp .count {
            font-family: 'Fraunces', serif;
            font-weight: 600;
            font-size: 1.9rem;
            line-height: 1.15;
        }

        .table-wrap {
            overflow-x: auto;
            margin-top: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            text-align: left;
            font-size: 0.76rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            color: var(--ink);
            padding: 24px 16px 12px;
            border-bottom: 2px solid var(--navy);
            white-space: nowrap;
        }

        tbody td {
            padding: 16px;
            border-bottom: 1px solid var(--line);
            font-size: 0.92rem;
            vertical-align: middle;
        }

        tbody tr {
            transition: background-color 0.15s ease;
        }

        tbody tr:hover {
            background: var(--highlight);
        }

        td.id, td.email {
            font-family: 'IBM Plex Mono', monospace;
            color: var(--ink-muted);
            font-size: 0.85rem;
        }

        td.email { word-break: break-all; }

        td.fname, td.lname {
            font-family: 'Fraunces', serif;
            font-size: 0.98rem;
        }

        td.username .tag {
            display: inline-block;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.78rem;
            color: var(--navy);
            border: 1px solid var(--navy);
            background: rgba(31, 58, 92, 0.05);
            padding: 3px 10px;
            border-radius: 4px;
        }

        .empty td {
            text-align: center;
            padding: 56px 16px;
            font-family: 'Fraunces', serif;
            font-style: italic;
            font-size: 1.05rem;
            color: var(--ink-muted);
        }

        @media (max-width: 640px) {
            body { padding: 32px 16px; }
            .container { padding: 28px 20px 8px; }
            .stamp { transform: none; }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="masthead">
            <div class="title-row">
                <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <circle cx="22" cy="22" r="20" stroke="#1F3A5C" stroke-width="1.5"/>
                    <line x1="13" y1="17" x2="31" y2="17" stroke="#1F3A5C" stroke-width="1.5"/>
                    <line x1="13" y1="22" x2="31" y2="22" stroke="#1F3A5C" stroke-width="1.5"/>
                    <line x1="13" y1="27" x2="24" y2="27" stroke="#1F3A5C" stroke-width="1.5"/>
                </svg>

                <div class="title-block">
                    <h1>User Management Directory</h1>
                    <p>Every account on record, synced from the database.</p>
                </div>
            </div>

            <div class="stamp">
                <div class="label">Total on file</div>
                <div class="count"><?= count($users) ?></div>
            </div>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Entry</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Username</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($users)): ?>

                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="id">
                                    <?= htmlspecialchars($user['id']) ?>
                                </td>

                                <td class="fname">
                                    <?= htmlspecialchars($user['firstname']) ?>
                                </td>

                                <td class="lname">
                                    <?= htmlspecialchars($user['lastname']) ?>
                                </td>

                                <td class="email">
                                    <?= htmlspecialchars($user['email']) ?>
                                </td>

                                <td class="username">
                                    <span class="tag"><?= htmlspecialchars($user['username']) ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <tr class="empty">
                            <td colspan="5">
                                No registered users were found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>