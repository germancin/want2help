<!-- GoogleMap -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9FB3pY07t9ds2_jeQS4bqeQBMppT9c80&sensor=false&v=3&libraries=geometry">
</script>
<?php // Override any of the following default options to customize your map
  $map_options = array(
    'id' => 'map_canvas',
    'width' => '300px',
    'height' => '350px',
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
<div id="mob-wrapper">
  Buyers confirmation <br/>

  <br/>
  Details of the items to buy <br/>

	<table cellpadding="0" cellspacing="0"  width="100%" style="background-color:white;">
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
	<div style="float:right;">
		Total : $<?php echo $total; ?>
	</div>	
	
<br/>

<center>
 
  <br/>
  <a href="/projects/process_confirmation/?items="<?php echo $itemsList; ?> class="btn">- CONFIRM -</a>

  <br/><br/>
-Case Location- <br/>
<?php echo $projectAddress; ?>
</center>

<?php echo $this->GoogleMap->map($map_options); ?>




</div>