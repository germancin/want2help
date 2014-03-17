<style type="text/css">
.page{
	margin-top: 30px;

}
.page {
	padding-left:15px; 
	padding-right:15px;
}


</style>


<style type="text/css">

  #map-canvas { 
  	height: 300px;
     width:350px; 
  }

</style>

<script>
$(document).ready(function() {
	console.log("runned");
    $('input[type=checkbox]').mousedown(function() {
		console.log("click :: "+$(this).is(':checked'))
        if (!$(this).is(':checked')) {
            var checkName = $(this).attr('name');
            //the checked elemtn has location?
            if (!checkName.indexOf( "location" )){
                var number = checkName.split("_");
                var item   = "item_"+number[1];
                $("input:checkbox[name="+item+"]").attr("disabled", true);
            }else{
                var number = checkName.split("_");
                var location   = "location_"+number[1];
                $("input:checkbox[name="+location+"]").attr("disabled", true);  
            }  
        }else{
            //if the click is switch to off
            var checkName = $(this).attr('name');
            //the checked elemtn has location?
            if (!checkName.indexOf( "item" )){
                //alert("is location i gonna change to able ");
                var number = checkName.split("_");
                var location   = "location_"+number[1];
                //switch location status if is checked
                $("input:checkbox[name="+location+"]").attr("disabled", false); 
               
            }else{
                //alert("is a item i gonna change to be able be clickjed");
                var number = checkName.split("_");
                var item   = "item_"+number[1];
                $("input:checkbox[name="+item+"]").attr("disabled", false);  
            }  
        }
    });
});

</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9FB3pY07t9ds2_jeQS4bqeQBMppT9c80&sensor=false&v=3&libraries=geometry">
</script>
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(-34.397, 150.644),
          zoom: 8
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<div class="top-image">
	<img src="http://themes.webinane.com/lifeline/images/single-page-top2.jpg" alt="" />
</div><!-- Page Top Image -->
<section class="page" >
		<div class="page-title">
			<h1><span><?php echo h($project['Project']['title']); ?></span></h1>
		</div><!-- Page Title-->
		<div id="tab1" class="tab-pane fade in active">

				<?php echo $project['Project']['video']; ?>

			  <div style="float:right ; width:600px; border:0px solid black; ">
			  <h5><?php echo h($project['Project']['short_description']); ?></h5>
			  <p><?php echo h($project['Project']['description']); ?> </p>
			  <p>



<!-- 	\Related start -->
<div class="related">
	<h3><?php echo __('Related Needs'); ?></h3>
	<?php if (!empty($project['Need'])): ?>

	<?php echo $this->Form->create('Donation',array('action'=>'attempt')); ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Qty'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Prox Value'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Donate'); ?></th>
		<th><?php echo __('At Location'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>

	<?php  $cont = 1;
	foreach ($project['Need'] as $need): ?>
		<tr>
			<td><?php echo "1"; ?></td>
			<td><?php echo $need['name']; ?></td>
			<td><?php echo "$".$need['prox_value']; ?></td>
			<td><?php echo $need['description']; ?></td>
			<td><?php echo $this->Form->input("",array('type' => 'checkbox', 'value'=>$need['prox_value']."&&".$need['name']."&&".$need['id']."&&".'1','name'=>'item_'.$cont, 'id'=>'checkbox_donation'.$cont)); ?></td>
			<td><?php echo $this->Form->input("",array('type' => 'checkbox', 'value'=>$need['prox_value']."&&".$need['name']."&&".$need['id']."&&".'1','name'=>'location_'.$cont, 'id'=>'checkbox_location'.$cont)); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'needs', 'action' => 'edit', $need['id'])); ?>
			</td>
		</tr>

	<?php 
	$cont = $cont+1;
	endforeach; ?>

	</table>
	<?php $options = array(
    'label' => 'Donate',
    'div' => array(
        'class' => 'donateBtn',
        'style' => 'border:0px solid black; text-align:right; padding-right:10px; '
    )
		); ?>
    <?php $projectAddress = $project['Project']['address']. " ". $project['Project']['city']." ". $project['Project']['state']. " ". $project['Project']['zipcode']; ?>
    <?php $projectTitle = $project['Project']['title']; ?>
	<?php echo $this->Form->input("",array('type' => 'hidden','name'=>'projectAddress', 'value'=> $projectAddress )); ?>
	<?php echo $this->Form->input("",array('type' => 'hidden','name'=>'projectTitle', 'value'=> $projectTitle )); ?>	
	<?php echo $this->Form->input("",array('type' => 'hidden','name'=>'project_id', 'value'=> $project['Project']['id'] )); ?>	
    <?php echo $this->Form->input("",array('type' => 'hidden','name'=>'userId', 'value'=> $current_user['id'] )); ?>
    <?php echo $this->Form->input("",array('type' => 'hidden','name'=>'cart_qty', 'value'=>$cont-1)); ?>


	<?php echo $this->Form->end($options); ?>
<?php endif; ?>
</div> <!-- related close -->





<?php


// Set sandbox (test mode) to true/false.
$sandbox = TRUE;

// Set PayPal API version and credentials.
$api_version = '85.0';
$api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
$api_username = $sandbox ? 'elmaildegerman-facilitator_api1.gmail.com' : 'LIVE_USERNAME_GOES_HERE';
$api_password = $sandbox ? '1387213747' : 'LIVE_PASSWORD_GOES_HERE';
$api_signature = $sandbox ? 'AiPC9BjkCyDFQXbSkoZcgqH3hpacAzaTvKhy7qEk66W8HIx-AuFUF9lV' : 'LIVE_SIGNATURE_GOES_HERE';


// Store request params in an array
/*$request_params = array
					(
					'METHOD' => 'DoDirectPayment', 
					'USER' => $api_username, 
					'PWD' => $api_password, 
					'SIGNATURE' => $api_signature, 
					'VERSION' => $api_version, 
					'PAYMENTACTION' => 'Sale', 					
					'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
					'CREDITCARDTYPE' => 'Visa', 
					'ACCT' => '4300389932298223', 						
					'EXPDATE' => '12/2018', 			
					'CVV2' => '456', 
					'FIRSTNAME' => 'Tester', 
					'LASTNAME' => 'Testerson', 
					'STREET' => '707 W. Bay Drive', 
					'CITY' => 'Largo', 
					'STATE' => 'FL', 					
					'COUNTRYCODE' => 'US', 
					'ZIP' => '33770', 
					'AMT' => '100.00', 
					'CURRENCYCODE' => 'USD', 
					'DESC' => 'Testing Payments Pro' 
					);*/


$request_params = array(
					'cmd' => '_cart', 
					'upload' => '1', 
					'business' => 'want2help@gmail.com', 
					'item_name_1' => 'Catalis - For catalina la gata pobresita', 					
					'amount_1' => '4.25',
					'item_number_1' => '001',
					'item_name_2' => '12 bottles of watter', 					
					'amount_2' => '4.00',
					'item_number_2' => '002',
					'return' => 'http://www.want-2-help.org/donations/confirmation/',
					'rm'=>'2', //sending mthod POST to the return URL
					'notify_url' => 'http://www.want-2-help.org/donations/notify',
					'custom' => 'var1=algo1 var2=algo2',

					);



					
// Loop through $request_params array to generate the NVP string.
$nvp_string = '';
foreach($request_params as $var=>$val)
{
	$nvp_string .= '&'.$var.'='.urlencode($val);	
}


$url = urldecode("https://www.sandbox.paypal.com/cgi-bin/webscr".$nvp_string);?>

<a href="<?php echo $url; ?>">paypal</a>

<?php

echo '<pre>';

echo $socket_response;

$socket_responseDecode = urldecode($socket_response);

echo "<br/>";

parse_str($socket_response);

foreach ($User as $key => $value) {
	echo $key."=".$value;
	echo "<br/>";
}

//echo $socket_responseDecode;
echo "<br/>";
//echo parse_url($socket_response);
echo '</pre>';


// Function to convert NTP string to an array
function NVPToArray($NVPString)
{
	$proArray = array();
	while(strlen($NVPString))
	{
		// name
		$keypos= strpos($NVPString,'=');
		$keyval = substr($NVPString,0,$keypos);
		// value
		$valuepos = strpos($NVPString,'&') ? strpos($NVPString,'&'): strlen($NVPString);
		$valval = substr($NVPString,$keypos+1,$valuepos-$keypos-1);
		// decoding the respose
		$proArray[$keyval] = urldecode($valval);
		$NVPString = substr($NVPString,$valuepos+1,strlen($NVPString));
	}
	return $proArray;
}
?>






			  </p>

			</div>
		</div>


	













<div class="projects view bake-header">
<h2><?php echo __('Project'); ?></h2>

<div class="related">
	<h3><?php echo __('Related Project Assets'); ?></h3>
	<?php if (!empty($project['ProjectAsset'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Media'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['ProjectAsset'] as $projectAsset): ?>
		<tr>
			<td><?php echo $projectAsset['id']; ?></td>
			<td><?php echo $projectAsset['project_id']; ?></td>
			<td><?php echo $projectAsset['media']; ?></td>
			<td><?php echo $projectAsset['type']; ?></td>
			<td><?php echo $projectAsset['title']; ?></td>
			<td><?php echo $projectAsset['description']; ?></td>
			<td><?php echo $projectAsset['created']; ?></td>
			<td><?php echo $projectAsset['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_assets', 'action' => 'view', $projectAsset['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_assets', 'action' => 'edit', $projectAsset['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_assets', 'action' => 'delete', $projectAsset['id']), null, __('Are you sure you want to delete # %s?', $projectAsset['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Asset'), array('controller' => 'project_assets', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="related">
	<h3><?php echo __('Related Subcategories'); ?></h3>
	<?php if (!empty($project['Subcategory'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['Subcategory'] as $subcategory): ?>
		<tr>
			<td><?php echo $subcategory['id']; ?></td>
			<td><?php echo $subcategory['name']; ?></td>
			<td><?php echo $subcategory['slug']; ?></td>
			<td><?php echo $subcategory['description']; ?></td>
			<td><?php echo $subcategory['category_id']; ?></td>
			<td><?php echo $subcategory['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'subcategories', 'action' => 'view', $subcategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'subcategories', 'action' => 'edit', $subcategory['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'subcategories', 'action' => 'delete', $subcategory['id']), null, __('Are you sure you want to delete # %s?', $subcategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($project['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['birthday']; ?></td>
			<td><?php echo $user['role_id']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>



</section>



