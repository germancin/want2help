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

      #map-canvas { height: 300px;
      width:350px; }
    </style>
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
	<?php echo $this->Form->create('Project',array('action'=>'donate')); ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Prox Value'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Donate'); ?></th>
		<th><?php echo __('At Location'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['Need'] as $need): ?>
		<tr>
			
			<td><?php echo $need['name']; ?></td>
			<td><?php echo "$".$need['prox_value']; ?></td>
			<td><?php echo $need['description']; ?></td>
			<td><?php echo $this->Form->input("",array('type' => 'checkbox', 'value'=>$need['prox_value'],'name'=>'moneyVal-'.$need['id'])); ?></td>
			<td><?php echo $this->Form->input("",array('type' => 'checkbox', 'value'=>$need['id'], 'name'=>'needId-'.$need['id'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'needs', 'action' => 'edit', $need['id'])); ?>
			</td>
		</tr>

	<?php endforeach; ?>

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
    <?php echo $this->Form->input("",array('type' => 'hidden','name'=>'userId', 'value'=>'2')); ?>
	<?php echo $this->Form->end($options); ?>
<?php endif; ?>
</div> <!-- related close -->

<?php $rr = "10.00";?>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="NVRMMDRAKS82J">
<input type="hidden" name="item_name" value="ALcohol and Gasas - For Thanaca la paerra de camarro">
<input type="hidden" name="amount" value="<?php echo $rr; ?>">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>






			  </p>

			</div>
		</div>


	<div class="container">
		<section id="tabs-style" class="element">
			<h3 class="sub-head">TABS STYLE</h3>
			<div class="theme-tabs">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a data-toggle="tab" href="#tab1">Heading 1</a></li>
					<li class=""><a data-toggle="tab" href="#tab2">Special Needs</a></li>
					<li class=""><a data-toggle="tab" href="#tab3">Heading 3</a></li>
					<li class=""><a data-toggle="tab" href="#tab4">Heading 4</a></li>
					<li class=""><a data-toggle="tab" href="#tab5">Heading 5</a></li>
					<li class=""><a data-toggle="tab" href="#tab6">Heading 6</a></li>
				</ul>			
				<div class="tab-content" id="myTabContent">
					<div id="tab1" class="tab-pane fade in active">
<div id="map-canvas"/>
					</div>
					<div id="tab2" class="tab-pane fade">





<div class="related">
	<h3><?php echo __('Related Needs'); ?></h3>
	<?php if (!empty($project['Need'])): ?>
	<?php echo $this->Form->create('Project',array('action'=>'donate')); ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Prox Value'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Donate'); ?></th>
		<th><?php echo __('At Location'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['Need'] as $need): ?>
		<tr>
			
			<td><?php echo $need['name']; ?></td>
			<td><?php echo "$".$need['prox_value']; ?></td>
			<td><?php echo $need['description']; ?></td>
			<td><?php echo $this->Form->input("",array('type' => 'checkbox', 'value'=>$need['prox_value'],'name'=>'moneyVal-'.$need['id'])); ?></td>
			<td><?php echo $this->Form->input("",array('type' => 'checkbox', 'value'=>$need['id'], 'name'=>'needId-'.$need['id'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'needs', 'action' => 'view', $need['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'needs', 'action' => 'edit', $need['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'needs', 'action' => 'delete', $need['id']), null, __('Are you sure you want to delete # %s?', $need['id'])); ?>
			</td>
		</tr>

	<?php endforeach; ?>

	</table>
	<?php $options = array(
    'label' => 'Donate',
    'div' => array(
        'class' => 'donateBtn',
        'style' => 'border:0px solid black; text-align:right; padding-right:10px; '
    )
		); ?>

    <?php echo $this->Form->input("",array('type' => 'hidden','name'=>'projectId', 'value'=>$project['Project']['id'])); ?>
    <?php echo $this->Form->input("",array('type' => 'hidden','name'=>'MyuserId', 'value'=>'2')); ?>
    
    <?php echo "project id :". $project['id']; ?>
	<?php echo $this->Form->end($options); ?>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Need'), array('controller' => 'needs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>





					</div>
					<div id="tab3" class="tab-pane fade">
						<div class="aligned right">
							<img class="pull-right" src="http://placehold.it/270x184" alt="" />
							<h5>Donec et libero quis</h5>
							  <p>Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut phar etra mi, ctor diam. id Suus arciet spendisse rhoncus id arcet porta. Aenean blandit ipsum, pharetrnisi vesti bulum ornare.Lorie ipsum dolor st amet, cons ctetur adipiscing elit. Duis non   sceleri sque est, quis aliquam ligula.Aenean blamp esum. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. </p>
						</div>
					</div>
					<div id="tab4" class="tab-pane fade">
						<ul class="theme-list pull-left">
							<li><i class="icon-check"></i>Check - Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut phar etra mi, ctor diam</li>
							<li><i class="icon-check"></i>Check - Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut phar etra mi, ctor diam</li>
							<li><i class="icon-check"></i>Check - Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut phar etra mi, ctor diam</li>
							<li><i class="icon-check"></i>Check - Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut phar etra mi, ctor diam</li>
							<li><i class="icon-check"></i>Check - Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut phar etra mi, ctor diam</li>
							<li><i class="icon-check"></i>Check - Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut phar etra mi, ctor diam</li>
						</ul>
					</div>
					<div id="tab5" class="tab-pane fade">
					  <p>Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut phar etra mi, ctor diam. id Suus arciet spendisse rhoncus id arcet porta. Aenean blandit ipsum, pharetrnisi vesti bulum ornare. </p>
					</div>
					<div id="tab6" class="tab-pane fade">
					  <p>Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut phar etra mi, ctor diam. id Suus arciet spendisse rhoncus id arcet porta. Aenean blandit ipsum, pharetrnisi vesti bulum ornare.Lorie ipsum dolor st amet, cons ctetur adipiscing elit. Duis non   sceleri sque est, quis aliquam ligula.Aenean blamp esum. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh isicatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. </p>
					</div>
				</div>
			</div>
		</section><!-- Tabs -->
	</div><!-- Container -->














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

