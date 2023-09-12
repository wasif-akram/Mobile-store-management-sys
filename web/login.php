<?php
require("includes/header.php");
?>


		    	<div class="about">
		    		<h4>LOGIN</h4>

<form name="frm" action="login-check.php" method="post">
	<?php		    		
if(isset($_REQUEST['msg'])){
	print"<div style='width:200px;margin:0 auto;border:0px solid #ccc;'> $_REQUEST[msg]</div>";
}
?>
		    		<div style="border:1px solid #ccc; width:400px;margin:0 auto;height:220px;border-radius:10px;border-left:2px solid #ccc;border-bottom:2px solid #ccc;">

		    			<div style="margin:10px;color:#ccc">Please Login Here</div>

		    			<div style="width:197px;float:left;border:0px solid #ccc;margin-top: 10px" align="right">
		    				email:	
		    			</div>
		    			<div style="width:197px;float:right;margin-top: 10px;border:0px solid #ccc;">
		    				<input type="text" name="em" placeholder="Enter your email" style="width:150px;">

		    			</div>

		    			<div style="clear: both;"></div>

						<div style="width:197px;float:left;border:0px solid #ccc;margin-top: 30px" align="right">
		    				Password:	
		    			</div>
		    			<div style="width:197px;float:right;margin-top: 25px;border:0px solid #ccc;">
		    				<input type="password" name="pass" placeholder="Enter your password" style="width:150px;">

		    			</div>
		    			<div style="clear: both;"></div>


		    			<div align="center" style="margin-top: 25px;"><input type="submit"  value="Login" style="height:40px;width:100px;"></div>
		    		</div>

</form>				
				</div>
				
		    	</div>
		    	</div>
		    	
		    </div>
<?php

require("includes/footer.php");