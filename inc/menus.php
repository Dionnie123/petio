<?php
    /*
    *
    *	Wpbingo Framework Menu Functions
    *	------------------------------------------------
    *	Wpbingo Framework v3.0
    * 	Copyright Wpbingo Ideas 2017 - http://wpbingosite.com/
    *
    *	petio_setup_menus()
    *
    */
    /* CUSTOM MENU SETUP
    ================================================== */
    register_nav_menus( array(
        'main_navigation' 	=> esc_html__( 'Main Menu', 'petio' ),
		'topbar_menu'   	=> esc_html__( 'Topbar Menu', 'petio' ),
        'vertical_menu'     => esc_html__( 'Vertical Menu', 'petio' ),
    ) );
?>