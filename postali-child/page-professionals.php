<?php
/**
 * Template Name: Professionals Page
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
                    <h1>Professionals</h1>
                </div>
            </div>
        </div> 
    </section>

    <section class="professionals-grid">
        <div class="container">
            <div class="columns">
            <?php $args = array (
                'post_type' => 'attorneys',
                'posts_per_page' => '-1',
                'post_status' => 'publish',
                'order' => 'ASC',
            );
            $query = new WP_Query($args);
            ?>
            <?php while( $query->have_posts() ) : $query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="column-25 centered">
                    <img src="<?php the_field('attorney_headshot'); ?>" alt="<?php the_title(); ?>">
					<h3><?php the_title(); ?></h3>
					<p class="small-gold"><?php the_field('attorney_title'); ?></p>
                </a>
			<?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="columns">
                <p class="small-gold">/ STATE OF TEXAS V. RAUL VILLAREAL</p>
                <div class="column-full">
                    <img src="<?php the_field('image'); ?>" alt="<?php the_field('image_caption'); ?>">
                </div>
                <div class="column-break"></div>
                <div class="column-50 caption">
                    <p><?php the_field('image_caption'); ?></p>
                </div>
                <div class="column-50">
                    &nbsp;
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer();?>