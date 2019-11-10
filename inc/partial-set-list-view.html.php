<?php

/* This file displays a single product in a list view. It needs to receive
 * the following product details (as elements of an array named $product): 
 *     - sku:  Product ID, used to create the link to the Shirt Details page
 *     - img:  The web address of the main image for the product
 *     - name: The name of the 
 */

?><li>
      	<a href="<?php echo BASE_URL; ?>sets/<?php echo $product["setcode"]; ?>/">  
           <img src="<?php echo BASE_URL;?>images/sets/<?php echo $product["setcode"]; ?>-BoosterEN.jpg" alt="<?php echo $product["setname"]; ?>">
           <div class="name">
           	<p><?php echo $product["setname"]; ?></p>
           </div>
      	</a
    </li>