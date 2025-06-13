<?php
/* 
* Agregar clases al menu
*/
function agregar_clase_current_a_menu($classes, $item, $args) {
    if (in_array('current-menu-item', $item->classes)) {
        $classes[] = 'current';
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'agregar_clase_current_a_menu', 10, 3);

class Menu_Simple_Personalizado extends Walker_Nav_Menu {
    private $current_item_title;

    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
        // Guardar el título del ítem actual para usarlo en el submenu
        $this->current_item_title = $item->title;
        
        $custom_classes = array();
        foreach($item->classes as $class) {
            if(strpos($class, 'menu-') === false && strpos($class, 'current-') === false) {
                $custom_classes[] = $class;
            }
        }
        
        $class_names = join(' ', array_filter($custom_classes));
        
        $output .= "<li class='menu-link d-flex align-center hover-menu py-lg-0 py-6" . esc_attr($class_names) . "'>";
        
        if ($item->url && $item->url != '#') {
            $output .= '<a class="position-relative font-poppins fs-xl-p fs-lg-p-small fs-5 fw-lg-regular fw-light text-primary customHoverLink" href="' . $item->url . '">';
            $output .= '<span class="hover-menu-item">';
            $output .= $item->title;
            $output .= '</span>';
            $output .= '</a>';
        } else {
            $output .= '<span class="menu-item d-flex align-center font-sans fs-xl-p fs-p-small text-primary hover-menu-item">';
            $output .= $item->title;
            $output .= '</span>';
        }
    }

    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= "<div class='submenu d-none position-absolute top-84 left-0 w-100 pt-24 bg-white-300 z-10'>";
        // Agregar el título del submenú
        $output .= "<div class='container'>";
        $output .= "<p class='submenu-title'>" . esc_html($this->current_item_title) . "</p>";
        $output .= "<ul class='d-grid grid-cols-5 row-gap-42 pb-60 pt-42 pb-60 nivel-" . $depth . "'>";
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= "</ul>";
        $output .= "</div>"; // Cierre del container
        $output .= "</div>"; // Cierre del submenu
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>";
    }
}