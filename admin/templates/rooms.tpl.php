<?php
wp_nonce_field('service_rooms_metabox', 'service_rooms_metabox_nonce');
$serviceRooms = get_post_meta($post->ID, '_service_rooms', true);
$serviceRooms = json_decode($serviceRooms, true);
?>
<input type="hidden" value="<?php echo count($serviceRooms['weekly']) !== 0 ? count($serviceRooms['weekly']) : 1; ?>" name="countweeklyrmdata" id="countweeklyrmdata">
    <div><h3><?php _e('Weekly:'); ?></h3></div>
    <?php if ($serviceRooms['weekly']) {
    for ($w=0;$w<count($serviceRooms['weekly']);$w++) {
        $wk = $w +1; ?>
        <div id="rooms_weekly<?= $wk; ?>">
        
            <table>
                <tr>
                    <td>
                        <label for="service_weekly_amnt_rooms<?= $wk; ?>"><?php _e('Rooms:'); ?></label>
                        <input type="number" name="service_weekly_amnt_rooms<?= $wk; ?>" id="service_weekly_amnt_rooms<?= $wk; ?>" value="<?= $serviceRooms['weekly'][$w]['rooms']; ?>" />
                    </td>
                    <td>
                        <label for="service_weekly_sqft<?= $wk; ?>"><?php _e('SQFT:'); ?></label>
                        <input type="number" name="service_weekly_sqft<?= $wk; ?>" id="service_weekly_sqft<?= $wk; ?>" value="<?= $serviceRooms['weekly'][$w]['sqft']; ?>" />
                    </td>
                    <td>
                        <label for="service_weekly_price<?= $wk; ?>"><?php _e('Price:'); ?></label>
                        <input type="text" name="service_weekly_price<?= $wk; ?>" id="service_weekly_price<?= $wk; ?>" value="<?= $serviceRooms['weekly'][$w]['price']; ?>" />
                    </td>
                </tr>
            </table>
        </div>
        <?php
    } ?>
    <?php
} ?>
    <?php if ($serviceRooms['weekly'] !== null) {
        $next_count_rooms = count($serviceRooms['weekly']) + 1;
    }?>
    <div id="rooms_weekly<?= $next_count_rooms; ?>"></div>
    
    <div style="margin-top: 20px;">
        <table>
            <tr>
                <td>
                    <a href="javascript:;" id="addweeklyrm" title="Add Room"><img src="<?php echo get_theme_file_uri('/images/add-icon.png'); ?>" class="addrmimg" alt="Add Room" title="Add Room"></a>
                </td>

                <td>
                    <a href="javascript:;" id="remweeklyrm" title="Remove Room"><img src="<?php echo get_theme_file_uri('/images/remove-icon.png'); ?>" class="remrmimg" alt="Remove Roome" title="Remove Room"></a>
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <input type="hidden" value="<?php echo count($serviceRooms['biweekly']) !== 0 ? count($serviceRooms['biweekly']) : 1; ?>" name="countbiweeklyrmdata" id="countbiweeklyrmdata">
    <div><h3><?php _e('Biweekly:'); ?></h3></div>
    <?php if ($serviceRooms['biweekly']) {
        for ($b=0;$b<count($serviceRooms['biweekly']);$b++) {
            $bwk = $b +1; ?>
    <div id="rooms_biweekly<?= $bwk; ?>">
        <table>
            <tr>
                <td>
                    <label for="service_biweekly_amnt_rooms<?= $bwk; ?>"><?php _e('Rooms:'); ?></label>
                    <input type="number" name="service_biweekly_amnt_rooms<?= $bwk; ?>" id="service_biweekly_amnt_rooms<?= $bwk; ?>" value="<?= $serviceRooms['biweekly'][$b]['rooms']; ?>" />
                </td>
                <td>
                    <label for="service_biweekly_sqft<?= $bwk; ?>"><?php _e('SQFT:'); ?></label>
                    <input type="number" name="service_biweekly_sqft<?= $bwk; ?>" id="service_biweekly_sqft<?= $bwk; ?>" value="<?= $serviceRooms['biweekly'][$b]['sqft']; ?>" />
                </td>
                <td>
                    <label for="service_biweekly_price<?= $bwk; ?>"><?php _e('Price:'); ?></label>
                    <input type="text" name="service_biweekly_price<?= $bwk; ?>" id="service_biweekly_price<?= $bwk; ?>" value="<?= $serviceRooms['biweekly'][$b]['price']; ?>" />
                </td>
            </tr>
        </table>
    </div>
     <?php
        } ?>
    <?php
    } ?>
    
    <?php if ($serviceRooms['biweekly'] !== null) {
        $next_count_rooms = count($serviceRooms['biweekly']) + 1;
    }?>

    <div id="rooms_biweekly<?= $next_count_rooms; ?>"></div>
    <div style="margin-top: 20px;">
        <table>
            <tr>
                <td>
                    <a href="javascript:;" id="addbiweeklyrm" title="Add Room"><img src="<?php echo get_theme_file_uri('/images/add-icon.png'); ?>" class="addrmimg" alt="Add Room"></a>
                </td>

                <td>
                    <a href="javascript:;" id="rembiweeklyrm" title="Remove Room"><img src="<?php echo get_theme_file_uri('/images/remove-icon.png'); ?>" class="remrmimg" alt="Remove Roome"></a>
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <input type="hidden" value="<?php echo count($serviceRooms['monthly']) !== 0 ? count($serviceRooms['monthly']) : 1; ?>" name="countmonthlyrmdata" id="countmonthlyrmdata">
    <div><h3><?php _e('Monthly:'); ?></h3></div>
    <?php if ($serviceRooms['monthly']) {
        for ($m=0;$m<count($serviceRooms['monthly']);$m++) {
            $mt = $m +1; ?>
    <div id="rooms_monthly<?= $mt; ?>">
        <table>
            <tr>
                <td>
                    <label for="service_monthly_amnt_rooms<?= $mt; ?>"><?php _e('Rooms:'); ?></label>
                    <input type="number" name="service_monthly_amnt_rooms<?= $mt; ?>" id="service_monthly_amnt_rooms<?= $mt; ?>" value="<?= $serviceRooms['monthly'][$m]['rooms']; ?>" />
                </td>
                <td>
                    <label for="service_monthly_sqft<?= $mt; ?>"><?php _e('SQFT:'); ?></label>
                    <input type="number" name="service_monthly_sqft<?= $mt; ?>" id="service_monthly_sqft<?= $mt; ?>" value="<?= $serviceRooms['monthly'][$m]['sqft']; ?>" />
                </td>
                <td>
                    <label for="service_monthly_price<?= $mt; ?>"><?php _e('Price:'); ?></label>
                    <input type="text" name="service_monthly_price<?= $mt; ?>" id="service_monthly_price<?= $mt; ?>" value="<?= $serviceRooms['monthly'][$m]['price']; ?>" />
                </td>
            </tr>
        </table>
    </div>
     <?php
        } ?>
    <?php
    } ?>
    
    <?php if ($serviceRooms['monthly'] !== null) {
        $next_count_rooms = count($serviceRooms['monthly']) + 1;
    }?>
    <div id="rooms_monthly<?= $next_count_rooms; ?>"></div>
    <div style="margin-top: 20px;">
        <table>
            <tr>
                <td>
                    <a href="javascript:;" id="addmonthlyrm" title="Add Room"><img src="<?php echo get_theme_file_uri('/images/add-icon.png'); ?>" class="addrmimg" alt="Add Room"></a>
                </td>

                <td>
                    <a href="javascript:;" id="remmonthlyrm" title="Remove Room"><img src="<?php echo get_theme_file_uri('/images/remove-icon.png'); ?>" class="remrmimg" alt="Remove Roome"></a>
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <input type="hidden" value="<?php echo count($serviceRooms['onetime']) !== 0 ? count($serviceRooms['onetime']) : 1; ?>" name="countonetimermdata" id="countonetimermdata">
    <div><h3><?php _e('One Time:'); ?></h3></div>
    <?php if ($serviceRooms['onetime']) {
        for ($o=0;$o<count($serviceRooms['onetime']);$o++) {
            $ot = $o +1; ?>
    <div id="rooms_onetime<?= $ot; ?>">
        <table>
            <tr>
                <td>
                    <label for="service_onetime_amnt_rooms<?= $ot; ?>"><?php _e('Rooms:'); ?></label>
                    <input type="number" name="service_onetime_amnt_rooms<?= $ot; ?>" id="service_onetime_amnt_rooms<?= $ot; ?>" value="<?= $serviceRooms['onetime'][$o]['rooms']; ?>" />
                </td>
                <td>
                    <label for="service_onetime_sqft<?= $ot; ?>"><?php _e('SQFT:'); ?></label>
                    <input type="number" name="service_onetime_sqft<?= $ot; ?>" id="service_onetime_sqft<?= $ot; ?>" value="<?= $serviceRooms['onetime'][$o]['sqft']; ?>" />
                </td>
                <td>
                    <label for="service_onetime_price<?= $ot; ?>"><?php _e('Price:'); ?></label>
                    <input type="text" name="service_onetime_price<?= $ot; ?>" id="service_onetime_price<?= $ot; ?>" value="<?= $serviceRooms['onetime'][$o]['price']; ?>" />
                </td>
            </tr>
        </table>
    </div>
     <?php
        } ?>
    <?php
    } ?>
     <?php if ($serviceRooms['onetime'] !== null) {
        $next_count_rooms = count($serviceRooms['onetime']) + 1;
    }?>
    <div id="rooms_onetime<?= $next_count_rooms; ?>"></div>
    <div style="margin-top: 20px;">
        <table>
            <tr>
                <td>
                    <a href="javascript:;" id="addonetimerm" title="Add Room"><img src="<?php echo get_theme_file_uri('/images/add-icon.png'); ?>" class="addrmimg" alt="Add Room"></a>
                </td>

                <td>
                    <a href="javascript:;" id="remonetimerm" title="Remove Room"><img src="<?php echo get_theme_file_uri('/images/remove-icon.png'); ?>" class="remrmimg" alt="Remove Roome"></a>
                </td>
            </tr>
        </table>
    </div>