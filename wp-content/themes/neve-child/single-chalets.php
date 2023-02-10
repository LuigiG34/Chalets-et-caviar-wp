<?php

/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      28/08/2018
 *
 * @package Neve
 */

$container_class = apply_filters('neve_container_class_filter', 'container', 'single-post');

get_header();

?>
<style>
	h1.entry-title {
		text-align: left;
	}
	.nv-sidebar-wrap {
		display: none;
	}
	.nv-single-post-wrap>div:not(:last-child) {
    margin-bottom: 0;
	}
	p {
		margin-bottom: 10px;
	}
	h3 {
		margin-bottom: 10px;
	}
</style>




<div class="<?php echo esc_attr($container_class); ?> single-post-container">
	<div class="row">
		<?php do_action('neve_do_sidebar', 'single-post', 'left'); ?>
		<article id="post-<?php echo esc_attr(get_the_ID()); ?>" class="<?php echo esc_attr(join(' ', get_post_class('nv-single-post-wrap col'))); ?>">
			<?php
			/**
			 *  Executes actions before the post content.
			 *
			 * @since 2.3.8
			 */
			do_action('neve_before_post_content');

			if (have_posts()) {
				while (have_posts()) {
					the_post();
					get_template_part('template-parts/content', 'single');
			?>
					<?php if (!empty(get_post_meta($post->ID, 'Prix', true))) : ?>
						<h3><strong>Prix :</strong> <?php echo get_post_meta($post->ID, 'Prix', true); ?>,00€</h3>
					<?php endif; ?>

					<?php if (!empty(get_post_meta($post->ID, 'prix_a_la_semaine', true))) : ?>
						<h3><strong>Prix à la semaine :</strong> <?php echo get_post_meta($post->ID, 'prix_a_la_semaine', true); ?>,00€</h3>
					<?php endif; ?>

					<p><strong>Nombre de chambre :</strong> <?php echo get_post_meta($post->ID, 'nombre_de_chambres', true); ?></p>

					<p><strong>Nombre de salles de bain :</strong> <?php echo get_post_meta($post->ID, 'salles_de_bain', true); ?></p>

					<?php if (!empty(get_post_meta($post->ID, 'nombre_de_places', true))) : ?>
						<p><strong>Nombre de places :</strong> <?php echo get_post_meta($post->ID, 'nombre_de_places', true); ?></p>
					<?php endif; ?>

					<?php if (!empty(get_post_meta($post->ID, 'Surface', true))) : ?>
						<p><strong>Surface :</strong> <?php echo get_post_meta($post->ID, 'Surface', true); ?>m²</p>
					<?php endif; ?>
			<?php
				}
			} else {
				get_template_part('template-parts/content', 'none');
			}

			/**
			 *  Executes actions after the post content.
			 *
			 * @since 2.3.8
			 */
			do_action('neve_after_post_content');
			?>
		</article>
		<?php do_action('neve_do_sidebar', 'single-post', 'right'); ?>
	</div>
</div>
<?php
get_footer();
