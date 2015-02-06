<?php get_header(); ?>

			<div id="content">

				<div id="inner-content">

					<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">


<?php
/**
* WordPress Query Comprehensive Reference
* Compiled by luetkemj - luetkemj.com
*
* CODEX: http://codex.wordpress.org/Class_Reference/WP_Query#Parameters
* Source: https://core.trac.wordpress.org/browser/tags/3.9/src/wp-includes/query.php
*/
 
// figure out what page we are on. 
// parent or child
// if we are on a child page redirect to parent
// if we are on parent show that page
// show all children below and only children of parent lecture


							if ($post->post_parent)	{
								$ancestors=get_post_ancestors($post->ID);
								$root=count($ancestors)-1;
								$parent = $ancestors[$root];
							} else {
								$parent = $post->ID;
							}

							$args = array( 
								'posts_per_page' => 1,
								'post_type' => 'page',
								'page_id' => $parent,
								// 'post_parent' => $parent
							);

							$the_query = new WP_Query( $args );

							// The Loop
							if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

								</header> <?php // end article header ?>

								<section class="entry-content" itemprop="articleBody">
									<?php
										the_content();
									?>
								</section> <?php // end article section ?>

								<footer class="article-footer">

								</footer>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


<?php 

// Reset Post Data
wp_reset_postdata();

?>






<?php
/**
* WordPress Query Comprehensive Reference
* Compiled by luetkemj - luetkemj.com
*
* CODEX: http://codex.wordpress.org/Class_Reference/WP_Query#Parameters
* Source: https://core.trac.wordpress.org/browser/tags/3.9/src/wp-includes/query.php
*/
 
// figure out what page we are on. 
// parent or child
// if we are on a child page redirect to parent
// if we are on parent show that page
// show all children below and only children of parent lecture


$children = wp_list_pages('title_li=&echo=0&child_of=' . $parent);
if ($children){
							$args = array( 
								'posts_per_page' => -1,
								'post_type' => 'page',
								// 'page_id' => $parent,
								'post_parent' => $parent
							);

							$the_query = new WP_Query( $args );

							// The Loop
							if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

								</header> <?php // end article header ?>

								<section class="entry-content" itemprop="articleBody">
									<?php
										the_content();
									?>
								</section> <?php // end article section ?>

								<footer class="article-footer">

								</footer>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


<?php 

// Reset Post Data
wp_reset_postdata();


}

?>
							




						</main>

				</div>

			</div>

<?php get_footer(); ?>
