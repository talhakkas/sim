<?php

	similar_text("transport", "hastayı transport ", $sim);

	echo "sim = $sim <br>";

?>

<hr>

	      <form id="sawa_form" method="post" action="http://193.204.187.223:8080/sawa/result.jsp"> 
	      	<p class="label">Language of sentences:</p><p class="sentence"><select name="language" id="language"><option value="eng">English</option><option value="ita">Italian</option></select></p> 
	      	<p class="label">Sentence 1:</p><p class="sentence"><textarea name="content1" id="content1" cols="60" rows="4">I bought a car</textarea></p> 
	      	<p class="label">Sentence 2:</p><p class="sentence"><textarea name="content2" id="content2" cols="60" rows="4">I have an automobile</textarea></p> 
	      	<p class="label">Confirm:</p><p class="sentence"><input type="submit" value="OK" src="img/confirm_button.jpg" alt="Click here in order to compute similarity score" /></p> 
	      </form>	

<hr>
yanıtını http://193.204.187.223:8080/sawa/result.jsp adresindeki [p id="result" style="color:#66FF33;"]81.546%[/p] html kodundan almak mümkün
