<!DOCTYPE html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Want-2-help.org</title>
<?php
	echo $this->Html->meta('icon');

	echo $this->Html->css('cake.generic');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Google Fonts -->

<link href='http://fonts.googleapis.com/css?family=Roboto:400,900italic,700italic,900,700,500italic,500,400italic,300italic,300,100italic,100|Open+Sans:400,300,400italic,300italic,600,600italic,700italic,700,800|Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700' rel='stylesheet' type='text/css'>

<style type="text/css">
body{

	margin:10px 10px 10px 10px;
	border:1px solid black;
}
</style>

</head>

<body>

<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>

</body>
</html>