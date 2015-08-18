	<?php get_header();?>   
    <div class="container" id="ktMain">
		<div class="row">
		  <div class="col-md-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if(has_post_thumbnail()) { ?>
			<div class="row kt-article">
			  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				  <div class="col-md-6">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('', array("class" => "thumbnail"));  ?></a>
				  </div>
				  <div class="col-md-6">
					<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php 
						$thetitle = get_the_title($post->ID);
						$origpostdate = get_the_date('M d, Y', $post->post_parent);
						$origposttime = get_the_time('M d, Y', $post->post_parent);
						$dateline = $origpostdate.' '.$origposttime;
						//var_dump($thetitle);
						if($thetitle==null){echo $dateline;}else{
						the_title();                     
						}
					?></a></h1>
					<?php the_excerpt(); ?>
					<div class="kt-divider clearfix"></div>
					<p class="ktCredentials"> <a href="<?php comments_link(); ?>">
					<?php $comments = get_comments_number(); if($comments) {
						echo $comments == 1 ? $comments.__(' comment', 'restaurante') : $comments.__(' comments', 'restaurante');
					} else {
					  echo __('No comments', 'restaurante');
					} ?></a>, <?php the_author(); ?>, 
					<?php the_time(get_option('date_format')); ?></p>
					<?php if(get_post_meta($post->ID, 'kt_price', true))  : ?>
					<div class="kt-divider clearfix"></div>
					<p class="ktCredentials"><?php _e('Price: ', 'restaurante'); echo get_post_meta($post->ID, 'kt_price', true); ?></p>
					<?php endif; ?>
				  </div>
			  </div>
			</div>
			<?php } else { ?>
			<div class="row kt-article">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				  <div class="col-md-12">
					<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php 
						$thetitle = get_the_title($post->ID);
						$origpostdate = get_the_date('M d, Y', $post->post_parent);
						$origposttime = get_the_time('M d, Y', $post->post_parent);
						$dateline = $origpostdate.' '.$origposttime;
						//var_dump($thetitle);
						if($thetitle==null){echo $dateline;}else{
						the_title();                     
						}
					?></a></h1>
					<?php the_excerpt(); ?>
					<div class="kt-divider clearfix"></div>
					<p class="ktCredentials"> <a href="<?php comments_link(); ?>">
					<?php $comments = get_comments_number(); if($comments) {
						echo $comments == 1 ? $comments.__(' comment', 'restaurante') : $comments.__(' comments', 'restaurante');
					} else {
					  echo __('No comments', 'restaurante');
					} ?></a>, <?php the_author(); ?>, 
					<?php the_time(get_option('date_format')); ?></p>
					<?php if(get_post_meta($post->ID, 'kt_price', true))  : ?>
					<div class="kt-divider clearfix"></div>
					<p class="ktCredentials"><?php _e('Price: ', 'restaurante'); echo get_post_meta($post->ID, 'kt_price', true); ?></p>
					<?php endif; ?>
				  </div>
				</div>
			</div>		
			<?php	} ?>
			<div class="kt-divider clearfix"></div>
			<?php endwhile; else: ?>
			<div class="row kt-article">
			  <div class="col-md-12">
				<h1><?php _e('Sorry, no posts matched your criteria.', 'restaurante'); ?></h1>
			  </div>
			</div>
			<?php endif; ?>
			<!-- FIX NAV TRANSLATION -->
			<div id="kt-pagination">
				<div class="alignleft"><?php previous_posts_link(__( '&laquo; Newer posts', 'restaurante' )) ?></div>
				<div class="alignright"><?php next_posts_link(__( 'Older posts &raquo;', 'restaurante' )) ?></div>
			</div>
		  </div>
         
		  <?php get_sidebar(); ?>
		</div>
	</div>
    
	<?php get_footer(); ?>   