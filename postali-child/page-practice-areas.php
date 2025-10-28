<?php
/**
 * Template Name: Practice Area Landing
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
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div> 
    </section>
                
    <section class="practice-area-links">
        <div class="container">
            <div class="columns">
            <?php if( have_rows('practice_areas') ): ?>
            <?php while( have_rows('practice_areas') ): the_row(); ?>
                <a href="<?php the_sub_field('practice_area_link'); ?>" title="<?php the_sub_field('practice_area_title'); ?>">
                    <h2><?php the_sub_field('practice_area_title'); ?></h2>
                </a>    
            <?php endwhile; ?>
            <?php endif; ?> 
            </div>
        </div>
    </section>

</div>

<?php get_footer();?>