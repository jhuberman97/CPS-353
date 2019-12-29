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
    <title>Scenario2b</title>
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
			  <p class = "sansserif">After an internal and moral battle, you decide not to help your friend in the moment. Eventually, the buses filled with your coworkers leave. Your workplace is filled with chaos and anguish. You can’t focus on anything and that’s why you decide to leave. You get in your car and instantly drive to her child’s school, remembering all the times you picked up her and her mom for frequent ice cream dates. You try your best to hold in your tears and prepare a speech to tell a six-year-old that her mother is not coming back home anytime soon. Once you’re at the school, you speak to her teacher and administration to ask for permission to pick her up at the end of the school day. They agree to let you pick up the child and talk to her. She runs out of her classroom, super excited to see you. You squeeze her so hard as tears stream down your face. She asks for her mommy and you hesitantly tell her what happened this morning. You see the distress and confusion in her face and suddenly, she starts crying. She screams and begs you to get her mom back. You tell her that you will do everything you can to help her. Her sobs don’t lessen and you don’t want to leave her. Her teachers approach the both of you in confusion.
	</p>
		  </div>
		  <h4 class = "sansserif"><strong><font size="5">Will you hide the information from them and later go through the process to legally have custody of the child?</h4>
	   <form method="post">
	  	<div class="input-group">
	  	  <input type="radio" name="response_2b" value="yes"> Yes </input>
		  <input type="radio" name="response_2b" value="no"> No </input>
	  	</div>
		<div class="input-group">
		  	  <button type="submit" class="btn" name="choice">Submit</button>
		  	</div>
	</form>
	  
  </body>
</html>