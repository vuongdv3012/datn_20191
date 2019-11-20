<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Center_for_Data_and_Computation_Technologies
 */

?>
<?php
    $text1 = 'Đăng ký';
    $text2 = 'Đăng nhập';
    $text3 = 'Tài khoản';
    $text4 = 'Tìm kiếm';
    $url1 = '/?page_id=295';
    $url2 = '/?page_id=299';
    if (isset($_GET['lang']) && $_GET['lang'] == 'en') {
        $text1 = 'Registration';
        $text2 = 'Login';
        $text3 = 'My Account';
        $text4 = 'Search';
        $url1 = '/?page_id=535';
        $url2 = '/?page_id=466';
    }
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/vendor/bootstrap.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/1.js"></script>
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/vendor/bootstrap.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/vendor/font-awesome.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/1.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
    $logo = get_theme_mod('custom_logo');
    $custom_logo_up = wp_get_attachment_image_src($logo, 'full');
?>
    <div class="thanhcc text-xs-center text-sm-left wow bounceInDown">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <a href="<?php echo $url1; ?>" class="cctop">
                        <i class="fa fa-sign-in"></i>
                        <?php echo $text1; ?>
                    </a>
                    <a href="<?php echo $url2; ?>" class="cctop">
                        <?php echo $text3; ?>
                    </a>
                    <?php pll_the_languages(
                        array(
                            'show_flags' => 1,
                            //'dropdown' => 1
                        )
                    ); ?>
                </div>
                <div class="col-sm-6">
                    <div class="text-xs-center text-sm-left float-sm-right">
                        <input type="text" class="form-control tim" placeholder="<?php echo $text4; ?>">
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- Thanh công cụ -->
    <div class="menu-top wow bounceInUp">
        <nav class="navbar navbar-light">
          <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
          </button>
          <div class="collapse navbar-toggleable-md" id="exCollapsingNavbar2">
            <a class="navbar-brand" href="#"><img src="<?php echo $custom_logo_up[0]; ?>" alt=""></a>

            <!-- Lấy dữ liệu menu từ woocommer -->
            <?php wp_nav_menu(array('menu_class' => 'nav navbar-nav')); ?>
            
          </div>
        </nav>
    </div> <!-- Div menu top -->
