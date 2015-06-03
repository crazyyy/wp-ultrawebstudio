<?php global $wp_locale;
if (isset($wp_locale)) {
	$wp_locale->text_direction = 'ltr';
} ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset') ?>" />
<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
<!-- Created by Artisteer v4.1.0.59861 -->
<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
remove_action('wp_head', 'wp_generator');
if (is_singular() && get_option('thread_comments')) {
	wp_enqueue_script('comment-reply');
}
wp_head();
?>
</head>
<body <?php body_class(); ?>>

<div id="my-main">
    <div class="my-sheet clearfix">

      <header class="my-header">
        <div class="logo">
            <?php if ( is_front_page() && is_home() ){ } else { ?>
                <a href="<?php echo home_url(); ?>">
            <?php  } ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>" class="logo-img">
            <?php if ( is_front_page() && is_home() ){
            } else { ?>
                </a>
            <?php } ?>
        </div>
        <!-- /logo -->

        <nav class="my-nav">
        <?php
          echo theme_get_menu(array(
              'source' => theme_get_option('theme_menu_source'),
              'depth' => theme_get_option('theme_menu_depth'),
              'menu' => 'primary-menu',
              'class' => 'my-hmenu'
            )
          );
        ?>
        </nav>

        <ul class="phone-nav">
          <li><a href="<?php echo home_url(); ?>/contacts.htm">Контакты</a></li>
          <li><a class="eModal-1" href="">Обратный звонок</a></li>
          <li><a href="tel:+74951112211">+7 (495) 1112211</a></li>
        </ul><!-- phone-nav -->

      </header>

<div class="my-layout-wrapper">
    <div class="my-content-layout">
        <div class="my-content-layout-row">
            <div class="my-layout-cell my-content">
