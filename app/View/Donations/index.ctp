<div class="donations index bake-header">
	<h2><?php echo __('Donations'); ?></h2>











 <!-- 1. The 'widget' div element will contain the upload widget.
         The 'player' div element will contain the player IFrame. -->
    <div id="widget"></div>
    <div id="player"></div>

    <script>
      // 2. Asynchronously load the Upload Widget and Player API code.
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. Define global variables for the widget and the player.
      //    The function loads the widget after the JavaScript code
      //    has downloaded and defines event handlers for callback
      //    notifications related to the widget.
      var widget;
      var player;
      function onYouTubeIframeAPIReady() {
        widget = new YT.UploadWidget('widget', {
          width: 500,
          events: {
            'onUploadSuccess': onUploadSuccess,
            'onProcessingComplete': onProcessingComplete
          }
        });
      }

      // 4. This function is called when a video has been successfully uploaded.
      function onUploadSuccess(event) {
        alert('Video ID ' + event.data.videoId + ' was uploaded and is currently being processed.');
      }

      // 5. This function is called when a video has been successfully
      //    processed.
      function onProcessingComplete(event) {
        player = new YT.Player('player', {
          height: 390,
          width: 640,
          videoId: event.data.videoId,
          events: {}
        });
      }
    </script>

















	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_status'); ?></th>
			<th><?php echo $this->Paginator->sort('transaction_token'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('payer_id'); ?></th>
			<th><?php echo $this->Paginator->sort('address_street'); ?></th>
			<th><?php echo $this->Paginator->sort('address_zip'); ?></th>
			<th><?php echo $this->Paginator->sort('address_country_code'); ?></th>
			<th><?php echo $this->Paginator->sort('address_name'); ?></th>
			<th><?php echo $this->Paginator->sort('num_cart_items'); ?></th>
			<th><?php echo $this->Paginator->sort('address_city'); ?></th>
			<th><?php echo $this->Paginator->sort('payer_email'); ?></th>
			<th><?php echo $this->Paginator->sort('mc_currency'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_date'); ?></th>
			<th><?php echo $this->Paginator->sort('address_status'); ?></th>
			<th><?php echo $this->Paginator->sort('protection_eligibility'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($donations as $donation): ?>
	<tr>
		<td><?php echo h($donation['Donation']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($donation['User']['username'], array('controller' => 'users', 'action' => 'view', $donation['User']['id'])); ?>
		</td>
		<td><?php echo h($donation['Donation']['amount']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['payment_status']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['transaction_token']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['payer_id']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['address_street']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['address_zip']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['address_country_code']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['address_name']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['num_cart_items']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['address_city']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['payer_email']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['mc_currency']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['payment_date']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['address_status']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['protection_eligibility']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['created']); ?>&nbsp;</td>
		<td><?php echo h($donation['Donation']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $donation['Donation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $donation['Donation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $donation['Donation']['id']), null, __('Are you sure you want to delete # %s?', $donation['Donation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Donation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
