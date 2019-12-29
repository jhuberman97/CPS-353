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
    <title>Scenario4d</title>
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
	  		  <p class = "sansserif">You don’t try to call detention centers. You are about to give up on helping your best friend but suddenly you get a call. A teacher from Sunshine Elementary tells you that no one came to pick up your best friend’s daughter. They called you because you are listed as an emergency contact for the child. You don’t tell her teachers what happened earlier today and decide to pick her up. You arrive at the school and see your best friend’s child. She joyfully runs to you and begins telling you all about her day. You hold back tears and give her a warm smile. You drive her home and pick up a few things. You’ve seen this child grow and you see the potential in her future. While you didn’t help your best friend with her immigration status, you did achieve her last wish for you to take care of her daughter.</p>
	  	  </div>
	  	  <h4 class = "sansserif"><strong><font size="5">Ending 4</h4>
	  <?php
		$query = mysqli_query($db, "SELECT COUNT(*) as total from Data_Table");
		$totaldata = mysqli_fetch_assoc($query);
		$query = mysqli_query($db, "SELECT COUNT(*) as this from Data_Table WHERE outcome = 'D'");
		$thisdata = mysqli_fetch_assoc($query);
		if($thisdata['this'] > 0 ){
			$percent = ($thisdata['this'] / $totaldata['total']) * 100;
			$percent = round($percent, 2);
			echo "You and ";
			echo $percent;
			echo "%";
			echo nl2br(" of players got this ending. \r\n");
		
			$results = mysqli_query($db, "SELECT id as matching from Data_Table where outcome = 'D'");
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
		$stmt->bind_param("isss", $_SESSION['id'], $_SESSION['response_1'], $_SESSION['response_2a'], $_SESSION['response_3b']);
		$stmt->execute();
		mysqli_query($db, $query);
		$query = "INSERT INTO Data_Table (id, yeses, nos, outcome) 
			VALUES(?, ?, ?, ?)";
		$stmt = $db->prepare($query);
		$y = 1;
		$n = 2;
		$o = 'D';
		$stmt->bind_param("iiis", $_SESSION['id'], $y, $n, $o);
		$stmt->execute();
		mysqli_query($db, $query);
	?>
	  
  </body>
</html>