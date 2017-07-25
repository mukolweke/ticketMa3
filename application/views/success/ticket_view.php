<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
foreach ($code_data as $ticData) {
    $customerName = $ticData->customerName;
    $customerContact = $ticData->customerContact;
    $customerId = $ticData->customerId;
    $ticketId = $ticData->ticketId;
    $ticketCode = $ticData->ticketKey;
    $busDetails = $ticData->busDetails;
    $route_from = $ticData->from;
    $route_to = $ticData->to;
    $ticketDate = $ticData->dateScheduled;
    $ticketTime = $ticData->time;
}
?>
<html>
    <head>
        <title>Tickets &CenterDot; Online bus booking</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo base_url('style/css/bootstrap.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('style/css/datepicker.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('style/css/main.css'); ?>"/>

        <!-- Icon -->
        <link rel="icon" href="<?php echo base_url('style/imgs/favicon.ico'); ?>"/>

    </head>
    <body id="search">

        <!-- Top Navbar -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">ma3ticket</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo base_url('login'); ?>">Sign in</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('signup'); ?>">Sign up</a>
                        </li>
                    </ul>

                    <p class="navbar-text navbar-right"><strong>Operator only:</strong></p>
                </div>
            </div>
        </nav>
        <!--section-->
        <section id="maincontent">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="results-summary">
                            <div class="h4-styling">
                                <span class="glyphicon glyphicon-thumbs-up" style="color:green; font-weight: bold;"></span> Reservation Successfully Placed
                                <span>
                                    <a  href="<?php echo base_url('home'); ?>"><button class="btn btn-danger pull-right">Reserve another Ticket</button></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row trip-data">
                    <div class="col-md-12"> 
                        <div class="seat-wrapper">

                            <p class="bg-success">Reservation has been successfully placed</p>
                            <br />

                            <div class="header">Ticket details</div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h3>Customer details</h3>
                                    <blockquote>
                                        <p>Name: <?php echo $customerName; ?></p>
                                        <p>Phone: <?php echo $customerContact; ?></p>
                                        <p>ID: <?php echo $customerId; ?></p>
                                    </blockquote>
                                </div>

                                <div class="col-md-4">
                                    <h3>Schedule details</h3>
                                    <blockquote>
                                        <p>Bus: <?php echo $busDetails; ?></p>
                                        <p>Route: <?php echo $route_from . ' - ' . $route_to; ?></p>
                                        <p>On: <?php echo $ticketDate . ' at ' . $ticketTime; ?></p>
                                    </blockquote>
                                </div>
                                
                                 <div class="col-md-4">
                                    <h3>Ticket Code/ID</h3>
                                    <blockquote>
                                        <p class="alert alert-info">
                                            Note this code. It will be needed once you come to the booking station
                                        </p>
                                        <p>Code: <?php echo $ticketCode;?></p>
                                    </blockquote>
                                </div>
                            </div>

                            <p class="bg-danger"><strong><a href="<?php echo base_url('Terms'); ?>">Terms and Conditions</a></strong> Apply. Please note www.ma3ticket.co.ke is not a Bus Operator. Any amendments to your ticket must be made in conjunction with the respective bus operator.</p>

                        </div>
                    </div>
                </div>
            </div>
        </section> 

        <!-- Services -->
        <div class="container clearfix services">
            <div class="text-center footer-links">
                <a href="<?php echo base_url('contactus'); ?>">Contact Us |</a>
                <a href="<?php echo base_url('howitWorks'); ?>">How It Works |</a>
                <a href="<?php echo base_url('Terms'); ?>">Terms & Condition |</a>
                <a href="<?php echo base_url('faqs'); ?>">FAQs</a>
            </div>
        </div>


        <script src="<?php echo base_url('style/js/jquery/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/main.js'); ?>"></script>
    </body>
</html>