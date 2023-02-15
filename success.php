<?php
    include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php 
    if(isset($_GET['orderid']) && $_GET['orderid']=='order')
    {
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delCart = $ct->del_all_cart();
        header('Location:success.php');
    }
?>
<style>
    .success_order{
        text-align: center;
    }
    .success_note{
        text-align: center;
        padding: 7px;
        font-size: 18px;
    }
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
            <h2 class="success_order" style="color: red;">Success Order</h2>
            <?php
                $customer_id = Session::get('customer_id');
                $get_amount = $ct->getAmountPrice($customer_id);
                if($get_amount ){
                    $amount = 0;
                        while($result = $get_amount->fetch_assoc()){
                            $price = $result['price'];
                            $amount += $price;
                        }
                } 
            ?>
            <p class="success_note">Total Price You Have Bought From Our Store:
                <?php  
                    $vat = $amount * 0.1; 
                    $total = $vat + $amount;
                    $vndcash = $total * 22000;
                    echo $vndcash.''.' VNĐ';
                ?>
            </p>
            <p class="success_note"> We Will Deliver As Soon As Possible. You Can Check Your Order Details <a href="orderdetails.php">Here!</a></p>
 		</div>
 	</div>
 </div>
</form>
<?php
    include 'inc/footer.php';
?>

