		<?php
		session_start();
		if($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){
			header("location:index.php?pesan=salah");
		}else{		
			echo "<p>Captcha Anda Benar</p>";
		}
		?>
