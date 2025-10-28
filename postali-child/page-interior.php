<?php
/**
 * Template Name: Interior Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<?php get_template_part('block', 'right-bar');?>

<div class="page-left">
    <section class="title-section">
        <div class="container">
            <div class="columns">
                <div class="column-full centered">
                    <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    }
                    ?>
                    <div class="spacer-30"></div>
                    <h1><?php the_title(); ?>
                </div>
            </div>
        </div> 
    </section>

    <?php while (have_posts()) : the_post(); ?>
        <?php the_content();?>
    <?php endwhile; ?>

    <?php if (  is_page(59) ) : ?> <!-- get locations repeater for contact page -->
        <?php get_template_part('block', 'office-locations');?>      
    <?php endif; ?> 

    <?php if (  is_page(42) ) : ?> <!-- get link to attorneys landing page -->
        <?php get_template_part('block', 'attorneys');?>      
    <?php endif; ?> 

</div>

<?php get_footer();?>