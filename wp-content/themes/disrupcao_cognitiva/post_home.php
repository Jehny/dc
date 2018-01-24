<div class="container-fluid">
	<div class="col-md-8 artigo">
		<div class="artigo">
			<h4>Nossas últimas notícias...</h4>
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$curpage = $paged ? $paged : 1;
				$temp =  $query;
  				$query = null;

				$args_1 = array('post_status' => 'publish');

				$query = new WP_Query( $args_1 );

				$query -> query('post_type=post&posts_per_page=10'.'&paged='.$paged);

				if ($query->have_posts()) {
					 while ($query->have_posts()) {
						 print_r($query->the_post()); 
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
								the_post_thumbnail('img-responsive'); 
							}
						?>
					</div>
					<div>
						<p class="titulo"><a href="<?php echo esc_url(get_permalink(get_the_ID()));?>" title="O que é IBM Watson?"><?php echo the_title(); ?></a></p>
						<p class="subtitulo"><?php echo $subtitulo; ?></p>
					</div>
					<p class="read"><a href="<?php echo esc_url(get_permalink(get_the_ID()));?>" title="">Leia mais...</a></p>
				</div>

			</div>

			<?php  }//end while
					if($query->max_num_pages > 1){

					
					?>
					<nav aria-label="Page navigation example">
					  <ul class="pagination">
					    <li class="page-item page-link"><?php previous_posts_link('Anterior', $query->max_num_pages) ?></li>
					    <?php
					    	for($i=1;$i<=$query->max_num_pages;$i++){
					    		$class = "";
					    		if($i == $curpage){
					    			$class="active";
					    		}
					    	    echo '<li class="page-item '.$class.'"><a class="page link" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
					    	}
					    ?>
					    <li class="page-item page-link"><?php next_posts_link('Próximo', $query->max_num_pages) ?></li>
					  </ul>
					</nav>
					<?php 
					}							
					?>
			<?php	} // end if
				$query = null; $query = $temp; 
				if ( function_exists( 'pgntn_display_pagination' ) ) pgntn_display_pagination( 'posts' );
			?>

		</div>
	</div>

	<!-- Sobre da Home -->
	<div class="col-md-4 sobre hidden-xs hidden-sm">
		<?php  $page = get_page_by_title('Sobre nós'); 
				$id = $page->ID; 
				$resumo = get_field('resumo', $id);
				$email = get_field('email_contato', $id);
		?>
		<div>
			<div class="img_titulo">
				<p><?php echo get_the_post_thumbnail( $id, 'thumbnail' ); ?></p>
				<p class="titulo">Disrupção cognitiva</p>	
			</div>
			<p class="resumo"><?php echo $resumo; ?></p>
			<p class="readmore"><a href="<?php echo esc_url(get_permalink($id));?>">Mais informações...</a></p>
		</div>

		<?php 

				$args = array(
					'posts_per_page'   => 3,
					'offset'           => 0,
					'category'         => '',
					'category_name'    => '',
					'orderby'          => '',
					'order'            => 'ASC',
					'include'          => '',
					'exclude'          => '',
					'meta_key'         => '',
					'meta_value'       => '',
					'post_type'        => 'redes_sociais',
					'post_mime_type'   => '',
					'post_parent'      => '',
					'author'	   	=> '',
					'post_status'      => 'publish',
					'suppress_filters' => true 
				);
				$redes = get_posts($args);

		?>
		<div class="links_contato">
			<ul class="list-inline">
				<li><a href="mailto:<?php echo $email; ?>"><i class="icon-envelope"></i></a></li>
				<?php if($redes){
						foreach ($redes as $r){
							$icone = get_field('classe_icone', $r->ID);
							$link = get_field('link', $r->ID);
					?>
						<li><a href="<?php echo $link; ?>"><i class="<?php echo $icone; ?>"></i></a></li>
					<?php 	}
						}	 ?>
			</ul>
		</div>

	</div>
	
</div>