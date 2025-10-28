<?php
/**
 * Attorney Bio Template
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="page-right">
    <span class="page-title">PROFESSIONALS</span>
    <span class="arrows">
        <a href="javascript:scrollUp()"><span class="icon-up-arrow"></span></a>
        <a href="javascript:scrollDown()"><span class="icon-down-arrow"></span></a>
    </span>
</div>

<div class="page-left">

    <section class="title-section">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                <p id="breadcrumbs"><span><span><a href="/">Homepage</a> / <span class="breadcrumb_last" aria-current="page"><?php the_title(); ?></span></span></span></span></p>
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
                                <?php if( get_field('attorney_phone') ) : ?><p><span class="gold">P</span> &nbsp; <a href="tel:<?php the_field('attorney_phone'); ?>" title="Call <?php the_title(); ?>"><?php the_field('attorney_phone'); ?></a><br><?php endif; ?>
                                <?php if( get_field('attorney_email') ) : ?><span class="gold">E</span> &nbsp; <a href="mailto:<?php the_field('attorney_email'); ?>" title="Email <?php the_title(); ?>"><?php the_field('attorney_email'); ?></a><br><?php endif; ?>
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

                    <span class="spacer-60"></span>
                    
                    <?php if ( !is_single (380) ) : ?>

                    <div class="practice-area-list">
                    <p class="small-gold">/ Practice Areas</p>
                        <?php
                        $practiceareas = get_field('practice_areas');
                        if( $practiceareas ): ?>
                        <ul>
                            <?php foreach( $practiceareas as $practicearea ): ?>
                                <a href="<?php echo $practicearea['value']; ?>"><li><?php echo $practicearea['label']; ?></li></a>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block', 'attorneys');?>      

    <?php get_template_part('block', 'updates');?>   


</div>

<?php get_footer();?>