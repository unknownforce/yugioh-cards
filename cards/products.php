<?php

/*
 * Returns the four most recent products, using the order of the elements in the array
 * @return   array           a list of the last four products in the array;
                             the most recent product is the last one in the array
 */
function get_products_recent() {
    /*$recent = array();
    $all = get_products_all();

    $total_products = count($all);
    $position = 0;
    
    foreach($all as $product) {
        $position = $position + 1;
        if ($total_products - $position < 4) {
            $recent[] = $product;
        }
    }*/
    
    require(ROOT_PATH . "inc/database.php");
    
    try {
	    $results = $db->query("
	    	SELECT id, cardname, cardimg, setnumber, carddesc
	    	FROM yugiohcards
	    	ORDER BY id DESC
	    	LIMIT 25");	    
    } catch (Exception $e) {
	    echo "Recent Data could not be retrieved from the database.";
	    exit;
    }
    
    $recent = $results->fetchAll(PDO::FETCH_ASSOC);
    $recent = array_reverse($recent);
    
    return $recent;
}

/*
 * Looks for a search term in the product names
 * @param    string    $s    the search term
 * @return   array           a list of the products that contain the search term in their name
 */
function get_products_search($s) {
    
    /*$results = array();
    $all = get_products_all();

    foreach($all as $product) {
        if (stripos($product["name"],$s) !== false) {
            $results[] = $product;
        }
    }*/
    
    require(ROOT_PATH . "inc/database.php");
    
    $request=$_POST['request'];    
    try {
	    $results = $db->prepare("
	    	SELECT  id, cardname, cardimg, carddesc, type, levelrank, attribute, rarity, setnumber, atk, def, cardtype, monstertype, tuner, secondarytype, spelltype, traptype
	    	FROM yugiohcards
            WHERE type='$request'
	    	ORDER BY type ASC");	 
	    $results->bindValue(1,"%" . $s . "%");	
	    $results->execute();
	   
    } catch (Exception $e) {
	    echo "Search Data could not be retrieved from the database.";
	    exit;
    }
    
	
	$matches = $results->fetchAll(PDO::FETCH_ASSOC);
	
    return $matches;
}


/*
 * Looks for a search term in the product names
 * @param    string    $s    the search term
 * @return   array           a list of the products that contain the search term in their name
 */
function get_card_types($request) {
    
    /*$results = array();
    $all = get_products_all();

    foreach($all as $product) {
        if (stripos($product["name"],$s) !== false) {
            $results[] = $product;
        }
    }*/
    
    require(ROOT_PATH . "inc/database.php");
    
    try {
	    $results = $db->prepare("
	    	SELECT  id, cardname, cardimg, carddesc, type, levelrank, attribute, rarity, setnumber, atk, def, cardtype, monstertype, tuner, secondarytype, spelltype, traptype
	    	FROM yugiohcards
            WHERE cardname LIKE '%".$s."%'
	    	ORDER BY cardname ASC");	 
	    $results->bindValue(1,"%" . $s . "%");	
	    $results->execute();
	   
    } catch (Exception $e) {
	    echo "Search Data could not be retrieved from the database.";
	    exit;
    }
    
	
	$matches = $results->fetchAll(PDO::FETCH_ASSOC);
	
    return $matches;
}




/*
 * Counts the total number of products
 * @return   int             the total number of products
 */
function get_products_count() {
  	require(ROOT_PATH . "inc/database.php");
  	
  	try {
	  	$results = $db->query("
	  		SELECT COUNT(id)
	  		FROM yugiohcards");
  	} catch (Exception $e) {
	  	echo "Count Data could not be retrieved from the database.";
	  	exit;
  	}
  	
  	return intval($results->fetchColumn(0));
}

/*
 * Returns a specified subset of products, based on the values received,
 * using the order of the elements in the array .
 * @param    int             the position of the first product in the requested subset 
 * @param    int             the position of the last product in the requested subset 
 * @return   array           the list of products that correspond to the start and end positions
 */
function get_products_subset($positionStart, $positionEnd) {
    /*$subset = array();
    $all = get_products_all();

    $position = 0;
    foreach($all as $product) {
        $position += 1;
        if ($position >= $positionStart && $position <= $positionEnd) {
            $subset[] = $product;
        }
    }*/
    
    $offset = $positionStart -1;
    $rows = $positionEnd - $positionStart + 1;
    
    require(ROOT_PATH . "inc/database.php");
  	
  	try {
	  	$results = $db->prepare("
	  		SELECT id, cardname, cardimg, setnumber, carddesc
	  		FROM yugiohcards
	  		ORDER BY id
	  		LIMIT ?, ?");
	  	$results->bindParam(1,$offset,PDO::PARAM_INT);
	  	$results->bindParam(2,$rows,PDO::PARAM_INT);
	  	$results->execute();
  	} catch (Exception $e) {
	  	echo "Subset Data could not be retrieved from the database.";
	  	exit;
  	}
  	
  	$subset = $results->fetchAll(PDO::FETCH_ASSOC);
    
    return $subset;
}

/* Gets a list of all the sets */
function get_set_subset() {
    /*$subset = array();
    $all = get_products_all();

    $position = 0;
    foreach($all as $product) {
        $position += 1;
        if ($position >= $positionStart && $position <= $positionEnd) {
            $subset[] = $product;
        }
    }*/    
    require(ROOT_PATH . "inc/database.php");
  	
  	try {
	  	$results = $db->prepare("
	  		SELECT id, setname, setcode, setreleasedate
	  		FROM sets
	  		ORDER BY setreleasedate ASC
	  		");
	  	$results->bindParam(1,$offset,PDO::PARAM_INT);
	  	$results->bindParam(2,$rows,PDO::PARAM_INT);
	  	$results->execute();
  	} catch (Exception $e) {
	  	echo "Set Data could not be retrieved from the database.";
	  	exit;
  	}
  	
  	$subset = $results->fetchAll(PDO::FETCH_ASSOC);
    
    return $subset;
}


/*
 * Returns the full list of products. This function contains the full list of products,
 * and the other model functions first call this function.
 * @return   array           the full list of products
 */
function get_products_all() {
       // when creating a new product, create it first in PayPal and
    // then copy the product ID from PayPal to use here     

    // automated duplication to copy the product_id/sku from the array key
    // and duplicate it into the product details inside the array

    require(ROOT_PATH . "inc/database.php");

    try {
        $results = $db->query("
        SELECT id, cardname, cardimg, setnumber, carddesc 
        FROM yugiohcards 
        ORDER BY id ASC");
    } catch (Exception $e) {
        echo "All Data could not be retrieved from the database.";
        exit;
    }

    $products = $results->fetchAll(PDO::FETCH_ASSOC);    

    return $products;
}

/*****************************************************************************************************
	
	ALL CARD SETS
	
	Legend of Blue Eyes White Dragon CARD SET
	
*****************************************************************************************************/
function get_LOB_cards() {
       // when creating a new product, create it first in PayPal and
    // then copy the product ID from PayPal to use here     

    // automated duplication to copy the product_id/sku from the array key
    // and duplicate it into the product details inside the array

    require(ROOT_PATH . "inc/database.php");

    try {
        $results = $db->query("
        SELECT yugiohcards.id, yugiohcards.cardname, yugiohcards.cardimg, yugiohcards.setnumber, yugiohcards.carddesc, yugiohcards.set, sets.setname, sets.setcode 
        FROM yugiohcards         
        INNER JOIN sets ON sets.setname=yugiohcards.set
        WHERE sets.setcode='LOB'
        ORDER BY setnumber ASC");
    } catch (Exception $e) {
        echo "All Cards from Legend of Blue Eyes White Dragon could not be retrieved from the database.";
        exit;
    }

    $products = $results->fetchAll(PDO::FETCH_ASSOC);    

    return $products;
}

/*****************************************************************************************************
	
	Metal Raiders CARD SET
	
*****************************************************************************************************/
function get_MRD_cards() {
       // when creating a new product, create it first in PayPal and
    // then copy the product ID from PayPal to use here     

    // automated duplication to copy the product_id/sku from the array key
    // and duplicate it into the product details inside the array

    require(ROOT_PATH . "inc/database.php");

    try {
        $results = $db->query("
        SELECT yugiohcards.id, yugiohcards.cardname, yugiohcards.cardimg, yugiohcards.setnumber, yugiohcards.carddesc, yugiohcards.set, sets.setname, sets.setcode 
        FROM yugiohcards         
        INNER JOIN sets ON sets.setname=yugiohcards.set
        WHERE sets.setcode='MRD'
        ORDER BY setnumber ASC");
    } catch (Exception $e) {
        echo "All Cards from Metal Raiders could not be retrieved from the database.";
        exit;
    }

    $products = $results->fetchAll(PDO::FETCH_ASSOC);    

    return $products;
}

/*****************************************************************************************************
	
	Magic Ruler/Spell Ruler CARD SET
	
*****************************************************************************************************/
function get_MRL_cards() {
       // when creating a new product, create it first in PayPal and
    // then copy the product ID from PayPal to use here     

    // automated duplication to copy the product_id/sku from the array key
    // and duplicate it into the product details inside the array

    require(ROOT_PATH . "inc/database.php");

    try {
        $results = $db->query("
        SELECT yugiohcards.id, yugiohcards.cardname, yugiohcards.cardimg, yugiohcards.setnumber, yugiohcards.carddesc, yugiohcards.set, sets.setname, sets.setcode 
        FROM yugiohcards         
        INNER JOIN sets ON sets.setname=yugiohcards.set
        WHERE sets.setcode='MRL'
        ORDER BY setnumber ASC");
    } catch (Exception $e) {
        echo "All Cards from Magic Ruler/Spell Ruler could not be retrieved from the database.";
        exit;
    }

    $products = $results->fetchAll(PDO::FETCH_ASSOC);    

    return $products;
}


/*
 * Returns an array of product information for the product that matches the sku;
 * returns a boolean false if no products matches the sku
 * @param 	int 	$sku 	the sku
 * @return 	mixed 	array 	list of the product information for the one matching product
 * 					bool 	false if no product matches
*/

function get_product_single($sku) {
	require(ROOT_PATH . "inc/database.php");
		try {
		$results = $db->prepare("SELECT * FROM yugiohcards WHERE id = ?");
		$results->bindParam(1,$sku);
		$results->execute();		
	} catch (Exception $e) {
		echo "Single Data could not be retrieved from the database.";
		exit;
	}	$product = $results->fetch(PDO::FETCH_ASSOC);
	
	/*
		If our first query doesn't find a shirt that matche the sku we return false
	*/
	/*if ($product === false) {
		return $product;
	}
	
	
	$product["sizes"] = array();
	*/
	/*
		if we do find a shirt, then we run this query to get a list of all the available sizes.
	*/
	/*		
	try {
		$results = $db->prepare("
			SELECT setnumber 
			FROM products_sizes ps 
			INNER JOIN sizes s 
			ON ps.size_id = s.id
			WHERE product_sku = ?
			ORDER BY `order`");
		$results->bindParam(1,$sku);
		$results->execute();				
	}catch (Exception $e) {
		echo "Data Could be not retrieved from the database.";
		exit;
	}*/
	
	/*
		We then loop the sizes one at a time, add them to the product variable.
	*/
	while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
		$product["id"][] = $row["id"];
	}
		
	return $product;
}

?>