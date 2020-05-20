<?php
wp_nonce_field('service_charge_metabox', 'service_charge_metabox_nonce');
        $serviceTypeCharge = get_post_meta($post->ID, '_service_type_charge', true);
        $serviceBasePrice = get_post_meta($post->ID, '_service_base_price', true);
?>
<div>
  <label for="service_type_charge"><?php _e('Charge based on:'); ?></label>
    <select name="service_type_charge" id="service_type_charge">
        <option value="rooms" <?php if ($serviceTypeCharge=='rooms') {
    echo 'selected';
} ?>>Amount of Rooms</option>
        <option value="sqft" <?php if ($serviceTypeCharge=='sqft') {
    echo 'selected';
} ?>>SQFT</option>
        <option value="hours" <?php if ($serviceTypeCharge=='hours') {
    echo 'selected';
} ?>>Hours</option>
    </select>
</div>