<?php
/* 
*   Habilitación de menu
*/
function menus()
{
    register_nav_menus(array(
        'menu-principal' => 'Menu Principal',
    ));
}
add_action('init', 'menus');

/* 
*   Logo
*/
function theme_prefix_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 100, 
        'width'       => 400, 
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'theme_prefix_setup');

/**
 * Habilitar imágenes destacadas para posts específicos
 */
function theme_setup() {
    add_theme_support('post-thumbnails', array('post', 'page', 'servicios'));
}
add_action('after_setup_theme', 'theme_setup');

/* 
*   Habilitación subida de SVG
*/
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

/* 
*   Resoluciones de imagenes
*/
function img_setup_theme() {
    add_image_size('custom-size', 423, 519, true); // Normal resolution
    add_image_size('custom-size-2x', 846, 1038, true); // High resolution
}
add_action('after_img_setup_theme', 'setup_theme');

/* 
* Guarda archivos JSON de ACF en la carpeta '/acf-json' dentro del tema activo.
*/
function my_acf_json_save_point( $path ) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );

/* 
* Eliminar las etiquetas <p>
*/
add_filter('wpcf7_autop_or_not', '__return_false');

/* 
* Whatsapp
*/
// Agregar menú en el panel de administración
function agregar_menu_whatsapp() {
    add_menu_page(
      'Configuración WhatsApp',
      'WhatsApp',
      'manage_options',
      'configuracion-whatsapp',
      'mostrar_pagina_configuracion',
      'dashicons-whatsapp',
      30
    );
  }
  add_action('admin_menu', 'agregar_menu_whatsapp');
  
  // Registrar configuraciones
  function registrar_configuraciones() {
      register_setting('whatsapp_opciones', 'whatsapp_numero');
  }
  add_action('admin_init', 'registrar_configuraciones');
  
  // Crear la página de configuración
  function mostrar_pagina_configuracion() {
      ?>
      <div class="wrap">
          <h1>Configuración de WhatsApp</h1>
          <form method="post" action="options.php">
              <?php
              settings_fields('whatsapp_opciones');
              do_settings_sections('whatsapp_opciones');
              ?>
              <table class="form-table">
                  <tr>
                      <th scope="row">Número de WhatsApp</th>
                      <td>
                          <input type="text" name="whatsapp_numero" value="<?php echo esc_attr(get_option('whatsapp_numero')); ?>" placeholder="Ejemplo: +34612345678"class="regular-text">
                          <p class="description">Ingresa el número con código de país (Ejemplo: +34612345678)</p>
                      </td>
                  </tr>
              </table>
              <?php submit_button(); ?>
          </form>
      </div>
      <?php
  }
  
  function obtener_whatsapp() {
      return get_option('whatsapp_numero');
  }
  
  function mostrar_boton_whatsapp() {
      $numero = obtener_whatsapp();
      if (!empty($numero)) {
        ?>
            <a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $numero)); ?>" target="_blank" class="customButtonWhatsapp">
                <i class="customIcono customIcono-whatsapp-azul"></i>
                <p class="font-poppins text-primary fw-semibold">WhatsApp</span>
                <p class="font-poppins text-primary fw-regula mt-0">Inicia tu chat</p>
            </a>
        <?php
      }
  }

/* 
* Página de opciones
*/
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Configuración General del Tema',
        'menu_title'    => 'Ajustes del Tema',
        'menu_slug'     => 'configuracion-general-tema',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Configuración del Encabezado',
        'menu_title'    => 'Encabezado',
        'parent_slug'   => 'configuracion-general-tema',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Configuración del Pie de Página',
        'menu_title'    => 'Pie de Página',
        'parent_slug'   => 'configuracion-general-tema',
    ));
    
}
