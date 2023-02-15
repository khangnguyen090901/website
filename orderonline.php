<?php
    include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
    if(isset($_GET['cartid']))
    {
        $cartid = $_GET['cartid'];
		$delcart = $ct->del_product_cart($cartid);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		$cartId = $_POST['cartId'];
		$quantity = $_POST['quantity'];

		$update_quantity_cart = $ct->update_quantity_cart($quantity,$cartId);
		if($quantity<=0){
			$delcart = $ct->del_product_cart($cartId);
		}
		
	}
?>
<style>
.vnpay_button {
  background-color: #FFFBFA;
  border: 1px solid black;
  color: blue;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  /* box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19); */
}
.momo_button {
  background-color: #C82BA9;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  font-family: SF Pro;
}
.fontcolor_a{
	color:red;
}
</style>
<?php  
   // if(!isset($_GET['id'])){
	//	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	//}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">

			    	
                
					<?php
					    if(isset($update_quantity_cart)){
							echo $update_quantity_cart;
						}
					?>
					<?php
					    if(isset($delcart)){
							echo $delcart;
						}
					?>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
							    $get_product_cart = $ct->get_product_cart();
								if($get_product_cart){
									$qty = 0;
									$subtotal = 0;
									while($result = $get_product_cart->fetch_assoc()){
								
							?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								<td>
									<form action="" method="post">
									    <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>
									<?php $total = $result['price'] * $result['quantity'];
								        echo $total; 
								    ?>
								</td>
								<td><a onclick ="return confirm('Do you want to delete?')" href="?cartid=<?php echo $result['cartId']?>">Delete</a></td>
							</tr>
							<?php
							        $subtotal += $total;
									$qty = $qty +$result['quantity'];
								}
							}
							?>
							
							
						</table>
						<?php
							$check_cart = $ct->check_cart();
							if($check_cart){
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php 
									 echo '$'.' '.$subtotal;
									 Session::set('sum',$subtotal);
									 Session::set('qty',$qty);
								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>
									<?php
								
								    $vat = $subtotal *0.1;
								    $gtotal = $vat + $subtotal;
								    echo '$'.' '.$gtotal;
								
								    ?>
								</td>
							</tr>
                            <tr>
								<th>VND cash :</th>
								<td>
									<?php
								
								    $vndcash = $gtotal * 22000;

								    echo $vndcash.''.' VNĐ' ;
								
								    ?>
								</td>
							</tr>
					   </table>
					   <?php
							}
							else{
								echo 'Your Cart Is Empty !';
							}
					   ?>
					</div>
					<div class="shopping">
                        <div class ="shopleft">
                        <form action="paymentgates_momo.php" method="POST">
                        	<input type="hidden" name="total" value="<?php echo $vndcash ?>">
                        	<center><Button class="momo_button" name="captureWallet">MoMo QR</button></center>
                        </form>
						</div>

						<div class="shopright">
                        <form action="paymentgates_vnpay.php" method="POST">
                        	<input type="hidden" name="total" value="<?php echo $vndcash ?>">
                        	<div width="50px" height="50px"><center><Button class="vnpay_button" name="redirect" id="redirect"><a class ="fontcolor_a">VN</a>PAY</button></center></div>
                        </form>
						</div>
                        <br>
						<div class="shopleft">
                        <form action="paymentgates_momo.php" method="POST">
                        	<input type="hidden" name="total" value="<?php echo $vndcash ?>">
                        	<center><Button class="momo_button" name="payWithATM" >MoMo ATM</button></center>
                        </form>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
    include 'inc/footer.php';
?>