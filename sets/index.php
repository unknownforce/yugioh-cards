<?php

	require_once("../inc/config.php");
	require_once(ROOT_PATH . "inc/products.php");
	$sets = get_set_subset();


?><?php 
$pageTitle = "Sets";
$section = "sets";
include(ROOT_PATH . 'inc/header.php'); ?>

		<div class="section sets page">

			<div class="wrapper">

				<h1>Sets</h1>

				<ul class="products">
					<?php
						foreach($sets as $product) {
							include(ROOT_PATH . "inc/partial-set-list-view.html.php");
						}
					?>
				</ul>

			</div>

		</div>

<?php include(ROOT_PATH . 'inc/footer.php') ?>