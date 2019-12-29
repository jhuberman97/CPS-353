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
    <title>Scenario2a</title>
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
			  <p class = "sansserif">Terrified, you approach the agent who inappropriately detained your best friend. He dismisses everything you say and proceeds to walk away from you. You desperately follow the agent and demand his attention as you question him. <br> “Do you have a valid warrant for her arrest?” “As a lawful right, I ask that you show me this warrant.” <br>
	The ICE agent denies you permission to see any of the documents, but you keep persisting. The agent loses almost all of his patience as he gets ready to leave and tells the bus drivers to take off. You look at your agonized best friend through the bus window and realize that you have to act quickly. You continue following the agent and risk your violation of rights which could quickly lead to violence. You committed to not leaving without your best friend. You run onto the bus and cause a scene. Multiple agents run towards you and begin to use force.
	</p>
		  </div>
		  <h4 class = "sansserif"><strong><font size="5">Will you reciprocate the violence to help your best friend?</h4>
	   <form method="post">
	  	<div class="input-group">
	  	  <input type="radio" name="response_2a" value="yes"> Yes </input>
		  <input type="radio" name="response_2a" value="no"> No </input>
	  	</div>
		<div class="input-group">
		  	  <button type="submit" class="btn" name="choice">Submit</button>
		  	</div>
	</form>
	  
  </body>
</html>