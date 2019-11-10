<?php

require_once("../inc/config.php");
require_once(ROOT_PATH . "inc/products.php");

/* This file contains instructions for three different states of the form:
 *   - Displaying the initial search form
 *   - Handling a form submission and ...
 *       - ... displaying the results if matches are found.
 *       - ... displaying a "no results found" message if necessary.
 */

// if a non-blank search term is specified in
// the query string, perform a search
$search_term = "";
if (isset($_GET["s"])) {
	$search_term = trim($_GET["s"]);
	if ($search_term != "") {
		require_once(ROOT_PATH . "inc/products.php");
		$products = get_products_search($search_term);
	}
}


$pageTitle = "Search";
$section = "search";
include(ROOT_PATH . "inc/header.php"); ?>

	<div class="section shirts search page">

		<div class="wrapper">

			<h1>Search</h1>

			<form method="get" action="./">
				<?php // pre-populate the current search term in the search box; ?>
				<?php // if a search hasn't been performed, then that search term ?>
				<?php // will be blank and the box will look empty ?>
				<input type="text" name="s" value="<?php echo htmlspecialchars($search_term); ?>">
				<input type="submit" value="Go">
			</form>
			
			Type:
				<ul>
					<li><input type="checkbox" name="type[]" value="Aqua" />Aqua</li>
					<li><input type="checkbox" name="type[]" value="Beast" />Beast</li>
					<li><input type="checkbox" name="type[]" value="Beast-Warrior" />Beast-Warrior</li>
					<li><input type="checkbox" name="type[]" value="Creator God" />Creator God</li>
					<li><input type="checkbox" name="type[]" value="Cyberse" />Cyberse</li>
					<li><input type="checkbox" name="type[]" value="Dinosaur" />Dinosaur</li>
					<li><input type="checkbox" name="type[]" value="Divine-Beast" />Divine-Beast</li>
					<li><input type="checkbox" name="type[]" value="Dragon" />Dragon</li>
					<li><input type="checkbox" name="type[]" value="Fairy" />Fairy</li>
					<li><input type="checkbox" name="type[]" value="Fiend" />Fiend</li>
					<li><input type="checkbox" name="type[]" value="Fish" />Fish</li>
					<li><input type="checkbox" name="type[]" value="Insect" />Insect</li>
					<li><input type="checkbox" name="type[]" value="Machine" />Machine</li>		
					<li><input type="checkbox" name="type[]" value="Plant" />Plant</li>
					<li><input type="checkbox" name="type[]" value="Psychic" />Psychic</li>
					<li><input type="checkbox" name="type[]" value="Pyro" />Pyro</li>					
					<li><input type="checkbox" name="type[]" value="Reptile" />Reptile</li>
					<li><input type="checkbox" name="type[]" value="Rock" />Rock</li>
					<li><input type="checkbox" name="type[]" value="Sea Serpent" />Sea Serpent</li>					
					<li><input type="checkbox" name="type[]" value="Spellcaster" />Spellcaster</li>
					<li><input type="checkbox" name="type[]" value="Thunder" />Thunder</li>
					<li><input type="checkbox" name="type[]" value="Warrior" />Warrior</li>
					<li><input type="checkbox" name="type[]" value="Winged Beast" />Winged Beast</li>					
					<li><input type="checkbox" name="type[]" value="Wyrm" />Wyrm</li>					
					<li><input type="checkbox" name="type[]" value="Zombie " />Zombie</li>
				</ul>
				

			<?php // if a search has been performed ... ?>
			<?php if ($search_term != "") : ?>

				<?php // if there are products found that match the search term, display them; ?>
				<?php // otherwise, display a message that none were found ?>
				<?php if (!empty($products)) : ?>
					<ul class="products">
						<?php
							foreach ($products as $product) {
	                            include(ROOT_PATH . "inc/partial-product-list-view.html.php");
							}
						?>
					</ul>
				<?php else: ?>
					<p>No products were found matching that search term.</p>
				<?php endif; ?>

			<?php endif; ?>

		</div>

	</div>

<?php include(ROOT_PATH . "inc/footer.php"); ?>