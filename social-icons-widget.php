<?php
class  textdomain_social extends  WP_Widget{

    function __construct() {
        $widget_opt = array(
            'classname'		 => 'oaaps_widget',
            'description'	 => 'oaaps Social'
        );

        parent::__construct( 'xs-social', esc_html__( 'oaaps Social', 'oaaps' ), $widget_opt );
    }

    function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = esc_html__( 'Social', 'oaaps' );
        }

        $facebook			= '';
        $twitter			 	= '';


        if ( isset( $instance[ 'facebook' ] ) ) {
            $facebook = $instance[ 'facebook' ];
        }
        if ( isset( $instance[ 'twitter' ] ) ) {
            $twitter = $instance[ 'twitter' ];
        }
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'oaaps' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook:', 'oaaps' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $facebook ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter:', 'oaaps' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $twitter ); ?>" />
        </p>

        <?php
    }
    function widget( $args, $instance ) {

        echo ( $args[ 'before_widget' ] );
        if ( !empty( $instance[ 'title' ] ) ) {

            echo ( $args[ 'before_title' ] ) . apply_filters( 'widget_title', $instance[ 'title' ] ) . ( $args[ 'after_title' ] );
        }

        $facebook			 	= '';
        $twitter			 		= '';


        if ( isset( $instance[ 'facebook' ] ) ) {
            $facebook = $instance[ 'facebook' ];
        }
        if ( isset( $instance[ 'twitter' ] ) ) {
            $twitter = $instance[ 'twitter' ];
        }

        if ( isset( $instance[ 'social_alignment' ] ) ) {
        }
        ?>
        <div class="social_icon text-right">
            <ul>

                <?php if ( $facebook != '' ): ?>
                    <li><a target="_blank" href="<?php echo esc_url( $facebook ); ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <?php endif; ?>

                <?php if ( $twitter != '' ): ?>
                    <li><a target="_blank" href="<?php echo esc_url( $twitter ); ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <?php endif; ?>


            </ul>
        </div><!-- Footer social end -->

        <?php
        echo ( $args[ 'after_widget' ] );
    }
    function update( $old_instance, $new_instance ) {
        $new_instance[ 'title' ]			 = strip_tags( $old_instance[ 'title' ] );
        $new_instance[ 'facebook' ]			 = $old_instance[ 'facebook' ];
        $new_instance[ 'twitter' ]			 = $old_instance[ 'twitter' ];
        return $new_instance;
    }




}
