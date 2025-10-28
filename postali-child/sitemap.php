<?php
/**
 * Template Name: Sitemap
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<?php get_template_part('block', 'right-bar');?>

<div class="page-left">
    <section class="title-section">
        <div class="container">
            <div class="columns">
                <div class="column-full">
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
    <section>
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <h2>Pages</h2> 
                    <div class="spacer-30"></div>
                    <ul>
                        <?php wp_list_pages("title_li=" ); ?>
                    </ul> 
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; ?>

</div>

<?php get_footer();?>