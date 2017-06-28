<?php


namespace habilidad_Term_Meta;

function setup() {
    add_action( 'init', __NAMESPACE__ . '\register_habilidad_taxonomy' );
    add_action( 'habilidad_add_form_fields', __NAMESPACE__  . '\new_habilidad_social_metadata' );
    add_action( 'habilidad_edit_form_fields', __NAMESPACE__  . '\edit_habilidad_social_metadata' );
    add_action( 'edit_habilidad', __NAMESPACE__  . '\save_habilidad_social_metadata' );
    add_action( 'create_habilidad', __NAMESPACE__  . '\save_habilidad_social_metadata' );
    add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\register_admin_script' );
}

setup();

function register_admin_script() {
    wp_enqueue_script( 'wp_img_upload', get_template_directory_uri()  . '/js/image-upload.js', array('jquery', 'media-upload'), '0.0.2', true );
   wp_localize_script( 'wp_img_upload', 'customUploads', array( 'imageData' => get_post_meta( get_the_ID(), 'custom_image_data', true ) ) );
}

function register_habilidad_taxonomy() {
    $labels = array(
        'name'              => _x( 'habilidades', 'text-domain' ),
        'singular_name'     => _x( 'habilidad', 'text-domain' ),
        'search_items'      => __( 'Search habilidads', 'text-domain' ),
        'all_items'         => __( 'All habilidads', 'text-domain' ),
        'parent_item'       => __( 'Parent habilidad', 'text-domain' ),
        'parent_item_colon' => __( 'Parent habilidad:', 'text-domain' ),
        'edit_item'         => __( 'Edit habilidad', 'text-domain' ),
        'update_item'       => __( 'Update habilidad', 'text-domain' ),
        'add_new_item'      => __( 'Add New habilidad', 'text-domain' ),
        'new_item_name'     => __( 'New habilidad Name', 'text-domain' ),
        'menu_name'         => __( 'habilidad', 'text-domain' ),
    );

    register_taxonomy( 'habilidad', 'team', array( 'labels' => $labels ) );
}



function new_habilidad_social_metadata() {
    wp_nonce_field( basename( __FILE__ ), 'habilidad_social_nonce' );
     ?>

    <th scope="row" valign="top" colspan="2">
        <h3><?php esc_html_e( 'Social Network Options', 'text-domain' ); ?></h3>
    </th>

    <?php ?>
        <div class="form-field habilidad-metadata">
            <label for="<?php printf( esc_html__( '%s-metadata', 'text-domain' ), 'icono' ); ?>">
                <?php printf( esc_html__( '%s code', 'text-domain' ),'icono'); ?>
            </label>
            <input
                type="text"
                name="<?php printf( esc_html__( 'habilidad_%s_metadata', 'text-domain' ),'icono'); ?>"
                id="<?php printf( esc_html__( '%s-metadata', 'text-domain' ), 'icono' ); ?>"
                value=""
                class="social-metadata-field"
            />
        </div>
    <div id="metabox_wrapper" class="form-field habilidad-metadata">
        <img id="image-tag">
        <input type="hidden" id="img-hidden-field" name="custom_image_data">
        <input type="button" id="image-upload-button" class="button" value="Add Image">
        <input type="button" id="image-delete-button" class="button" value="Delete Image">
    </div>
    <?php
}
function edit_habilidad_social_metadata( $term ) {
    wp_nonce_field( basename( __FILE__ ), 'habilidad_social_nonce' );
    $social_networks = supported_social_networks(); ?>

    <th scope="row" valign="top" colspan="2">
        <h3><?php esc_html_e( 'Social Network Options', 'text-domain' ); ?></h3>
    </th>

    <?php foreach ( $social_networks as $network => $value ) {
        $term_key = sprintf( 'habilidad_%s_metadata', $network );
        $metadata = get_term_meta( $term->term_id, $term_key, true ); ?>

        <tr class="form-field habilidad-metadata">
            <th scope="row">
                <label for="<?php printf( esc_html__( '%s-metadata', 'text-domain' ), $network ); ?>">
                    <?php printf( esc_html__( '%s URL', 'text-domain' ), esc_html( $value ) ); ?>
                </label>
            </th>
            <td>
                <input type="text"
                       name="<?php printf( esc_html__( 'habilidad_%s_metadata', 'text-domain' ), esc_attr( $network ) ); ?>"
                       id="<?php printf( esc_html__( '%s-metadata', 'text-domain' ), esc_attr( $network ) ); ?>"
                       value="<?php echo ( ! empty( $metadata ) ) ? esc_attr( $metadata ) : ''; ?>"
                       class="social-metadata-field"
                />
            </td>
        </tr>
    <?php }
}

function save_habilidad_social_metadata( $term_id ) {
    /**
     * Check if nonce is set
     */
    if ( ! isset( $_POST[ 'habilidad_social_nonce' ] ) ) {
        return;
    }
    /**
     * Verify Nonce
     */
    if ( ! wp_verify_nonce( $_POST['habilidad_social_nonce'], basename( __FILE__ ) ) ) {
        return;
    }


        $term_key = sprintf( 'habilidad_%s_metadata', 'icono' );
        if ( isset( $_POST[ $term_key ] ) ) {
            update_term_meta( $term_id, esc_attr( $term_key ), esc_url_raw( $_POST[ $term_key ] ) );
        }
    $term_key = sprintf( 'habilidad_%s_metadata', 'custom_image_data' );
        if ( isset( $_POST[ 'custom_image_data' ] ) ) {
            $image_data = json_decode( stripslashes( $_POST[ 'custom_image_data' ] ) );
            if ( is_object( $image_data[0] ) ) {
                $image_data = array( 'id' => intval( $image_data[0]->id ), 'src' => esc_url_raw( $image_data[0]->url
                ) );
            } else {
                $image_data = [];
            }

            update_post_meta( get_the_ID(), $term_key, $image_data );
        }

}

