
<?php 
	$args = array(
		'sort_order' => 'asc',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'exclude' => '',
		'include' => '',
		'meta_key' => '',
		'meta_value' => '',
		'authors' => '',
		'child_of' => 0,
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
	$pages = get_pages($args); 

if(isset($_POST['submit'])){
	$word = $_POST['pesquisa'];
	$home = get_home_url();
	redirect_to($home."/listagem?key=".$word);
}
$home = get_home_url();

?>

<div id="menu">

	<div class="container-fluid">
		<ul class="list-inline col-md-8 col-xs-8 itens">
			<li><a href="<?php echo get_home_url(); ?>" title="Home">home</a></li>
			<?php foreach ( $pages as $page ) { ?>			
			<li><a href="<?php echo get_page_link( $page->ID )?>" title="Sobre"><?php echo $page->post_title; ?></a></li>
			<?php } ?>
		</ul>

		<!-- Busca  e redes sociais-->
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
		<div class="busca col-md-4 col-xs-4">
			<div class="search col-md-8 col-xs-4">
				<form action="" method="POST" accept-charset="utf-8" class="hidden-xs">
					<input type="text" name="pesquisa" title="pesquisa" placeholder="Consultar" required class="mobile-xs">
					<button type="submit" class="mobile-xs" name="submit"><i class="icon-search3"></i></button>
				</form>
				<a href="<?php echo $home; ?>/busca" class="mobile_busca visible-xs visible-sm"><i class="icon-search3"></i></a>

			</div>		

			<div class="redes col-md-4 col-xs-8">
				<ul class="list-inline">
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

</div>