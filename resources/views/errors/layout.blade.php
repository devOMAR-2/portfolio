<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <title>@yield('title') | Omar Al-Farraj</title>

    <meta name="description" content="@yield('title') - Omar Al-Farraj Portfolio">
    <meta name="author" content="Omar Al-Farraj">
    <meta name="robots" content="noindex, nofollow">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    <style>
        .error-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .error-container {
            text-align: center;
            max-width: 600px;
        }

        .error-code {
            font-size: clamp(8rem, 20vw, 12rem);
            font-weight: 800;
            line-height: 1;
            background: linear-gradient(135deg, var(--accent) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .error-title {
            font-size: clamp(1.5rem, 4vw, 2.5rem);
            font-weight: 700;
            color: var(--t-bright);
            margin-bottom: 1rem;
        }

        .error-message {
            font-size: 1.1rem;
            color: var(--t-medium);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .error-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .error-icon {
            font-size: 4rem;
            color: var(--accent);
            margin-bottom: 1.5rem;
        }
    </style>

    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#021a8b">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#021a8b">
    <meta name="msapplication-navbutton-color" content="#021a8b">
</head>

<body>

    <!-- Gradient Background Start -->
    <div class="gradient-background">
        <div class="blur"></div>
        <div class="blur"></div>
        <div class="blur"></div>
    </div>
    <!-- Gradient Background End -->

    <div class="error-page">
        <div class="error-container">
            <i class="ph-bold @yield('icon', 'ph-warning') error-icon"></i>
            <div class="error-code">@yield('code')</div>
            <h1 class="error-title">@yield('title')</h1>
            <p class="error-message">@yield('message')</p>
            <div class="error-actions">
                <a class="btn btn-default btn-hover btn-hover-accent" href="{{ url('/') }}">
                    <span class="btn-caption">Back to Home</span>
                    <i class="ph-bold ph-house-simple"></i>
                </a>
                <a class="btn btn-default btn-hover btn-hover-outline" href="{{ url('/#contact') }}">
                    <span class="btn-caption">Contact Me</span>
                    <i class="ph-bold ph-envelope"></i>
                </a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/libs.min.js') }}"></script>
    <script>
        const randomX = random(-400, 400);
        const randomY = random(-200, 200);
        const randomTime = random(20, 40);
        const randomTime2 = random(5, 12);
        const randomAngle = random(-30, 150);

        const blurs = gsap.utils.toArray(".blur");
        blurs.forEach((blur) => {
            gsap.set(blur, {
                x: randomX(-1),
                y: randomX(1),
                rotation: randomAngle(-1)
            });
            moveX(blur, 1);
            moveY(blur, -1);
            rotate(blur, 1);
        });

        function rotate(target, direction) {
            gsap.to(target, randomTime2(), {
                rotation: randomAngle(direction),
                ease: Sine.easeInOut,
                onComplete: rotate,
                onCompleteParams: [target, direction * -1]
            });
        }

        function moveX(target, direction) {
            gsap.to(target, randomTime(), {
                x: randomX(direction),
                ease: Sine.easeInOut,
                onComplete: moveX,
                onCompleteParams: [target, direction * -1]
            });
        }

        function moveY(target, direction) {
            gsap.to(target, randomTime(), {
                y: randomY(direction),
                ease: Sine.easeInOut,
                onComplete: moveY,
                onCompleteParams: [target, direction * -1]
            });
        }

        function random(min, max) {
            const delta = max - min;
            return (direction = 1) => (min + delta * Math.random()) * direction;
        }
    </script>

</body>

</html>
