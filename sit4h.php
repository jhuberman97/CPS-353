<?php
  include ('server.php');
  if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Scenario4h</title>
      <style>
  		div.storyline{
  	      background-color: white; /* Changing background color */
  	      border-radius: 20px; /* Making border radius */
  	      width: auto; /* Making auto-sizable width */
  	      height: auto; /* Making auto-sizable height */
  	      padding: 5px 30px 5px 30px; /* Making space around letters */
  	      font-size: 23px; /* Changing font size */
  		  line-height: 1.6;
  	    }	
        body {
    	    background-color: #f6f5ff;
    	    text-align: center;	  
        }
        h4.sansserif{
          font-family: Arial, Helvetica, sans-serif;
  	  }
  	  p.sansserif{
  		font-family: Arial, Helvetica, sans-serif;
  	  }
      </style>
    </head>
    <body>
  	  <div class = "storyline">
  		  <p class = "sansserif">You allow the man to take the child you promised yourself that you would always protect. After she leaves, you fall to the ground uncontrollably crying. You made a series of decisions that won’t allow you to protect the little girl. When you arrive home, you reflect on the past few days. While you can’t help the little girl anymore, you can help her mother return home to protect her child. You embark on a difficult and unsure journey to support your best friend.</p>
  	  </div>
  	  <h4 class = "sansserif"><strong><font size="5">Ending 8</h4>
	  <?php
		$query = mysqli_query($db, "SELECT COUNT(*) as total from Data_Table");
		$totaldata = mysqli_fetch_assoc($query);
		$query = mysqli_query($db, "SELECT COUNT(*) as this from Data_Table WHERE outcome = 'H'");
		$thisdata = mysqli_fetch_assoc($query);
		if($thisdata['this'] > 0 ){
			$percent = ($thisdata['this'] / $totaldata['total']) * 100;
			$percent = round($percent, 2);
			echo "You and ";
			echo $percent;
			echo "%";
			echo nl2br(" of players got this ending. \r\n");
		
			$results = mysqli_query($db, "SELECT id as matching from Data_Table where outcome = 'H'");
			while($add = $results->fetch_array(MYSQLI_NUM)){
				$matching[] = $add[0];
			}
			$ids = join("','", $matching);
			$query = mysqli_query($db, "SELECT COUNT(*) as total from profile where gender = 'm' AND id IN ('$ids')");
			$totaldata = mysqli_fetch_assoc($query);
			$totalmale = $totaldata['total'];
			$query = mysqli_query($db, "SELECT COUNT(*) as total from profile where gender = 'f' AND id IN ('$ids')");
			$totaldata = mysqli_fetch_assoc($query);
			$totalfemale = $totaldata['total'];
			$query = mysqli_query($db, "SELECT COUNT(*) as total from profile where id IN ('$ids')");
			$totaldata = mysqli_fetch_assoc($query);
			$totalval = $totaldata['total'];
			$malepercent = ($totalmale / $totalval) * 100;
			$malepercent = round($malepercent, 2);
			$femalepercent = ($totalfemale / $totalval) * 100;
			$femalepercent = round($femalepercent, 2);	
			echo "Of those players, ";
			echo $femalepercent;
			echo "% were female, and ";
			echo $malepercent;
			echo nl2br("% were male. \r\n");
			if($totalmale + $totalfemale != $totalval){
				echo "The remaining ";
				echo 100 - $femalepercent - $malepercent;
				echo nl2br("% of those players identified as a nonbinary gender.\r\n");
			}
		
			$query = mysqli_query($db, "SELECT birth_year as year from profile where id = '{$_SESSION['id']}'");
			$thisyeardata = mysqli_fetch_assoc($query);
			$thisyear = $thisyeardata['year'];
			$query = mysqli_query($db, "SELECT COUNT(*) as total from profile where birth_year = '$thisyear' AND id IN ('$ids')");
			$yearmatchcountdata = mysqli_fetch_assoc($query);
			$yearmatchcount = $yearmatchcountdata['total'];
			echo $yearmatchcount;
			echo " of them were born in the same year as you.";
		}
		else echo "You were the first player to get this ending!";
		
		$query = "INSERT INTO responses (id, response_1, response_2, response_3) 
			VALUES(?, ?, ?, ?)";
		$stmt = $db->prepare($query);
		$stmt->bind_param("isss", $_SESSION['id'], $_SESSION['response_1'], $_SESSION['response_2b'], $_SESSION['response_3d']);
		$stmt->execute();
		mysqli_query($db, $query);
		$query = "INSERT INTO Data_Table (id, yeses, nos, outcome) 
			VALUES(?, ?, ?, ?)";
		$stmt = $db->prepare($query);
		$y = 0;
		$n = 3;
		$o = 'H';
		$stmt->bind_param("iiis", $_SESSION['id'], $y, $n, $o);
		$stmt->execute();
		mysqli_query($db, $query);
	?>
  </body>
</html>