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
    <title>Scenario4b</title>
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
  		  <p class = "sansserif">You decide that you won’t waste your time pressing charges against the ICE agents who physically assaulted you. You know that the process would require a lot of time and money. Instead, you focus your energy into helping your best friend who was wrongfully detained and put into a detention center. Several days later, you are able to get into contact with her. She is miserable and describes the inhumane way she is treated. The agents take away every single human right of the undocumented folk. They aren’t given a phone call, legal help, or products needed to survive. You use your privilege as a citizen to provide legal help for your best friend. As you notify her of the good news, she begins crying and you both finally gain faith. Although the process is long, you and her lawyer dedicate yourselves to research, attending hearings, and meeting with your friend. The process is going smoothly and while this is something to be proud of, your best friend is devastated about her daughter. Her daughter has been placed into the foster care system and there isn’t anything you all can do about it. Once your best friend’s legal documents are in order, she can try getting custody of her daughter back. She thanks you for everything that you are doing for her financially and emotionally. You continue supporting her throughout the whole process and you do not give up.</p>
  	  </div>
  	  <h4 class = "sansserif"><strong><font size="5">Ending 2</h4>
	  <?php
		$query = mysqli_query($db, "SELECT COUNT(*) as total from Data_Table");
		$totaldata = mysqli_fetch_assoc($query);
		$query = mysqli_query($db, "SELECT COUNT(*) as this from Data_Table WHERE outcome = 'B'");
		$thisdata = mysqli_fetch_assoc($query);
		if($thisdata['this'] > 0 ){
			$percent = ($thisdata['this'] / $totaldata['total']) * 100;
			$percent = round($percent, 2);
			echo "You and ";
			echo $percent;
			echo "%";
			echo nl2br(" of players got this ending. \r\n");
		
			$results = mysqli_query($db, "SELECT id as matching from Data_Table where outcome = 'B'");
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
		$stmt->bind_param("isss", $_SESSION['id'], $_SESSION['response_1'], $_SESSION['response_2a'], $_SESSION['response_3a']);
		$stmt->execute();
		mysqli_query($db, $query);
		$query = "INSERT INTO Data_Table (id, yeses, nos, outcome) 
			VALUES(?, ?, ?, ?)";
		$stmt = $db->prepare($query);
		$y = 2;
		$n = 1;
		$o = 'B';
		$stmt->bind_param("iiis", $_SESSION['id'], $y, $n, $o);
		$stmt->execute();
		mysqli_query($db, $query);
	?>
	  
  </body>
</html>