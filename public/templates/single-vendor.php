<?php get_header();?>

<?php while (have_posts()) { ?>
<?php the_post(); ?>  
    <section class="amhvndr_wrap">
        <div class="amhvndr_vendor-single">
            <div class="amhvndr_vendor-single__container">
                <h2 class="amhvndr_vendor-single__title"><?php the_title();?></h2>
                <p class="amhvndr_vendor-single__excerpt"><?php echo get_the_excerpt();?></p>

                <div class="amhvndr_vendor-single__image">
                    <?php echo get_the_post_thumbnail($post, $size = 'large', $attr = '');?>
                </div>
                <div class="amhvndr_vendor-single__content">
                    <?php the_content();?>
                </div>
                
                <div class="amhvndr_vendor-single__checklist">
                    <a href="#" class="amhvndr_btn">View Checklist</a>
                </div>
                
            </div>
        </div>
    </section>
    <!-- blog end -->
<?php } ?>

<?php get_footer();?>