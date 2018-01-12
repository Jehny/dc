<?php 
	$query = "";
	$key = "";
	$tag ="";
	if(isset($_GET['tag'])){
		$key = $_GET['tag'];
		$tag = $_GET['tag'];
		$query = new WP_Query( array( 'tag' => $key ) );
	} else {
		$key = $_GET['key'];
		$query = new WP_Query( array( 's' => $key ) );
	}

include "header2.php";
	
?>

<div class="row-fluid">
	<div class="container-fluid">
		<div class="listagem_busca">
			<p class="titulo"> Resultado da busca</p>
			<?php if($tag) { ?>
				<p class="tag">Buscando tag '<?php echo $key; ?>'</p>
			<?php } else { ?>
				<p class="tag">Buscando por '<?php echo $key; ?>'</p>
			<?php } ?>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 cards">
		<?php if ($query->have_posts()) {
				 while ($query->have_posts()) {
				 	$query->the_post();  
		?>
		<div class="list_card col-md-4 list_card_single">
			<a href="<?php echo esc_url(get_permalink(get_the_ID()));?>">
			<?php 
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('full'); 
				}
			?>
			</a>
			<p class="titulo"><a href="<?php echo esc_url(get_permalink(get_the_ID()));?>"><?php echo the_title(); ?></a></p>
			<div class="autor">
				<div class="imagem">
					<p><?php 
						echo get_wp_user_avatar(); ?></p>
				</div>
				<div class="dados">
					<p class="nome"><?php the_author(); ?></p>
					<p class="info"><?php the_time('F j, Y'); ?></p>
				</div>
			</div>
		</div>
		<?php }
				wp_reset_query();
			} else {
				echo "<p class='sem_result'>Nenhum resultado encontrado para '". $key . "'!</p>";
			}
		?>
		</div>
	</div>
</div>

<?php //include "footer.php"; ?>