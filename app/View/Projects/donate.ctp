<?php require_once(APP.DS.'Plugin'.DS.'spherical-geometry.class.php'); ?>
<?php require_once(APP.DS.'Plugin'.DS.'sms'.DS.'Twilio.php'); ?>

<?php

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "AC4af2d1d9ea89fab22b21ff18a2348c99"; 
$token = "7b1c09ae1c0c491f2b0dead446766d06"; 
?>

<!-- GoogleMap -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9FB3pY07t9ds2_jeQS4bqeQBMppT9c80&sensor=false&v=3&libraries=geometry">
</script>

<div class="top-image">
	<img src="http://themes.webinane.com/lifeline/images/single-page-top2.jpg" alt="" />
</div><!-- Page Top Image -->
<section class="page" >
		<div class="page-title">
			<h1><span>Thank You for your Donation</span></h1>
		</div><!-- Page Title-->

<div id="page-container" class="row-fluid">

	<div class="span3" style="border:0px solid black">



   <?php echo $projectTitle; ?>
<br/>
		The Next Step IS very Important !! <br/>

		THe Money you just give us It will be transfer to One of Our Trustest Buyers which will buy the supplie and it will<br/>
		place it at the case location or retain it at its location. <br/>
		Buyer job: THe buyer job is making sure to buy the supplie, take a video and update the case on the website.<br/>
		<br/>
		Once the the case is updated, the system will send a text messaje with the information to One of Our reliables Runners<br/>
		who will take the supplie from the Buyer address to the "Project address"<br/>


	</div>
	<br/>
	<div class="span3" style="border:0px solid yellow">
		
		<div id="map-canvas"/>

	</div>
</div><!-- #page-container .row-fluid -->	


<?


  // Override any of the following default options to customize your map
  $map_options = array(
    'id' => 'map_canvas',
    'width' => '100%',
    'height' => '500px',
    'style' => '',
    'zoom' => 12,
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
    'windowText' => NULL //'string'
  );
?>

<?= $this->GoogleMap->map($map_options); ?>

<?php



$addressForUrl = str_replace(" ", "+", trim($projectAddress));

$jsonurl = "http://maps.googleapis.com/maps/api/geocode/json?address=".$addressForUrl."&sensor=false";
$json = file_get_contents($jsonurl);

$res = json_decode($json);

var_dump($res->results[0]->geometry->location->lat);
echo ", ";
var_dump($res->results[0]->geometry->location->lng);



?>

<?php $locations = array('(Runner) Jhon Smith'=>'7872 W Commercial Blvd Lauderhill, FL 33351',
                         '(Runner) Laura Dewr'=>'2606 NW 73rd Ave Sunrise, FL 33313',
                         '(Runner) Satriani Petruchi'=>'935 SW 71st Ave, North Lauderdale, FL',
                         '(Buyer)  German G.'=>'3341 SW 15th St Pompano Beach, FL 33069',
                         '(Runner) Camilo Rgth'=>'2649 NW 49th Ave Lauderdale Lakes, FL 33313',
                         '(Origin) Place to help'=> $projectAddress,
                         //'(Buyer)  Jhon Lenon'=>'1860 North Pine Island Road, Plantation, FL',



); ?>



<?php foreach ($locations as $name => $cordenadas): ?>
<?php if (strstr($name, 'Buyer')) {

      $imgIcon = 'http://maps.google.com/mapfiles/ms/micons/orange-dot.png';

      // Your Account Sid and Auth Token from twilio.com/user/account
      $client = new Services_Twilio($sid, $token);
      
      $client->account->messages->sendMessage("+18134131741", "+17865013643", "Hi, $name a person has donated for 
      $projectTitle and We like to know if you could buy the article needed. http://want-2-help.org/projects");




}else if(strstr($name, 'Origin')){

     $imgIcon ='http://google-maps-icons.googlecode.com/files/firstaid.png';

} else {

     $imgIcon = 'http://maps.google.com/mapfiles/kml/pal4/icon21.png';
}

?>

<?php
  // Override any of the following default options to customize your marker
  $marker_options = array(
    'showWindow' => true,
    'windowText' => $name,
    'markerTitle' => "$cordenadas",
    'markerIcon' =>  $imgIcon,
   // 'markerShadow' => 'http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png',
    'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
  );
?>

<?php echo $this->GoogleMap->addMarker("map_canvas", "$name", "$cordenadas" , $marker_options); ?>

<?php endforeach; ?>
