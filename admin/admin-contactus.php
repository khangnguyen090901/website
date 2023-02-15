<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/contact.php'); 
	include_once ($filepath.'/../helpers/format.php');
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Admin-Contact Us</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Date</th>
							<th>Name</th>
							<th>Email</th>
                            <th>Phone</th>
							<th>Content</th>
						</tr>
					</thead>
					<tbody>
						<?php
						    $fm = new format();
						    $cu = new contact();
							$get_inbox_contact = $cu->get_inbox_contact();
							if($get_inbox_contact){
								$i = 0;
								while($result = $get_inbox_contact->fetch_assoc()){
									$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $fm->formatDate($result['date_contact'])?></td>
							<td><?php echo $result['name']?></td>
							<td><?php echo $result['email']?></td>
							<td><?php echo $result['phone']?></td>
							<td><?php echo $result['content']?></td>
						</tr>
						<?php
								}
							}
						?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
