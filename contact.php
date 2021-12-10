<?php 
require_once('config.php');
if (isset($_POST['submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$q= "INSERT INTO `contact` (`name`,`email`,`subject`,`message`) VALUES ('$name','$email','$subject','$message')";
	$queary = mysqli_query($conn,$q);
        echo "<script>alert('Your message has been submitted'); window.location.href='contact.php';</script>";
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		.location{
			width: 80%;
			margin-left: 10%;
			margin-top: -10px; 
			padding: 80px 0;
		}
		.location iframe{ 
		width: 100%;
		}
		.contact-us{
			width: 80%;
			margin: auto;
		}
		.contact-col{
			flex-basis: 48%;
			margin-bottom: 30px;
		}
		.contact-col div{
			display: flex;
			align-items: center;
			margin-bottom: 40px;
		}
		.contact-col div .fa{
			font-size: 28px;
			color: #f44336;
			margin: 10px;
			margin-right: 30px;
		}
		.contact-col div p{
			padding: 0;

		}
		.contact-col div h5{
			font-size: 20px;
			margin-bottom: 5px;
			color: #555;
			font-weight: 400;
		}
		.contact-col input[type=text],.contact-col input[type=email], .contact-col textarea{
			width: 100%;
			padding: 15px;
			margin-bottom: 17px;
			outline: none;
			border:1px solid #ccc;
			box-sizing: border-box;
		}
.title{
	text-align: center;
	margin: 0 auto 20px;
	position: relative;
	line-height: 60px;
	color: #555;
}
.title::after{
	content: '';
	background: #ff523b;
	width: 80px;
	height: 5px;
	border-radius: 5px;
	position: absolute;
	bottom: 0;
	left: 50%;
	transform: translateX(-50%);
}
	</style>
</head>
<body>
	<?php include('header.php'); ?>
	<h3 class="title">Contact us</h3>
<section class="location">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29734.305030227883!2d76.20491766818454!3d21.319386593850385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd8331d2fa4b30f%3A0x329f2fbd78f60f!2sThakur%20Shiv%20Kumar%20Singh%20Memorial%20Management%20College!5e0!3m2!1sen!2sin!4v1623607246853!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></section>
<section class="contact-us">
	<div class="row">
		<div class="contact-col">
			<div>
				<i class="fa fa-home"></i>
				<span>
					<h5>TSPC</h5>
					<p>Burhanpur(M.P)</p>
				</span>
			</div>
			<div>
				<i class="fa fa-phone"></i>
				<span>
					<h5><a href="tel: 0123456789" style="color:#555;">0123456789</a></h5>
					<p>Monday to Friday</p>
				</span>
			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<span>
					<h5><a href="mailto:noreply@bmart.ml" style="color:#555;">noreply@bmart.ml</a></h5>
					<p>Monday to Friday</p>
				</span>
			</div>
		</div>
		<div class="contact-col">
			<form action="" method="POST">
				<input type="text" name="name" placeholder="Enter Your Name" required>
				<input type="email" name="email" placeholder="Enter Email Address" required>
				<input type="text" name="subject" placeholder="Enter Your Subject" required>
				<textarea rows="8" name="message" placeholder="Messages" required></textarea>
				<button type="submit" class="btn btn-outline-danger" name="submit">Send Message</button>
			</form>
		</div>
	</div>
</section>
</body>
</html>