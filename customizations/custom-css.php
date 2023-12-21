<?php 
function add_custom_inline_css() {
    // Your custom CSS styles
    $custom_css = "
	.header-v9 .wpbingoLogo img {
		max-height: 100% !important;
		width: 210px !important;
	}

    .page-title.bwp-title {
        padding:80px 0px !important;
           
    }

        .page-title.bwp-title * {
      color: rgb(70, 43, 28) !important;
           
    }

    .bwp-back-button:before {
    content: '\\23';
    font-family: 'ElegantIcons';
    font-size: 40px;
    line-height: 40px;

    }

    .bwp-main .page-title > .container {
    text-align: start;
}


.bwp-filter h3 {
    color: #000;
    padding: 0 0 10px;
    background: transparent;
    font-weight: 700;
    font-size: 22px;
    margin: 0px 0 25px 0;
    position: relative;
    border-bottom: 1px solid #e1e1e1;
    font-family: 'Nunito', sans-serif;
}
  

.bwp-filter ul,li {
  font-size: 16px;
  font-weight:bold;
}

.bwp-filter  .sublist-ul{
  margin-top: 10px;
}


    ";

    // Enqueue the main style and add inline CSS
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_add_inline_style('main-style', $custom_css);
}
?>