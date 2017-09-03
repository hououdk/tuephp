<div class="topnav" id="myTopnav">
      <a href="index.php">Pokémon</a>
      
      <?php 
	  	if(isset($_SESSION["login"]) && $_SESSION["login"] == 1){
			echo '<a href="profile.php">Profile</a>';
		} 
		
		?>
      
      <a href="contact.php">Contact</a>
      
      
      <?php 
	  	if(isset($_SESSION["login"]) && $_SESSION["login"] == 1){
			echo "<a href='php/logout.php'>Logout</a>";
			
			echo '<div style="float:right; color: #F2F2F2; padding:15px 16px">
					Welcome, ' . $_SESSION["user"] .' 
			  </div>';
		}
		
		else{
			echo "<a href='login.php'>Login</a>";	
		}
	  
	  ?>

</div>