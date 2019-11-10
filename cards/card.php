<?php
	require_once("../inc/config.php");
	require_once(ROOT_PATH . "inc/products.php");


// if an ID is specified in the query string, use it
if (isset($_GET["id"])) {
	$product_id = intval($_GET["id"]);
	$product = get_product_single($product_id);
}

// a $product will only be set and not false if an ID is specified in the query
// string and it corresponds to a real product. If no product is
// set, then redirect to the cards listing page; otherwise, continue
// on and display the Shirt Details page for that $product


$section = "cards";
$pageTitle = $product["cardname"];
include(ROOT_PATH . "inc/header.php"); 
$monstertype = $product["monstertype"];
$category = $product["cardtype"];
$levels = $product["levelrank"]; 
?>

		<div class="section page">

			<div class="wrapper">

				
								
				<div class="card-name-title col-xs-12 <?php if ($monstertype == "Effect") {
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
					<h1><?php echo $product["cardname"]; ?></h1>
					
				
					
				</div>
				
				<div class="card col-xs-12">
					
					<div class="card-picture col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<span>
							<img src="<?php echo BASE_URL . $product["cardimg"]; ?>" alt="<?php echo $product["cardname"]; ?>">
						</span>
						
						
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
							<div class="title  col-xs-12 col-sm-4 col-md-4 col-lg-4">Set:</div>
							<div class="card-info  col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["set"]; ?></div>
						</div>
						
						<div class="table col-xs-12 set-number">
							<div class="title  col-xs-12 col-sm-4 col-md-4 col-lg-4">Set Number:</div>
							<div class="card-info  col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["setnumber"]; ?></div>
						</div>
						
						<div class="table col-xs-12 rarity">
							<div class="title  col-xs-12 col-sm-4 col-md-4 col-lg-4">Rarity:</div>
							<div class="card-info  col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["rarity"]; ?> </div>
						</div>
												
						
						<div class="table col-xs-12 levelrank">
							<div class="title  col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<?php 
									if 	($product["monstertype"] == "Xyz") {
										echo "Rank:";
									} else {
										echo 'Level:';
									}
								?>
								
								</div>
							<div class="card-info  col-xs-12 col-sm-8 col-md-8 col-lg-8"> 
								<?php 	
									echo $levels;
									$baseurl = BASE_URL;
									echo '<div class="level">';			
									for($i=0;$i<$levels;$i++) {
										echo '<img src="../images/icons/level-star.png"/>';
									
									}
									echo '</div>';
								?> 
							</div>
						</div>
						
						<div class="table col-xs-12 type">
							<div class="title  col-xs-12 col-sm-4 col-md-4 col-lg-4">Type:</div>
							<div class="card-info  col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["type"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 attribute">
							<div class="title  col-xs-12 col-sm-4 col-md-4 col-lg-4">Attribute:</div>
							<div class="card-info  col-xs-12 col-sm-8 col-md-8 col-lg-8">
								<?php echo $product["attribute"]; ?>  
								<?php 
									if ($product["attribute"] == "Dark") {
										echo '<img src="../images/icons/attribute-dark.png"/> ';
									}
									
									if ($product["attribute"] == "Light") {
										echo '<img src="../../images/icons/attribute-light.png"/> ';
									}
									
									if ($product["attribute"] == "Water") {
										echo '<img src="../../images/icons/attribute-water.png"/> ';
									}
									
									if ($product["attribute"] == "Wind") {
										echo '<img src="../../images/icons/attribute-wind.png"/> ';
									}
									
									if ($product["attribute"] == "Earth") {
										echo '<img src="../../images/icons/attribute-earth.png"/> ';
									}
									
									if ($product["attribute"] == "Divine") {
										echo '<img src="../../images/icons/attribute-divine.png"/> ';
									}
									
									if ($product["attribute"] == "Fire") {
										echo '<img src="../../images/icons/attribute-fire.png"/> ';
									}
									
								?>
							
							</div>
						</div>
					
						
						<div class="table col-xs-12 category">
							<div class="title col-xs-12 col-sm-4 col-md-4 col-lg-4">Category:</div>
							<div class="card-info col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["category"]; ?> </div>
						</div>
					
						<div class="table col-xs-12 monster-type">
							<div class="title col-xs-12 col-sm-4 col-md-4 col-lg-4">Monster Type:</div>
							<div class="card-info col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["monstertype"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 tuner">
							<div class="title col-xs-12 col-sm-4 col-md-4 col-lg-4">Tuner:</div>
							<div class="card-info col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["tuner"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 secondary-type">
							<div class="title col-xs-12 col-sm-4 col-md-4 col-lg-4">Secondary Type:</div>
							<div class="card-info col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["sectype"]; ?> </div>
						</div>
					
						
						<div class="table col-xs-12 spell-type">
							<div class="title col-xs-12 col-sm-4 col-md-4 col-lg-4">Spell Type:</div>
							<div class="card-info  col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["spelltype"]; ?> </div>
						</div>
					
						<div class="table col-xs-12 trap-type">
							<div class="title col-xs-12 col-sm-4 col-md-4 col-lg-4">Trap Type:</div>
							<div class="card-info col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["traptype"]; ?> </div>
						</div>
					
											
						<div class="table col-xs-12 1st-edition">
							<div class="title col-xs-12 col-sm-4 col-md-4 col-lg-4">1st Edition:</div>
							<div class="card-info col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["1sted"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 card-number">
							<div class="title col-xs-12 col-sm-4 col-md-4 col-lg-4">Card Number:</div>
							<div class="card-info col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["cardnumber"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 notes">
							<div class="title col-xs-12 col-sm-4 col-md-4 col-lg-4">Notes:</div>
							<div class="card-info col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["notes"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 notes">
							<div class="title col-xs-12 col-sm-4 col-md-4 col-lg-4">Cost:</div>
							<div class="card-info col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["cost"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 quantity">
							<div class="title  col-xs-12 col-sm-4 col-md-4 col-lg-4">Quantity:</div>
							<div class="card-info col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["quantity"]; ?> </div>
						</div>
						
						<div class="table col-xs-12 purchased-from">
							<div class="title col-xs-12 col-sm-4 col-md-4 col-lg-4">Purchased From:</div>
							<div class="card-info col-xs-12 col-sm-8 col-md-8 col-lg-8"><?php echo $product["purchasedfrom"]; ?> </div>
						</div>

	
					</div>
					
				</div>

			</div>

		</div>

<?php include(ROOT_PATH . "inc/footer.php"); ?>