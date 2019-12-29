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
    <title>Scenario3c</title>
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
  		  <p class = "sansserif">You proceed to tell her teachers that she’s not feeling well and that is why she’s crying. They allow you to take her home because you’re listed as an emergency contact. You hold her hand tightly and walk to your car. Although she’s only 6, she understands the trauma of not having a parent. As she starts calming down, she asks many questions about her mom. When you arrive to her apartment, you help her grab clothes and necessities. In her home, you remember your best friend’s last words to you before she was detained. At that moment, you decide to never leave this little girl and you swear to protect her always. Distressed and exhausted, you answer her questions and assure her that she will see her mother soon. You know that these are empty promises because of the unjust immigration system that is killing innocent people and separating families. You take the child to your home and begin making calls to detention centers. You prioritize the child’s needs which at the moment is to see her mother. Days pass by quick and you can’t seem to locate her mother. No one tries to find the child either. You live in a low-income community and the government could care less about the child who is left to live on her own. You realize that you are her only hope. Every night with your best friend’s child is filled with sobs, screams, and nightmares. Your whole world is flipped upside down as you take on the responsibility to take care of a child and use your privilege to advocate and defend your best friend. All of the trauma is negatively affecting you and you begin to feel hopeless.</p>
  	  </div>
  	  <h4 class = "sansserif"><strong><font size="5">Will you go to CPS and give them custody of the child?</h4>
	   <form method="post">
	  	<div class="input-group">
	  	  <input type="radio" name="response_3c" value="yes"> Yes </input>
		  <input type="radio" name="response_3c" value="no"> No </input>
	  	</div>
		<div class="input-group">
		  	  <button type="submit" class="btn" name="choice">Submit</button>
		  	</div>
	</form>
	  
  </body>
</html>