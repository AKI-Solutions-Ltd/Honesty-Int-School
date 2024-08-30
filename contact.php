<?php

require 'vendor3/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    $message = test_input($_POST['message']);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo '<div id="messages" style="padding: 20px;text-align: center;background-color: red; color: white;">Invalid email format.</div>';
    }
    else if ($name && $email && $phone && $message) {

        $sender = 'info@eschool-ng.com';
        $senderName = $name;
        
        
        $usernameSmtp = 'AKIA2JXCZJ4RN7QL2DLB';
        $passwordSmtp = 'BGpsi+zy33/jMceECOjtO1aj9twcqv8J/ARSXUHavBae';
        
        
        $host = "email-smtp.us-east-1.amazonaws.com";
        $port = 587;
        
        
        $mail = new PHPMailer(true);
        $comment = "Honesty School Contact Form";
        
        // $recipient = 'honestyinternationalschool@gmail.com';
        $recipient = 'adigungodwin2@gmail.com';
        $bodyHtml = "
                <html>
                <head>
                    <title>Contact Form</title>
                </head>
                <body>
                    <p>Name: $name</p>
                    <p>Email: $email</p>
                    <p>Phone: $phone</p>
                    <p>Message: $message</p>
                </body>
                </html>
            ";
        $mail->Subject = "Honesty School Contact Form";
        
        // The HTML-formatted body of the email
        $mail->Body = $bodyHtml;
        $mail->isHTML(true);
        $mail->AltBody    = $bodyHtml;
        
        // $ccRecipients = array( TO ADD EXTRA RECIPIENT EMAIL ADDRESSES, UNCOMMENT LINE 85-87
        // );
        
        try {
            // Specify the SMTP settings.
            $mail->isSMTP();
            $mail->Username   = $usernameSmtp;
            $mail->Password   = $passwordSmtp;
            $mail->Host       = $host;
            $mail->Port       = $port;
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = 'tls';
            $mail->Helo       = 'http://honestyschool.com.ng/';
            // $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);
        
        
            // Specify the message recipients.
            $mail->setFrom($sender, $senderName);
            $mail->addAddress($recipient);
            // You can also add CC, BCC, and additional To recipients here.
            $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );
        
            
            // foreach ($ccRecipients as $ccRecipient) {
            //     $mail->addCC($ccRecipient);
            // }
            
            $mail->Send();
        
			echo '<div id="messages" style="padding: 20px;text-align: center;background-color: green; color: white;">Thank you! Your message has been sent.</div>';
            // echo "Email sent successfully!!!!!!! New<br>"; 
        } catch (phpmailerException $e) {
            //echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
        } catch (Exception $e) {
            // echo "Email can not be sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
            // echo "Sorry, something went wrong. Please try again.";
        }

    } else if (empty($name) || empty($email) || empty($phone) || empty($message)) {
		echo '<div id="messages" style="padding: 20px;text-align: center;background-color: red; color: white;">Please fill in all fields.</div>';
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<!-- JavaScript to hide the message after 7 seconds -->
<script>
    setTimeout(function() {
        var messageDiv = document.getElementById('messages');
        if (messageDiv) {
            messageDiv.style.display = 'none';
        }
    }, 7000); // 7000 milliseconds = 7 seconds
</script>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from rometheme.net/html/kids/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Dec 2020 20:37:47 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<!-- Basic Page Needs
    ================================================== -->
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HONESTY INTERNATIONAL SCHOOL</title>



	<!-- ==============================================
	Favicons
	=============================================== -->
	<!-- <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png"> -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<!-- ==============================================
	CSS VENDOR
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/animate.min.css">

	<!-- ==============================================
	Custom Stylesheet
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="css/style.css" />

	<script src="js/vendor/modernizr.min.js"></script>

	<script src='../../google_analytics_auto.html'></script>
</head>

<body>

	<!-- LOAD PAGE -->
	<div class="animationload">
		<div class="loader"></div>
	</div>

	<!-- BACK TO TOP SECTION -->
	<a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

	<!-- HEADER -->
	<div class="header header-1">

		<!-- TOPBAR -->
		<div class="topbar">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-sm-8 col-md-6">
						<div class="info">
							<div class="info-item">
								<i class="fa fa-phone"></i> 
								08023104996, 08171170770
							</div>
							<div class="info-item">
								<i class="fa fa-envelope-o"></i> <a href="mailto:HONESTYINTERNATIONALSCHOOL@GMAIL.COM"
									title="" style="color:white">honestyinternationalschool@gmail.com
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-md-6">
						<div class=" pull-right d-inline-flex" style="margin: 15px 0px 15px 0px;">
							<!--<a href="https://www.facebook.com/Crownimperials/" class="fb"><i class="fa fa-facebook"></i></a> 
							<a href="https://twitter.com/SchoolCrown" class="tw"><i class="fa fa-twitter"></i></a> 
							<a href="#" class="ig"><i class="fa fa-instagram"></i></a> 
							<a href="#" class="in"><i class="fa fa-linkedin"></i></a> -->
							<a href="https://eschool-ng.com/login.php" class="btn btn-primary kkd"> <i
									class="fa fa-lock"></i> eSchool Portal Login</a>
							<style>
								.sosmed-icon a {
									color: #ffffff;
									background-color: #ffffff;

								}

								.kkd {
									border-radius: 5px !important;
									background-color: #ffffff !important;
									padding-left: 5px;
									padding-right: 5px;


								}
							</style>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- NAVBAR SECTION -->
		<div class="navbar-main">
			<div class="container">
				<nav id="navbar-example" class="navbar navbar-expand-lg">
					<a class="navbar-brand jk" href="index.html">
						<img src="images/logo.jpg" alt="logo">
					</a>

					<style type="text/css">
						.jk img {
							width: 120px;
							height: auto;
						}

						@media screen and (max-width: 768px) {
							.navbar-main.stiky .navbar-brand img {
								width: 120px;
								text-align: center;
								margin: 0 40px 0 40px;
							}

							.jk img {
								width: 120px;
								height: auto;
							}

							.navbar-brand {
								margin-right: 0;
							}
						}
					</style>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
						aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="./index.html">HOME</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="about.html">ABOUT US</a>
							</li>
							<li class="nav-item dropdown dmenu">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="false">
									OUR SCHOOL
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="admission.html">ADMISSION</a>


								</div>
							</li>
							<li class="nav-item dropdown dmenu">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="false">
									ACADEMICS
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="academics.html">OVERVIEW</a>
									<a class="dropdown-item" href="curriculum.html">OUR CURRICULUM</a>

								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="gallery.html">GALLERY</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="contact.php">CONTACT US</a>
							</li>
						</ul>
					</div>
				</nav> <!-- -->

			</div>
		</div>

	</div>
	<!-- BANNER -->
	<div class="section banner-page" data-background="images/test-bg.png" style="background-position: top;">
		<div class="content-wrap pos-relative">
			<div class="d-flex justify-content-center bd-highlight mb-3">
				<div class="title-page">Contact us</div>
			</div>
			<div class="d-flex justify-content-center bd-highlight mb-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb ">
						<li class="breadcrumb-item"><a href="./index.html">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Contact us</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>


	<div class="contact-main" >
			<div class="content-wrap">
				<div class="container">
					<div class="row" >
						<div class="col-sm-12 col-md-12 col-lg-6">
							<h2 class="section-heading-2" style="color:#29176E;">
								For Enquiries:
							</h2>
							<br>

						</div>
						<div class="col-lg-3">
							<h4>Phone number: </h4>
							<div class="info-text"> <span class="fa fa-phone info-icon"></span>  
									08023104996, 08171170770
							</div>

						</div>

						<div class="col-lg-3">
							<h4>Address</h4>
							<div class="info-text"> <span class="fa fa-phone info-icon"></span> 
								School Address: <br> 
								28, Chief Natufe Street, Bode Thomas.
							</div>

						</div>
					</div>

					<div class="contact-form-container">
						<h2 style="font-size: 2em; color: white;">Send Us a Message</h2>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<!-- <label for="name">Name:</label> -->
							<input type="text" id="name" name="name" placeholder="Name"required>
							<!-- <label for="email">Email:</label> -->
							<input type="email" id="email" name="email"placeholder="Email"required>
							
							<!-- <label for="phone">Phone:</label> -->
							<input type="tel" id="phone" name="phone" placeholder="Phone"required>
							
							<!-- <label for="message">Message:</label> -->
							<textarea id="message" name="message" rows="4" placeholder="Message"required></textarea>
							
							<button type="submit" style="font-size: 1em;margin-top: 30px;"><strong>Submit</strong></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>







	<style type="text/css">
		.footer .footer-item .footer-title {

			color: #f7f9fd;
		}

		.list-info li .info-icon {
			display: table-cell;
			color: #f3f3f5;
		}

		.footer .footer-item .list li a:before {
			content: '\f178';
			font-family: FontAwesome;
			left: 0;
			position: absolute;
			color: #f7f9fd;
		}
	</style>

	<!-- FOOTER SECTION -->
	<div class="footer" data-background="images/footer.jpg">
		<div class="content-wrap"  style="background-color: #29176E;">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-3">
						<div class="footer-item">
							<img src="images/logo.jpg" style="height: 100px; width:100px;" alt="logo bottom" class="logo-bottom">
							<div class="spacer-30"></div>
							<p><strong style="color: #FFF500;"> OUR MISSION:</strong><br><br>"To build and develop the child of today towards relevance and excellence through effective and efficient teaching."</p>

						</div>
					</div>

					<div class="col-sm-12 col-md-6 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								Contact Info
							</div>
							<ul class="list-info">
								<li>
									<div class="info-icon">
										<span class="fa fa-map-marker"></span>
									</div>
									<div class="info-text"> School Address: <br> 
										28, Chief Natufe street, Bode Thomas.
									</div>
								</li>
								<li>
									<div class="info-icon">
										<span class="fa fa-phone"></span>
									</div>
									<div class="info-text">+2348171170770, +2348023104996</div>
								</li>
								<li>
									<div class="info-icon">
										<span class="fa fa-envelope"></span>
									</div>
									<div class="info-text"><a href="mailto:honestyinternationalschool@gmail.com" title="" style="font-size: 13px; color: white;">honestyinternationalschool@gmail.com</a></div>
								</li>
								<li>
									<div class="info-icon">
										<span class="fa fa-clock-o"></span>
									</div>
									<div class="info-text">Mon - Sat: 09:00 - 17:00</div>
								</li>
							</ul>

						</div>
					</div>




					<div class="col-sm-12 col-md-6 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								Useful Links
							</div>

							<ul class="list">
								<li><a href="about.html" title="About us">About us</a></li>
								<li><a href="admission.html" title="Admission">Admission</a></li>
								<li><a href="academics.html" title="Academics">Academics</a></li>
								<li><a href="gallery.html" title="Gallery">Gallery</a></li>
								<li><a href="contact.php" title="Contact Us">Contact Us</a></li>
							</ul>

						</div>
					</div>

					<div class="col-sm-12 col-md-6 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								Get in Touch
							</div>
							<p>Follow us on all our social media handles @HONESTY International Schools</p>
							<div class="sosmed-icon d-inline-flex">
								<a href="#" class="fb"><i class="fa fa-facebook"></i></a>
								<a href="#" class="tw"><i class="fa fa-twitter"></i></a>
								<a href="#" class="ig"><i class="fa fa-instagram"></i></a>
								<a href="#" class="in"><i class="fa fa-youtube"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fcopy"  style="background-color:#29176E;">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<p class="ftex">Copyright 2024 &copy; <span class="color-primary">HONESTY International Schools</span>.
							Designed by <span class="color-primary"> <a href="https://akisolutions.com.ng/" style="color: #FFF500;">AKI
									Solutions </a></span></p>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- JS VENDOR -->
	<script src="js/vendor/jquery.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/vendor/owl.carousel.js"></script>
	<script src="js/vendor/jquery.magnific-popup.min.js"></script>

	<!-- SENDMAIL -->
	<script src="js/vendor/validator.min.js"></script>
	<script src="js/vendor/form-scripts.js"></script>

	<script src="js/script.js"></script>

</body>

</html>