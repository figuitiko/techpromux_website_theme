<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 21/04/2017
 * Time: 23:42
 */

function paradiseAgency()
{
    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     *
     * copy from underscores theme
     */
    load_theme_textdomain('travel-agency', get_template_directory() . '/languages');

    // add theme support post and comment automatic feed links
    add_theme_support('automatic-feed-links');

    // enable support for post thumbnail or feature image on posts and pages
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true);
    add_image_size('square-thumbnail', 80, 80, true);
    add_image_size('midium-thumbnail', 380, 320, array('left','top'));
    add_image_size('portafolio-thumbnail', 400, 289, array('left','top'));
    add_image_size('banner-image', 920, 210, array('left', 'top'));

    // allow the use of html5 markup
    // @link https://codex.wordpress.org/Theme_Markup
    add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));

    // add support menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'bootstrap-basic'),
    ));

    // add post formats support
    add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

    // add support custom background
    add_theme_support(
        'custom-background',
        apply_filters(
            'bootstrap_basic_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => ''
            )
        )
    );

    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    register_nav_menus(array(
        'primary' => __( 'Primary Menu'),
        'secondary' => __( 'Secondary Menu'),
    ));


}
add_action('after_setup_theme', 'paradiseAgency');

function tech_agency_style()
{

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('agency', get_template_directory_uri() . '/css/agency.css');
    wp_enqueue_style('font-awesome.min', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');
    //wp_enqueue_style('blog', get_template_directory_uri() . '/css/1-col-portfolio.css');
    wp_enqueue_style('paradise-agency-style', get_stylesheet_uri());

    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array(), '3.7.0');
    wp_enqueue_script('respond-min-js', get_template_directory_uri() . '/js/respond.min.js', array(), '1.4.2');



    //wp_enqueue_script('$');



}

add_action('wp_enqueue_scripts', 'tech_agency_style');

function script_footer(){
    wp_enqueue_script('jquery');
   // wp_enqueue_script('jquery-1.11.1', get_template_directory_uri() . '/js/jquery.js', array(), '1.11.1');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.6');
    wp_enqueue_script('jquery-easing-min-js', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), '1.3');

    wp_enqueue_script('classie.js', get_template_directory_uri() . '/js/classie.js', array(), '');
    wp_enqueue_script('cbpAnimatedHeader.js', get_template_directory_uri() . '/js/cbpAnimatedHeader.min.js', array(), '1.4.2');
    //wp_enqueue_script('jqBootstrapValidation-js', get_template_directory_uri() . '/js/jqBootstrapValidation.js', array('1.3.6'), '');

   // wp_enqueue_script('contact_me.js', get_template_directory_uri() . '/js/contact_me.js', array(), '');
    wp_enqueue_script('agency.js', get_template_directory_uri() . '/js/agency.js', array(), '2.0');

}
add_action('wp_footer','script_footer');
wp_enqueue_media();

function my_admin_enqueue_scripts() {
    global $pagenow, $typenow;




    if ( ($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'portafolios' ) {

        wp_enqueue_script( 'portafolio-js',get_template_directory_uri() . '/js/portafolio-jobs.js' , array( 'jquery', 'jquery-ui-datepicker' ), '20150204', true );
       // wp_enqueue_script( 'dwwp-custom-quicktags', plugins_url( 'js/dwwp-quicktags.js', __FILE__ ), array( 'quicktags' ), '20150206', true );
        wp_enqueue_style( 'jquery-style', get_template_directory_uri() . '/css/jquery-ui.css' );

    }



}
add_action( 'admin_enqueue_scripts', 'my_admin_enqueue_scripts' );

function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="page-scroll"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');


function my_css_attributes_filter($var) {
    return is_array($var) ? array() : '';
}

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);

//adding js

//

//function paradise_quest_customize($wp_customize){
//
////----------------class wswg----------------
//    $wp_customize->add_section('question-section', array(
//        'title' => 'What We Need & What You Get'
//    ));
//    $wp_customize->add_setting('quest-setting-title', array(
//        'default' => 'What We Need'
//    ));
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'quest-control-title', array(
//        'label' => 'Title',
//        'section' => 'question-section',
//        'settings' => 'quest-setting-title'
//    )));
//    $wp_customize->add_setting('quest-setting-excert', array(
//        'default' => 'What We Need'
//    ));
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'quest-control-excert', array(
//        'label' => 'Excert',
//        'section' => 'question-section',
//        'settings' => 'quest-setting-excert',
//        'type'=>'textarea'
//
//    )));
//
//    $wp_customize->add_setting('quest-setting-content', array(
//        'default' => 'What We Need'
//    ));
//    //--- kirki-----------------------------------------------------------
//   /* $args=array('capability'    => 'edit_theme_options',
//        'option_type'   => 'theme_mod',
//    );
//    Kirki::add_config( 'paradice-kirki', $args );
//    Kirki::add_section( 'kirki-section', array(
//        'title'          => __( 'kirki section' ),
//        'description'    => __( 'Add custom CSS here' ),
//        'panel'          => '', // Not typically needed.
//        'priority'       => 160,
//        'capability'     => 'edit_theme_options',
//        'theme_supports' => '', // Rarely needed.
//    ) );
//    Kirki::add_field( 'paradice-kirki', array(
//        'settings' => 'kirki-setting-content',
//        'label'    => __( 'My control what you can help', 'translation_domain' ),
//        'section'  => 'kirki-section',
//        'type'     => 'editor',
//        'priority' => 10,
//        'default'  => 'some-default-value',
//    ) );*/
//
//
//
//    $wp_customize->add_setting('quest-setting-plus-title', array(
//        'default' => 'What We Need'
//    ));
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'quest-control-plus-title', array(
//        'label' => 'Title plus',
//        'section' => 'question-section',
//        'settings' => 'quest-setting-plus-title',
//
//    )));
//    $wp_customize->add_setting('quest-setting-plus-content', array(
//        'default' => 'What We Need'
//    ));
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'quest-control-plus-content', array(
//        'label' => 'Content plus',
//        'section' => 'question-section',
//        'settings' => 'quest-setting-plus-content',
//        'type'=>'textarea'
//
//    )));
//
//
//}
//add_action('customize_register', 'paradise_quest_customize');
//-----------classs-------





//-------------------perk section------------

//function paradise_perk_customize($wp_customize){
//    $wp_customize->add_section('perk-section', array(
//        'title' => 'Perks'
//    ));
//
//    $wp_customize->add_setting('perk-setting-amount1', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount1', array(
//        'label' => 'Amount1',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount1'
//    )));
//    $wp_customize->add_setting('perk-setting-currency1', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency1', array(
//        'label' => 'currency1',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency1'
//    )));
//    $wp_customize->add_setting('perk-setting-title1', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title1', array(
//        'label' => 'Title1',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title1'
//    )));
//    $wp_customize->add_setting('perk-setting-content1', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content1', array(
//        'label' => 'Content1',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content1',
//        'type'=>'textarea'
//    )));
//    //---------------------------------------2
//
//    $wp_customize->add_setting('perk-setting-amount2', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount2', array(
//        'label' => 'Amount2',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount2'
//    )));
//    $wp_customize->add_setting('perk-setting-currency2', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency2', array(
//        'label' => 'currency2',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency2'
//    )));
//    $wp_customize->add_setting('perk-setting-title2', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title2', array(
//        'label' => 'Title2',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title2'
//    )));
//    $wp_customize->add_setting('perk-setting-content2', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content2', array(
//        'label' => 'Content2',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content2',
//        'type'=>'textarea'
//    )));
//    //-------------------------------------3
//    $wp_customize->add_setting('perk-setting-amount3', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount3', array(
//        'label' => 'Amount3',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount3'
//    )));
//    $wp_customize->add_setting('perk-setting-currency3', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency3', array(
//        'label' => 'currency3',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency3'
//    )));
//    $wp_customize->add_setting('perk-setting-title3', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title3', array(
//        'label' => 'Title3',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title3'
//    )));
//    $wp_customize->add_setting('perk-setting-content3', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content3', array(
//        'label' => 'Content3',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content3',
//        'type'=>'textarea'
//    )));
//    //--------------------------------------------4
//    $wp_customize->add_setting('perk-setting-amount4', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount4', array(
//        'label' => 'Amount4',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount4'
//    )));
//    $wp_customize->add_setting('perk-setting-currency4', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency4', array(
//        'label' => 'currency4',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency4'
//    )));
//    $wp_customize->add_setting('perk-setting-title4', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title4', array(
//        'label' => 'Title4',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title4'
//    )));
//    $wp_customize->add_setting('perk-setting-content4', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content4', array(
//        'label' => 'Content4',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content4',
//        'type'=>'textarea'
//    )));
//    //-----------------------------------------------------5
//    $wp_customize->add_setting('perk-setting-amount5', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount5', array(
//        'label' => 'Amount5',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount5'
//    )));
//    $wp_customize->add_setting('perk-setting-currency5', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency5', array(
//        'label' => 'currency5',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency5'
//    )));
//    $wp_customize->add_setting('perk-setting-title5', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title5', array(
//        'label' => 'Title5',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title5'
//    )));
//    $wp_customize->add_setting('perk-setting-content5', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content5', array(
//        'label' => 'Content5',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content5',
//        'type'=>'textarea'
//    )));
//    //---------------------------6
//    $wp_customize->add_setting('perk-setting-amount6', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount6', array(
//        'label' => 'Amount6',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount6'
//    )));
//    $wp_customize->add_setting('perk-setting-currency6', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency6', array(
//        'label' => 'currency6',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency6'
//    )));
//    $wp_customize->add_setting('perk-setting-title6', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title6', array(
//        'label' => 'Title6',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title6'
//    )));
//    $wp_customize->add_setting('perk-setting-content6', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content6', array(
//        'label' => 'Content6',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content6',
//        'type'=>'textarea'
//    )));
//    //------------------------------7
//    $wp_customize->add_setting('perk-setting-amount7', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount7', array(
//        'label' => 'Amount7',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount7'
//    )));
//    $wp_customize->add_setting('perk-setting-currency7', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency7', array(
//        'label' => 'currency7',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency7'
//    )));
//    $wp_customize->add_setting('perk-setting-title7', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title7', array(
//        'label' => 'Title7',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title7'
//    )));
//    $wp_customize->add_setting('perk-setting-content7', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content7', array(
//        'label' => 'Content7',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content7',
//        'type'=>'textarea'
//    )));
//    //---------------------------------8
//    $wp_customize->add_setting('perk-setting-amount8', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount8', array(
//        'label' => 'Amount8',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount8'
//    )));
//    $wp_customize->add_setting('perk-setting-currency8', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency8', array(
//        'label' => 'currency8',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency8'
//    )));
//    $wp_customize->add_setting('perk-setting-title8', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title8', array(
//        'label' => 'Title8',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title8'
//    )));
//    $wp_customize->add_setting('perk-setting-content8', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content8', array(
//        'label' => 'Content8',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content8',
//        'type'=>'textarea'
//    )));
//    //----------------9
//    $wp_customize->add_setting('perk-setting-amount9', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount9', array(
//        'label' => 'Amount9',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount9'
//    )));
//    $wp_customize->add_setting('perk-setting-currency9', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency9', array(
//        'label' => 'currency9',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency9'
//    )));
//    $wp_customize->add_setting('perk-setting-title9', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title9', array(
//        'label' => 'Title9',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title9'
//    )));
//    $wp_customize->add_setting('perk-setting-content9', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content9', array(
//        'label' => 'Content9',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content9',
//        'type'=>'textarea'
//    )));
//    //---------------------------------------10
//    $wp_customize->add_setting('perk-setting-amount10', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount10', array(
//        'label' => 'Amount10',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount10'
//    )));
//    $wp_customize->add_setting('perk-setting-currency10', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency10', array(
//        'label' => 'currency10',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency10'
//    )));
//    $wp_customize->add_setting('perk-setting-title10', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title10', array(
//        'label' => 'Title10',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title10'
//    )));
//    $wp_customize->add_setting('perk-setting-content10', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content10', array(
//        'label' => 'Content10',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content10',
//        'type'=>'textarea'
//    )));
//    //---------------------------11
//    $wp_customize->add_setting('perk-setting-amount11', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount11', array(
//        'label' => 'Amount11',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount11'
//    )));
//    $wp_customize->add_setting('perk-setting-currency11', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency11', array(
//        'label' => 'currency11',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency11'
//    )));
//    $wp_customize->add_setting('perk-setting-title11', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title11', array(
//        'label' => 'Title11',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title11'
//    )));
//    $wp_customize->add_setting('perk-setting-content11', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content11', array(
//        'label' => 'Content11',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content11',
//        'type'=>'textarea'
//    )));
//    //------------12
//    $wp_customize->add_setting('perk-setting-amount12', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount12', array(
//        'label' => 'Amount12',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount12'
//    )));
//    $wp_customize->add_setting('perk-setting-currency12', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency12', array(
//        'label' => 'currency12',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency12'
//    )));
//    $wp_customize->add_setting('perk-setting-title12', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title12', array(
//        'label' => 'Title12',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title12'
//    )));
//    $wp_customize->add_setting('perk-setting-content12', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content12', array(
//        'label' => 'Content12',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content12',
//        'type'=>'textarea'
//    )));
//    //-------------------------13
//    $wp_customize->add_setting('perk-setting-amount13', array(
//        'default' => '$1'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-amount13', array(
//        'label' => 'Amount13',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-amount13'
//    )));
//    $wp_customize->add_setting('perk-setting-currency13', array(
//        'default' => '$'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-currency13', array(
//        'label' => 'currency13',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-currency13'
//    )));
//    $wp_customize->add_setting('perk-setting-title13', array(
//        'default' => 'Support'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-title13', array(
//        'label' => 'Title13',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-title13'
//    )));
//    $wp_customize->add_setting('perk-setting-content13', array(
//        'default' => 'here write the content'
//    ));
//
//    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'perk-control-content13', array(
//        'label' => 'Content13',
//        'section' => 'perk-section',
//        'settings' => 'perk-setting-content13',
//        'type'=>'textarea'
//    )));
//}
//add_action('customize_register', 'paradise_perk_customize');

/**
 * cpt
 */
require get_template_directory() . '/inc/cpt.php';

//------------------------ajax--------------------------


function my_wp_head_ajax_url()
{
    ?>
    <script>
        var ajaxurl = '<?php echo admin_url("admin-ajax.php");?>';
    </script>
    <?php
}
add_action('wp_head','my_wp_head_ajax_url');
function wp_ajax_my_contact(){
    if (isset($_POST['form'])) {
        $datas=$_POST['form'];
        foreach ($datas as $data){
            if($data['name']=='name'){
                $name=$data['value'];
        } if($data['name']=='email'){
                $email=$data['value'];
            }

            if($data['name']=='phone'){
                $phone=$data['value'];
            }
            if($data['name']=='content'){
                $content=$data['value'];
            }
        }
        $email_body='thank you for being in touch';
        $subject= 'paradise on fire';

        $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        $headers .= "Reply-To: $email";



      wp_mail($email,$subject,$email_body,$headers);
        $abe_mail='frankfigao@gmail.com';
        wp_mail($abe_mail,$subject,$content,$headers);

        $user_id = username_exists( $name );

        if ( !$user_id and email_exists($email) == false ) {
            $random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
            $userdata = array('user_login' => $name,
            'user_email'  => $email,
            'user_pass' => $random_password,
            'role' => 'subscriber'
);
             wp_insert_user( $userdata );



        } else {
            $random_password = __('User already exists.  Password inherited.');
        }




        echo 1;
    }
        wp_die();
}
add_action('wp_ajax_my_contact','wp_ajax_my_contact');
add_action('wp_ajax_nopriv_my_contact','wp_ajax_my_contact');

 function ajax_data()
{

    ?>
    <script>
        jQuery(document).ready(function () {
            jQuery('#contactForm').submit(function (event) {

                event.preventDefault();
                event.stopPropagation();
                //var ajaxurl = '/wp-admin/admin-ajax.php';
               var form = jQuery('#contactForm').serializeArray();

                jQuery.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    timeout: 5000,
                    dataType: 'html',
                    data: {action:'my_contact', form: form},
                    error: function (xml) {
                        //timeout, but no need to scare the user
                    },
                    success: function (response) {
                        console.log(response);
                        if (response == 1) {
                            jQuery('#content').after(
                                '<div  class="col-xs-12 "><span id="baddate" class="alert alert-info">Has enviado un mensaje</span></div>');
                            jQuery("#contactForm")[0].reset();

                            setTimeout(function () {
                                jQuery('#baddate').remove()
                            }, 3000);
                        }


                    }
                });
            })
        })

    </script> <?php
}
add_action('wp_footer','ajax_data');

function ourWidgetsInit() {

    register_sidebar( array(
        'name' => 'Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<div class="well">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h2>',
    ));



}

add_action('widgets_init', 'ourWidgetsInit');

/**
 * cpt
 */
require get_template_directory() . '/inc/my-taxonomy.php';
