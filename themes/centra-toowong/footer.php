<div class="clear"></div>
</div><!-- /row -->
</div><!-- /page-wrap -->
<footer id="footer" role="contentinfo" class="footer container-fluid">
    <div class="footer-copyright col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <?php echo '&copy;&nbsp;', date( 'Y' ).' ', esc_html( get_bloginfo( 'name' ) ); ?>
    </div>
    <div class="hidden col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <ul class="social-media-list">
            <?php   if ( get_option( 'facebook_url' ) != "" ) { ?>
            <li>
                <span class="sprite facebook-sprite"></span>
                <a href="<?php echo get_option( 'facebook_url' ); ?>" target="_blank">Facebook</a>
            </li>
            <?php   }
            if ( get_option( 'twitter_url' ) != "" ) { ?>
            <li>
                <div class="sprite twitter-sprite"></div>
                <a href="<?php echo get_option( 'twitter_url' ); ?>" target="_blank">Twitter</a>
            </li>
            <?php   }
            if ( get_option( 'google_url' ) != "" ) { ?>
            <li>
                <div class="sprite google-sprite"></div>
                <a href="<?php echo get_option( 'google_url' ); ?>" target="_blank">Google +</a>
            </li>
            <?php   }
            if ( get_option( 'youtube_url' ) != "" ) { ?>
            <li>
                <div class="sprite youtube-sprite"></div>
                <a href="<?php echo get_option( 'youtube_url' ); ?>" target="_blank">Youtube</a>
            </li>
            <?php   } ?>
        </ul>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <?php
        $menu_name = 'main-menu';

        if ( ($menu = wp_get_nav_menu_object( $menu_name ) ) && ( isset($menu) ) ) {
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $menu_list = '<ul>
            ';

            foreach ( (array) $menu_items as $key => $menu_item ) {
            $title = $menu_item->title;
            $url = $menu_item->url;
            $menu_list .= '
            <li><a href="' . $url . '">' . $title . '</a></li>';
            }

            $menu_list .= '
        </ul>';

        } else {

        $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
        }
        echo $menu_list;
        ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 text-center">
        Design by <a href="http://www.woolston.com.au" target="_blank">Woolston Web Design</a>
    </div>

</footer>
<?php wp_footer(); ?>
</body>

<?php   if ( get_option( 'tracking_code' ) != "" ) : ?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', '<?php echo get_option( 'tracking_code' ); ?>', 'auto');
    ga('send', 'pageview');
</script>
<?php   endif ?>
</html>