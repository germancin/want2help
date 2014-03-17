<div class="top-image">
	<img src="http://themes.webinane.com/lifeline/images/single-page-top1.jpg" alt="" />
</div><!-- Page Top Image -->
<section class="page">

	<div class="page-title">
		<h1><span> Pre Donation Info.</span></h1>
	</div><!-- Page Title-->

	<div class="container">
         
        <h3><?php echo $projectTitle; ?></h3> 
        You are about to Donate the money for buying: <br/>
		<table cellpadding="0" cellspacing="0"  width="100%">
			<tr>
				<th>Qty</th>
				<th>Need</th>
				<th>Cost</th>
			</tr>

			<?php 
			$sum = ''; $amountT = '';
			foreach ($donationsArray as $item): ?>
				<?php $amount = floatval($item['amount']); ?>
				<?php //$sum = $amount; ?>
				<tr>
					<td><?php echo $item['qty']; ?> </td>
					<td><?php echo urldecode($item['item_name']); ?></td>
					<td><?php echo "$".$amount; ?></td>
				</tr>

				<?php $amountT += $amount; ?>
			<?php endforeach; ?>
			
		</table>
		<?php if ($donation):?>
			<center>
	            <h2 style="color:blue"> Total : $<?php echo $amountT; ?> </h2>
	       		<a href="<?php echo $paypalUrl; ?>"> <img src="/images/donate_btn.png" width="250px" /> </a>
	   	    </center>
   	    <?php endif; ?>
		<pre style="">
			<?php //var_dump($donationsArray); ?>
		</pre>

	

	</div>	
</section>	














