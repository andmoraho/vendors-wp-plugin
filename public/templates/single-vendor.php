<?php get_header();?>

<?php while (have_posts()) { ?>
<?php the_post(); ?>  
    <section class="amhcls_wrap">
        <div class="amhcls_service-single">
            <div class="amhcls_service-single__container">
                <h2 class="amhcls_service-single__title"><?php the_title();?></h2>
                <p class="amhcls_service-single__excerpt"><?php echo get_the_excerpt();?></p>

                <div class="amhcls_service-single__image">
                    <?php echo get_the_post_thumbnail($post, $size = 'large', $attr = '');?>
                </div>
                <div class="amhcls_service-single__content">
                    <?php the_content();?>
                </div>
                
                <div class="amhcls_service-single__checklist">
                    <a href="#" class="amhcls_btn">View Checklist</a>
                </div>
                
            </div>
        </div>
    </section>
    <!-- blog end -->
<?php } ?>

<?php get_footer();?>