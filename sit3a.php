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
    <title>Scenario3a</title>
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
			  <p class = "sansserif">You push the agents off of you and start yelling. They push you out of the bus and onto the ground. Before you have time to process, they put handcuffs on you and take you to a police car. The agents hand you off to police officers who were on standby in case of attempted violence from the detainees. You refuse to give into the unjust immigration system. Agitated, you verbally defend yourself to the police.
	<br>“Why am I being detained? I defended myself from the violence. The ICE agents pushed me and hurt me.”<br>
	The police officers don’t care about your side of the story, they defend the agents and tell you that you are being taken to the station for using physical violence against government authorities. You arrive at the station but luckily, you have the means to be picked up with only paying a 3-figure fee for disturbance. You realize that anger and violence negatively impacted your chances to help your friend.</p>
		  </div>
		  <h4 class = "sansserif"><strong><font size="5">Will you attempt to press charges against the ice agents?</h4>
	   <form method="post">
	  	<div class="input-group">
	  	  <input type="radio" name="response_3a" value="yes"> Yes </input>
		  <input type="radio" name="response_3a" value="no"> No </input>
	  	</div>
		<div class="input-group">
		  	  <button type="submit" class="btn" name="choice">Submit</button>
		  	</div>
	</form>
	  
  </body>
</html>