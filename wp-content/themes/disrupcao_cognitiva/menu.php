
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


?>

<div id="menu">

	<div class="container-fluid">
		<ul class="list-inline col-md-8 itens">
			<li><a href="<?php echo get_home_url(); ?>" title="Home">home</a></li>
			<?php foreach ( $pages as $page ) { ?>			
			<li><a href="<?php echo get_page_link( $page->ID )?>" title="Sobre"><?php echo $page->post_title; ?></a></li>
			<?php } ?>
		</ul>
		<div class="busca">
			
		</div>
	</div>

</div>