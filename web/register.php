<?php
// session_start();
require("includes/header.php");
// session_start();
unset($_SESSION['captcha']);
unset($_SESSION['_CAPTCHA']);

include("lib/captcha/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

// print_r($_SESSION);

?>


<script type="text/javascript">
	function check(){
		// alert("Tst");

		var pass1 = document.getElementById("pass1");
		var pass2 = document.getElementById("pass2");

		if(pass1.value != pass2.value){
			alert("Password not matching");
		}
		else{
			document.frm.submit();
		}
	}
</script>

		    	<div class="about">
		    		<h4>Sign Up</h4>

<form name="frm" action="registering.php" method="post">
	<?php		    		
if(isset($_REQUEST['msg'])){
	print"<div style='width:200px;margin:0 auto;border:0px solid #ccc;'> $_REQUEST[msg]</div>";
}
?>
		    		<div style="border:1px solid #ccc; width:400px;margin:0 auto;height:650px;border-radius:10px;border-left:2px solid #ccc;">

		    			<div style="margin:10px;color:#ccc">Please fill the form to create your account</div>

		    			<div style="width:197px;float:left;border:0px solid #ccc;margin-top: 10px" align="right">
		    				Name:	
		    			</div>
		    			<div style="width:197px;float:right;margin-top: 10px;border:0px solid #ccc;">



<input type="text" name="nm" placeholder="Enter your name" value="<?php echo isset($_SESSION['frm']['nm'])? $_SESSION['frm']['nm']:'' ?>" style="width:150px;">

		    			</div>

		    			<div style="clear: both;"></div>

						<div style="width:197px;float:left;border:0px solid #ccc;margin-top: 30px" align="right">
		    				Email:	
		    			</div>
		    			<div style="width:197px;float:right;margin-top: 25px;border:0px solid #ccc;">
		    				<input type="email" name="email" placeholder="Enter your email" style="width:150px;">

		    			</div>
		    			<div style="clear: both;"></div>

		    			<div style="width:197px;float:left;border:0px solid #ccc;margin-top: 30px" align="right">
		    				Mobile:	
		    			</div>
		    			<div style="width:197px;float:right;margin-top: 25px;border:0px solid #ccc;">
		    				<input type="text" name="mobile" placeholder="Enter your mobile" style="width:150px;">

		    			</div>
		    			<div style="clear: both;"></div>

		    			<div style="width:197px;float:left;border:0px solid #ccc;margin-top: 30px" align="right">
		    				Password:	
		    			</div>
		    			<div style="width:197px;float:right;margin-top: 25px;border:0px solid #ccc;">
		    				<input type="password" id="pass1" name="pass1" placeholder="Enter your password" style="width:150px;">

		    			</div>
		    			<div style="clear: both;"></div>

		    			<div style="width:197px;float:left;border:0px solid #ccc;margin-top: 30px" align="right">
		    				confirm Password:	
		    			</div>
		    			<div style="width:197px;float:right;margin-top: 25px;border:0px solid #ccc;">
		    				<input type="password" id="pass2" name="pass2" placeholder="Confirm your password" style="width:150px;">
		    			</div>
		    			<div style="clear: both;"></div>

		    			<div style="width:197px;float:left;border:0px solid #ccc;margin-top: 30px" align="right">
		    				Address:	
		    			</div>
		    			<div style="width:197px;float:right;margin-top: 25px;border:0px solid #ccc;">
		    				<textarea name="add" rows="6" cols="18"></textarea> 
		    			</div>
		    			<div style="clear: both;"></div>
		    			<div style="width:197px;float:right;border:0px solid #ccc;margin-top: 30px;margin-right:25px;" align="right">
		    				
		    				<!-- // echo $_SESSION['captcha']['image_src']; -->
<img src="<?php echo $_SESSION['captcha']['image_src'] ?>">
		    			</div>
		    			<div style="clear: both;"></div>

						<div style="width:197px;float:left;border:0px solid #ccc;margin-top: 30px" align="right">
		    				Enter the text shown in image:	
		    			</div>
		    			<div style="width:197px;float:right;margin-top: 25px;border:0px solid #ccc;">
		    				<input type="text" name="cpt">  
		    			</div>
		    			<div style="clear: both;"></div>
		    			<div align="center" style="margin-top: 15px;"><input type="button" onclick="check()" value="Register" style="height:40px;width:100px;"></div>
		    		</div>

</form>				
				</div>
				
		    	</div>
		    	</div>
		    	
		    </div>
<?php

require("includes/footer.php");