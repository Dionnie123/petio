	<?php 
		$petio_settings = petio_global_settings();
		$cart_layout = petio_get_config('cart-layout','dropdown');
		$cart_style = petio_get_config('cart-style','light');
		$show_minicart = (isset($petio_settings['show-minicart']) && $petio_settings['show-minicart']) ? ($petio_settings['show-minicart']) : false;
		$show_compare = (isset($petio_settings['show-compare']) && $petio_settings['show-compare']) ? ($petio_settings['show-compare']) : false;
		$enable_sticky_header = ( isset($petio_settings['enable-sticky-header']) && $petio_settings['enable-sticky-header'] ) ? ($petio_settings['enable-sticky-header']) : false;
		$show_searchform = (isset($petio_settings['show-searchform']) && $petio_settings['show-searchform']) ? ($petio_settings['show-searchform']) : false;
		$show_wishlist = (isset($petio_settings['show-wishlist']) && $petio_settings['show-wishlist']) ? ($petio_settings['show-wishlist']) : false;
		$show_currency = (isset($petio_settings['show-currency']) && $petio_settings['show-currency']) ? ($petio_settings['show-currency']) : false;
		$show_menutop = (isset($petio_settings['show-menutop']) && $petio_settings['show-menutop']) ? ($petio_settings['show-menutop']) : false;
	?>
	<h1 class="bwp-title hide"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
	        rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<header id='bwp-header' class="bwp-header header-v3 header-v9">
	    <?php petio_campbar(); ?>
	    <?php if(isset($petio_settings['show-header-top']) && $petio_settings['show-header-top']){ ?>
	    <div id="bwp-topbar" class="topbar-v2 hidden-sm hidden-xs">
	        <div class="topbar-inner">
	            <div class="container">
	                <div class="row">
	                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 topbar-left hidden-sm hidden-xs">
	                        <?php if( isset($petio_settings['phone']) && $petio_settings['phone'] ) : ?>
	                        <div class="phone hidden-xs">
	                            <i class="icon2-telephone"></i><a
	                                href="tel:<?php echo esc_attr($petio_settings['phone']); ?>"><?php echo esc_attr($petio_settings['phone']); ?></a>
	                        </div>
	                        <?php endif; ?>
	                        <?php if( isset($petio_settings['email']) && $petio_settings['email'] ) : ?>
	                        <div class="email hidden-xs">
	                            <i class="icon-email"></i><a
	                                href="mailto:<?php echo esc_attr($petio_settings['email']); ?>"><?php echo esc_html($petio_settings['email']); ?></a>
	                        </div>
	                        <?php endif; ?>
	                    </div>
	                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 topbar-right">
	                        <?php if($show_menutop){ ?>
	                        <?php wp_nav_menu( 
								  array( 
									  'theme_location' => 'topbar_menu', 
									  'container' => 'false', 
									  'menu_id' => 'topbar_menu', 
									  'menu_class' => 'menu'
								   ) 
								); ?>
	                        <?php } ?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <?php } ?>
	    <?php petio_menu_mobile(); ?>
	    <div class="header-desktop">
	        <?php if(($show_minicart || $show_wishlist || $show_searchform || is_active_sidebar('top-link')) && class_exists( 'WooCommerce' ) ){ ?>
	        <div  class='header-wrapper'
	            data-sticky_header="<?php echo esc_attr($petio_settings['enable-sticky-header']); ?>">
	            <div class="container">
	                <div class="row">
	                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 header-left">
	                        <?php petio_header_logo(); ?>
	                    </div>


	                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 header-center">
	                        <div class="header-search-form hidden-sm hidden-xs">
	                            <!-- Begin Search -->
	                            <?php if($show_searchform && class_exists( 'WooCommerce' )){ ?>
	                            <?php get_template_part( 'search-form' ); ?>
	                            <?php } ?>
	                            <!-- End Search -->
	                        </div>
	                        <div class="wpbingo-menu-mobile header-menu" style="text-align:center;margin-top:25px;">
	                            <div class="header-menu-bg">
	                                <?php petio_top_menu(); ?>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 header-right" style="display:grid">
	                        <div class="header-page-link"
	                            style="display:flex;align-items: center;min-height: 50px;justify-content: end;">
	                            <div class="login-header">
	                                <?php if (is_user_logged_in()) { ?>
	                                <?php if(is_active_sidebar('top-link')){ ?>
	                                <div class="block-top-link">
	                                    <?php dynamic_sidebar( 'top-link' ); ?>
	                                </div>
	                                <?php } ?>
	                                <?php }else{ ?>
	                                <a class="active-login" href="#"><i class="wpb-icon-user2"></i></a>
	                                <?php petio_login_form(); ?>
	                                <?php } ?>
	                            </div>
	                            <?php if($show_wishlist && class_exists( 'WPCleverWoosw' )){ ?>
	                            <div class="wishlist-box">
	                                <a href="<?php echo WPcleverWoosw::get_url(); ?>"><i class="icon-heart"></i></a>
	                            </div>
	                            <?php } ?>
	                            <?php if($show_minicart && class_exists( 'WooCommerce' )){ ?>
	                            <div
	                                class="petio-topcart <?php echo esc_attr($cart_layout); ?> <?php echo esc_attr($cart_style); ?>">
	                                <?php get_template_part( 'woocommerce/minicart-ajax' ); ?>
	                            </div>
	                            <?php } ?>
	                        </div>

	                        <div style="margin-top:25px;">
	                            <?php if( isset($petio_settings['shipping']) && $petio_settings['shipping'] ) : ?>

	                            <div class="shipping hidden-xs" style="font-size:18px; font-weight:bold;color:white">
	                                <?php echo wp_kses($petio_settings['shipping'],'social'); ?>
	                            </div>

	                            <?php endif; ?>
	                        </div>

	                    </div>
	                </div>
	            </div>
	        </div><!-- End header-wrapper -->

	        <?php }else{ ?>
	        <div class="header-normal">
	            <div class='header-wrapper'
	                data-sticky_header="<?php echo esc_attr($petio_settings['enable-sticky-header']); ?>">
	                <div class="container">
	                    <div class="row">
	                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 header-left">
	                            <?php petio_header_logo(); ?>
	                        </div>
	                        <div class="col-xl-9 col-lg-9 col-md-6 col-sm-6 col-6 header-main">
	                            <div class="header-menu-bg">
	                                <?php petio_top_menu(); ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <?php } ?>
	    </div>
	</header><!-- End #bwp-header -->