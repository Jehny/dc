<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/dc.css" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/icones.css" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/medias.css" type="text/css" />	
		
		<script src="<?php bloginfo('template_url'); ?>/js/jquery-3.0.0.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/ico_logo.png" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/ico_logo.png" type="image/x-icon" />
		<link rel="icon" type="image/ico" href="<?php bloginfo('template_url'); ?>/img/ico_logo.png" />

		<title>Disrupção Cognitiva</title>

	</head>

	<body>
		<header id="header" class="row-fluid">
			<div class="container-fluid">
				<div class="col-md-8 col-xs-8 logo">
					<h1>
						<a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/titulo_home.png"></a>
					</h1>	
				</div>
				<div class="col-md-4 col-xs-4 login">
					<a href="wp-admin">Sign in</a>
				</div>					
			</div>
		</header>
		<!-- <div id="banner">
			<div class="texto container-fluid">
				<h2>Disrupção Cognitiva</h2>
				<h3>Um espaço para analisar criticamente os avanços tecnológicos e os seus impactos na sociedade</h3>
			</div>

		</div> -->
		<?php 
			$banners = get_posts('post_type=banners');
			if($banners){
				foreach ($banners as $banner){
					
		?>		<div id="banner">
					<div class="imagem">
						<img alt="" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($banner->ID)); ?>" class="img-responsive">
					</div>
		<?php
						if(get_field('titulo', $banner->ID) != ""){
			?>				
						    <div class="texto container-fluid">
						       	<h2><?php if(get_field('titulo', $banner->ID)) { echo get_field('titulo', $banner->ID); } ?></h3>
						        <h3><?php if(get_field('subtitulo', $banner->ID)) { echo get_field('subtitulo', $banner->ID); } ?></h3>
						    </div>
					<?php } ?>
					</div>	
					
		<?php  		
				}
			}
		?>		</div>
		<?php include 'menu.php'; ?>

