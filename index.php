<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<title>Jean-David.eu</title>
	<?php wp_head();?>
</head>
<body>

	<?php if(have_posts()) : while(have_posts()) : the_post();?>
		<article id="<?php echo get_the_ID();?>">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt();?>
		</article>
	<?php endwhile; endif;?>
	
	<a href="#" id="load">Chargez d'autres posts</a>

	<script src="<?php echo get_template_directory_uri(); ?>/jquery.js"></script>	
	<?php wp_footer();?>
</body>
</html>