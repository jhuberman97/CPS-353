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
    <title>Scenario3b</title>
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
  		  <p class = "sansserif">You do not give in to the unjust immigration system. You let the agents grab you and push you off the bus. While you don’t physically fight back, you know that you will fight back on a larger scale. The buses leave one by one and tears stream down your face. You remember listening to the stories of your best friend and her country’s instability. She moved to the US 10 years ago to escape gang violence and poverty. Her daughter’s father was not in the picture the last 6 years, but she worked hard to provide for herself and her child. The system and the government don’t care about separating families. Her child is a citizen who will grow up without family support and most likely in a messed up foster care system. You rush to your car and drive home. At your house, you process the traumatic day and consider all of your options to continue helping your best friend.</p>
  	  </div>
  	  <h4 class = "sansserif"><strong><font size="5">Will you call the nearest ICE detention centers to find your friend?</h4>
	   <form method="post">
	  	<div class="input-group">
	  	  <input type="radio" name="response_3b" value="yes"> Yes </input>
		  <input type="radio" name="response_3b" value="no"> No </input>
	  	</div>
		<div class="input-group">
		  	  <button type="submit" class="btn" name="choice">Submit</button>
		  	</div>
	</form>
	  
  </body>
</html>