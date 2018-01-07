<div class="container-fluid">
	<div class="col-md-8 artigo">
		<div class="artigo">
			<h4>Nossas últimas notícias...</h4>
			<?php 
				if (have_posts()) {
					 while (have_posts()) {
						 print_r(the_post()); 
						$id = get_the_ID(); 
						$subtitulo = get_field('subtitulo_post', $id);
			?>
			<div class="posts">
				<div class="autor">
					<div class="imagem">

						<p><?php echo get_wp_user_avatar(); ?></p>	
					</div>
					<div class="dados">
						<p class="nome"><?php the_author(); ?></p>
						<p class="info"><?php the_time('F j, Y'); ?></p>
					</div>
				</div>
				<div class="conteudo">
					<div class="img_destaque">
						<?php 
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('full'); 
							}
						?>
					</div>
					<div>
						<p class="titulo"><a href="<?php echo esc_url(get_permalink(get_the_ID()));?>" title="O que é IBM Watson?"><?php echo the_title(); ?></a></p>
						<p class="subtitulo"><?php echo $subtitulo; ?></p>
					</div>
					<p class="read"><a href="<?php echo esc_url(get_permalink(get_the_ID()));?>" title="">Read more...</a></p>
				</div>
				
			</div>

			<?php  }
				}
			?>
		</div>
	</div>
	<div class="col-md-4">
	</div>	
</div>