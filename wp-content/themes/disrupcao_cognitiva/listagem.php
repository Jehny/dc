<?php $query = new WP_Query( array( 'tag' => 'bread,baking' ) ); ?>

<div class="row-fluid">
	<section class="container-fluid">
		<div class="col-xs-12 col-sm-12 col-md-4">
			<div class="list_card">
				<img src="<?php bloginfo('template_url'); ?>/img/ico_logo.png"">
				<p class="titulo"></p>
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
		</div>
	</section>
</div>