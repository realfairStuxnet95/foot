<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Title -->
    <title>Contact Us || Gasogi United FC</title>
    <?php include 'App/Views/Utils/stylesheets.php'; ?>
</head>
<body>
<?php include 'App/Views/Utils/page_header.php'; ?> 
    <!-- Map Canvas Start -->
    <div id="map-canvas" class="map-canvas" style="display: none;"></div>
    <!-- Map Canvas End -->
    
    
    <!-- Contact Form Area Start -->
    <section class="kick-contact-form-area section_100" style="margin-top: 10vh;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-form">
                        <div class="contact-heading">
                            <h3>get in touch</h3>
                            <p>Our experts will reply you very soon</p>
                        </div>
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>
                                        <input type="text" name="name" placeholder="Your Name" >
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        <input type="email" name="email" placeholder="Your Email" >
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        <input type="tel" name="phone" placeholder="Your Phone Number" >
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        <textarea name="Message" placeholder="Write Your Message" ></textarea>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-form-button">
                                        <button type="submit" name="submit" >Send message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form Area End -->
    
    
    <!-- Contact Page Area Start -->
    <section class="kick-contact-page-area section_t_100 section_b_70">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="single-contact-address">
                        <h3>Gasogi United FC, RWANDA</h3>
                        <ul>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <p>KG 598 St, Kigali</p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <p>+44 123 456 788 - 9</p>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <p>info@gasogiunited.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-contact-address">
                        <h3>TV1 Rwanda</h3>
                        <ul>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <p>KG 598 St, Kigali</p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <p>+44 123 456 788 - 9</p>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <p>info@domain.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Page Area End -->
    <!-- Gallery Masonary Page Start -->
    <?php include 'App/Views/Home/footer.php'; ?>
    <?php include 'App/Views/Utils/scripts.php'; ?>
    
</body>
</html>
