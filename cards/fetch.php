<?php
  
  require(ROOT_PATH . "inc/database.php");
  $request=$_POST['request'];
  $query="SELECT  id, cardname, cardimg, carddesc, type, levelrank, attribute, rarity, setnumber, atk, def, cardtype, monstertype, tuner, secondarytype, spelltype, traptype
	    	FROM yugiohcards
            WHERE type='$request'
	    	ORDER BY type ASC";
  $output=mysqli_query($query);
echo '<table border="1"';
    echo '<tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Roll No.</th>
      <th>Year</th>
    </tr>';
   
  while($fetch = mysqli_fetch_assoc($output))
  {
    
      echo '<tr>';
      echo '<td>'.$fetch['first_name'].'</td>';
      echo '<td>'.$fetch['last_name'].'</td>';
      echo '<td>'.$fetch['roll_number'].'</td>';
      echo '<td>'.$fetch['year'].'</td>';
      echo '</tr>';
    
  };
echo '</table>';




 ?>
 
 