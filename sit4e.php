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
    <title>Scenario4e</title>
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
				  <p class = "sansserif">You can’t handle the responsibilities of raising someone’s child. There’s too much pressure on you to successfully take care of her financially and emotionally. After spending a couple of days with her, you make the most challenging decision of your life. You call child protective services and tell them everything, beginning with the day that your best friend was detained. The person on the phone from CPS informs you of the next steps you will all take. You approach the child and tell her everything about what will happen to her. Her sobs from missing her mom turn into sobs from you abandoning her. You feel guilty, but you already made your decision to not take on this large responsibility. Weeks pass by and she is no longer with you. For the rest of your life, you will never forget the moment of your best friend’s deportation and her daughter’s impact on you.</p>
			  </div>
			  <h4 class = "sansserif"><strong><font size="5">Ending 5</h4>
	  <?php
		$query = mysqli_query($db, "SELECT COUNT(*) as total from Data_Table");
		$totaldata = mysqli_fetch_assoc($query);
		$query = mysqli_query($db, "SELECT COUNT(*) as this from Data_Table WHERE outcome = 'E'");
		$thisdata = mysqli_fetch_assoc($query);
		if($thisdata['this'] > 0 ){
			$percent = ($thisdata['this'] / $totaldata['total']) * 100;
			$percent = round($percent, 2);
			echo "You and ";
			echo $percent;
			echo "%";
			echo nl2br(" of players got this ending. \r\n");
		
			$results = mysqli_query($db, "SELECT id as matching from Data_Table where outcome = 'E'");
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
		$stmt->bind_param("isss", $_SESSION['id'], $_SESSION['response_1'], $_SESSION['response_2b'], $_SESSION['response_3c']);
		$stmt->execute();
		mysqli_query($db, $query);
		$query = "INSERT INTO Data_Table (id, yeses, nos, outcome) 
			VALUES(?, ?, ?, ?)";
		$stmt = $db->prepare($query);
		$y = 2;
		$n = 1;
		$o = 'E';
		$stmt->bind_param("iiis", $_SESSION['id'], $y, $n, $o);
		$stmt->execute();
		mysqli_query($db, $query);
	?>
  </body>
</html>