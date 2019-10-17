<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->view('Components/basic-init.php') ?>

<body style="background:#2255A4;">
<div class="col-lg-12" style="margin-top: 250px">
	<center>
		<h2 style="color: #f2f2f2">Oops! Your session has been expired!</h2>
			<a href="<?php echo base_url(); ?>login" 
			style="color: #fff;
			    background: #FFB848;
			    padding: 5px 20px;
			    margin-top: 30px;
			    font-size: 20px;
			    border-radius: 50px;"> Click Here
			</a>
	</center>
</div>
</body>
</html>
