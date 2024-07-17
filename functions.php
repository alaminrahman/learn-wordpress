<?php 
/**
 * My Theme Function
 */

 // Theme Title
 add_theme_support( 'title-tag' );

 // Theme CSS and Jquery File calling
 function css_js_file_calling() 
 {
    wp_enqueue_style( 'alamin-style', get_stylesheet_uri());
    wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), '5.2.3', 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom');

    //Jquery
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.bundle.min.js', array(), '5.2.3', true);
    wp_enqueue_script('main', get_template_directory_uri().'/jsmain.js', array(), '1.0.0', true);

}

 add_action('wp_enqueue_scripts', 'css_js_file_calling');

 // Google font 
 function alamin_add_google_fonts() 
 {
    wp_enqueue_style('alamin_google_font', 'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap', false);

 }

 add_action('wp_enqueue_scripts', 'alamin_add_google_fonts');


 //Theme Function
 function alamin_customizer_register($wq_customize) 
 {

    //Header Menu
    $wq_customize->add_section('header_area', array(
        'title' => __('Header Area', 'alamin'),
        'description' => 'You can update logo from here'
    ));

    $wq_customize->add_setting('alamin_logo', array(
        'default' => get_bloginfo('template_directory') . '/img/logo.png',
    ));

    $wq_customize->add_control(new WP_Customize_Image_Control($wq_customize, 'alamin_logo', array(
        'label' => 'Logo Upload',
        'description' => 'Update your logo',
        'setting' => 'alamin_logo',
        'section' => 'header_area'
    )));

    // Menu Position
    $wq_customize->add_section('alamin_menu_option', array(
        'title' => __('Menu Position Option', 'alamin'),
        'description' => 'You can update menu position from here'
    ));

    $wq_customize->add_setting('alamin_menu_position', array(
        'default' => 'center_menu',
    ));

    /**
     * Here not need setting property
     */

    $wq_customize->add_control('alamin_menu_position', array(
        'label' => 'Menu Position',
        'description' => 'Update your logo',
        'section' => 'alamin_menu_option',
        'type' => 'radio', 
        'choices' => array(
            'left_menu' => 'Left Menu',
            'center_menu' => 'Center Menu',
            'right_menu' => 'Right Menu',
        ),
    ));

    // Footer Area
    $wq_customize->add_section('alamin_footer_option', array(
        'title' => __('Footer Option', 'alamin'),
        'description' => 'You can update footer setting from here'
    ));

    $wq_customize->add_setting('alamin_copyright_section', array(
        'default' => '&copy; Copyright '.date("Y"). ' | Metricalo',
    ));

    $wq_customize->add_control('alamin_copyright_section', array(
        'label' => 'Copyright Text',
        'description' => 'Update your copyright text',
        'section' => 'alamin_footer_option',
    ));

 }

 add_action('customize_register', 'alamin_customizer_register');

 // Menu Register

 register_nav_menu( 'main_menu', __('Main Menu', 'alaminMenu'));

 // Walker Menu
 function alamin_nav_description($item_output, $item, $depth, $args)
 {
    if(!empty($item->description)){
        $item_output = str_replace($args-> link_after . '</a>', '<span class="walker_nav">'
         . $item->description . 
         '</span>'
         . $args->link_after . '</a>', $item_output
        );
    }

    return $item_output;

 }

 add_filter('walker_nav_menu_start_el', 'alamin_nav_description', 10, 4);