<?php
wp_nonce_field('service_price_metabox', 'service_price_metabox_nonce');
$serviceBasePrice = get_post_meta($post->ID, '_service_base_price', true);
?>
<div>
  <label for="service_base_price"><?php _e('Hourly Base Price:'); ?></label>
  <input type="text" name="service_base_price" id="service_base_price" value="<?php echo $serviceBasePrice; ?>" /> 
</div>