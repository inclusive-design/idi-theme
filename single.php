<?php get_header(); ?>

<div class="fl-centered fl-col-mixed fl-site-wrapper">

	<div class="fl-col-fixed fl-force-left"> 	
		<?php get_sidebar('news'); ?>
	</div>

    <div class="fl-col-flex idi-one-column">
		<div class="idi-news-article idi-breadcrumbs">
            <a href="/news">Back to News</a>
        </div>
        
		<div class="idi-news-article">
		    <h1><?php the_title(); ?></h1> 
	        <div class="idi-date">Posted <?php the_time('F jS, Y'); ?> by <?php the_author(); ?></div>        
	        <div class="entry">
	            <?php the_content(); ?>                
	        </div>
		</div>
	</div>

</div>
		
<?php get_footer(); ?>
