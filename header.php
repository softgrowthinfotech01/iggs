<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $pageTitle ?? 'Indira Gandhi School Chandrapur'; ?></title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    ?>

    <header class="igs-header border-b-2 border-[#AE1C21]" id="igsHeader">

        <!-- TOP BAR -->
        <div class="igs-topbar">
            <div class="igs-container igs-topbar-inner">

                <p>
                    <i class="fa-solid fa-location-dot"></i>
                    Chandrapur, Maharashtra<br>

                </p>

                <p>
                    <i class="fa-solid fa-phone"></i>
                    +91 7775883933
                </p>

                <p>
                    <i class="fa-solid fa-envelope"></i>
                    indiragandhigardenschool2023@gmail.com
                </p>

                <p>
                    <i class="fa-solid fa-medal"></i>
                    CBSE AFF. No.1130291
                </p>

            </div>
        </div>

        <!-- NAVBAR -->
        <nav class="igs-navbar ">

            <div class="igs-container igs-nav-inner gap-10">

                <!-- LOGO -->
                <a href="home" class="igs-logo flex-shrink-0">
                    <span class="logo bg-white w-12 h-12"> <img src="images/IG_logo_transparent.png    " alt="">
                    </span>

                    <span class="igs-logo-text">
                        <strong>Indira Gandhi Garden</strong>
                        <small>School Chandrapur</small>
                    </span>

                </a>

                <!-- MENU BUTTON -->
                <button class="igs-menu-btn" id="igsMenuBtn" type="button" aria-label="Open Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- MENU -->
                <div class="igs-menu flex items-center   whitespace-nowrap" id="igsMenu">
                    <a class="<?= $currentPage == 'home.php' ? 'active' : '' ?>" href="home">
                        Home
                    </a>

                    <a class="<?= $currentPage == 'about.php' ? 'active' : '' ?>" href="about">
                        About
                    </a>

                    <a class="<?= $currentPage == 'academics.php' ? 'active' : '' ?>" href="academics">
                        Academics
                    </a>

                    <a class="<?= $currentPage == 'admission.php' ? 'active' : '' ?>" href="admission">
                        Admission
                    </a>

                    <a class="<?= $currentPage == 'gallery.php' ? 'active' : '' ?>" href="gallery">
                        Gallery
                    </a>

                    <a class="<?= $currentPage == 'result.php' ? 'active' : '' ?>" href="result">
                        Result
                    </a>

                    <a class="<?= $currentPage == 'contact.php' ? 'active' : '' ?>" href="contact">
                        Contact
                    </a>

                    <a class="<?= $currentPage == 'mandatory_public_disclosure.php' ? 'active' : '' ?>"
                        href="mandatory_public_disclosure.php">
                        Mandatory&nbsp;Public&nbsp;Disclosure
                    </a>
                    <!-- <a class="igs-nav-cta" href="admission">
                    Apply Now
                    <i class="fa-solid fa-arrow-right"></i>
                </a> -->

                </div>

            </div>

        </nav>

    </header>