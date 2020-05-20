<?php
wp_nonce_field('service_checklist_metabox', 'service_checklist_metabox_nonce');
        $ChecklistLink = get_post_meta($post->ID, "_service_checklist", true);
?>
<div>
  <p class="description"><?php _e('Upload the PDF checklist:'); ?></p>
  <?php
  if (is_multisite()) {
      $uploads = wp_upload_dir();
      $current_blog_id = get_current_blog_id();
      $blogid = $current_blog_id;
  } else {
      $uploads = wp_upload_dir();
      $blogid = 1;
  }
  ?>
  <?php if ($ChecklistLink!='' && $blogid == 1) { ?>
  <a href="<?php echo $uploads['baseurl'].'/'.$ChecklistLink; ?>" target="_blank" class="text-center"><img src="<?php echo includes_url('images/media/document.png'); ?>" /></a>
  <?php
  } ?>
  <?php if ($ChecklistLink!='' && $blogid != 1) {
      $upload_base_url = str_replace("/sites/".$blogid."", "", $uploads['baseurl']); ?>
  <a href="<?php echo $upload_base_url.'/'.$ChecklistLink; ?>" target="_blank" class="text-center"><img src="<?php echo includes_url('images/media/document.png'); ?>" /></a>
  <?php
  } ?>
    <p class="description" id="checklist_file_name"></p>
    <input id="checklist_file" name="checklist_file" type="hidden" value="<?php echo $ChecklistLink; ?>" />
   <input id="upload_checklist_button" type="button" value="Upload File" class="button button-success button-large" />
</div>