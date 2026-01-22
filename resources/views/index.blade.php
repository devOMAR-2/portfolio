<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <title>Omar Al-Farraj | Software Engineer in Riyadh, Saudi Arabia</title>

    <meta name="description"
        content="Omar Al-Farraj - Certified Senior Laravel Developer with 7+ years of experience. Specializing in Laravel, Filament, and mobile app development. Based in Riyadh, Saudi Arabia. Available for freelance projects.">
    <meta name="keywords"
        content="omar al-farraj, software engineer, laravel developer saudi arabia, full-stack developer riyadh, freelance software engineer, php developer, filament, mobile app development, web development">
    <meta name="author" content="Omar Al-Farraj">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    <style>
        .form__flash {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            animation: slideDown 0.3s ease-out;
        }

        .form__flash--success {
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #22c55e;
        }

        .form__flash--error {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #ef4444;
        }

        .form__flash i {
            font-size: 24px;
            flex-shrink: 0;
        }

        .form__flash .flash__text {
            flex: 1;
            font-size: 15px;
            line-height: 1.5;
        }

        .form__flash .flash__close {
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            padding: 4px;
            opacity: 0.7;
            transition: opacity 0.2s;
            flex-shrink: 0;
        }

        .form__flash .flash__close:hover {
            opacity: 1;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#021a8b">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#021a8b">
    <meta name="msapplication-navbutton-color" content="#021a8b">
</head>

<body>

    <!-- Header Start -->
    <header id="header" class="header d-flex justify-content-between">

        <!-- Navigation Menu Start -->
        <div class="header__navigation">
            <nav id="menu" class="menu">
                <ul class="menu__list d-flex justify-content-start">
                    <li class="menu__item">
                        <a class="menu__link btn" href="#home">
                            <span class="menu__caption">Home</span>
                            <i class="ph-bold ph-house-simple"></i>
                        </a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link btn" href="#portfolio">
                            <span class="menu__caption">Portfolio</span>
                            <i class="ph-bold ph-squares-four"></i>
                        </a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link btn" href="#about">
                            <span class="menu__caption">About Me</span>
                            <i class="ph-bold ph-user"></i>
                        </a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link btn" href="#resume">
                            <span class="menu__caption">Resume</span>
                            <i class="ph-bold ph-article"></i>
                        </a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link btn" href="#contact">
                            <span class="menu__caption">Contact</span>
                            <i class="ph-bold ph-envelope"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Navigation Menu End -->

        <!-- Header Controls Start -->
        <div class="header__controls d-flex justify-content-end">
            <button id="color-switcher" class="color-switcher header__switcher btn" type="button" role="switch"
                aria-label="light/dark mode" aria-checked="true"></button>
            <a id="notify-trigger" class="header__trigger btn" href="mailto:hi@devomar.me?subject=Hello%20Omar">
                <span class="trigger__caption">Let's Talk</span>
                <i class="ph-bold ph-chat-dots"></i>
            </a>
        </div>
        <!-- Header Controls End -->

    </header>
    <!-- Header End -->

    <!-- Gradient Background Start -->
    <div class="gradient-background">
        <div class="blur"></div>
        <div class="blur"></div>
        <div class="blur"></div>
    </div>
    <!-- Gradient Background End -->

    <!-- Avatar Side Block Start -->
    <div id="avatar" class="avatar">
        <div class="avatar__container d-flex flex-column justify-content-lg-between">
            <!-- image and logo -->
            <div class="avatar__block">
                <div class="avatar__image">
                    <img src="{{ asset('img/logo.svg') }}" alt="Omar Al-Farraj - Software Engineer">
                </div>
            </div>
            <!-- data caption #1 -->
            <div class="avatar__block">
                <h6 style="display: flex; align-items: center; justify-content: space-between;">
                    <span>
                        <small class="top">Specialization:</small>
                        Certified Senior<br>Laravel Developer
                    </span>
                    <a href="https://verifier.certificationforlaravel.org/03fd5c30-5cd6-4364-882c-89ef53524570" target="_blank" rel="noopener" title="Verified Laravel Certification">
                        <img src="{{ asset('img/senior-laravel-developer-badge.png') }}" alt="Certified Senior Laravel Developer Badge" style="width: 45px; height: auto;">
                    </a>
                </h6>
            </div>
            <!-- data caption #2 -->
            <div class="avatar__block">
                <h6>
                    <small class="top">Based in:</small>
                    Riyadh, Saudi Arabia
                </h6>
            </div>
            <!-- socials and CTA button -->
            <div class="avatar__block">
                <div class="avatar__socials">
                    <ul class="socials-square d-flex justify-content-between">
                        <li class="socials-square__item">
                            <a class="socials-square__link btn" href="https://github.com/devomar-2" target="_blank"><i
                                    class="ph-bold ph-github-logo"></i></a>
                        </li>
                        <li class="socials-square__item">
                            <a class="socials-square__link btn" href="https://linkedin.com/in/omar-alfarraj"
                                target="_blank"><i class="ph-bold ph-linkedin-logo"></i></a>
                        </li>
                        <li class="socials-square__item">
                            <a class="socials-square__link btn" href="https://x.com/devomar_" target="_blank"><i
                                    class="ph-bold ph-x-logo"></i></a>
                        </li>
                        <li class="socials-square__item">
                            <a class="socials-square__link btn" href="https://instagram.com/devomar.me" target="_blank"><i
                                    class="ph-bold ph-instagram-logo"></i></a>
                        </li>
                        <li class="socials-square__item">
                            <a class="socials-square__link btn" href="mailto:hi@devomar.me" target="_blank"><i
                                    class="ph-bold ph-envelope"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="avatar__btnholder">
                    <a class="btn btn-default btn-fullwidth btn-hover btn-hover-accent" href="#contact">
                        <span class="btn-caption">Let's Work Together!</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Avatar Side Block End -->

    <!-- Page Content Start -->
    <div id="content" class="content">
        <div class="content__wrapper">

            <!-- Intro Section Start -->
            <section id="home" class="main intro">

                <!-- Headline Start -->
                <div id="headline" class="headline d-flex align-items-start flex-column" data-speed="1">
                    <p class="headline__subtitle animate-headline">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13px" height="13px"
                            viewBox="0 0 13 13" fill="currentColor">
                            <path fill="currentColor" d="M5.6,12.6c-0.5-0.8-0.7-2.4-1.7-3.5c-1-1-2.7-1.2-3.5-1.7C-0.1,7-0.1,6,0.4,5.6c0.8-0.5,2.3-0.6,3.5-1.8
                  C5,2.8,5.1,1.2,5.6,0.4C6-0.1,7-0.1,7.4,0.4c0.5,0.8,0.7,2.4,1.8,3.5c1.2,1.2,2.6,1.2,3.5,1.7c0.6,0.4,0.6,1.4,0,1.7
                  C11.8,7.9,10.2,8,9.1,9.1c-1,1-1.2,2.7-1.7,3.5C7,13.1,6,13.1,5.6,12.6z" />
                        </svg>
                        <span>Welcome!</span>
                    </p>
                    <h1 class="headline__title animate-headline">I'm Omar,<br>A Software Engineer</h1>
                    <div class="headline__btnholder d-flex flex-column flex-sm-row">
                        <a class="btn mobile-vertical btn-default btn-hover btn-hover-accent-mobile animate-headline"
                            href="#portfolio">
                            <span class="btn-caption">My Projects</span>
                            <i class="ph-bold ph-squares-four"></i>
                        </a>
                        <a class="btn mobile-vertical btn-default btn-hover btn-hover-outline-mobile animate-headline"
                            href="#contact">
                            <span class="btn-caption">Get In Touch</span>
                            <i class="ph-bold ph-envelope"></i>
                        </a>
                    </div>
                </div>
                <!-- Headline End -->

                <!-- Scroll Button Start -->
                <div class="rotating-btn">
                    <a href="#portfolio" class="rotating-btn__link slide-down">
                        <!-- SVG rotating text -->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                            style="enable-background:new 0 0 120 120;" xml:space="preserve" class="animate-rotation"
                            data-value="360">
                            <defs>
                                <path id="textPath"
                                    d="M110,59.5c0,27.6-22.4,50-50,50s-50-22.4-50-50s22.4-50,50-50S110,31.9,110,59.5z" />
                            </defs>
                            <g>
                                <use xlink:href="#textPath" fill="none"></use>
                                <text>
                                    <textPath xlink:href="#textPath">Scroll for More * Scroll for More * </textPath>
                                </text>
                            </g>
                        </svg>
                        <!-- arrow icon -->
                        <i class="ph-bold ph-arrow-down"></i>
                    </a>
                </div>
                <!-- Scroll Button End -->

            </section>
            <!-- Intro Section End -->

            <!-- Portfolio Section Start -->
            <section id="portfolio" class="inner inner-first portfolio">

                <!-- Content Block - H2 Section Title Start -->
                <div class="content__block section-grid-title">
                    <p class="h2__subtitle animate-in-up">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13px" height="13px"
                            viewBox="0 0 13 13" fill="currentColor">
                            <path fill="currentColor" d="M5.6,12.6c-0.5-0.8-0.7-2.4-1.7-3.5c-1-1-2.7-1.2-3.5-1.7C-0.1,7-0.1,6,0.4,5.6c0.8-0.5,2.3-0.6,3.5-1.8
                  C5,2.8,5.1,1.2,5.6,0.4C6-0.1,7-0.1,7.4,0.4c0.5,0.8,0.7,2.4,1.8,3.5c1.2,1.2,2.6,1.2,3.5,1.7c0.6,0.4,0.6,1.4,0,1.7
                  C11.8,7.9,10.2,8,9.1,9.1c-1,1-1.2,2.7-1.7,3.5C7,13.1,6,13.1,5.6,12.6z" />
                        </svg>
                        <span>Portfolio</span>
                    </p>
                    <h2 class="h2__title animate-in-up">Check out my featured projects</h2>
                </div>
                <!-- Content Block - H2 Section Title End -->

                <!-- Content Block - Works Gallery Start -->
                <div class="content__block grid-block">
                    <div class="container-fluid px-0 inner__gallery">
                        <div class="row gx-0 my-gallery" itemscope itemtype="http://schema.org/ImageGallery">

                            @forelse($projects as $project)
                                @php
                                    $thumbnail =
                                        $project->getFirstMediaUrl('projects', 'thumb') ?:
                                        'https://dummyimage.com/800x800/021a8b/ffffff';
                                    $galleryImage =
                                        $project->getFirstMediaUrl('projects', 'gallery') ?:
                                        'https://dummyimage.com/1400x1400/021a8b/ffffff';
                                @endphp
                                <!-- Works Gallery Single Item Start -->
                                <figure class="col-12 col-md-6 gallery__item grid-item animate-card-2"
                                    itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                    <a href="{{ $galleryImage }}" data-image="{{ $thumbnail }}"
                                        class="gallery__link" itemprop="contentUrl" data-size="1400x1400">
                                        <img src="{{ $thumbnail }}" class="gallery__image" itemprop="thumbnail"
                                            alt="{{ $project->title }}">
                                    </a>
                                    <figcaption class="gallery__descr" itemprop="caption description">
                                        <h5>{{ $project->title }}</h5>
                                        <div class="card__tags d-flex flex-wrap">
                                            @foreach ($project->tags as $tag)
                                                <span class="rounded-tag opposite">{{ $tag->name }}</span>
                                            @endforeach
                                        </div>
                                        <p class="small">{{ Str::limit($project->description, 150) }}</p>
                                    </figcaption>
                                </figure>
                                <!-- Works Gallery Single Item End -->
                            @empty
                                <!-- No Projects Message -->
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">Projects coming soon...</p>
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div>
                <!-- Content Block - Works Gallery End -->

            </section>
            <!-- Portfolio Section End -->

            <!-- About Section Start -->
            <section id="about" class="inner about">

                <!-- Content Block - H2 Section Title Start -->
                <div class="content__block section-grid-title">
                    <p class="h2__subtitle animate-in-up">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13px" height="13px"
                            viewBox="0 0 13 13" fill="currentColor">
                            <path fill="currentColor" d="M5.6,12.6c-0.5-0.8-0.7-2.4-1.7-3.5c-1-1-2.7-1.2-3.5-1.7C-0.1,7-0.1,6,0.4,5.6c0.8-0.5,2.3-0.6,3.5-1.8
                  C5,2.8,5.1,1.2,5.6,0.4C6-0.1,7-0.1,7.4,0.4c0.5,0.8,0.7,2.4,1.8,3.5c1.2,1.2,2.6,1.2,3.5,1.7c0.6,0.4,0.6,1.4,0,1.7
                  C11.8,7.9,10.2,8,9.1,9.1c-1,1-1.2,2.7-1.7,3.5C7,13.1,6,13.1,5.6,12.6z" />
                        </svg>
                        <span>About Me</span>
                    </p>
                    <h2 class="h2__title animate-in-up">Turning ideas into reality, one line of code at a time</h2>
                </div>
                <!-- Content Block - H2 Section Title End -->

                <!-- Content Block - Achievements Start -->
                <div class="content__block grid-block">
                    <div class="achievements d-flex flex-column flex-md-row align-items-md-stretch">
                        <!-- achievements single item -->
                        <div class="achievements__item d-flex flex-column grid-item animate-card-3">
                            <div class="achievements__card">
                                <p class="achievements__number">7+</p>
                                <p class="achievements__descr">Years of experience</p>
                            </div>
                        </div>
                        <!-- achievements single item -->
                        <div class="achievements__item d-flex flex-column grid-item animate-card-3">
                            <div class="achievements__card">
                                <p class="achievements__number">20+</p>
                                <p class="achievements__descr">Projects completed</p>
                            </div>
                        </div>
                        <!-- achievements single item -->
                        <div class="achievements__item d-flex flex-column grid-item animate-card-3">
                            <div class="achievements__card">
                                <p class="achievements__number">10+</p>
                                <p class="achievements__descr">Happy clients</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Block - Achievements End -->

                <!-- Content Block - About Me Data Start -->
                <div class="content__block grid-block block-large">
                    <div class="container-fluid p-0">
                        <div class="row g-0 justify-content-between">

                            <!-- About Me Description Start -->
                            <div class="col-12 col-xl-8 grid-item about-descr">
                                <p class="about-descr__text animate-in-up">
                                    Hey there! I'm Omar, a Certified Senior Laravel Developer based in Riyadh with over 7 years of
                                    experience crafting web and mobile applications. I enjoy building things that make a
                                    difference, whether it's a sleek admin panel, a robust API, or a mobile app that users love.
                                </p>
                                <p class="about-descr__text animate-in-up">
                                    My toolkit includes Laravel, Filament, Livewire, and mobile development technologies.
                                    I also offer technical consulting and site audits to help businesses optimize their
                                    digital presence. When I'm not coding, you'll find me exploring new technologies or
                                    helping fellow developers grow.
                                </p>
                                <div class="btn-group about-descr__btnholder animate-in-up">
                                    <a class="btn mobile-vertical btn-default btn-hover btn-hover-accent"
                                        href="#contact">
                                        <span class="btn-caption">Get In Touch</span>
                                        <i class="ph-bold ph-envelope"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- About Me Description End -->

                            <!-- About Me Information Start -->
                            <div class="col-12 col-xl-4 grid-item about-info">
                                <div class="about-info__item animate-in-up">
                                    <h6>
                                        <small class="top">Name</small>
                                        Omar Al-Farraj
                                    </h6>
                                </div>
                                <div class="about-info__item animate-in-up">
                                    <h6>
                                        <small class="top">Phone</small>
                                        <a class="text-link-bold" href="tel:+966535955354">+966 53 595 5354</a>
                                    </h6>
                                </div>
                                <div class="about-info__item animate-in-up">
                                    <h6>
                                        <small class="top">Email</small>
                                        <a class="text-link-bold"
                                            href="mailto:hi@devomar.me?subject=Hello%20Omar">hi@devomar.me</a>
                                    </h6>
                                </div>
                                <div class="about-info__item animate-in-up">
                                    <h6>
                                        <small class="top">Location</small>
                                        <a class="text-link-bold"
                                            href="https://maps.google.com/?q=Riyadh+Saudi+Arabia"
                                            target="_blank">Riyadh, Saudi Arabia</a>
                                    </h6>
                                </div>
                                <div class="about-info__item animate-in-up">
                                    <h6>
                                        <small class="top">Certification</small>
                                        <a href="https://verifier.certificationforlaravel.org/03fd5c30-5cd6-4364-882c-89ef53524570" target="_blank" rel="noopener">
                                            <img src="{{ asset('img/senior-laravel-developer-badge.png') }}"
                                                alt="Certified Senior Laravel Developer Badge"
                                                style="max-width: 100px; height: auto; margin-top: 8px;">
                                        </a>
                                    </h6>
                                </div>
                            </div>
                            <!-- About Me Information End -->

                        </div>
                    </div>
                </div>
                <!-- Content Block - About Me Data End -->

                <!-- Content Block - Services Start -->
                <div class="content__block grid-block">
                    <div class="container-fluid p-0">
                        <div class="row g-0 align-items-stretch cards">
                            <!-- services cards grid single item -->
                            <div class="col-12 col-md-6 cards__item grid-item animate-card-2">
                                <div class="cards__card d-flex flex-column">
                                    <div class="cards__descr">
                                        <h4 class="cards__title animate-in-up">Backend<br>Development</h4>
                                        <div class="cards__tags d-flex flex-wrap animate-in-up">
                                            <span class="rounded-tag tag-outline">Laravel</span>
                                            <span class="rounded-tag tag-outline">PHP</span>
                                            <span class="rounded-tag tag-outline">MySQL</span>
                                        </div>
                                        <p class="small cards__text animate-in-up">Building robust APIs, database
                                            architectures, and server-side applications with Laravel.</p>
                                    </div>
                                    <div class="cards__image d-flex animate-in-up">
                                        <img src="{{ asset('img/backend.jpg') }}"
                                            alt="Backend Development">
                                    </div>
                                </div>
                            </div>
                            <!-- services grid cards single item -->
                            <div class="col-12 col-md-6 cards__item grid-item animate-card-2">
                                <div class="cards__card d-flex flex-column">
                                    <div class="cards__descr">
                                        <h4 class="cards__title animate-in-up">Frontend<br>Development</h4>
                                        <div class="cards__tags d-flex flex-wrap animate-in-up">
                                            <span class="rounded-tag tag-outline">Livewire</span>
                                            <span class="rounded-tag tag-outline">Alpine.js</span>
                                            <span class="rounded-tag tag-outline">Tailwind</span>
                                        </div>
                                        <p class="small cards__text animate-in-up">Creating responsive and interactive
                                            user interfaces with modern frontend technologies.</p>
                                    </div>
                                    <div class="cards__image d-flex animate-in-up">
                                        <img src="{{ asset('img/frontend.jpg') }}"
                                            alt="Frontend Development">
                                    </div>
                                </div>
                            </div>
                            <!-- services grid cards single item -->
                            <div class="col-12 col-md-6 cards__item grid-item animate-card-2">
                                <div class="cards__card d-flex flex-column">
                                    <div class="cards__descr">
                                        <h4 class="cards__title animate-in-up">Admin Panels<br>& Dashboards</h4>
                                        <div class="cards__tags d-flex flex-wrap animate-in-up">
                                            <span class="rounded-tag tag-outline">Filament</span>
                                            <span class="rounded-tag tag-outline">Custom CMS</span>
                                        </div>
                                        <p class="small cards__text animate-in-up">Developing powerful admin interfaces
                                            and content management systems using Filament.</p>
                                    </div>
                                    <div class="cards__image d-flex">
                                        <img src="{{ asset('img/dashboard.jpg') }}"
                                            alt="Admin Panels">
                                    </div>
                                </div>
                            </div>
                            <!-- services grid cards single item -->
                            <div class="col-12 col-md-6 cards__item grid-item animate-card-2">
                                <div class="cards__card d-flex flex-column">
                                    <div class="cards__descr">
                                        <h4 class="cards__title animate-in-up">Technical<br>Consulting</h4>
                                        <div class="cards__tags d-flex flex-wrap animate-in-up">
                                            <span class="rounded-tag tag-outline">Site Audits</span>
                                            <span class="rounded-tag tag-outline">Code Review</span>
                                            <span class="rounded-tag tag-outline">Architecture</span>
                                        </div>
                                        <p class="small cards__text animate-in-up">Providing expert guidance on
                                            technical decisions, performance optimization, and best practices.</p>
                                    </div>
                                    <div class="cards__image d-flex animate-in-up">
                                        <img src="{{ asset('img/audit.webp') }}"
                                            alt="Technical Consulting">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Content Block - Services End -->

            </section>
            <!-- About Section End -->

            <!-- Resume Section Start -->
            <section id="resume" class="inner resume">

                <!-- Content Block - H2 Section Title Start -->
                <div class="content__block block-large">
                    <p class="h2__subtitle animate-in-up">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13px" height="13px"
                            viewBox="0 0 13 13" fill="currentColor">
                            <path fill="currentColor" d="M5.6,12.6c-0.5-0.8-0.7-2.4-1.7-3.5c-1-1-2.7-1.2-3.5-1.7C-0.1,7-0.1,6,0.4,5.6c0.8-0.5,2.3-0.6,3.5-1.8
                  C5,2.8,5.1,1.2,5.6,0.4C6-0.1,7-0.1,7.4,0.4c0.5,0.8,0.7,2.4,1.8,3.5c1.2,1.2,2.6,1.2,3.5,1.7c0.6,0.4,0.6,1.4,0,1.7
                  C11.8,7.9,10.2,8,9.1,9.1c-1,1-1.2,2.7-1.7,3.5C7,13.1,6,13.1,5.6,12.6z" />
                        </svg>
                        <span>Resume</span>
                    </p>
                    <h2 class="h2__title animate-in-up">Education and professional experience</h2>
                    <p class="h2__text animate-in-up">
                        A dedicated developer with a strong foundation in computer science and years of hands-on
                        experience
                        building web applications across various industries.
                    </p>
                </div>
                <!-- Content Block - H2 Section Title End -->

                <!-- Content Block - Education Start -->
                <div class="content__block block-large">

                    <!-- H3 Block Start -->
                    <div class="section-h3">
                        <h3 class="h3__title animate-in-up">Education</h3>
                    </div>
                    <!-- H3 Block End -->

                    <!-- Education Lines Start -->
                    <div class="container-fluid p-0 resume-lines">
                        <!-- education single item -->
                        <div class="row g-0 resume-lines__item animate-in-up">
                            <div class="col-12 col-md-2">
                                <span class="resume-lines__date animate-in-up">2023 - 2025</span>
                            </div>
                            <div class="col-12 col-md-5">
                                <h5 class="resume-lines__title animate-in-up">Bachelor's in Software Engineering</h5>
                                <p class="resume-lines__source animate-in-up">
                                    <span class="text-link-bold">TVTC</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-5">
                                <p class="small resume-lines__descr animate-in-up">Advanced studies in software
                                    architecture, system design, and modern development practices.</p>
                            </div>
                        </div>
                        <!-- education single item -->
                        <div class="row g-0 resume-lines__item animate-in-up">
                            <div class="col-12 col-md-2">
                                <span class="resume-lines__date animate-in-up">2018 - 2020</span>
                            </div>
                            <div class="col-12 col-md-5">
                                <h5 class="resume-lines__title animate-in-up">Computer Programming Diploma</h5>
                                <p class="resume-lines__source animate-in-up">
                                    <span class="text-link-bold">IPA</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-5">
                                <p class="small resume-lines__descr animate-in-up">Foundation in programming
                                    fundamentals, database management, and web development.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Education Lines End -->

                </div>
                <!-- Content Block - Education End -->

                <!-- Content Block - Experience Start -->
                <div class="content__block block-large">

                    <!-- H3 Block Start -->
                    <div class="section-h3">
                        <h3 class="h3__title animate-in-up">Work experience</h3>
                    </div>
                    <!-- H3 Block End -->

                    <!-- Experience Lines Start -->
                    <div class="container-fluid p-0 resume-lines">
                        <!-- experience single item -->
                        <div class="row g-0 resume-lines__item animate-in-up">
                            <div class="col-12 col-md-2">
                                <span class="resume-lines__date animate-in-up">2021 - Present</span>
                            </div>
                            <div class="col-12 col-md-5">
                                <h5 class="resume-lines__title animate-in-up">Software Engineer</h5>
                                <p class="resume-lines__source animate-in-up">
                                    <span class="text-link-bold">SDAIA</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-5">
                                <p class="small resume-lines__descr animate-in-up">Designing and developing enterprise
                                    applications, leading technical initiatives, and mentoring junior developers.</p>
                            </div>
                        </div>
                        <!-- experience single item -->
                        <div class="row g-0 resume-lines__item animate-in-up">
                            <div class="col-12 col-md-2">
                                <span class="resume-lines__date animate-in-up">2020 - Present</span>
                            </div>
                            <div class="col-12 col-md-5">
                                <h5 class="resume-lines__title animate-in-up">Freelance Developer</h5>
                                <p class="resume-lines__source animate-in-up">
                                    <span class="text-link-bold">Self-employed</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-5">
                                <p class="small resume-lines__descr animate-in-up">Building custom web applications,
                                    admin panels, and mobile apps for clients across various industries.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Experience Lines End -->

                </div>
                <!-- Content Block - Experience End -->

                <!-- Content Block - H3 Block Start -->
                <div class="content__block">
                    <div class="section-h3 section-h3-grid">
                        <h3 class="h3__title animate-in-up">Technologies I work with</h3>
                    </div>
                </div>
                <!-- Content Block - H3 Block End -->

                <!-- Content Block - Tools List Start -->
                <div class="content__block grid-block block-large">
                    <!-- Tools List Start -->
                    <div class="tools-cards d-flex justify-content-start flex-wrap">
                        <!-- tools single item -->
                        <div class="tools-cards__item d-flex grid-item-s animate-card-5">
                            <div class="tools-cards__card">
                                <i class="ph-bold ph-code tools-cards__icon animate-in-up"
                                    style="font-size: 2.5rem;"></i>
                                <h6 class="tools-cards__caption animate-in-up">Laravel</h6>
                            </div>
                        </div>
                        <!-- tools single item -->
                        <div class="tools-cards__item d-flex grid-item-s animate-card-5">
                            <div class="tools-cards__card">
                                <i class="ph-bold ph-file-code tools-cards__icon animate-in-up"
                                    style="font-size: 2.5rem;"></i>
                                <h6 class="tools-cards__caption animate-in-up">PHP</h6>
                            </div>
                        </div>
                        <!-- tools single item -->
                        <div class="tools-cards__item d-flex grid-item-s animate-card-5">
                            <div class="tools-cards__card">
                                <i class="ph-bold ph-file-sql tools-cards__icon animate-in-up"
                                    style="font-size: 2.5rem;"></i>
                                <h6 class="tools-cards__caption animate-in-up">MySQL</h6>
                            </div>
                        </div>
                        <!-- tools single item -->
                        <div class="tools-cards__item d-flex grid-item-s animate-card-5">
                            <div class="tools-cards__card">
                                <i class="ph-bold ph-file-html tools-cards__icon animate-in-up"
                                    style="font-size: 2.5rem;"></i>
                                <h6 class="tools-cards__caption animate-in-up">HTML5</h6>
                            </div>
                        </div>
                        <!-- tools single item -->
                        <div class="tools-cards__item d-flex grid-item-s animate-card-5">
                            <div class="tools-cards__card">
                                <i class="ph-bold ph-file-css tools-cards__icon animate-in-up"
                                    style="font-size: 2.5rem;"></i>
                                <h6 class="tools-cards__caption animate-in-up">CSS3</h6>
                            </div>
                        </div>
                        <!-- tools single item -->
                        <div class="tools-cards__item d-flex grid-item-s animate-card-5">
                            <div class="tools-cards__card">
                                <i class="ph-bold ph-file-js tools-cards__icon animate-in-up"
                                    style="font-size: 2.5rem;"></i>
                                <h6 class="tools-cards__caption animate-in-up">JavaScript</h6>
                            </div>
                        </div>
                        <!-- tools single item -->
                        <div class="tools-cards__item d-flex grid-item-s animate-card-5">
                            <div class="tools-cards__card">
                                <i class="ph-bold ph-wind tools-cards__icon animate-in-up"
                                    style="font-size: 2.5rem;"></i>
                                <h6 class="tools-cards__caption animate-in-up">Tailwind</h6>
                            </div>
                        </div>
                        <!-- tools single item -->
                        <div class="tools-cards__item d-flex grid-item-s animate-card-5">
                            <div class="tools-cards__card">
                                <i class="ph-bold ph-git-branch tools-cards__icon animate-in-up"
                                    style="font-size: 2.5rem;"></i>
                                <h6 class="tools-cards__caption animate-in-up">Git</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Tools List End -->
                </div>
                <!-- Content Block - Tools List End -->

            </section>
            <!-- Resume Section End -->

            <!-- Contact Section Start -->
            <section id="contact" class="inner contact">

                <!-- Content Block - H2 Section Title Start -->
                <div class="content__block section-title">
                    <p class="h2__subtitle  animate-in-up">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13px" height="13px"
                            viewBox="0 0 13 13" fill="currentColor">
                            <path fill="currentColor" d="M5.6,12.6c-0.5-0.8-0.7-2.4-1.7-3.5c-1-1-2.7-1.2-3.5-1.7C-0.1,7-0.1,6,0.4,5.6c0.8-0.5,2.3-0.6,3.5-1.8
                  C5,2.8,5.1,1.2,5.6,0.4C6-0.1,7-0.1,7.4,0.4c0.5,0.8,0.7,2.4,1.8,3.5c1.2,1.2,2.6,1.2,3.5,1.7c0.6,0.4,0.6,1.4,0,1.7
                  C11.8,7.9,10.2,8,9.1,9.1c-1,1-1.2,2.7-1.7,3.5C7,13.1,6,13.1,5.6,12.6z" />
                        </svg>
                        <span>Contact</span>
                    </p>
                    <h2 class="h2__title  animate-in-up">Let's build something great together!</h2>
                </div>
                <!-- Content Block - H2 Section Title End -->

                <!-- Content Block - Contact Form Start -->
                <div class="content__block grid-block block-grid-large">
                    <div class="form-container">

                        <!-- Flash Messages Start -->
                        <div class="form__flash form__flash--success" style="display: none;">
                            <i class="ph-bold ph-check-circle"></i>
                            <span class="flash__text">Thanks for your message. I'll get back as soon as
                                possible.</span>
                            <button type="button" class="flash__close" aria-label="Close">
                                <i class="ph-bold ph-x"></i>
                            </button>
                        </div>
                        <div class="form__flash form__flash--error" style="display: none;">
                            <i class="ph-bold ph-warning-circle"></i>
                            <span class="flash__text error-message">Something went wrong. Please try again.</span>
                            <button type="button" class="flash__close" aria-label="Close">
                                <i class="ph-bold ph-x"></i>
                            </button>
                        </div>
                        <!-- Flash Messages End -->

                        <!-- Contact Form Start -->
                        <form class="form contact-form" id="contact-form" autocomplete="on">
                            @csrf
                            <div class="container-fluid p-0">
                                <div class="row gx-0">
                                    <div class="col-12 col-md-6 form__item animate-in-up">
                                        <input type="text" name="name" placeholder="Your Name*" required
                                            autocomplete="name" value="{{ old('name') }}">
                                        <span class="field-error"></span>
                                    </div>
                                    <div class="col-12 col-md-6 form__item animate-in-up">
                                        <input type="text" name="company" placeholder="Company Name"
                                            autocomplete="organization" value="{{ old('company') }}">
                                        <span class="field-error"></span>
                                    </div>
                                    <div class="col-12 col-md-6 form__item animate-in-up">
                                        <input type="email" name="email" placeholder="Email Address*" required
                                            autocomplete="email" value="{{ old('email') }}">
                                        <span class="field-error"></span>
                                    </div>
                                    <div class="col-12 col-md-6 form__item animate-in-up">
                                        <input type="tel" name="phone" placeholder="Phone Number*" required
                                            autocomplete="tel" value="{{ old('phone') }}">
                                        <span class="field-error"></span>
                                    </div>
                                    <div class="col-12 form__item animate-in-up">
                                        <textarea name="message" placeholder="Your Message*" required>{{ old('message') }}</textarea>
                                        <span class="field-error"></span>
                                    </div>
                                    <div class="col-12 form__item animate-in-up">
                                        <button class="btn btn-default btn-hover btn-hover-accent" type="submit"
                                            id="submit-btn">
                                            <span class="btn-caption">Send Message</span>
                                            <i class="ph-bold ph-paper-plane-tilt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Contact Form End -->

                    </div>
                </div>
                <!-- Content Block - Contact Form End -->

                <!-- Content Block - Socials Cards Start -->
                <div class="content__block grid-block">
                    <div class="socials-cards d-flex justify-content-start flex-wrap">
                        <!-- socials item -->
                        <div class="socials-cards__item d-flex grid-item-s animate-card-5">
                            <div class="socials-cards__card">
                                <i class="ph-bold ph-github-logo"></i>
                                <a class="socials-cards__link" href="https://github.com/devomar-2"
                                    target="_blank"></a>
                            </div>
                        </div>
                        <!-- socials item -->
                        <div class="socials-cards__item d-flex grid-item-s animate-card-5">
                            <div class="socials-cards__card">
                                <i class="ph-bold ph-linkedin-logo"></i>
                                <a class="socials-cards__link" href="https://linkedin.com/in/omar-alfarraj"
                                    target="_blank"></a>
                            </div>
                        </div>
                        <!-- socials item -->
                        <div class="socials-cards__item d-flex grid-item-s animate-card-5">
                            <div class="socials-cards__card">
                                <i class="ph-bold ph-x-logo"></i>
                                <a class="socials-cards__link" href="https://x.com/devomar_" target="_blank"></a>
                            </div>
                        </div>
                        <div class="socials-cards__item d-flex grid-item-s animate-card-5">
                            <div class="socials-cards__card">
                                <i class="ph-bold ph-instagram-logo"></i>
                                <a class="socials-cards__link" href="https://instagram.com/devomar.me"
                                    target="_blank"></a>
                            </div>
                        </div>
                        <div class="socials-cards__item d-flex grid-item-s animate-card-5">
                            <div class="socials-cards__card">
                                <i class="ph-bold ph-envelope"></i>
                                <a class="socials-cards__link" href="mailto:hi@devomar.me"
                                    target="_blank"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Block - Socials Cards End -->

                <!-- Content Block - Teaser Start -->
                <div class="content__block">
                    <div class="teaser">
                        <p class="teaser__text animate-in-up">Want to know more about me, discuss a project or just say
                            hello?
                            <a class="text-link-bold" href="mailto:hi@devomar.me?subject=Hello%20Omar">Drop me a
                                line</a>
                            and I'll get back as soon as possible.
                        </p>
                    </div>
                </div>
                <!-- Content Block - Teaser End -->

                <!-- Content Block - Contact Data Start -->
                <div class="content__block">
                    <div class="container-fluid p-0 contact-lines animate-in-up">
                        <div class="row g-0 contact-lines__item">
                            <!-- data item -->
                            <div class="col-12 col-md-4 contact-lines__data">
                                <p class="contact-lines__title animate-in-up">Location</p>
                                <p class="contact-lines__text animate-in-up">
                                    <a class="text-link-bold" href="https://maps.google.com/?q=Riyadh+Saudi+Arabia"
                                        target="_blank">Riyadh, Saudi Arabia</a>
                                </p>
                            </div>
                            <!-- data item -->
                            <div class="col-12 col-md-4 contact-lines__data">
                                <p class="contact-lines__title animate-in-up">Phone</p>
                                <p class="contact-lines__text animate-in-up">
                                    <a class="text-link-bold" href="tel:+966535955354">+966 53 595 5354</a>
                                </p>
                            </div>
                            <!-- data item -->
                            <div class="col-12 col-md-4 contact-lines__data">
                                <p class="contact-lines__title animate-in-up">Email</p>
                                <p class="contact-lines__text animate-in-up">
                                    <a class="text-link-bold"
                                        href="mailto:hi@devomar.me?subject=Hello%20Omar">hi@devomar.me</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Block - Contact Data End -->

            </section>
            <!-- Contact Section End -->

        </div>
    </div>
    <!-- Page Content End -->

    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe.
      It's a separate element, as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
            <!-- don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close link-s" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share link-s" title="Share"></button>

                    <button class="pswp__button pswp__button--fs link-s" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom link-s" title="Zoom in/out"></button>

                    <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader-active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left link-s" title="Previous (arrow left)"></button>

                <button class="pswp__button pswp__button--arrow--right link-s" title="Next (arrow right)"></button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>

    <!-- Load Scripts Start -->
    <script src="{{ asset('js/libs.min.js') }}"></script>
    <script>
        const randomX = random(-400, 400);
        const randomY = random(-200, 200);
        const randomDelay = random(0, 50);
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/gallery-init.js') }}"></script>

    <!-- Contact Form Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contact-form');
            const submitBtn = document.getElementById('submit-btn');
            const successFlash = document.querySelector('.form__flash--success');
            const errorFlash = document.querySelector('.form__flash--error');

            // Close button handlers for flash messages
            document.querySelectorAll('.flash__close').forEach(btn => {
                btn.addEventListener('click', function() {
                    this.closest('.form__flash').style.display = 'none';
                });
            });

            function showFlash(element, message, autoHide = true) {
                // Hide any existing flash messages
                successFlash.style.display = 'none';
                errorFlash.style.display = 'none';

                // Update message and show
                element.querySelector('.flash__text').textContent = message;
                element.style.display = 'flex';

                // Scroll to flash message
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest'
                });

                // Auto-hide after 5 seconds
                if (autoHide) {
                    setTimeout(() => {
                        element.style.display = 'none';
                    }, 5000);
                }
            }

            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Clear previous errors
                document.querySelectorAll('.field-error').forEach(el => el.textContent = '');
                successFlash.style.display = 'none';
                errorFlash.style.display = 'none';

                // Disable submit button
                submitBtn.disabled = true;
                submitBtn.querySelector('.btn-caption').textContent = 'Sending...';

                try {
                    const formData = new FormData(form);
                    const response = await fetch('{{ route('contact.store') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content,
                            'Accept': 'application/json',
                        },
                        body: formData
                    });

                    const data = await response.json();

                    if (response.ok && data.success) {
                        // Clear the form
                        form.reset();
                        // Show success flash message
                        showFlash(successFlash, data.message ||
                            'Thanks for your message. I\'ll get back as soon as possible.');
                    } else if (response.status === 422) {
                        // Validation errors
                        const errors = data.errors || {};
                        for (const [field, messages] of Object.entries(errors)) {
                            const input = form.querySelector(`[name="${field}"]`);
                            if (input) {
                                const errorSpan = input.parentElement.querySelector('.field-error');
                                if (errorSpan) {
                                    errorSpan.textContent = messages[0];
                                    errorSpan.style.color = '#ef4444';
                                    errorSpan.style.fontSize = '12px';
                                    errorSpan.style.marginTop = '4px';
                                    errorSpan.style.display = 'block';
                                }
                            }
                        }
                    } else {
                        throw new Error(data.message || 'Something went wrong');
                    }
                } catch (error) {
                    showFlash(errorFlash, error.message, false);
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.querySelector('.btn-caption').textContent = 'Send Message';
                }
            });
        });
    </script>
    <!-- Load Scripts End -->

</body>

</html>
