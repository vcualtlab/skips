<?php get_header(); ?>

			<div id="content">

				<div id="inner-content">

					<main id="main" role="main">
						<section class="paddings">
					
						<h1 class="archive-title"><span><?php _e( 'Search Results for', 'bonestheme' ); ?></span> <em><?php echo esc_attr(get_search_query()); ?></em></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php 

							if ($post->post_parent)	{
								$ancestors=get_post_ancestors($post->ID);
								$root=count($ancestors)-1;
								$parent = $ancestors[$root];
							} else {
								$parent = $post->ID;
							} 



							$permalink = get_permalink( $parent );
							$sectionlink = ( $parent == $post->ID ? '' : '#page-item-' . $post->ID );
							?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

								<header class="entry-header article-header">





									<h2 class="search-title entry-title"><a href="<?php echo $permalink . $sectionlink; ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                  						

								</header>

								<section class="entry-content">
										<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'bonestheme' ) . '</span>' ); ?>

								</section>


							</article>

						<?php endwhile; ?>

								<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry">
										<h3>Sorry, nothing was found.</h3>
										<p>Please try your search again.</p>
									</article>

							<?php endif; ?>

							</section>
						</main>

					</div>

			</div>

<?php get_footer(); ?>
