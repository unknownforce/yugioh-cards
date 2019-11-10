<?php 

require_once("inc/config.php");
include(ROOT_PATH . "inc/products.php");
$recent = get_products_recent();


$pageTitle = "Yu-Gi-Oh Cards";
$section = "home";

include(ROOT_PATH . 'inc/header.php'); ?>
     

        <div class="section home latest">

            <div class="wrapper">            
	           	            
	            <section class="mainwrap">
	                <h2>Recently Added</h2>
	
	                <ul class="products">
	                    <?php
	                        foreach(array_reverse($recent) as $product) {
	                            include(ROOT_PATH . "inc/partial-product-list-view.html.php");
	                        }
	                    ?>
	                </ul>                
	            </section>
				
				
            </div>

        </div>

<?php include(ROOT_PATH . 'inc/footer.php') ?>