<?php require_once(APP.DS.'Plugin'.DS.'spherical-geometry.class.php'); ?>
<?php  ?>

<?php // Your Account Sid and Auth Token from twilio.com/user/account
 ?>

<!-- GoogleMap -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9FB3pY07t9ds2_jeQS4bqeQBMppT9c80&sensor=false&v=3&libraries=geometry">
</script>
<?php // Override any of the following default options to customize your map
  $map_options = array(
    'id' => 'map_canvas',
    'width' => '100%',
    'height' => '500px',
    'style' => '',
    'zoom' => 16,
    'type' => 'ROADMAP',
    'custom' => null,
    'localize' => false,
    //'latitude' => 40.69847032728747,
    //'longitude' => -1.9514422416687,
    //'localization' => true;
    'address' => $projectAddress, //the address redable
    'marker' => true,
    'markerTitle' => NULL,
    'markerIcon' => NULL, //url
    'markerShadow' => NULL,//url
    'infoWindow' => true,
    'windowText' => "Case Location" //'string'
  );?>

<div class="top-image">
	<img src="http://themes.webinane.com/lifeline/images/single-page-top1.jpg" alt="" />
</div><!-- Page Top Image -->
<section class="page">
	<div class="page-title">
			<h1><span>Thank You For Your Donation.</span></h1>
		</div><!-- Page Title-->
	<div class="container">


			<?php if (!empty($current_user['username'])): echo $current_user['username'].", "; endif; ?> We received $<?php echo $total; ?> that will be used for: <br/>


			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<th>Qty</th>
					<th>Need</th>
					<th>Cost</th>
				</tr>

				<?php foreach ($itemsList as $item): ?>
					<tr>
						<td><?php echo $item['quantity']; ?> </td>
						<td><?php echo urldecode($item['item']); ?></td>
						<td><?php echo "$".$item['mc_gross']; ?></td>
					</tr>
				<?php endforeach; ?>
				
			</table>
				
			Total : $<?php echo $total; ?>

			<br/>
			Sending Text Messages to Buyers...
			<br/>


<pre style="width:40%; float:left ;">
Messages Status: <br/>
Sending Text Message to (<?php echo $numberOfUsersMessageWasSent; ?>) Buyers....
<?php foreach ($sentMessages as $message) {

	echo 'Sending To: '.$message['user']."=>"."Sent: Success";
	echo "<br/>";
}?>
</pre>

<pre style="width:59%; float:right; ">
	Case Location: <?php echo $projectAddress; ?>
	<?php echo $this->GoogleMap->map($map_options); ?>
</pre>



	</div>	
</section>	