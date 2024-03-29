<?php
/**
 * WIDGETS AND SIDEBARS
 * http://codex.wordpress.org/Widgets_API
 */

function vital_widgets_init() {

    /**
     * REGISTER WIDGETISED AREAS
     */
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'vital'),
        'id'            => 'sidebar-primary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    /**
     * Repeat the above code to register extra widgetised areas.
     * To call a sidebar in template, copy the sidebar.php file and rename it to your sidebar's ID.
     * for example: sidebar-sidebar-secondary.php
     */


    /**
     * REGISTER CUSTOM WIDGETS
     */
    //register_widget('Vital_Custom_Widget');
}
add_action('widgets_init', 'vital_widgets_init');




/**
 * Adds Vital_Custom_Widget widget.
 */
class Vital_Custom_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'vital_custom_widget', // Base ID
            __('Tedworth &amp; Widget', 'vital'), // Name
            array( 'description' => __( 'A widget of sorts...', 'vital' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
    
                echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }
        echo __( 'Tedworth &amp; Oscar...', 'vital' );
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'vital' );
        }
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php 
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

} // class Vital_Custom_Widget


?>