<?php include "ayar.php"; ?>
<!doctype html>
<html lang="tr">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo $_SERVER['HTTPS_HOST'] ?>/" />
    <title><?=$sirketismi?></title>
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="<?php echo $site; ?>/panel/uploads/settings_v/32x32/<?php echo $favicon; ?>" sizes="32x32">
    <link rel="apple-touch-icon" href="<?php echo $site; ?>/panel/uploads/settings_v/32x32/<?php echo $favicon; ?>">

    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="author" content="<?php echo $sirketismi; ?>">

    <link rel="stylesheet" href="assets/css/plugins.css">

    <link rel="stylesheet" href="assets/css/iconplugins.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" href="assets/css/theme-dark.css">

    <link rel="stylesheet" href="uyari/sweetalert2.min.css">

    <link href="css/lightbox.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>

        @media (max-width: 767px) {
            .mo {
                display: none !important;
            }
        }
        @media (min-width: 767px) {
            .ma {
                display: none !important;
            }
        }

    </style>
    <?=$headerkod?>

</head>
<body>

<div id="preloader">
    <div id="preloader-area">
        <div class="spinner"></div>
        <div class="spinner"></div>
        <div class="spinner"></div>
    </div>
    <div class="preloader-section preloader-left"></div>
    <div class="preloader-section preloader-right"></div>
</div>


<header class="top-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-9">
                <div class="header-left">
                    <ul>
                        <li>
                            <i class="flaticon-email"></i>
                            <a href="mailto:<?=$email?>"><span class="__cf_email__"><?=$email?></span></a>
                        </li>
                        <li>
                            <i class="flaticon-telephone"></i>
                            <a href="tel:<?=$tel1?>"><?=$tel1?></a>
                        </li>
                        <li>
                            <i class="fa fa-map"></i>
                            <?=strip_tags($adres)?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-3">
                <div class="header-right">
                    <ul class="social-links">
                        <?php if (!empty($facebook)){?>
                            <li><a href="<?=$facebook?>"><i class="fab fa-facebook-f"></i></a></li>
                        <?php } ?>
                        <?php if (!empty($instagram)){?>
                            <li><a href="<?=$instagram?>"><i class="fab fa-instagram"></i></a></li>
                        <?php } ?>
                        <?php if (!empty($youtube)){?>
                            <li><a href="<?=$youtube?>"><i class="fab fa-youtube"></i></a></li>
                        <?php } ?>
                        <?php if (!empty($twitter)){?>
                            <li><a href="<?=$twitter?>"><i class="fab fa-twitter"></i></a></li>
                        <?php } ?>
                        <?php if (!empty($google)){?>
                            <li><a href="<?=$google?>"><i class="fab fa-google"></i></a></li>
                        <?php } ?>
                        <?php if (!empty($linkedin)){?>
                            <li><a href="<?=$linkedin?>"><i class="fab fa-linkedin"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="navbar-area naon-area">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="index.html">
                        <img style="height: 57px;width: 100%;"  src="<?php echo $site; ?>/panel/uploads/settings_v/1280x720/<?php echo $logo; ?>" class="logo-one" alt="<?php echo $sirketismi; ?>" title="<?php echo $sirketismi; ?>">
                        <img style="height: 57px;width: 100%;" src="<?php echo $site; ?>/panel/uploads/settings_v/1280x720/<?php echo $beyazlogo; ?>" class="logo-two" alt="<?php echo $sirketismi; ?>" title="<?php echo $sirketismi; ?>">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav nav-area">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="index.html">
                    <img style="height: 57px;"  src="<?php echo $site; ?>/panel/uploads/settings_v/1280x720/<?php echo $logo; ?>" class="logo-one" alt="<?php echo $sirketismi; ?>" title="<?php echo $sirketismi; ?>">
                    <img style="height: 57px;" src="<?php echo $site; ?>/panel/uploads/settings_v/1280x720/<?php echo $beyazlogo; ?>" class="logo-two" alt="<?php echo $sirketismi; ?>" title="<?php echo $sirketismi; ?>">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <?php include "includes/menu.php"; ?>
                    <div class="others-options d-flex align-items-center">

                    </div>
                    <div class="mobile-nav">
                        <div class="mobile-other d-flex align-items-center">

                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>