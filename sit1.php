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
    <title>Scenario1</title>
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
  		  <p class = "sansserif">You start off your regular workday at the meat processing company. You’ve been working at this company for several years with many dedicated and hardworking folk. As you are preparing meat, you see fear rush into your coworker’s eyes and suddenly, you see your worst nightmare barge into your workplace. ICE agents begin rounding up more than half of your coworkers and take them to buses. You have no time to mentally prepare yourself before your best friend is taken as well. Every single memory of you and your best friend floods your head but one of your biggest concerns is her 6-year-old daughter. You hear crying and screaming as you rush to your best friend remembering everything she told you about her terrifying life back in El Salvador. In between her sobbing, she begs you to take care of her daughter. The agent becomes aggressive and inpatient with her and he shoves her into the bus. You know that once the bus leaves, she will face more traumatizing events at processing and eventually in El Salvador.</p>
  	  </div>
  	  <h4 class = "sansserif"><strong><font size="5">Will you defend your best friend and stand up to the ICE agent?</h4>
	   <form method="post">
	  	<div class="input-group">
	  	  <input type="radio" name="response_1" value="yes"> Yes </input>
		  <input type="radio" name="response_1" value="no"> No </input>
	  	</div>
		<div class="input-group">
		  	  <button type="submit" class="btn" name="choice">Submit</button>
		  	</div>
	</form>
	  
  </body>
</html>