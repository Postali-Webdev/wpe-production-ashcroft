<?php
/**
 * Template Name: Practice Areas Child
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
                
    <section>
        <div class="container">
            <div class="columns">
                <div class="column-66">
                    <?php the_content(); ?>
                </div>
                <div class="column-33">
                    <p class="small-gold">/ Attorneys</p>

                    <?php if ( is_page(411) ) : $pageid = '1'; endif; ?> <!-- government investigations -->
                    <?php if ( is_page(413) ) : $pageid = '2'; endif; ?> <!-- business litigation -->
                    <?php if ( is_page(414) ) : $pageid = '3'; endif; ?> <!-- corporate compliance -->
                    <?php if ( is_page(417) ) : $pageid = '4'; endif; ?> <!-- export controls -->
                    <?php if ( is_page(418) ) : $pageid = '5'; endif; ?> <!-- fcpa -->
                    <?php if ( is_page(419) ) : $pageid = '6'; endif; ?> <!-- general corporate business -->
                    <?php if ( is_page(420) ) : $pageid = '7'; endif; ?> <!-- health care -->
                    <?php if ( is_page(421) ) : $pageid = '8'; endif; ?> <!-- internal investigation -->
                    <?php if ( is_page(422) ) : $pageid = '9'; endif; ?> <!-- crisis management -->
                    <?php if ( is_page(423) ) : $pageid = '10'; endif; ?> <!-- mergers & acquisitions -->
                    <?php if ( is_page(424) ) : $pageid = '11'; endif; ?> <!-- securities litigation -->
                    <?php if ( is_page(425) ) : $pageid = '12'; endif; ?> <!-- anti-corruption -->
                    <?php if ( is_page(426) ) : $pageid = '13'; endif; ?> <!-- white collar -->
                    <?php if ( is_page(449) ) : $pageid = '14'; endif; ?> <!-- commercial litigation -->
                    <?php if ( is_page(451) ) : $pageid = '15'; endif; ?> <!-- appellate litigation -->
                    <?php if ( is_page(415) ) : $pageid = '16'; endif; ?> <!-- election law -->
                    <?php if ( is_page(416) ) : $pageid = '17'; endif; ?> <!-- whistleblower law -->

                        <?php if( have_rows('practice_areas','options') ): ?>
                        <?php while( have_rows('practice_areas','options') ): the_row(); ?>
                            <?php if ( get_sub_field('practice_area_id') == $pageid) : ?> 
                                <?php if( have_rows('associated_attorneys') ): ?>

                                    <?php while( have_rows('associated_attorneys') ): the_row(); ?>
                                        
                                        <?php $post_object = get_sub_field('attorney'); ?>
                                        <?php if( $post_object ): ?>
                                        <?php $post = $post_object; setup_postdata( $post ); ?>
                                            <div class="associated-attorneys">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <span class="attorney-headshot">
                                                        <img src="<?php the_field('attorney_headshot'); ?>" alt="<?php the_title(); ?>">
                                                    </span>
                                                    <span class="attorney-details">
                                                        <span class="attorney-name"><?php the_title(); ?></span>
                                                        <p class="small-gold"><?php the_field('attorney_title'); ?></p>
                                                    </span>
                                                </a>
                                            </div>

                                            <hr>

                                        <?php wp_reset_postdata(); ?>
                                        <?php endif; ?>

                                    <?php endwhile; ?>

                                <?php endif; ?>
                            <?php endif; ?> 
                        <?php endwhile; ?>
                        <?php endif; ?>  

                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block', 'updates');?>  

</div>

<?php get_footer();?>