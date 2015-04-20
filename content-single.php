<?php
/**
 * @package windows
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
<?php 

$image = get_field('image');

if( !empty($image) ): ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>
<h2><?php the_field('title'); ?></h2>
<h2><?php the_field('post_date'); ?></h2>
<h2><?php the_field('creation_date'); ?></h2>
<h2><?php the_field('materials_used'); ?></h2>

	
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'windows' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php windows_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
