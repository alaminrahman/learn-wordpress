<?php 
/**
 * 
 * This template for displaying the header
 * 
 */

?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>

    <header id="header_area" class="shadow-sm">
        <div class="container">
            <div class="custom_menu d-flex justify-content-between <?= get_theme_mod('alamin_menu_position', 'center_menu') ?>">
                <div class="logo">
                    <a href="<?= home_url() ?>"><img src="<?php echo get_theme_mod('alamin_logo'); ?>" alt=""></a>
                </div>

                <div class="menu">
                    <?php wp_nav_menu( array('theme_location' => 'main_menu', 'menu_id' => 'nav') ); ?>
                </div>

                <div class="get-quote">
                    <button type="button" class="btn header-btn">Get A Quote</button>
                </div>
            </div>
        </div>
    </header>

    <section id="body_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>This is archieve page</h1>
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer_area">

        <div id="copyright_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p><?= get_theme_mod('alamin_copyright_section') ?></p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    
<?php wp_footer() ?>
</body>
</html>