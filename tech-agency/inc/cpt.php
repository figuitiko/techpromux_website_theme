<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 27/04/2017
 * Time: 05:57 PM
 */
//--------------------------------team----------------------------------------
function create_team_post_type() {
    register_post_type( 'team',
        array(
            'labels' => array(
                'name' => 'Team',
                'singular_name' => 'Team',
                'add_new' => 'Agregar Nueva',
                'add_new_item' => 'Agregar Nuevas Team',
                'edit_item' => 'Edit Team',
                'new_item' => 'Nuevo Team',
                'view_item' => 'Ver Team',
                'search_items' => 'Buscar Perfiles',
                'not_found' =>  'Nada encontrado',
                'not_found_in_trash' => 'Nada encontrado en la basura',
                'parent_item_colon' => ''
            ),

            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'menu_icon' => 'dashicons-universal-access',
            'rewrite' => array('slug'=>'team','with_front'=>FALSE),
            'capability_type' => 'post',
            'hierarchical' => true,
            'has_archive'=>true,
            'menu_position' => null,
            'supports' => array('title','editor','thumbnail','excerpt','post‐formats','author'),
            'show_in_rest' => true,
            'rest_base'          => 'books-api',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'taxonomies'          => array( 'habilidad'),

        )
    );
}
add_action( 'init', 'create_team_post_type' );

function add_team_meta_boxes() {
    add_meta_box("team_services_meta", "Datos", "add_contact_services_team_meta_box", "Team", "normal", "low");
}
function add_contact_services_team_meta_box()
{
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'team_nonce' );
    $team_meta = get_post_meta( $post->ID );
    //$custom = get_post_custom( $post->ID );
    ?>
    <ul class="nav nav-pills">
        <li>
            <p>
                <label>Role</label><br />

                <input type="text" size="50%" name="role" value="<?php if ( ! empty ( $team_meta['role'] ) ) echo esc_attr( $team_meta['role'][0] ); ?>">
            </p>
        </li>
        <li>
            <p>
                <label>Facebook Profile</label><br />

                <input type="text" size="50%" name="fb" value="<?php if ( ! empty ( $team_meta['fb'] ) ) echo esc_attr( $team_meta['fb'][0] ); ?>">
            </p>
        </li>
        <li>
            <p>
                <label>twitter Profile</label><br />

                <input type="text" size="50%" name="tw" value="<?php if ( ! empty ( $team_meta['tw'] ) ) echo esc_attr( $team_meta['tw'][0] ); ?>">
            </p>
        </li>
        <li>
            <p>
                <label>linkedin Profile</label><br />

                <input type="text" size="50%" name="lk" value="<?php if ( ! empty ( $team_meta['lk'] ) ) echo esc_attr( $team_meta['lk'][0] ); ?>">
            </p>
        </li>
        <li>
            <p>
                <label>instagram Profile</label><br />

                <input type="text" size="50%" name="in" value="<?php if ( ! empty ( $team_meta['in'] ) ) echo esc_attr( $team_meta['in'][0] ); ?>">
            </p>

        </li>
        <li>
            <p>
                <label>Youtube channel</label><br />

                <input type="text" size="50%" name="yt" value="<?php if ( ! empty ( $team_meta['yt'] ) ) echo esc_attr( $team_meta['yt'][0] ); ?>">
            </p>
        </li>
        <li>
            <p>
                <label>Pinterest</label><br />

                <input type="text" size="50%" name="pt" value="<?php if ( ! empty ( $team_meta['yt'] ) ) echo esc_attr( $team_meta['yt'][0] ); ?>">
            </p>
        </li>
        <li>
            <p>
                <label>Email</label><br />

                <input type="text" size="50%" name="em" value="<?php if ( ! empty ( $team_meta['em'] ) ) echo esc_attr( $team_meta['em'][0] ); ?>">
            </p>
        </li>

    </ul>
    <?php
}
/**
 * Save custom field data when creating/updating posts
 */
function save_team_custom_fields($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'team_nonce' ] ) && wp_verify_nonce( $_POST[ 'team_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if ( isset( $_POST[ 'role' ] ) ) {
        update_post_meta( $post_id, 'role', sanitize_text_field( $_POST[ 'role' ] ) );
    }
    if ( isset( $_POST[ 'fb' ] ) ) {
        update_post_meta( $post_id, 'fb', sanitize_text_field( $_POST[ 'fb' ] ) );
    }
    if ( isset( $_POST[ 'tw' ] ) ) {
        update_post_meta( $post_id, 'tw', sanitize_text_field( $_POST[ 'tw' ] ) );
    }
    if ( isset( $_POST[ 'lk' ] ) ) {
        update_post_meta( $post_id, 'lk', sanitize_text_field( $_POST[ 'lk' ] ) );
    }
    if ( isset( $_POST[ 'in' ] ) ) {
        update_post_meta( $post_id, 'lk', sanitize_text_field( $_POST[ 'in' ] ) );
    }
    if ( isset( $_POST[ 'yt' ] ) ) {
        update_post_meta( $post_id, 'yt', sanitize_text_field( $_POST[ 'yt' ] ) );
    }
    if ( isset( $_POST[ 'pt' ] ) ) {
        update_post_meta( $post_id, 'pt', sanitize_text_field( $_POST[ 'pt' ] ) );
    }
    if ( isset( $_POST[ 'em' ] ) ) {
        update_post_meta( $post_id, 'em', sanitize_text_field( $_POST[ 'em' ] ) );
    }



}
add_action( 'admin_init', 'add_team_meta_boxes' );
add_action( 'save_post_team', 'save_team_custom_fields' );

//----------------------------------------------------------servicios----------------------------

function create_servicios_post_type() {
    register_post_type( 'servicios',
        array(
            'labels' => array(
                'name' => 'servicios',
                'singular_name' => 'Servicio',
                'add_new' => 'Agregar Nuevo',
                'add_new_item' => 'Agregar Nuevos servicios',
                'edit_item' => 'Edit Servicio',
                'new_item' => 'Nuevo Servicio',
                'view_item' => 'Ver Servicio',
                'search_items' => 'Buscar Perfiles',
                'not_found' =>  'Nada encontrado',
                'not_found_in_trash' => 'Nada encontrado en la basura',
                'parent_item_colon' => ''
            ),

            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'menu_icon' => 'dashicons-admin-tools',
            'rewrite' => array('slug'=>'servicios','with_front'=>FALSE),
            'capability_type' => 'post',
            'hierarchical' => true,
            'has_archive'=>true,
            'menu_position' => null,
            'supports' => array('title','editor','thumbnail','excerpt','post‐formats','author'),
            'taxonomies'          =>  array( 'category'),

        )
    );
}
add_action( 'init', 'create_servicios_post_type' );

function add_servicios_meta_boxes() {
    add_meta_box("servicios_services_meta", "Datos", "add_contact_services_servicios_meta_box", "servicios", "normal", "low");
}
function add_contact_services_servicios_meta_box()
{
    global $post;
    //$custom = get_post_custom( $post->ID );
    wp_nonce_field( basename( __FILE__ ), 'servicios_nonce' );
    $services_meta = get_post_meta( $post->ID );
    ?>
    <ul class="nav nav-pills">
        <li>
            <p>
                <label>icono</label><br />

                <input type="text" size="50%" name="icono" value="<?php if ( ! empty ( $services_meta['icono'] ) ) echo esc_attr( $services_meta['icono'][0] ); ?>">
            </p>
        </li>

    </ul>
    <?php
}

function save_servicios_custom_fields($post_id)
{


    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'servicios_nonce' ] ) && wp_verify_nonce( $_POST[ 'servicios_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'icono' ] ) ) {
        update_post_meta( $post_id, 'icono', sanitize_text_field( $_POST[ 'icono' ] ) );
    }

}
add_action( 'admin_init', 'add_servicios_meta_boxes' );
add_action( 'save_post_servicios', 'save_servicios_custom_fields' );

//--------------------------portafolios-------------------------------------------------------------------

function create_portafolios_post_type() {
    register_post_type( 'portafolios',
        array(
            'labels' => array(
                'name' => 'Portafolios',
                'singular_name' => 'Portafolio',
                'add_new' => 'Agregar Nuevo',
                'add_new_item' => 'Agregar Nuevos portafolios',
                'edit_item' => 'Edit Portafolio',
                'new_item' => 'Nuevo Portafolio',
                'view_item' => 'Ver Portafolio',
                'search_items' => 'Buscar Perfiles',
                'not_found' =>  'Nada encontrado',
                'not_found_in_trash' => 'Nada encontrado en la basura',
                'parent_item_colon' => ''
            ),

            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'menu_icon' => 'dashicons-products',
            'rewrite' => array('slug'=>'portafolios','with_front'=>FALSE),
            'capability_type' => 'post',
            'hierarchical' => true,
            'has_archive'=>true,
            'menu_position' => null,
            'supports' => array('title','editor','thumbnail','excerpt','post‐formats','author'),
            'taxonomies'          =>  array( 'category'),

        )
    );
}
add_action( 'init', 'create_portafolios_post_type' );

function add_portafolios_meta_boxes() {
    add_meta_box("servicios_services_meta", "Datos", "add_contact_services_portafolios_meta_box", "portafolios", "normal", "low");
}
function add_contact_services_portafolios_meta_box()
{
    global $post;
    //$custom = get_post_custom( $post->ID );
    wp_nonce_field( basename( __FILE__ ), 'portafolios_nonce' );
    $portafolios_meta = get_post_meta( $post->ID );

     ?>
    <ul class="nav nav-pills">
        <li>
            <p>
                <label>Subheading</label><br />

                <input type="text" size="50%" name="sub_heading" value="<?php if ( ! empty ( $portafolios_meta['sub_heading'] ) ) echo esc_attr( $portafolios_meta['sub_heading'][0] ); ?>">
            </p>
        </li>
        <li>
            <p>
                <label>Link</label><br />

                <input type="text" size="50%" name="link" value="<?php if ( ! empty ( $portafolios_meta['link'] ) ) echo esc_attr( $portafolios_meta['link'][0] ); ?>">
            </p>
        </li>
        <li>
            <p>
                <label>Fecha</label><br />

                <input type="text" size=10 class=" datepicker" name="date" id="date" value="<?php if ( ! empty ( $portafolios_meta['date'] ) ) echo esc_attr( $portafolios_meta['date'][0] ); ?>"/>
            </p>
        </li>
        <li>
            <p>
                <label>Cliente</label><br />

                <input type="text" size=50%  name="cliente" id="cliente" value="<?php if ( ! empty ( $portafolios_meta['cliente'] ) ) echo esc_attr( $portafolios_meta['cliente'][0] ); ?>"/>
            </p>
        </li>




    </ul>
    <?php

}

function save_portafolios_custom_fields($post_id)
{


    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'portafolios_nonce' ] ) && wp_verify_nonce( $_POST[ 'portafolios_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'sub_heading' ] ) ) {
        update_post_meta( $post_id, 'sub_heading', sanitize_text_field( $_POST[ 'sub_heading' ] ) );
    }
    if ( isset( $_POST[ 'link' ] ) ) {
        update_post_meta( $post_id, 'link', sanitize_text_field( $_POST[ 'link' ] ) );
    }
    if ( isset( $_POST[ 'date' ] ) ) {
        update_post_meta( $post_id, 'date', sanitize_text_field( $_POST[ 'date' ] ) );
    }
    if ( isset( $_POST[ 'cliente' ] ) ) {
        update_post_meta( $post_id, 'cliente', sanitize_text_field( $_POST[ 'cliente' ] ) );
    }

}
add_action( 'admin_init', 'add_portafolios_meta_boxes' );
add_action( 'save_post_portafolios', 'save_portafolios_custom_fields' );

//---------------------------cursos--------------------------------------------------------------

function create_cursos_post_type() {
    register_post_type( 'cursos',
        array(
            'labels' => array(
                'name' => 'Cursos',
                'singular_name' => 'Curso',
                'add_new' => 'Agregar Nuevo',
                'add_new_item' => 'Agregar Nuevos Curso',
                'edit_item' => 'Edit Curso',
                'new_item' => 'Nuevo Curso',
                'view_item' => 'Ver Curso',
                'search_items' => 'Buscar Curso',
                'not_found' =>  'Nada encontrado',
                'not_found_in_trash' => 'Nada encontrado en la basura',
                'parent_item_colon' => ''
            ),

            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'menu_icon' => 'dashicons-book-alt',
            'rewrite' => array('slug'=>'cursos','with_front'=>FALSE),
            'capability_type' => 'post',
            'hierarchical' => true,
            'has_archive'=>true,
            'menu_position' => null,
            'supports' => array('title','editor','thumbnail','excerpt','post‐formats','author'),
            'taxonomies'          =>  array( 'category'),

        )
    );
}
add_action( 'init', 'create_cursos_post_type' );

function add_cursos_meta_boxes() {
    add_meta_box("servicios_services_meta", "Datos", "add_contact_services_cursos_meta_box", "cursos", "normal", "low");
}
function add_contact_services_cursos_meta_box()
{
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'cursos_nonce' );
    $cursos_meta = get_post_meta( $post->ID );
    //$custom = get_post_custom( $post->ID );
    ?>
    <ul class="nav nav-pills">
        <li>
            <p>
                <label>Subheading</label><br />

                <input type="text" size="50%" name="sub_heading_cursos" value="<?php if ( ! empty ( $cursos_meta['sub_heading_cursos'] ) ) echo esc_attr( $cursos_meta['sub_heading_cursos'][0] ); ?>">
            </p>
        </li>
        <li>
            <p>
                <label>Booking Link</label><br />

                <input type="text" size="50%" name="book_link" value="<?php if ( ! empty ( $cursos_meta['book_link'] ) ) echo esc_attr( $cursos_meta['book_link'][0] ); ?>">
            </p>
        </li>


    </ul>
    <?php
}

function save_cursos_custom_fields($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'cursos_nonce' ] ) && wp_verify_nonce( $_POST[ 'cursos_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if ( isset( $_POST[ 'sub_heading_cursos' ] ) ) {
        update_post_meta( $post_id, 'sub_heading_cursos', sanitize_text_field( $_POST[ 'sub_heading_cursos' ] ) );
    }
    if ( isset( $_POST[ 'book_link' ] ) ) {
        update_post_meta( $post_id, 'book_link', sanitize_text_field( $_POST[ 'book_link' ] ) );
    }

}
add_action( 'admin_init', 'add_cursos_meta_boxes' );
add_action( 'save_post_cursos', 'save_cursos_custom_fields' );


flush_rewrite_rules();

