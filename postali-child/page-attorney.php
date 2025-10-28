<?php
/**
 * Template Name: Attorney Bio
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
                </div>
            </div>
        </div> 
    </section>

    <section class="attorney-bio">
        <div class="container">
            <div class="columns">
                <div class="column-33">
                    <div class="attorney-info-container">
                        <div class="attorney-info">
                            <div class="location-column">
                                <img src="<?php the_field('attorney_headshot'); ?>" title="<?php the_title(); ?>" class="attorney-bio-headshot">
                                <div class="spacer-60"></div>
                                <h1><?php the_title(); ?></h1>
                                <div class="spacer-30"></div>
                                <p class="small-gold"><?php the_field('attorney_title'); ?> / <?php the_field('attorney_location'); ?></p>
                                <p><span class="gold">P</span> &nbsp; <a href="tel:<?php the_field('attorney_phone'); ?>" title="Call <?php the_title(); ?>"><?php the_field('attorney_phone'); ?></a><br>
                                <span class="gold">E</span> &nbsp; <a href="<?php the_field('attorney_email'); ?>" title="Email <?php the_title(); ?>"><?php the_field('attorney_email'); ?></a><br>
                                <?php if ( get_field( 'attorney_vcard' )) { ?>
                                    <span class="gold"><span class="icon-download"></span></span> &nbsp; <a href="<?php the_field('attorney_vcard'); ?>" title="Download <?php the_title(); ?>'s vCard'">vCard</a>
                                <?php } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column-66">
                    <?php the_field('attorney_bio_copy'); ?>
                    <div class="spacer-30"></div>

                    <?php if ( get_field( 'accordion_experience' )) { ?>
                    <div class="accordions"> <!-- govt experience -->
                        <div class="row">
                            <div class="col">
                                <div class="tabs">
                                    <div class="tab">
                                        <input type="checkbox" id="chck1">
                                        <label class="tab-label" for="chck1">/ Government Experience</label>
                                        <div class="tab-content">
                                            <?php the_field('accordion_experience'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ( get_field( 'accordion_education' )) { ?>
                    <div class="accordions"> <!-- education -->
                        <div class="row">
                            <div class="col">
                                <div class="tabs">
                                    <div class="tab">
                                        <input type="checkbox" id="chck2">
                                        <label class="tab-label" for="chck2">/ Education</label>
                                        <div class="tab-content">
                                            <?php the_field('accordion_education'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <?php if ( get_field( 'accordion_admissions' )) { ?>
                    <div class="accordions"> <!-- admissions -->
                        <div class="row">
                            <div class="col">
                                <div class="tabs">
                                    <div class="tab">
                                        <input type="checkbox" id="chck3">
                                        <label class="tab-label" for="chck3">/ Admissions</label>
                                        <div class="tab-content">
                                            <?php the_field('accordion_admissions'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ( get_field( 'accordion_clerkships' )) { ?>
                    <div class="accordions"> <!-- clerkships -->
                        <div class="row">
                            <div class="col">
                                <div class="tabs">
                                    <div class="tab">
                                        <input type="checkbox" id="chck4">
                                        <label class="tab-label" for="chck4">/ Clerkships</label>
                                        <div class="tab-content">
                                            <?php the_field('accordion_clerkships'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();?>