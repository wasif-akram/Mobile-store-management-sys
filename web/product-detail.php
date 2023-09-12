<?php
$css = '<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />';

$js = '<script src="js/jquery.min.js"></script>
		<script src="js/jqzoom.pack.1.0.1.js" type="text/javascript"></script>
		
		<script src="js/imagezoom.js"></script>
		<!-- FlexSlider -->
		<script defer src="js/jquery.flexslider.js"></script>';

require("includes/header.php");

$id = $_REQUEST['id'];
$sql = "select *,p.id pid,c.id catid, c.name cname,p.name pname from product p,category c where c.id=p.cat_id and p.id='$id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($res);

$im = "m1.jpg";
if($row['image'])
{
	$im = $row['image'];
}
?>


<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
	});
</script>
		<!----->
		<script>
$(document).ready(function(){
$(".menu_body").hide();
//toggle the componenet with class menu_body
$(".menu_head").click(function(){
	$(this).next(".menu_body").slideToggle(600); 
	var plusmin;
	plusmin = $(this).children(".plusminus").text();
	
	if( plusmin == '+')
	$(this).children(".plusminus").text('-');
	else
	$(this).children(".plusminus").text('+');
});
});
</script>


		    <div class="content-grids">
		    	<div class="details-page">
		    		<div class="back-links">
		    			<ul>
		    				<li><a href="#">Home</a><img src="images/arrow.png" alt=""></li>
		    				<li><a href="#">Product</a><img src="images/arrow.png" alt=""></li>
		    				<li><a href="#">Product-Details</a><img src="images/arrow.png" alt=""></li>
		    			</ul>
		    		</div>
		    	</div>
		    	<div class="detalis-image">
		    		<div class="flexslider">
						<ul class="slides">
							<li data-thumb="../admin/pro_images/<?php echo $im ?>">
								<div class="thumb-image"> <img src="../admin/pro_images/<?php echo $im ?>" data-imagezoom="true" class="img-responsive" alt="" /> </div>
							</li>
							<!-- <li data-thumb="images/m11.jpg">
								<div class="thumb-image"> <img src="images/m11.jpg" data-imagezoom="true" class="img-responsive" alt="" /> </div>
							</li>
							<li data-thumb="images/m11.jpg">
								<div class="thumb-image"> <img src="images/m11.jpg" data-imagezoom="true" class="img-responsive" alt="" /> </div>
							</li> -->
						</ul>
					</div>
		    	</div>
		    	<div class="detalis-image-details">
		    		<div class="details-categories">
		    			<ul>
		    				<li><h3>Category:</h3></li>
		    				<li class="active1"><a href="product.php?cid=<?php echo $row['catid'] ?>"><span><?php echo $row['cname'] ?></span></a></li>
		    				
		    			</ul>
		    		</div><br />
		    		<div class="clear"> </div>
		    		<div class="brand-value" style="float:left;">
		    			<h3><?php echo $row['pname'] ?></h3>
		    			<div class="clear"> </div>

		    			<div class="left-value-details">
			    			<ul>
			    				<li>Price:</li>
			    				<li><span><?php echo $row['price']+100 ?></span></li>
			    				<li><h5><?php echo $row['price'] ?></h5></li>
			    				<br />
			    				<li><p>Not rated</p></li>
			    			</ul>
		    			</div>
		    			<div class="clear"> </div>

		    			<div class="right-value-details">
			    			<a href="#">Instock</a>
			    			<p>No reviews</p>
		    			</div>
		    			<div class="clear"> </div>
		    		</div>
		    		<div class="clear"> </div>
		    		<div class="brand-history" style="float:left;">
		    			<h3>Description :</h3>
		    			<p><?php echo $row['description'] ?></p>
		<form action="addToCart.php" method="post">
			<input type="hidden" name="pid" value="<?php echo $row['pid'] ?>">
		  <input type="submit" id="btn" value="Add Cart">
		  </form>
		    			<!-- <a href="#" >Addcart</a> -->
		    		</div>
		    		<div class="clear"> </div>

		    		<div class="share">
		    			<ul>
		    				<li> <a href="#"><img src="images/facebook.png" title="facebook" /> Facebook</a></li>
		    				<li> <a href="#"><img src="images/twitter.png" title="Twiiter" />Twiiter</a></li>
		    				<li> <a href="#"><img src="images/rss.png" title="Rss" />Rss</a></li>
		    			</ul>
		    		</div>
		    		<div class="clear"> </div>
		    		
		    		</div>
		    		<div class="clear"> </div>
		    	<div class="menu_container">
						<p class="menu_head">Lorem Ipsum<span class="plusminus">+</span></p>
							<div class="menu_body" style="display: none;">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div>
						<p class="menu_head">About Product<span class="plusminus">+</span></p>
							<div class="menu_body" style="display: none;">
							<p>theonlytutorials.com is providing a great varitey of tutorials and scripts to use it immediate on any project!</p>
							</div>
					</div>
			</div>
			
		    	</div>
		    	<?php require("includes/blocks/category.php");
		    	?>
		    </div>
		    <div class="clear"> </div>
		    </div>
		<div class="footer">
			<div class="wrap">
			<div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<h3>Our Info</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>Latest-News</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>Store Location</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<h3>Order-online</h3>
					<p>080-1234-56789</p>
					<p>080-1234-56780</p>
				</div>
				<div class="col_1_of_4 span_1_of_4 footer-lastgrid">
					<h3>News-Letter</h3>
					<form>
						<input type="text"><input type="submit" value="go" />
					</form>
					<h3>Follow Us:</h3>
					 <ul>
					 	<li><a href="#"><img src="images/twitter.png" title="twitter" />Twitter</a></li>
					 	<li><a href="#"><img src="images/facebook.png" title="Facebook" />Facebook</a></li>
					 	<li><a href="#"><img src="images/rss.png" title="Rss" />Rss</a></li>
					 </ul>
				</div>
			</div>
		</div>
		<div class="clear"> </div>
		<div class="wrap">
		<div class="copy-right">
			<p>&copy; 2013 Mobile Store. All Rights Reserved | Design by  <a href="http://w3layouts.com/">W3Layouts</a></p>
		</div>
		</div>
		</div>
	</body>
</html>

