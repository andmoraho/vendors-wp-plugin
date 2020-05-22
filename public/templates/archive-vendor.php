<?php get_header();?>

<section class="amhvndr_wrap">
        <?php if (have_posts()) : ?>
            <?php
                the_archive_title('<h1 class="amhvndr_archive-title">', '</h1>');
            ?>
        <?php endif; ?>
        <div class="amhvndr_vendors">
            <?php while (have_posts()) { ?>
            <?php the_post(); ?>              
            <div class="amhvndr_vendor">
                <div class="amhvndr_vendor__container">
                    <div class="amhvndr_vendor__image">
                        <?php echo get_the_post_thumbnail($post, $size = 'large', $attr = '');?>
                    </div>
                    <div class="amhvndr_vendor__content">
                        <h4 class="amhvndr_vendor__content-title"><?php echo the_title();?></h4>
                        <p><?php the_content();?></p>
                    </div>
                    <div class="amhvndr_vendor__button">
                        <a href="<?php echo the_permalink();?>" class="amhcl_btn"><?php echo __('Read More');?></a>
                    </div>                        
                </div>
            </div>

            <?php } ?>
        </div>

        <!-- Pagination Links -->
        <div class="amhvndr_pagination">
            <?php
                $big = 999999999; // need an unlikely integer
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged'))
                ));
            ?>
        </div>
</section>
            
<?php get_footer();?>