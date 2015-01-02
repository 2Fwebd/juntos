<?php
//set your email here:
$yourEmail = 'youremail@something.com';
/*
 * CONTACT FORM
 */
//If the form is submitted
if(isset($_POST['submitted'])) { 
    //Check to make sure that the name field is not empty
    if($_POST['contact_name'] === '') { 
            $hasError = true;
    } else {
            $name = $_POST['contact_name'];
    }

    //Check to make sure sure that a valid email address is submitted
    if($_POST['contact_email'] === '')  { 
            $hasError = true;
    } else if (!preg_match("/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i", $_POST['contact_email'])) {
            $hasError = true;
    } else {
            $email = $_POST['contact_email'];
    }

    //Check to make sure comments were entered	
    if($_POST['contact_textarea'] === '') {
            $hasError = true;
    } else {
            if(function_exists('stripslashes')) {
                    $comments = stripslashes($_POST['contact_textarea']);
            } else {
                    $comments = $_POST['contact_textarea'];
            }
    }

    //If there is no error, send the email
    if(!isset($hasError)) {

            $emailTo = $yourEmail;
            $subject = "Message From Your Website";
            $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
            $headers = 'From : my site <'.$emailTo.'>' . "\r\n" . 'answer to : ' . $email;

            mail($emailTo, $subject, $body, $headers);

            $emailSent = true; 
    }
    
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- PAGE TITLE -->
    <title>Juntos - Charity & Association Template</title>
    <!-- MAKE IT RESPONSIVE -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- MAIN STYLE -->
    <link href="css/customize.css" rel="stylesheet" media="screen">
    <link href="style.css" rel="stylesheet" media="screen">
    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- START BODY -->
  <body>
	<div id="page">
		<!-- PHP ALERTS FROM THE FORMS -->
	  <?php if(isset($emailSent) && $emailSent == true) { ?>
	        <div class="alert-success alert" >
	            <a class="close icon" data-dismiss="alert" href="#"><span class="icon icon-close"></span></a>
	            <strong><?php echo'Thanks, '. $name  .'.';?></strong>
	                <p><?php echo'Your message was sent successfully. You will receive a response shortly.'; ?></p>
	        </div><!-- .alert -->
	    <?php } ?>
	    <?php if(isset($hasError) && $hasError == true) { ?>
	        <div class="alert-danger alert">
	            <a class="close icon" data-dismiss="alert" href="#"><span class="icon icon-close"></span></a>
	            <strong><?php echo'Sorry,'; ?></strong>
	                <p><?php echo'Your message can\'t be send...check if your email is correct otherwise a field is missing...'; ?></p>
	        </div><!-- .alert -->
	    <?php } ?>
	    <!-- END ALERT -->
		<!-- START MAIN CONTAINER -->
		<div id="main-container">
		
			<!-- START NAVIGATION -->
			<div class="sticky-wrapper">
				<nav id="navigation">
					<div class="container">
						<!-- LOGO GOES HERE -->
						<a href="#" id="logo"><img src="images/logo.png" alt="Logo Image"></a>
						<!-- MENU -->
						<nav>
							<ul id="menu">
								<li><a href="#project">Project</a></li>
								<li><a href="#team">Team</a></li>
								<li><a href="#services">Services</a></li>
								<li><a href="#gallery">Gallery</a></li>
								<li><a href="#events">Events</a></li>
								<li><a href="#blog">Blog</a></li>
								<li><a href="#contact">Contact</a></li>
								<li><a href="#donation" class="btn btn-success">Donation</a></li>
							</ul>
						</nav>
					</div>
				</nav>
			</div>
			<!-- END NAVIGATION -->
			
			<!-- START PROJECT SECTION -->
			<section id="project" class="section" >
				<span class="sequence-prev" ></span>
				<span class="sequence-next" ></span>
	            <ul class="sequence-canvas">
	            	<li class="animate-in" style="background-image: url('images/slider/1.jpg');">
		            	<div class="slide-content">
			            	<h1>Welcome !</h1>
			            	<h3>We're #ASSOCIATION-NAME, a young Charity Association ! We build School in #COUNTRY to globalize knowledge and education... 
							(you can add here any kind of content such as description, button, images...)</h3>
		            	</div>
	            	</li>
	            	<li style="background-color: #82b440;">
		            	<div class="slide-content">
			            	<h1>Our Project</h1>
			            	<h3>Describe here your project in a few sentences, to explain to your visitors what you're doing and what you need their help, 
			            	or maybe something else </h3>
			            	<div class="progress progress-striped">
							  <div class="progress-bar progress-bar-success" style="width: 80%">
							    <span class="sr-only">Fundraising to realize our Amazing project</span>
							  </div>
							</div>
							<div class="pull-right">
								<a href="#donation" class="btn btn-default">Help us with a Donation</a>
							</div>
		            	</div>
	            	</li>
	            	<li style="background-color: #0DB4E9;">
		            	<div class="slide-content">
			            	<h1>Who Is Behind</h1>
			            	<div class="center">
			            		<img src="images/slider/funder.jpg" class="pull-left" alt="image in slider slide">
				            	<h3>Funder Name</h3>
				            	<p>Few words about the creation, the ideas, biography of the funder...</p>
								<a href="#" class="btn btn-twitter"><span class="icon icon-twitter"></span> Twitter</a>
			            	</div>
		            	</div>
	            	</li>
	            </ul>
            	<ul class="sequence-pagination">
					<li>Welcome</li>
					<li>Our Project</li>
					<li>Who is behind</li>
				</ul>
			</section>
			<!-- END PROJECT SECTION -->
		
			<!-- START TEAM SECTION -->
			<section id="team" class="center section with-arrow">
				<!-- SECTION TITLE -->
				<div class="section-header">
					<h1>Who We Are</h1>
					<hr>
				</div>
				<!-- SECTION CONTENT -->
				<div class="section-content section-no-top-padding">
					<div class="container">
						<h3>We are <span class="colored">64</span> volunteers, All members of <span class="colored">Association Name</span>. Our association find funds,
						in the purpose of fighting <span class="colored">Your Causes here</span>. We already performed <span class="colored">17</span> projects in 5 continents 
						during the last <span class="colored">5 years</span>.
						</h3>
						<a href="#contact" class="btn btn-default">Get In Touch</a>
					</div>
				</div>
			</section>
			<!-- END TEAM SECTION -->
			
			<!-- START SERVICES SECTION -->
			<section id="services" class="section section-full-colored">
				<!-- SECTION TITLE -->
				<div class="section-header">
					<h1>What We Do</h1>
					<hr>
				</div>
				<!-- SECTION CONTENT -->
				<div class="section-content">
					<div class="container">
						<div class="services-slider flexslider">
		                    <ul class="slides">
								<!-- START SERVICE -->
		                        <li>
		                            <div class="slide">
										<span class="icon icon-large icon-glass"></span>
										<h3>Reception</h3>
										<p>Here it's just an example of the activities that you can do with your charity to get funds. Or something else...</p>
									</div>
								</li>
								<!-- END SERVICE -->
		                        <li>
		                            <div class="slide">
										<span class="icon icon-large icon-users2"></span>
										<h3>Babysitting</h3>
										<p>Here it's just an example of the activities that you can do with your charity to get funds. Or something else...</p>
									</div>
								</li>
		                        <li>
		                            <div class="slide">
										<span class="icon icon-large  icon-leaf"></span>
										<h3>Gardening</h3>
										<p>Here it's just an example of the activities that you can do with your charity to get funds. Or something else...</p>
									</div>
								</li>
		                        <li>
		                            <div class="slide">
										<span class="icon icon-large icon-gift"></span>
										<h3>Gift Wrapping</h3>
										<p>Here it's just an example of the activities that you can do with your charity to get funds. Or something else...</p>
									</div>
								</li>
		                        <li>
		                            <div class="slide">
										<span class="icon icon-large icon-coin"></span>
										<h3>Sale</h3>
										<p>Here it's just an example of the activities that you can do with your charity to get funds. Or something else...</p>
									</div>
								</li>
							</ul>
						</div>
						<!-- SECTION BUTTON -->
						<div class="center">
							<a href="#events" class="btn btn-default">Our Diary</a>
						</div>
					</div>
				</div>
			</section>
			<!-- END SERVICES SECTION -->
			
			<!-- START GALLERY SECTION -->
			<section id="gallery" class="section">
				<!-- SECTION TITLE -->
				<div class="section-header with-arrow">
					<h1>Gallery</h1>
					<hr>
				</div>
				<!-- SECTION CONTENT -->
				<div class="content-section">
					<div id="gallery-slider">
		                <ul class="slides">
							<!-- SLIDE OF 2 GALLERY ITEMS -->
		                    <li>
		                    	<!-- FIRST ITEM GALLERY -->
		                    	<div class="gallery-item">
						    		<a href="images/gallery/1.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/1.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    	<!-- SECOND ITEM GALLERY -->
		                    	<div class="gallery-item">
						    		<a href="images/gallery/2.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/2.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>
							<!-- END SLIDE -->
		                    <li>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/3.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/3.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/4.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/4.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>
		                    <li>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/5.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/5.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/6.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/6.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>
		                    <li>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/2.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/2.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/4.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/4.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>
		                    <li>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/1.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/1.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/6.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/6.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>
		                    <li>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/2.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/2.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/4.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/4.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>
		                    <li>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/5.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/5.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    	<div class="gallery-item">
						    		<a href="images/gallery/2.jpg" data-fancybox-group="group1" class="fancybox">
						    			<span>Image Title</span>
							    		<img src="images/gallery/2.jpg" width="300" height="200" alt="Image gallery">
						    		</a>
					    		</div>
		                    </li>
		                </ul>
					</div>
				</div>
			</section>
			<!-- END GALLERY SECTION -->
			
			<!-- START EVENTS SECTION -->
			<section id="events" class="section section-content-colored with-arrow color2">
				<!-- SECTION TITLE -->
				<div class="section-header with-arrow">
					<h1>Events In Coming</h1>
					<hr>
				</div>
				<!-- SECTION CONTENT -->
				<div class="section-content">
					<div class="container">
						<div class="flexslider events-slider">
			                <ul class="slides">
			                	<!-- START EVENT -->
			                    <li>
			                        <div class="slide">
										<div class="event">
											<!-- EVENT FEATURED IMAGE -->
											<div class="event-header">
												<a href="single-event.html">
													<img src="images/event/1.jpg" alt="Event cover">
												</a>
											</div>
											<!-- START CONTENT -->
											<div class="event-content">
												<!-- EVENT TITLE -->
												<h3>Event Title</h3>
												<!-- EVENT DATAS -->
												<div class="event-data">
													<p><span class="icon icon-calendar"></span> December 25, 2013</p>
													<P><span class="icon icon-location"></span> 1600 Pennsylvania Ave NW, Washington, DC</p>
												</div>
												<!-- EVENT DESCRIPTION -->
												<p>A text to describe your event which could be a service, a fundraising, a reception or something else.</p>
												<div class="center">
													<a href="single-event.html" class="btn btn-default">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</li>
								<!-- END EVENT -->
			                    <li>
			                        <div class="slide">
										<div class="event">
											<div class="event-header">
												<a href="single-event.html">
													<img src="images/event/2.jpg" alt="Event cover">
												</a>
											</div>
											<div class="event-content">
												<h3>Event Title</h3>
												<div class="event-data">
													<p><span class="icon icon-calendar"></span> January 5, 2014</p>
													<P><span class="icon icon-location"></span> Champ de Mars, 5 Avenue Anatole France</p>
												</div>
												<p>A text to describe your event which could be a service, a fundraising, a reception or something else.</p>
												<div class="center">
													<a href="single-event.html" class="btn btn-default">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</li>
			                    <li>
			                        <div class="slide">
										<div class="event">
											<div class="event-header">
												<a href="single-event.html">
													<img src="images/event/3.jpg" alt="Event cover">
												</a>
											</div>
											<div class="event-content">
												<h3>Event Title</h3>
												<div class="event-data">
													<p><span class="icon icon-calendar"></span> January 13, 2014</p>
													<P><span class="icon icon-location"></span> London SW1A 1AA</p>
												</div>
												<p>A text to describe your event which could be a service, a fundraising, a reception or something else.</p>
												<div class="center">
													<a href="single-event.html" class="btn btn-default">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</li>
			                    <li>
			                        <div class="slide">
										<div class="event">
											<div class="event-header">
												<a href="single-event.html">
													<img src="images/event/4.jpg" alt="Event cover">
												</a>
											</div>
											<div class="event-content">
												<h3>Event Title</h3>
												<div class="event-data">
													<p><span class="icon icon-calendar"></span> March 2, 2014</p>
													<P><span class="icon icon-location"></span> London SW1A 1AA</p>
												</div>
												<p>A text to describe your event which could be a service, a fundraising, a reception or something else.</p>
												<div class="center">
													<a href="single-event.html" class="btn btn-default">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</li>
								<!-- LOAD MORE OPTION
			                    <li>
			                        <div class="slide">
										<div class="load-more">
											<div class="content">
												<a href="#" title="load more">
													<span class="icon icon-large icon-plus"></span>
													<h3>Load More Events</h3>
												</a>
											</div>
										</div>
									</div>
								</li>
								-->
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- END EVENTS SECTION -->
			
			<!-- START BLOG SECTION -->
			<section id="blog" class="section with-arrow section-content-colored">
				<!-- SECTION TITLE -->
				<div class="section-header with-arrow">
					<h1>Latest Posts</h1>
					<hr>
				</div>
				<!-- SECTION CONTENT -->
				<div class="section-content">
					<div class="container">
						<div class="flexslider posts-slider">
		                    <ul class="slides">
		                    	<!-- START BLOG POST -->
		                        <li>
		                            <div class="slide">
										<div class="post post-normal">
											<!-- FEATURED IMAGE -->
											<div class="post-header">
												<a href="single-blog.html">
													<img src="images/blog/1.jpg" alt="Blog cover">
												</a>
											</div>
											<div class="post-content">
												<!-- TITLE -->
												<h3>Post Title</h3>
												<!-- DATE -->
												<div class="post-data">
													<p><span class="icon icon-clock"></span> December 25, 2013</p>
												</div>
												<!-- CONTENT -->
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec placerat sem. 
												Vestibulum vel tristique purus. In hac habitasse platea dictumst. Suspendisse eget pellentesque dui...</p>
												<div class="center">
													<a href="single-blog.html" class="btn btn-default">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</li>
		                    	<!-- END BLOG POST -->
		                        <li>
		                            <div class="slide">
										<div class="post post-normal">
											<div class="post-header">
												<a href="single-blog.html">
													<img src="images/blog/2.jpg" alt="Blog cover">
												</a>
											</div>
											<div class="post-content">
												<h3>Post Title</h3>
												<div class="post-data">
													<p><span class="icon icon-clock"></span> January 2, 2014</p>
												</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec placerat sem. 
												Vestibulum vel tristique purus. In hac habitasse platea dictumst. Suspendisse eget pellentesque dui...</p>
												<div class="center">
													<a href="single-blog.html" class="btn btn-default">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</li>
		                        <li>
		                            <div class="slide">
										<div class="post post-normal">
											<div class="post-header">
												<a href="#">
													<img src="images/blog/3.jpg" alt="Blog cover">
												</a>
											</div>
											<div class="post-content">
												<h3>Post Title</h3>
												<div class="post-data">
													<p><span class="icon icon-clock"></span> January 12, 2014</p>
												</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec placerat sem. 
												Vestibulum vel tristique purus. In hac habitasse platea dictumst. Suspendisse eget pellentesque dui...</p>
												<div class="center">
													<a href="single-blog.html" class="btn btn-default">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</li>
		                        <li>
		                            <div class="slide">
										<div class="post post-normal">
											<div class="post-header">
												<a href="single-blog.html">
													<img src="images/blog/4.jpg" alt="Blog cover">
												</a>
											</div>
											<div class="post-content">
												<h3>Post Title</h3>
												<div class="post-data">
													<p><span class="icon icon-clock"></span> February 22, 2014</p>
												</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec placerat sem. 
												Vestibulum vel tristique purus. In hac habitasse platea dictumst. Suspendisse eget pellentesque dui...</p>
												<div class="center">
													<a href="single-blog.html" class="btn btn-default">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</li>
								<!-- LOAD MORE OPTION
			                    <li>
			                        <div class="slide">
										<div class="load-more">
											<div class="content">
												<a href="#" title="load more">
													<span class="icon icon-large icon-plus"></span>
													<h3>Load More Posts</h3>
												</a>
											</div>
										</div>
									</div>
								</li>
								-->
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- END BLOG SECTION -->
			
			<!-- START DONATION SECTION -->
			<section id="donation" class="section section-image" style="background-image: url('images/donation_cover.jpg');">
				<div class="section-content center">
					<h2>Ready to support us ?</h2>
					<!-- DONATION BUTTON -->
					<a href="#" class="btn btn-donation btn-success">Make a Donation</a>
				</div>
			</section>
			<!-- END DONATION SECTION -->
			
			<!-- START CONTACT SECTION -->
			<section id="contact" class="section with-arrow">
				<!-- SECTION TITLE -->
				<div class="section-header with-arrow">
					<h1>Let's Get In Touch</h1>
					<hr>
				</div>
				<!-- SECTION CONTENT -->
				<div class="section-content">
					<div class="container">
						<div class="row">	
							<!-- CONTACT TEXT -->
							<div class="col-md-6">
								<p>Sed vehicula vel nulla a interdum. Etiam bibendum urna sed sapien eleifend dictum. 
								Ut adipiscing sit amet diam quis ornare. Morbi ultricies venenatis tempus. Vestibulum eget condimentum tellus.</p>
								<!-- SOCIAL BUTTTONS -->
								<ul class="social-list">
									<li><a href="#" class="btn btn-facebook"><span class="icon icon-facebook"></span> Like our Page on Facebook</a></li>
									<li><a href="#" class="btn btn-twitter"><span class="icon icon-twitter"></span> Follow us on Twitter</a></li>
									<li><a href="#" class="btn btn-google"><span class="icon icon-google-plus"></span> Follow us on Google +</a></li>
								</ul>
							</div>
							<div class="col-md-6">
								<!-- CONTACT FORM -->
				                <form class="form-horizontal" method="post" action="index.php" id="form">
				                  <div class="form-group">
				                    <label for="contact_name" class="col-lg-2 control-label">Name</label>
				                    <div class="col-lg-10">
				                      <input type="text" class="form-control" name="contact_name">
				                    </div>
				                  </div>
				                  <div class="form-group">
				                    <label for="contact_email" class="col-lg-2 control-label">Email</label>
				                    <div class="col-lg-10">
				                      <input type="email" class="form-control" name="contact_email">
				                    </div>
				                  </div>
				                  <div class="form-group">
				                    <label for="contact_textarea" class="col-lg-2 control-label">Message</label>
				                    <div class="col-lg-10">
				                      <textarea class="form-control" rows="3" name="contact_textarea"></textarea>
				                    </div>
				                  </div>
				                  <div class="form-group">
				                    <div class="col-lg-offset-2 col-lg-10">
				                      <input type="hidden" name="submitted" id="submitted" value="true" />
				                      <button type="submit" class="btn btn-default btn-send" name="submitted"><i data-icon="&#xe00d;"></i>Send</button>
				                    </div>
				                  </div>
				                </form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- END CONTACT SECTION -->
			
			<!-- START FOOTER SECTION -->
			<section id="footer" class="section section-full-colored">
				<div class="section-content center">
					<p>Juntos - Design & Development by <a href="http://2f-design.fr">2F</a></p>
				</div>
			</section>
			<!-- END FOOTER SECTION -->
		
		</div>
		<!-- END MAIN CONTAINER -->
		
		<!-- PAGE LOADING-->
		<div id="loader"></div>
  	</div>
    <!-- SCRIPTS -->
    <script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/jquery.sequence-min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.smoothscroll.min.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/pace.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/custom.js"></script>
  </body>
  <!-- END BODY -->
</html>