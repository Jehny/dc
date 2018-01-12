<?php
	include "header2.php";

	if(isset($_POST['submit'])){
		$word = $_POST['pesquisa'];
		$home = get_home_url();
		redirect_to($home."/listagem?key=".$word);
	}
?>

<div class="page_busca container-fluid">
	<form action="" method="POST" accept-charset="utf-8">
		
		<input type="Busca" name="pesquisa" class="input_page_busca" placeholder="Buscar..." required>
		<button type="submit" name="submit"><i class="icon-search3"></i></button>
	</form>
	
</div>