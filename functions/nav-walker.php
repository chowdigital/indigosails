<?php 
class Custom_Nav_Walker extends Walker_Nav_Menu {
    private $logo_inserted = false;

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $classes = $depth === 0 ? "sub-menu dropdown" : "sub-menu";
        $output .= "\n$indent<ul class=\"$classes\">\n";
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        if ( !$this->logo_inserted && $depth === 0 ) {
            $logo = '<li class="menu-logo"><a href="' . esc_url( home_url('/') ) . '"><img src="' . get_template_directory_uri() . '/assets/logo/is-logo-black.svg" alt="Indogo Sails" class="custom-logo"></a></li>';
            $output .= $logo . "\n";
            $this->logo_inserted = true;
        }

        $indent = ( $depth ) ? str_repeat("\t", $depth) : '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'dropdown-parent';
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id_attr = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id_attr = $id_attr ? ' id="' . esc_attr( $id_attr ) . '"' : '';

        $output .= $indent . '<li' . $id_attr . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}
?>