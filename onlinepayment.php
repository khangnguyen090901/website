<?php
    include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
	$login_check = Session::get('customer_login');
	if($login_check == false){
		header('Location:login.php');
	}
?>
<style>
    .order_page{
        font-size: 20px;
        font-weight: bold;
        color: green;
        text-align: center;   
    }
    .wrapper_method{
        text-align: center;
        width: 550px;
        margin: 0 auto;
        border: 1px solid #666;
        padding: 20px;
        background: cornsilk;
    }
</style>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
                <div class="order_page">
                    <div class="wrapper_method">
                        <h3>Online Payment</h3><br>
                        <a>Please choose the payment gates<a class="btn btn-success" href="orderonline.php"> here!</a></a><br><br>
                        <a style="background:grey;color:#fff" href="cart.php"> << Previous</a>
                    </div>
                </div>			
			</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
    include 'inc/footer.php';
 ?>