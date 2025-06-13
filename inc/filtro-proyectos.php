<?php
// Función para manejar la solicitud AJAX
function filter_projects_callback() {
    $year = isset($_POST['year']) ? sanitize_text_field($_POST['year']) : '';
    $sector = isset($_POST['sector']) ? sanitize_text_field($_POST['sector']) : '';
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    
    $args = array(
        'post_type' => 'proyectos',
        'posts_per_page' => 100,
        'paged' => $page
    );
    
    $tax_query = array();
    
    if (!empty($sector) && $sector !== 'todos') {
        $tax_query[] = array(
            'taxonomy' => 'sector',
            'field' => 'slug',
            'terms' => $sector
        );
    }
    
    if (!empty($year) && $year !== 'todos') {
        $tax_query[] = array(
            'taxonomy' => 'etapa',
            'field' => 'slug',
            'terms' => $year
        );
    }
    
    if (!empty($tax_query)) {
        $args['tax_query'] = array(
            'relation' => 'AND',
            $tax_query
        );
    }
    
    $query = new WP_Query($args);
    $html = '';
    $key = 0;
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $html .= '<div class="d-none col-12 col-lg-4 py-18 postItem">';
            $html .= '<article id="post-' . get_the_ID() . '" class="position-relative customHoverTarjetaAzul shadow-card rounded overflow-hidden wow fadeInUp" data-wow-delay="0.' . $key . 's">';
            
            if (has_post_thumbnail()) {
                $html .= '<div class="d-flex">';
                $html .= get_the_post_thumbnail(null, 'medium', array('class' => 'img-fluid'));
                $html .= '</div>';
            }
            
            $html .= '<div class="position-absolute top-0 left-0 d-flex flex-column justify-end w-100 h-100 px-24 py-42 customHoverTarjetaAzulVisible bg-lg-transparent bg-primary-10">';
            $html .= '<h2 class="fs-5 fw-medium mb-6 text-white">' . get_the_title() . '</h2>';
            
            $sector_terms = get_the_terms(get_the_ID(), 'sector');
            if ($sector_terms && !is_wp_error($sector_terms)) {
                $html .= '<p class="font-poppins fs-p text-white">Tipo proyecto: ' . esc_html($sector_terms[0]->name) . '</p>';
            $year_terms = get_the_terms(get_the_ID(), 'ano');
            if ($year_terms && !is_wp_error($year_terms)) {
                $html .= '<p class="font-poppins fs-p text-white mb-12">Año: ' . esc_html($year_terms[0]->name) . '</p>';
            }
            }
            
            $html .= '<div class="line line-blanca mb-24"></div>';
            $html .= '<a href="' . get_the_permalink() . '" type="button" class="d-flex align-center gap-12 p-0 fs-3 text-white bg-transparent border-0 fw-medium">';
            $html .= 'Ver proyecto <i class="customIcono customIcono-flecha-blanca"></i>';
            $html .= '</a></div></article></div>';
            
            $key++;
        }
    } else {
        $html .= '<div class="col-12">';
        $html .= '<p class="text-center fs-3 fw-semibold py-36">' . __('No se encontraron proyectos con los filtros seleccionados.', 'textdomain') . '</p>';
        $html .= '</div>';
    }
    
    wp_reset_postdata();
    
    wp_send_json(array(
        'html' => $html,
        'has_more' => $query->max_num_pages > $page
    ));
}

// Registrar endpoints AJAX para usuarios logueados y no logueados
add_action('wp_ajax_filter_projects', 'filter_projects_callback');
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects_callback');

/**
 * Función para obtener las categorías (sectores) disponibles
 */

function get_project_sectors() {
    $terms = get_terms(array(
        'taxonomy' => 'sector',
        'hide_empty' => true
    ));
    
    return $terms;
}

/**
 * Función para obtener los etapas disponibles
 */

function get_project_years() {
    $terms = get_terms(array(
        'taxonomy' => 'etapa',
        'hide_empty' => true
    ));
    
    return $terms;
}

function registrar_taxonomias_proyecto() {
    register_taxonomy('etapa', 'proyectos', array(
        'hierarchical' => false,
        'labels' => array(
            'name' => 'Etapas',
            'singular_name' => 'Etapa'
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'etapa')
    ));

    register_taxonomy('sector', 'proyectos', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'Sectores',
            'singular_name' => 'Sector'
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'sector')
    ));
}
add_action('init', 'registrar_taxonomias_proyecto');

// Agregar esta función para enqueue del script
function enqueue_filter_scripts() {
    wp_enqueue_script('filtro-categoria', get_template_directory_uri() . '/js/src/filtro-proyectos-init.js', array('jquery'), '1.0', true);
    wp_localize_script('filtro-categoria', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_filter_scripts');