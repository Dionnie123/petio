<?php
global $post, $product, $woocommerce;
$columns = 	petio_image_single_product()->product_count_thumb;
$attachment_ids = $product->get_gallery_image_ids();
$data_product = $product->get_data();
$video_style = petio_get_config("video-style","inner");
$video  = (get_post_meta( $product->get_id(), 'video_product', true )) ? get_post_meta($product->get_id(), 'video_product', true ) : "";
$image_id = $data_product['image_id'] ? $data_product['image_id'] : array();
$product_thumbs = petio_get_config("product-thumbs",true);
if($image_id )
	array_unshift ($attachment_ids,$image_id);
if ( $attachment_ids ) {
	$loop 		= 0;
	?>
	<div class="image-thumbnail slick-carousel" data-asnavfor=".image-additional" data-centermode="true" data-focusonselect="true" data-columns4="<?php echo esc_attr($columns); ?>" data-columns3="<?php echo esc_attr($columns); ?>" data-columns2="<?php echo esc_attr($columns); ?>" data-columns1="<?php echo esc_attr($columns); ?>" data-columns="<?php echo esc_attr($columns); ?>" data-nav="true" <?php echo esc_attr(petio_image_single_product()->class_data_image); ?>>
	<?php
		foreach ( $attachment_ids as $attachment_id ) {		
			$image_link = wp_get_attachment_url( $attachment_id );
			if ( ! $image_link )
				continue;
			$image_title 	= esc_attr( get_the_title( $attachment_id ) );
			$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );
            $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ), 0, $attr = array(
                'title' => $image_title,
                'alt'   => $image_title,
                'data-zoom-image'=> $image_link
                ) ); ?>
			<div class="img-thumbnail">
				<span class="img-thumbnail-scroll">
				<?php echo wp_kses($image,'social'); ?>
				</span>
			</div>
			<?php $loop++;
		}
		if($video_style == 'inner' && $video){
			petio_display_thumb_video();
		}
	?>
	</div>
	<?php
}