<?php get_header();?>

<section class="amhcls_wrap">
        <?php if (have_posts()) : ?>
            <?php
                the_archive_title('<h1 class="amhcls_archive-title">', '</h1>');
            ?>
        <?php endif; ?>
        <div class="amhcls_services">
            <?php while (have_posts()) { ?>
            <?php the_post(); ?>              
            <div class="amhcls_service">
                <div class="amhcls_service__container">
                    <div class="amhcls_service__image">
                        <?php echo get_the_post_thumbnail($post, $size = 'large', $attr = '');?>
                    </div>
                    <div class="amhcls_service__content">
                        <h4 class="amhcls_service__content-title"><?php echo the_title();?></h4>
                        <p><?php wp_trim_words(the_excerpt(), 25);?></p>
                    </div>
                    <div class="amhcls_service__button">
                        <a href="<?php echo the_permalink();?>" class="amhcl_btn"><?php echo __('Read More');?></a>
                    </div>                        
                </div>
            </div>

            <?php } ?>
        </div>

        <!-- Pagination Links -->
        <div class="amhcls_pagination">
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