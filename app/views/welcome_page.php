<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUPER RAVEN — Developer Portal</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700&family=Unbounded:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --raven: #8b5cf6;
            --raven-light: #a78bfa;
            --raven-dark: #6d28d9;
            --electric: #c084fc;
            --blue: #6366f1;

            --bg: #050507;
            --bg2: #0b0a10;
            --bg3: #11101a;
            --card: rgba(17, 16, 26, 0.8);

            --border: rgba(167, 139, 250, 0.12);
            --border-hot: rgba(139, 92, 246, 0.45);

            --text: #f5f3ff;
            --muted: #9490a8;
            --dim: #4c485b;

            --mono: 'Fira Code', monospace;
            --sans: 'Unbounded', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--sans);
            background:
                radial-gradient(circle at 50% -20%, rgba(124, 58, 237, .18), transparent 40%),
                var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* =========================
           BACKGROUND
        ========================= */

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;

            background-image:
                linear-gradient(rgba(139,92,246,.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139,92,246,.035) 1px, transparent 1px);

            background-size: 55px 55px;

            mask-image:
                radial-gradient(
                    ellipse 80% 70% at 50% 0%,
                    black 20%,
                    transparent 100%
                );
        }

        .noise {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            opacity: .035;

            background-image:
                url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
        }

        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
            z-index: 0;
        }

        .orb-one {
            width: 500px;
            height: 500px;
            top: -200px;
            left: -150px;
            background: rgba(124, 58, 237, .15);
        }

        .orb-two {
            width: 450px;
            height: 450px;
            top: 300px;
            right: -200px;
            background: rgba(99, 102, 241, .10);
        }

        /* =========================
           NAVBAR
        ========================= */

        nav {
            position: relative;
            z-index: 10;

            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 1.2rem 2rem;

            border-bottom: 1px solid var(--border);

            background: rgba(5,5,7,.75);
            backdrop-filter: blur(20px);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: .7rem;

            color: white;
            text-decoration: none;

            font-size: 1rem;
            font-weight: 800;
            letter-spacing: -.03em;
        }

        .logo-icon {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            font-size: 20px;

            background:
                linear-gradient(135deg,
                    var(--raven),
                    var(--blue)
                );

            box-shadow:
                0 0 25px rgba(139,92,246,.4);
        }

        .logo span {
            color: var(--raven-light);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: .3rem;
        }

        .nav-links a {
            color: var(--muted);
            text-decoration: none;

            font-size: .75rem;

            padding: .55rem .85rem;
            border-radius: 7px;

            transition: .2s;
        }

        .nav-links a:hover {
            color: white;
            background: var(--bg3);
        }

        .nav-button {
            background: var(--raven) !important;
            color: white !important;

            margin-left: .5rem;

            box-shadow: 0 0 20px rgba(139,92,246,.2);
        }

        .nav-button:hover {
            background: var(--raven-dark) !important;
            box-shadow: 0 0 30px rgba(139,92,246,.4);
        }

        /* =========================
           HERO
        ========================= */

        .wrap {
            max-width: 1100px;
            margin: auto;
            padding: 0 2rem;
        }

        .hero {
            position: relative;
            z-index: 1;

            text-align: center;

            padding: 7rem 2rem 6rem;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: .55rem;

            padding: .45rem .9rem;

            border-radius: 999px;

            background: rgba(139,92,246,.08);
            border: 1px solid var(--border-hot);

            color: var(--raven-light);

            font-family: var(--mono);
            font-size: .7rem;

            margin-bottom: 2rem;
        }

        .status-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: var(--raven-light);

            box-shadow: 0 0 12px var(--raven);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%,100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .5;
                transform: scale(.75);
            }
        }

        .hero h1 {
            font-size: clamp(3rem, 9vw, 7rem);

            line-height: .95;

            letter-spacing: -.06em;

            font-weight: 800;

            margin-bottom: 1.8rem;

            text-shadow:
                0 0 60px rgba(139,92,246,.15);
        }

        .hero h1 .super {
            color: white;
        }

        .hero h1 .raven {
            background:
                linear-gradient(
                    135deg,
                    #a78bfa,
                    #7c3aed,
                    #6366f1
                );

            -webkit-background-clip: text;
            background-clip: text;

            color: transparent;
        }

        .hero-sub {
            max-width: 650px;

            margin: auto auto 2.5rem;

            color: var(--muted);

            line-height: 1.8;

            font-size: .95rem;

            font-weight: 400;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: .75rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: .5rem;

            padding: .8rem 1.4rem;

            border-radius: 8px;

            text-decoration: none;

            font-family: var(--sans);
            font-size: .75rem;
            font-weight: 600;

            transition: .25s;
        }

        .btn-primary {
            background:
                linear-gradient(
                    135deg,
                    var(--raven),
                    var(--blue)
                );

            color: white;

            box-shadow:
                0 0 25px rgba(139,92,246,.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);

            box-shadow:
                0 0 40px rgba(139,92,246,.4);
        }

        .btn-secondary {
            color: var(--muted);

            border: 1px solid var(--border);

            background: rgba(255,255,255,.02);
        }

        .btn-secondary:hover {
            color: white;

            border-color: var(--border-hot);

            background: rgba(139,92,246,.06);
        }

        /* =========================
           RAVEN SYMBOL
        ========================= */

        .raven-symbol {
            position: absolute;

            top: 40px;
            left: 50%;

            transform: translateX(-50%);

            font-size: 260px;

            opacity: .025;

            filter: blur(1px);

            pointer-events: none;
        }

        /* =========================
           STATS
        ========================= */

        .stats {
            position: relative;
            z-index: 1;

            display: flex;
            justify-content: center;
            flex-wrap: wrap;

            gap: 4rem;

            padding: 3rem 2rem;

            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .stat {
            text-align: center;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 800;

            letter-spacing: -.04em;
        }

        .stat-value span {
            color: var(--raven-light);
        }

        .stat-label {
            margin-top: .4rem;

            color: var(--muted);

            font-size: .65rem;

            text-transform: uppercase;

            letter-spacing: .1em;
        }

        /* =========================
           SECTIONS
        ========================= */

        section {
            position: relative;
            z-index: 1;

            padding: 6rem 2rem;
        }

        .label {
            color: var(--raven-light);

            font-family: var(--mono);

            font-size: .7rem;

            text-transform: uppercase;

            letter-spacing: .15em;

            margin-bottom: .8rem;
        }

        .title {
            font-size: clamp(1.8rem,4vw,2.8rem);

            line-height: 1.15;

            letter-spacing: -.04em;

            margin-bottom: 1rem;
        }

        .description {
            max-width: 560px;

            color: var(--muted);

            font-size: .9rem;

            line-height: 1.8;
        }

        /* =========================
           FEATURES
        ========================= */

        .features {
            display: grid;

            grid-template-columns: repeat(3,1fr);

            gap: 1rem;

            margin-top: 3rem;
        }

        .feature {
            position: relative;

            padding: 1.8rem;

            min-height: 210px;

            border: 1px solid var(--border);

            border-radius: 14px;

            background:
                linear-gradient(
                    145deg,
                    rgba(17,16,26,.95),
                    rgba(10,9,15,.85)
                );

            overflow: hidden;

            transition: .3s;
        }

        .feature::after {
            content: "";

            position: absolute;

            width: 120px;
            height: 120px;

            top: -60px;
            right: -60px;

            border-radius: 50%;

            background: var(--raven);

            filter: blur(60px);

            opacity: 0;

            transition: .3s;
        }

        .feature:hover {
            transform: translateY(-5px);

            border-color: var(--border-hot);

            box-shadow:
                0 15px 40px rgba(0,0,0,.3);
        }

        .feature:hover::after {
            opacity: .12;
        }

        .icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: rgba(139,92,246,.1);

            border: 1px solid var(--border-hot);

            font-size: 18px;

            margin-bottom: 1.2rem;
        }

        .feature h3 {
            font-size: .9rem;

            margin-bottom: .7rem;
        }

        .feature p {
            color: var(--muted);

            font-size: .75rem;

            line-height: 1.7;
        }

        /* =========================
           CODE
        ========================= */

        .code-section {
            display: grid;

            grid-template-columns: .8fr 1.2fr;

            gap: 3rem;

            align-items: center;
        }

        .code-window {
            overflow: hidden;

            border: 1px solid var(--border);

            border-radius: 14px;

            background: #08080c;

            box-shadow:
                0 20px 60px rgba(0,0,0,.4);
        }

        .code-header {
            display: flex;
            align-items: center;

            gap: .5rem;

            padding: .8rem 1rem;

            background: var(--bg3);

            border-bottom: 1px solid var(--border);
        }

        .dot {
            width: 9px;
            height: 9px;

            border-radius: 50%;
        }

        .red { background: #ff5f57; }
        .yellow { background: #febc2e; }
        .green { background: #28c840; }

        .filename {
            margin-left: .5rem;

            font-family: var(--mono);

            color: var(--muted);

            font-size: .65rem;
        }

        pre {
            padding: 1.5rem;

            overflow-x: auto;

            font-family: var(--mono);

            font-size: .72rem;

            line-height: 1.9;

            color: #a1a1aa;
        }

        .purple { color: #c084fc; }
        .blue { color: #60a5fa; }
        .green-text { color: #86efac; }
        .yellow-text { color: #fde68a; }

        /* =========================
           STRUCTURE
        ========================= */

        .structure {
            display: grid;

            grid-template-columns:
                repeat(auto-fill,minmax(190px,1fr));

            gap: .6rem;

            margin-top: 2.5rem;
        }

        .directory {
            display: flex;
            align-items: center;
            gap: .6rem;

            padding: .9rem 1rem;

            border: 1px solid var(--border);

            border-radius: 8px;

            background: var(--bg2);

            color: var(--muted);

            font-family: var(--mono);

            font-size: .7rem;

            transition: .2s;
        }

        .directory:hover {
            color: white;

            border-color: var(--border-hot);

            background:
                rgba(139,92,246,.06);
        }

        .directory-icon {
            color: var(--raven-light);
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            position: relative;
            z-index: 1;

            padding: 2rem;

            border-top: 1px solid var(--border);
        }

        .footer {
            max-width: 1100px;

            margin: auto;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 1rem;

            flex-wrap: wrap;
        }

        .meta {
            display: flex;
            gap: 1.5rem;

            flex-wrap: wrap;

            color: var(--dim);

            font-family: var(--mono);

            font-size: .65rem;
        }

        .meta span span {
            color: var(--muted);
        }

        .footer-links {
            display: flex;
            gap: 1rem;
        }

        .footer-links a {
            color: var(--muted);

            text-decoration: none;

            font-size: .7rem;

            transition: .2s;
        }

        .footer-links a:hover {
            color: var(--raven-light);
        }

        /* =========================
           ANIMATION
        ========================= */

        .hero > * {
            animation: fadeUp .7s ease both;
        }

        .status {
            animation-delay: .05s;
        }

        .hero h1 {
            animation-delay: .15s;
        }

        .hero-sub {
            animation-delay: .25s;
        }

        .actions {
            animation-delay: .35s;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =========================
           MOBILE
        ========================= */

        @media(max-width: 800px) {

            .features {
                grid-template-columns: 1fr;
            }

            .code-section {
                grid-template-columns: 1fr;
            }

            .stats {
                gap: 2rem;
            }

            nav {
                padding: 1rem 1.2rem;
            }

            .nav-links a:not(.nav-button) {
                display: none;
            }

            section {
                padding: 4rem 1.5rem;
            }

            .hero {
                padding: 5rem 1.5rem 4rem;
            }

            .hero h1 {
                font-size: clamp(3rem,14vw,5rem);
            }
        }
    </style>
</head>

<body>

<div class="noise"></div>

<div class="orb orb-one"></div>
<div class="orb orb-two"></div>

<!-- =========================
     NAVIGATION
========================= -->

<nav>

    <a href="#" class="logo">

        <div class="logo-icon">
            🐦‍⬛
        </div>

        SUPER <span>RAVEN</span>

    </a>

    <div class="nav-links">

        <a href="https://lavalust.netlify.app/docs/" target="_blank">
            Docs
        </a>

        <a href="https://github.com/ronmarasigan/LavaLust" target="_blank">
            GitHub
        </a>

        <a
            href="https://lavalust.netlify.app/docs/"
            target="_blank"
            class="nav-button"
        >
            Enter System →
        </a>

    </div>

</nav>


<!-- =========================
     HERO
========================= -->

<div class="hero wrap">

    <div class="raven-symbol">
        🐦‍⬛
    </div>

    <div class="status">

        <div class="status-dot"></div>

        SYSTEM ONLINE — v<?php echo config_item('VERSION') ?? '4.x'; ?>

    </div>

    <h1>

        <span class="super">
            SUPER
        </span>

        <br>

        <span class="raven">
            RAVEN
        </span>

    </h1>

    <p class="hero-sub">

        A powerful developer environment built with
        structure, speed, and precision.
        Welcome to the Raven System.

    </p>

    <div class="actions">

        <a
            href="https://lavalust.netlify.app/docs/"
            target="_blank"
            class="btn btn-primary"
        >
            ⚡ Enter the System
        </a>

        <a
            href="https://github.com/ronmarasigan/LavaLust"
            target="_blank"
            class="btn btn-secondary"
        >
            ◈ View Source
        </a>

    </div>

</div>


<!-- =========================
     STATS
========================= -->

<div class="stats">

    <div class="stat">

        <div class="stat-value">
            MVC<span>+</span>
        </div>

        <div class="stat-label">
            Architecture
        </div>

    </div>


    <div class="stat">

        <div class="stat-value">
            <span>4</span> DB
        </div>

        <div class="stat-label">
            Database Drivers
        </div>

    </div>


    <div class="stat">

        <div class="stat-value">
            HMVC<span>✓</span>
        </div>

        <div class="stat-label">
            Module Support
        </div>

    </div>


    <div class="stat">

        <div class="stat-value">
            REST<span>*</span>
        </div>

        <div class="stat-label">
            API Ready
        </div>

    </div>

</div>


<!-- =========================
     FEATURES
========================= -->

<section>

    <div class="wrap">

        <div class="label">
            // raven capabilities
        </div>

        <h2 class="title">
            Built for the ones<br>
            who build.
        </h2>

        <p class="description">
            SUPER RAVEN gives your development environment
            a clean architecture without unnecessary complexity.
        </p>


        <div class="features">

            <div class="feature">

                <div class="icon">
                    🧠
                </div>

                <h3>
                    MVC Architecture
                </h3>

                <p>
                    Keep Models, Views, and Controllers
                    separated for a clean and maintainable
                    application structure.
                </p>

            </div>


            <div class="feature">

                <div class="icon">
                    ⚡
                </div>

                <h3>
                    Fast Routing
                </h3>

                <p>
                    Create GET, POST, PUT, DELETE and
                    grouped routes with a simple structure.
                </p>

            </div>


            <div class="feature">

                <div class="icon">
                    🗄️
                </div>

                <h3>
                    Database Ready
                </h3>

                <p>
                    Work with models, relationships,
                    queries, timestamps and database
                    operations efficiently.
                </p>

            </div>


            <div class="feature">

                <div class="icon">
                    📦
                </div>

                <h3>
                    HMVC Modules
                </h3>

                <p>
                    Build self-contained modules where
                    controllers, models and views live
                    together.
                </p>

            </div>


            <div class="feature">

                <div class="icon">
                    🔗
                </div>

                <h3>
                    REST API
                </h3>

                <p>
                    Create modern JSON-based APIs with
                    built-in response helpers and
                    conventions.
                </p>

            </div>


            <div class="feature">

                <div class="icon">
                    🛡️
                </div>

                <h3>
                    Developer Tools
                </h3>

                <p>
                    Sessions, validation, encryption,
                    uploads and other utilities are
                    available when you need them.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     QUICK START
========================= -->

<section>

    <div class="wrap">

        <div class="code-section">

            <div>

                <div class="label">
                    // quick start
                </div>

                <h2 class="title">
                    Code like a Raven.
                </h2>

                <p class="description">
                    Define a route, connect your controller,
                    load your model and render your view.
                    Simple, clean and predictable.
                </p>

            </div>


            <div>

                <div class="code-window">

                    <div class="code-header">

                        <div class="dot red"></div>
                        <div class="dot yellow"></div>
                        <div class="dot green"></div>

                        <span class="filename">
                            routes.php
                        </span>

                    </div>

                    <pre><span class="purple">$router</span>-><span class="blue">get</span>(
    <span class="green-text">'/'</span>,
    <span class="green-text">'Welcome::index'</span>
);

<span class="purple">$router</span>-><span class="blue">get</span>(
    <span class="green-text">'/users'</span>,
    <span class="green-text">'Users::index'</span>
);

<span class="purple">$router</span>-><span class="blue">post</span>(
    <span class="green-text">'/users/store'</span>,
    <span class="green-text">'Users::store'</span>
);</pre>

                </div>


                <br>


                <div class="code-window">

                    <div class="code-header">

                        <div class="dot red"></div>
                        <div class="dot yellow"></div>
                        <div class="dot green"></div>

                        <span class="filename">
                            Welcome.php
                        </span>

                    </div>

                    <pre><span class="purple">class</span> <span class="yellow-text">Welcome</span>
    <span class="purple">extends</span> <span class="yellow-text">Controller</span>
{

    <span class="purple">public function</span> <span class="blue">index</span>()
    {
        <span class="purple">$this</span>->call->model(
            <span class="green-text">'UserModel'</span>
        );

        <span class="purple">$data</span>[<span class="green-text">'users'</span>] =
            <span class="purple">$this</span>->UserModel-><span class="blue">all</span>();

        <span class="purple">$this</span>->call-><span class="blue">view</span>(
            <span class="green-text">'welcome'</span>,
            <span class="purple">$data</span>
        );
    }
}</pre>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     PROJECT STRUCTURE
========================= -->

<section>

    <div class="wrap">

        <div class="label">
            // system structure
        </div>

        <h2 class="title">
            Raven organized.
        </h2>

        <p class="description">
            Every component has its own place.
            No unnecessary chaos.
        </p>


        <div class="structure">

            <?php

            $dirs = [

                ['app/config', '⚙'],
                ['app/controllers', '🎮'],
                ['app/helpers', '🔧'],
                ['app/libraries', '📚'],
                ['app/language', '🌐'],
                ['app/middlewares', '🛡️'],
                ['app/migrations', '🔄'],
                ['app/models', '🗄'],
                ['app/modules', '📦'],
                ['app/views', '🖼'],
                ['public/', '🌍'],
                ['runtime/', '⚡'],
                ['console/', '💻'],
                ['scheme/', '📐']

            ];

            foreach ($dirs as [$name, $icon]):
            ?>

                <div class="directory">

                    <span class="directory-icon">
                        <?php echo $icon; ?>
                    </span>

                    <?php echo $name; ?>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- =========================
     FOOTER
========================= -->

<footer>

    <div class="footer">

        <div class="meta">

            <span>
                rendered in
                <span>
                    <?php
                    echo lava_instance()
                        ->performance
                        ->elapsed_time('lavalust');
                    ?>s
                </span>
            </span>


            <span>
                memory
                <span>
                    <?php
                    echo lava_instance()
                        ->performance
                        ->memory_usage();
                    ?>
                </span>
            </span>


            <?php if(config_item('environment') === 'development'): ?>

                <span>
                    version
                    <span>
                        <?php echo config_item('version'); ?>
                    </span>
                </span>

                <span style="color:#a78bfa;">
                    ● SUPER RAVEN DEVELOPMENT
                </span>

            <?php endif; ?>

        </div>


        <div class="footer-links">

            <a
                href="https://github.com/ronmarasigan/LavaLust"
                target="_blank"
            >
                GitHub
            </a>

            <a
                href="https://lavalust.netlify.app/docs/"
                target="_blank"
            >
                Docs
            </a>

            <a
                href="https://opensource.org/licenses/MIT"
                target="_blank"
            >
                MIT License
            </a>

        </div>

    </div>

</footer>

</body>
</html>