<?php
	include "header2.php";
	$titulo = "";
	$link = "";

	if(isset($_POST['submit'])){
		$teste = "<input type='hidden' id='enviado' />";
		$message = "Seu comentário foi enviado com sucesso!";
	}else {
		// echo "não encontrou o submit";
	}

?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div class="row-fluid">
		
		<section class="container-fluid">
			<div class="col-xs-12 col-sm-12 col-md-12">

			<?php if (have_posts()) {
					 while (have_posts()) {
						print_r(the_post());  
						$id = get_the_ID(); 
						$subtitulo = get_field('subtitulo_post', $id);
						$titulo = get_the_title();
						$link = esc_url(get_permalink(get_the_ID()));
			?>
					<div class="detalhe_post">
						<div class="row-fluid">
							<div class="posts col-md-12 col-lg-12 col-sm-6 col-xs-8">
								<!-- Autor -->
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
							<div class="redes_mobile compartilhamento_mobile visible-xs-block visible-sm-block hidden-md hidden-lg">
								<ul class="list-inline">
									<li><a href="javascript:void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo $link; ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"><i class="icon-facebook-with-circle"></i></a></li>
									<li><a href="javascript:void(0);" onclick="window.open('http://twitter.com/?status=<?php echo $link; ?>','twitter', 'toolbar=0, status=0, width=650, height=450')" ><i class="icon-twitter-with-circle"></i></a></li>
								</ul>
							</div>
							
						</div>
						<div class="row-fluid">
							<div>
								<h1 class="titulo"><?php echo the_title(); ?></h1>
								 <p class="subtitulo"><?php echo $subtitulo; ?></p>
							</div>
						</div>
						<div class="corpo">					
							<?php the_content(); ?>							
						</div>

						<!-- Tags -->
						<div class="meta_tags">
							<ul class="list-inline">
								<?php
									$posttags = get_the_tags();
									if ($posttags) {
									  foreach($posttags as $tag) {
									     
									?>
										<li><a href="<?php echo '../listagem?tag='.$tag->slug; ?>"><?php echo $tag->name; ?></a></li>
									<?php 
										}
									}

									?>
							</ul>
						</div>
					</div>					
			<?php }
				} 
			?>
			<div class="redes_web compartilhamento_web visible-lg-block visible-md-block hidden-xs hidden-sm">
				<ul>
					<li><a href="javascript:void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo $link; ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"><i class="icon-facebook-with-circle"></i></a></li>
					<li><a href="javascript:void(0);" onclick="window.open('http://twitter.com/?status=<?php echo $link; ?>','twitter', 'toolbar=0, status=0, width=650, height=450')" ><i class="icon-twitter-with-circle"></i></a></li>
				</ul>
			</div>

			<!-- Listagem de post -->
			<div class="row-fluid">
				<div class="col-xs-12 col-sm-12 col-md-12 cards">
					<?php if (have_posts()) {
							query_posts('post_type=post&orderby=DESC&posts_per_page=3' );
							 while (have_posts()) {
							 	the_post();  
					?>
					<div class="list_card list_card_single col-md-4 col-sm-4">
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
						} 
					?>
				</div>
			</div>

			<!-- Comnetários -->
			<div class="row-fluid">
				<ol class="commentlist">
					<?php
						$idc = get_the_ID();
						//Gather comments for a specific page/post 
						$comments = get_comments(array(
							'post_id' => $idc,
							'status' => 'approve' //Change this to the type of comments to be displayed
						));

						//Display the list of comments
						wp_list_comments(array(
							'per_page' => 10, //Allow comment pagination
							'reverse_top_level' => false //Show the latest comments at the top of the list
						), $comments);
					?>
				</ol>
			</div>
			<?php if(isset($teste)){ ?>
				<div class="alert alert-warning alert-dismissible fade in" role="alert">
			      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			    </div>
		    <?php }?>
			<?php 
				$args = array(
				  'title_reply'       => 'Deixe um comentário' ,
				  'label_submit'      => 'Enviar comentário',
				);
				// show_message_function( 10, 2);
				comment_form( $args, $idc ); 
			?>

			</div>
			<?php if(isset($teste)){
				echo $teste;
				} ?>

		</section>
		
	</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sucesso!</h4>
      </div>
      <div class="modal-body">
        <?php if(isset($message)){ echo $message; } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-vermelho" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<?php
	// include "footer.php";
?>