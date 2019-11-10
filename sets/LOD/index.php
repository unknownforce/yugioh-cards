<?php

	require_once("../../inc/config.php");
	require_once(ROOT_PATH . "inc/products.php");
	$products = get_LOD_cards();


?><?php 
$pageTitle = "Sets";
$section = "sets";
include(ROOT_PATH . 'inc/header.php'); ?>

		<div class="section sets cards page">

			<div class="wrapper">

				<h1>Legacy of Darkness</h1>
				

				<ul class="products">
					<?php
						foreach($products as $product) {
							include(ROOT_PATH . "inc/card-list-from-set-view.html.php");
						}
					?>
				</ul>

			</div>

		</div>

<?php include(ROOT_PATH . 'inc/footer.php') ?>