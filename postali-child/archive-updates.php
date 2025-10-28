<?php
/**
 * Archive - Updates
 * 
 * @package Postali Child
 * @author Postali LLC
 */

get_header(); ?>

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
                    <?php
                        if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                        }
                    ?>
                    <div class="spacer-30"></div>
                    <h1>Updates</h1>
                </div>
            </div>
		</div> 
	</section>

	<section class="blog-grid">
		<div class="container">
			<div class="columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="column-33 blog-box">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<div class="blog-content">
							<h2><?php the_title(); ?></h2>
							<div class="spacer-15"></div>
							<?php the_excerpt(); ?>
							<?php if( have_rows('related_professionals') ): ?>
								<div class="spacer-30"></div>
								<p class="update-category"><span>Category:&nbsp;</span> 
								<?php while( have_rows('related_professionals') ): the_row(); ?>
								<?php
								$post_objects = get_sub_field('attorney');
								if( $post_objects ) { 
								?> 

								<?php $names_array = get_the_title($post_objects->ID); ?>
								<?php echo $names_array; ?><span class="comma">,&nbsp;</span>
								<?php } ?>
								<?php endwhile; ?>
								</p>
							<?php endif; ?>
						</div>
						<div class="read-article">
							<div class="link-text">Read Article <span class="icon-right-arrow"></span></div>
						</div>
					</a>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</section>

    <section class="pagination">
    	<div class="container ">      
			<div class="columns">
				<div class="column-full centered">    

						<div class="container posts">
						<?php the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => __( '<span class="icon-left-arrow"></span>', 'textdomain' ),
							'next_text' => __( '<span class="icon-right-arrow"></span>', 'textdomain' ),
						) ); ?>
						</div>
						   
				</div>
			</div>
    	</div>
    </section>

</div>

<?php get_footer();?>
