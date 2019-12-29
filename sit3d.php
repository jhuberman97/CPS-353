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
    <title>Scenario3d</title>
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
  		  <p class = "sansserif">The responsibility of taking care of your best friend’s child is too much. You tell her teachers everything about her mother’s detention by ICE agents. Fear rushes into their eyes and they quickly make phone calls to child protective services. In your low-income community, the teachers have seen many cases where children are left with no family and abandoned. You watch the little girl cry and you’re swarmed with guilt. The teachers thank you and encourage you to leave. You tell them that you will stay until authorities arrive. Thoughts rush into your mind about the foster care system and child’s fear. You have known this child almost her whole life and you decided to leave her future in the hands of strangers. CPS finally arrives and takes the child to place her in a foster home. The man reaches out his hand to the little girl, but she refuses to take it screaming and running away. She understands where she is going and begs you to not leave her. Through her sobs and screams, you tell her that everything will be ok. Suddenly, the man from CPS becomes impatient and practically drags the child to his car. You can’t bare to see this mistreatment and impulsively yell at the man. Both of you argue back and forth and he tells you that through policy you can’t take the child. You realize that the foster care system is not built to help children.</p>
  	  </div>
  	  <h4 class = "sansserif"><strong><font size="5">Will you physically fight this man to get your best friend’s child back in your safe arms?</h4>
	   <form method="post">
	  	<div class="input-group">
	  	  <input type="radio" name="response_3d" value="yes"> Yes </input>
		  <input type="radio" name="response_3d" value="no"> No </input>
	  	</div>
		<div class="input-group">
		  	  <button type="submit" class="btn" name="choice">Submit</button>
		  	</div>
	</form>
	  
  </body>
</html>