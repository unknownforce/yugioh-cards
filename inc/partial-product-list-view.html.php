<?php

/* This file displays a single product in a list view. It needs to receive
 * the following product details (as elements of an array named $product): 
 *     - sku:  Product ID, used to create the link to the Shirt Details page
 *     - img:  The web address of the main image for the product
 *     - name: The name of the 
 */

?><li>
        <a href="<?php echo BASE_URL; ?>cards/card.php?id=<?php echo $product["id"]; ?>/">
            <img src="<?php echo BASE_URL . $product["cardimg"]; ?>" alt="<?php echo $product["cardname"]; ?>">
            <div class="name">
            	<p><?php echo $product["cardname"]; ?></p>
            </div>
        </a>
    </li>