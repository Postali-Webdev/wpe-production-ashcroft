<section class="updates ltgrey">
    <div class="container">
        <div class="columns">
			<div class="column-full centered">
                <p class="small-gold">/ recent updates</p>
            </div>
            <?php $args = array (
                'post_type' => 'updates',
                'posts_per_page' => '3',
                'post_status' => 'publish',
                'paged' => $paged,
                'order' => 'DESC',
            );
            $query = new WP_Query($args);
            ?>
            <?php while( $query->have_posts() ) : $query->the_post(); ?>
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