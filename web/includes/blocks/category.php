<div class="content-sidebar">
		    		<h4>Categories</h4>
		    		<?php
		    		$sql = "select * from `category` where is_active='y'";
		    		$res = mysqli_query($con,$sql) or die("error 1");

		    		
					print"<ul>";
					while($row = mysqli_fetch_assoc($res)){
						print"<li><a href='product.php?cid=$row[id]'>$row[name]</a></li>";
					}
							
					?>	
						</ul>
</div>