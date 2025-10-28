<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */
$blogDefault = get_field('default_blog_image', 'options');
get_header();?>

<div class="page-right">
    <span class="page-title">UPDATES</span>
    <span class="arrows">
        <a href="javascript:scrollUp()"><span class="icon-up-arrow"></span></a>
        <a href="javascript:scrollDown()"><span class="icon-down-arrow"></span></a>
    </span>
</div>

<div class="page-left">
    <section class="title-section">
        <div class="container">
            <div class="columns">
                <div class="column-66 centered">
                    <p id="breadcrumbs"><span><span><a href="/">Homepage</a> / <a href="/updates/">Updates</a>  / <span class="breadcrumb_last" aria-current="page"><?php the_title(); ?></span></span></span></p>
                    <div class="spacer-30"></div>
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div> 
    </section>

    <div class="spacer-90"></div>


    <?php if( have_rows('related_professionals') ): ?>

    <section id="associated-attorney" class="ltgrey">
        <div class="container">
            <div class="columns">
                <div class="column-50 separator">
                    <h2>Related Professional</h2>
                </div>
                <div class="column-50">
                <?php while( have_rows('related_professionals') ): the_row(); ?>
                <?php
                $post_object = get_sub_field('attorney');
                if( $post_object ): ?>

                    <? // override $post
                    $post = $post_object;
                    setup_postdata( $post ); 
                    ?>
                    <?php 
                    $title = get_the_title(); // This must be!, because this is the return - the_title would be echo
                    $title_array = explode(' ', $title);
                    $first_word = $title_array[0];
                    ?>
                    <div class="associated-attorney-details">
                        <div class="img">
                            <img src="<?php the_field('attorney_headshot'); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="details">
                            <h3><?php the_title(); ?></h3>
                            <span class="small-gold"><?php the_field('attorney_title'); ?> / </span> <span class="read-bio"><a href="<?php the_permalink(); ?>">Read <?php echo $first_word; ?>'s bio</a></span>
                        </div>
                    </div>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

                    <?php endif; ?>
                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    </section>
    
    <?php endif; ?> 


    <section class="post-content white">
        <div class="container">
            <div class="columns">
                <?php if ( get_field('blog_image') ) { ?>   
                    <div class="column-33">
                        <img src="<?php the_field('blog_image'); ?>" />
                        <?php if ( get_field('blog_image_caption') ) { ?>
                            <span class="image-caption"><?php the_field('blog_image_caption'); ?></span>
                        <?php } ?>
                    </div>
                    <div class="column-66">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php the_content();?>
                        <?php endwhile; ?>
                    </div>
                <?php } else { ?>
                    <div class="column-full">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php the_content();?>
                            <div class="updates-details" id="published">
                                <div class="details-top"><p class="small-gold">/ Published</p></div>
                                <p><?php echo get_the_date( 'M d, Y' ); ?></p>
                            </div>
                            <div class="updates-details" id="share">
                                <div class="details-top"><p class="small-gold">/ Share</p></div>
                                    <a title="Click to share this post on Twitter" href="http://twitter.com/intent/tweet?text=Currently reading <?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                                        <span class="icon-twitter"><span class="path1"></span><span class="path2"></span></span>
                                    </a>
                                    <a href="https://www.linkedin.com/shareArticle/?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>" target="_new" rel="noopener noreferrer">
                                        <span class="icon-linkedin"></span>
                                    </a> 
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php get_template_part('block', 'updates');?>  

</div>

<?php get_footer();?>