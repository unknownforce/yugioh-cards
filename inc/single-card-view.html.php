<?php

/* This file displays a single product in a list view. It needs to receive
 * the following product details (as elements of an array named $product): 
 *     - sku:  Product ID, used to create the link to the Shirt Details page
 *     - img:  The web address of the main image for the product
 *     - name: The name of the 
 */

?>

<div class="cardinnerwrap">
			<div class="card-picture">
				<img src="<?php echo BASE_URL . $product["cardimg"]; ?>" alt="<?php echo $product["cardname"]; ?>">
			</div>
			<div class="card-name-title <?php if ($monstertype == "Effect") {
								echo ('effect');
							}if ($monstertype == "Synchro") {
								echo ('synchro');
							}if ($monstertype== "Fusion") {
								echo ('fusion');
							}if ($category == "Spell") {
								echo ('spell');
							}if ($monstertype == "Normal") {
								echo ('normal');
							}if ($category == "Trap") {
								echo ('trap');
							}if ($monstertype == "Xyz") {
								echo ('xyz');
							}if ($monstertype == "Pendulum") {
								echo ('pendulum');
							}
						?>">
					<h1><?php echo $product["name"]; ?></h1>
					
			</div>

			
				
				<div class="card col-xs-12">
					
	
						<div class="card-description">
							<div class="card-info"><?php echo $product["carddesc"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 attack">
							<div class="title col-xs-12">ATK</div>
							<div class="card-info"><?php 
								if (!$product["atk"]) {
									echo "-";
								} else {
									echo $product["atk"]; 
								}
								?> </div>
						</div>
					
						<div class="table col-xs-12 defense">
							<div class="title col-xs-12">DEF</div>
							<div class="card-info"><?php
								 if (!$product["def"]) {
									 echo '-';
								 } else {
									 echo $product["def"]; 
								 }
								 ?> </div>
						</div>
						
					</div>
	
					<div class="card-details col-xs-12 col-sm-8 col-md-8 col-lg-8">					
						<div class="table col-xs-12 set-name">
							<div class="title  col-xs-12 col-sm-3 col-md-3 col-lg-3">Set:</div>
							<div class="card-info  col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["set"]; ?></div>
						</div>
						
						<div class="table col-xs-12 set-number">
							<div class="title  col-xs-12 col-sm-3 col-md-3 col-lg-3">Set Number:</div>
							<div class="card-info  col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["setnumber"]; ?></div>
						</div>
						
						<div class="table col-xs-12 rarity">
							<div class="title  col-xs-12 col-sm-3 col-md-3 col-lg-3">Rarity:</div>
							<div class="card-info  col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["rarity"]; ?> </div>
						</div>
												
						
						<div class="table col-xs-12 levelrank">
							<div class="title  col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<?php 
									if 	($product["monstertype"] == "Xyz") {
										echo "Rank:";
									} else {
										echo 'Level:';
									}
								?>
								
								</div>
							<div class="card-info  col-xs-12 col-sm-9 col-md-9 col-lg-9"> 
								<?php 	
									echo $levels;
									echo '<div class="level">';			
									for($i=0;$i<$levels;$i++) {
										echo '<img src="../../images/level-star.png"/>';
									
									}
									echo '</div>';
								?> 
							</div>
						</div>
						
						<div class="table col-xs-12 type">
							<div class="title  col-xs-12 col-sm-3 col-md-3 col-lg-3">Type:</div>
							<div class="card-info  col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["type"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 attribute">
							<div class="title  col-xs-12 col-sm-3 col-md-3 col-lg-3">Attribute:</div>
							<div class="card-info  col-xs-12 col-sm-9 col-md-9 col-lg-9">
								<?php echo $product["attr"]; ?>  
								<?php 
									if ($product["attr"] == "Dark") {
										echo '<img src="../../images/attribute-dark.png"/> ';
									}
									
									if ($product["attr"] == "Light") {
										echo '<img src="../../images/attribute-light.png"/> ';
									}
									
									if ($product["attr"] == "Water") {
										echo '<img src="../../images/attribute-water.png"/> ';
									}
									
									if ($product["attr"] == "Wind") {
										echo '<img src="../../images/attribute-wind.png"/> ';
									}
									
									if ($product["attr"] == "Earth") {
										echo '<img src="../../images/attribute-earth.png"/> ';
									}
									
									if ($product["attr"] == "Divine") {
										echo '<img src="../../images/attribute-divine.png"/> ';
									}
									
									if ($product["attr"] == "Fire") {
										echo '<img src="../../images/attribute-fire.png"/> ';
									}
									
								?>
							
							</div>
						</div>
					
						
						<div class="table col-xs-12 category">
							<div class="title col-xs-12 col-sm-3 col-md-3 col-lg-3">Category:</div>
							<div class="card-info col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["category"]; ?> </div>
						</div>
					
						<div class="table col-xs-12 monster-type">
							<div class="title col-xs-12 col-sm-3 col-md-3 col-lg-3">Monster Type:</div>
							<div class="card-info col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["monstertype"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 tuner">
							<div class="title col-xs-12 col-sm-3 col-md-3 col-lg-3">Tuner:</div>
							<div class="card-info col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["tuner"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 secondary-type">
							<div class="title col-xs-12 col-sm-3 col-md-3 col-lg-3">Secondary Type:</div>
							<div class="card-info col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["sectype"]; ?> </div>
						</div>
					
						
						<div class="table col-xs-12 spell-type">
							<div class="title col-xs-12 col-sm-3 col-md-3 col-lg-3">Spell Type:</div>
							<div class="card-info  col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["spelltype"]; ?> </div>
						</div>
					
						<div class="table col-xs-12 trap-type">
							<div class="title col-xs-12 col-sm-3 col-md-3 col-lg-3">Trap Type:</div>
							<div class="card-info col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["traptype"]; ?> </div>
						</div>
					
											
						<div class="table col-xs-12 1st-edition">
							<div class="title col-xs-12 col-sm-3 col-md-3 col-lg-3">1st Edition:</div>
							<div class="card-info col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["1st"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 card-number">
							<div class="title col-xs-12 col-sm-3 col-md-3 col-lg-3">Card Number:</div>
							<div class="card-info col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["cardnumber"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 notes">
							<div class="title col-xs-12 col-sm-3 col-md-3 col-lg-3">Notes:</div>
							<div class="card-info col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["notes"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 quantity">
							<div class="title  col-xs-12 col-sm-3 col-md-3 col-lg-3">Quantity:</div>
							<div class="card-info col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["quantity"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 purchased-from">
							<div class="title col-xs-12 col-sm-3 col-md-3 col-lg-3">Purchased From:</div>
							<div class="card-info col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php echo $product["purchasedform"]; ?> </div>
						</div>
						
					</div>
					
</div>