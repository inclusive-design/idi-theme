<?php
/*
Template Name: Equipment List
*/
?>
<?php get_header(); ?>

<?php if ( is_user_logged_in() ): ?>

<?php if (have_posts()) { the_post(); } ?>
<div class="idi-equipment fl-centered fl-col-mixed fl-site-wrapper">
    <div class="fl-col-fixed fl-force-left">
        <?php get_sidebar('equipment');?>
    </div>
    <div id="content" class="fl-col-flex idi-3cols">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>
</div>

<?php else: ?>
	<p>You must login to view this content.</p>
<?php endif; ?>
		
<?php get_footer(); ?>
