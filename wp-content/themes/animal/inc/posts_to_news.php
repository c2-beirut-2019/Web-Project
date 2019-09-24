
<?php
// renaming default post type name to news
/**
 * Post to news
 
 Changes the default WordPress post name to News and replace the Dashicon.
 *
 * @since  1.0.0
 * @access public
 */
class Posts_To_News {

    /**
     * Constructor method.
     *
     * @since  1.0.0
     * @access public
     * @return self
     */
    public function __construct() {

        add_action( 'admin_menu', [ $this, 'change_menu_labels' ] );
        add_action( 'init', [ $this, 'change_page_labels' ] );
        add_action( 'admin_menu', [ $this, 'change_menu_icon' ] );
        add_filter( 'post_updated_messages', [ $this, 'change_page_messages' ] );
        add_action( 'admin_head', [ $this, 'dashboard_icons' ] );
        add_action( 'admin_footer', [ $this, 'at_glance_text' ] );

    }

    /**
     * Change post type labels in the admin menu
     *
     * @since  1.0.0
     * @access public
     * @global object $menu Gets the admin menu.
     * @global object $submenu Gets the admin submenus.
     * @return string Returns the various labels.
     */
    public function change_menu_labels() {

        // Access global variables.
        global $menu, $submenu;

        // The "Posts" position in the admin menu.
        $menu[5][0] = __( 'News', 'plugin-name' );

        // Submenus of the "Posts" position in the admin menu.
        $submenu['edit.php'][5][0]  = __( 'News', 'plugin-name' );
        $submenu['edit.php'][10][0] = __( 'Add News', 'plugin-name' );
        $submenu['edit.php'][16][0] = __( 'News Tags', 'plugin-name' );

    }

    /**
     * Change post type labels on admin pages
     *
     * @since  1.0.0
     * @access public
     * @global array $wp_post_types Gets the array of admin page labels.
     * @return string Returns the various labels.
     */
    public function change_page_labels() {

        // Access global variables.
        global $wp_post_types;

        // The labels of the array.
        $labels = $wp_post_types['post']->labels;
        $labels->name               = __( 'News', 'plugin-name' );
        $labels->singular_name      = __( 'News', 'plugin-name' );
        $labels->add_new            = __( 'Add News', 'plugin-name' );
        $labels->add_new_item       = __( 'Add News', 'plugin-name' );
        $labels->edit_item          = __( 'Edit News', 'plugin-name' );
        $labels->new_item           = __( 'News', 'plugin-name' );
        $labels->view_item          = __( 'View News', 'plugin-name');
        $labels->search_items       = __( 'Search News', 'plugin-name' );
        $labels->not_found          = __( 'No News found', 'plugin-name' );
        $labels->not_found_in_trash = __( 'No News found in Trash', 'plugin-name' );
        $labels->all_items          = __( 'All News', 'plugin-name'  );
        $labels->menu_name          = __( 'News', 'plugin-name' );
        $labels->name_admin_bar     = __( 'News', 'plugin-name' );

    }

    /**
     * Change the pin icon to a megaphone
     *
     * @since  1.0.0
     * @access public
     * @global object $menu Gets the admin menu.
     * @return string Returns the various labels.
     */
    public function change_menu_icon() {

        // Access global variables.
        global $menu;

        foreach ( $menu as $key => $val ) {

            if ( __( 'News', 'plugin-name' ) == $val[0] ) {
                $menu[$key][6] = 'dashicons-megaphone';
            }
        }
    }

    /**
     * Change post messages
     *
     * @since  1.0.0
     * @access public
     * @param array $messages Gets the array of messages.
     * @global object $post Gets the post object.
     * @global object $post_ID Gets the post ID.
     * @return array Returns the array of messages.
     */
    public function change_page_messages( $messages ) {

        // Access global variables.
        global $post, $post_ID;

        // Conditional message for revisions.
        if ( isset( $_GET['revision'] ) ) {
            $revision = sprintf(
                __( '%1s %2s' ),
                __( 'News post restored to revision from', 'plugin-name' ),
                wp_post_revision_title( (int) $_GET['revision'], false )
            );
        } else {
            $revision = false;
        }

        // Updated message.
        $updated = sprintf(
            __( '%1s <a href="%2s">%3s</a>' ),
            __( 'News updated.', 'plugin-name' ),
            esc_url( get_permalink( $post_ID ) ),
            __( 'View News Post', 'plugin-name' )
        );

        // Published message.
        $published = sprintf(
            __( '%1s <a href="%2s">%3s</a>' ),
            __( 'News published.', 'plugin-name' ),
            esc_url( get_permalink( $post_ID ) ),
            __( 'View News Post', 'plugin-name' )
        );

        // Submitted message.
        $submitted = sprintf(
            __( '%1s <a target="_blank" href="%2s">%3s</a>' ),
            __( 'News submitted.', 'plugin-name' ),
            esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ),
            __( 'Preview News Post', 'plugin-name' )
        );

        // Scheduled message.
        $scheduled = sprintf(
            __( '%1s <strong>%2s</strong>. <a target="_blank" href="%3s">%4s</a>' ),
            __( 'News scheduled for:', 'plugin-name' ),
            date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ),
            esc_url( get_permalink( $post_ID ) ),
            __( 'Preview News Post', 'plugin-name' )
        );

        // Draft updated message.
        $draft = sprintf(
            __( '%1s <a target="_blank" href="%2s">%3s</a>' ),
            __( 'News draft updated.', 'plugin-name' ),
            esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ),
            __( 'Preview News Post', 'plugin-name' )
        );

        // The array of messages for the Posts post type.
        $messages['post'] = [

            // First is unused. Messages start at index 1.
            0  => null,
            1  => $updated,
            2  => __( 'Custom field updated.', 'plugin-name' ),
            3  => __( 'Custom field deleted.', 'plugin-name' ),
            4  => __( 'News updated.', 'plugin-name' ),
            5  => $revision,
            6  => $published,
            7  => __( 'News saved.', 'plugin-name' ),
            8  => $submitted,
            9  => $scheduled,
            10 => $draft
        ];

        // Return the array of messages.
        return $messages;

    }
    
    /**
     * News posts dashboard icon
     *
     * Changes the posts icon in the At a Glance dashboard widget.
     *
     * @since  1.0.0
     * @access public
     * @return string Returns the style block in the admin head.
     */
    public function dashboard_icons() {

        // Get the screen ID to target the Dashboard.
        $screen = get_current_screen();

        // Bail if not on the Dashboard screen.
        if ( $screen->id != 'dashboard' ) {
            return;
        }

        // Opening tag.
        $style = '<style>';
        // Posts icon.
        $style .= '#dashboard_right_now .post-count a[href="edit.php?post_type=post"]::before, #dashboard_right_now .post-count span::before {
            content: "\f488" !important;
        }';
        // Closing tag.
        $style .= '</style>';
        // Print the style block.
        echo $style;
    }
    
    /**
     * News posts dashboard text
     *
     * Changes the posts text in the At a Glance dashboard widget.
     *
     * @since  1.0.0
     * @access public
     * @return string Returns the script block in the admin head.
     */
    public function at_glance_text() { ?>
        <script>jQuery(document).ready( function ($) {
            $('.post-count a[href="edit.php?post_type=post"]').text(function () {
                return $(this).text().replace( '1 Post', '1 News Post' );
            });
            $('.post-count a[href="edit.php?post_type=post"]').text(function () {
                return $(this).text().replace( 'Posts', 'News Posts' );
            });
        });</script>
    <?php }
}
// New instance of the class.
new Posts_To_News();
?>