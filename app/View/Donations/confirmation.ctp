<div class="top-image">
	<img src="http://themes.webinane.com/lifeline/images/single-page-top1.jpg" alt="" />
</div><!-- Page Top Image -->
<section class="page">
	<div class="container">

		<?php if ($transacionResult === "SUCCESS"):?>

			Thank you for your Donation 
			<br/>
			We sent the messages to a group of trusted buyers which will buy the article. 
			<br/>
			Total : $<?php echo $curlResponse['mc_gross']; ?>
			<br/>



		<?php endif; ?>

		<?php if ($transacionResult === "FAIL"):?>

			There was a problem with your transaccion.
		<?php endif; ?>

		<br/><br/>
		<?php //var_dump($custom); ?>
		<br/><br/><br/>
		<?php var_dump($curlResponse); ?>



	</div>	
</section>	

