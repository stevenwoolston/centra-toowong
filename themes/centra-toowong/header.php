<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="pragma" content="no-cache">
<?php

    //  set the default title as the global site description
    $meta_description = get_option( 'meta_description' );

    if ( is_single() ) {
        $meta_description = $meta_description . ' ' . ($post->post_title) . ' ' . preg_replace( "/\r|\n/", " ", ( strip_tags($post->post_excerpt ) ) );
    }

    echo '<meta name="description" content="'.$meta_description.'">';
    $blog_title = get_bloginfo('name') . ' - ' . get_bloginfo('description');
?>
    <title>
<?php

    if ( is_404() ) {
        echo 'Nothing Found - ';
    } else if( !is_home() ) {
        echo get_the_title() . ' - ';
    } else if ( is_post_type_archive('floorplan')) {
		echo 'Floor Plans';
	}

    echo bloginfo("name") . ' ';
    echo bloginfo("description");
?>
    </title>

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.min.css?v=1.3" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/css/global.css?v=1.3">
    <script src='https://www.google.com/recaptcha/api.js'></script>
	<?php wp_head(); ?>
	<?php

		$bedrooms = !empty( $_GET['bedrooms'] ) ? $_GET['bedrooms'] : '';
		$furnished = !empty( $_GET['furnished'] ) ? $_GET['furnished'] : '';
		$sortprice = !empty( $_GET['sortprice'] ) ? $_GET['sortprice'] : '';

	?>
</head>
<body <?php body_class( "cover-background-image parallax"); ?>>

    <header id="header">
        <nav id="wp-nav-menu" role="navigation" class="navbar navbar-default">
            <div class="navbar-header">
                <a href="<?php echo site_url() ?>"><span class="hidden-sm hidden-md hidden-lg glyphicon glyphicon-home"></span></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#wp-nav-bar" aria-expanded="false">
                    <span class="button-collapse-title">Menu</span>
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div id="wp-nav-bar" class="collapse navbar-collapse">

                <div class="hidden-xs col-sm-2 col-lg-2 col-lg-offset-1 text-center nav-logo-container">
                    <a href="<?php echo site_url() ?>">
                        <img class="nav-logo" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png" alt="" />
                    </a>
                </div>

                <?php wp_nav_menu( array(
                    //'container_id'		=> 'wp-nav-bar',
                    'container_class'	=> 'col-sm-10 col-lg-9',
                    'menu_class'		=> 'nav navbar-nav pull-right main-menu-item',
                    'theme_location'	=> 'main-menu',
                    'walker' => new WP_Bootstrap_Navwalker(),
                ) ); ?>
            </div>

            <div class="col-xs-12 header-search-container">
                <form role="search" class="form-inline text-right" action="/" method="get" id="searchform">
                    <div class="form-group">
                        <label class="pull-left">Bedrooms</label>
                        <select name="bedrooms" class="form-control">
                            <option <?php echo $bedrooms == '' ? 'selected' : ''; ?> value="">All</option>
                            <option <?php echo $bedrooms == '1' ? 'selected' : ''; ?> value="1">1</option>
                            <option <?php echo $bedrooms == '2' ? 'selected' : ''; ?> value="2">2</option>
                            <option <?php echo $bedrooms == '3' ? 'selected' : ''; ?> value="3">3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="pull-left">Furnished?</label>
                        <select name="furnished" class="form-control">
                            <option <?php echo $furnished == '' ? 'selected' : ''; ?> value="">All</option>
                            <option <?php echo $furnished == 'true' ? 'selected' : ''; ?> value="true">Yes</option>
                            <option <?php echo $furnished == 'false' ? 'selected' : ''; ?> value="false">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="pull-left">Sort By Price</label>
                        <select name="sortprice" class="form-control">
                            <option <?php echo $sortprice == '' ? 'selected' : ''; ?> value="">High to Low</option>
                            <option <?php echo $sortprice == '1' ? 'selected' : ''; ?> value="1">Low to High</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-default pull-right" alt="Search" value="Search" />
                    </div>
                </form>
            </div>
        </nav>
    </header>

    <div class="page-wrap container-fluid">
        <div class="row">
