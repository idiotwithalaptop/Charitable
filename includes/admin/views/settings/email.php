<?php
/**
 * Display email field. 
 *
 * @author  Studio 164a
 * @package Charitable/Admin Views/Settings
 * @since   1.0.0
 */

$value = charitable_get_option( $view_args[ 'key' ] );

if ( empty( $value ) ) :
    $value = isset( $view_args['default'] ) ? $view_args['default'] : '';
endif;

?>

<input type="email"  
    id="<?php printf( 'charitable_settings_%s', implode( '_', $view_args[ 'key' ] ) ) ?>" 
    name="<?php printf( 'charitable_settings[%s]', $view_args[ 'name' ] ) ?>"
    value="<?php echo esc_attr( $value ) ?>" 
    class="<?php echo esc_attr( $view_args[ 'classes' ] ) ?>" />

<?php if ( isset( $view_args['help'] ) ) : ?>

    <div class="charitable-help"><?php echo $view_args['help']  ?></div>

<?php endif;