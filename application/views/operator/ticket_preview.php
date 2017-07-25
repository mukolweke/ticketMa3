<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <?php
        foreach ($operatorDetails as $oppData) {
            $oppName = $oppData->operatorName;
            $oppMail = $oppData->operatorMail;
            $oppId = $oppData->operatorId;
        }

        foreach ($ticketDetails as $ticData) {
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
        <title><?php echo $oppName; ?> &CenterDot; Ticket Preview</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo base_url('style/css/bootstrap.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('style/css/datepicker.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('style/css/main.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('style/css/timepicker.less'); ?>"/>

        <!-- Icon -->
        <link rel="icon" href="<?php echo base_url('style/imgs/favicon.ico'); ?>"/>

    </head>
    <body id="admin">
        <!-- Top Navbar -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url('op'); ?>">ma3ticket</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="">
                            <a href="<?php echo base_url("active-operation"); ?>">Operations</a>
                        </li>
                        <li class="">
                            <a href="<?php echo base_url("active-ticket"); ?>">Tickets</a>
                        </li>
                        <li class="">
                            <a href="<?php echo base_url("active-group"); ?>">Group Bookings</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo base_url("signout"); ?>">Sign out</a>
                        </li>
                    </ul>
                    <p class="navbar-right navbar-text">
                        Logged in as <?php echo $oppName; ?>
                    </p>
                </div>
            </div>
        </nav>

        <!-- Main operator pane -->
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="profileView">
                        <!-- Ticket search form-->
                        <div class="row">
                            <div class="col-md-5">
                                <form method="" id="ticket_search_form" action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" required="" name="ticket-number" id="ticket-number" value="<?php echo $ticketCode; ?>" placeholder="Ticket ID">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                                <span id="loader-ticket" style="display: none">Loading..</span>
                                                <span class="" id="ticket-btn">Find</span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-7">
                                <div class="alert alert-success" id="ticket-success" style="display: none" role="alert">
                                    <span style="display: inline-block" id="ticket-success-message"></span>
                                </div>
                                <div class="alert alert-danger" id="ticket-error" style="display: none" role="alert">
                                    <span style="display: inline-block" id="ticket-error-message"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <blockquote id="search-ticket-results" style="display: none">
                        <p>
                            This ticket was booked by
                            <span id="c-name"></span>                            
                        </p>
                        <span id="ticket-link"></span>
                    </blockquote>


                    <div class="">
                        <div class="header">Ticket details</div>
                        <h3>Customer details</h3>
                        <blockquote>
                            <p>Name: <?php echo $customerName; ?></p>
                            <p>Phone: <?php echo $customerContact; ?></p>
                            <p>ID: <?php echo $customerId; ?></p>
                        </blockquote>

                        <h3>Schedule details</h3>
                        <blockquote>
                            <p>Bus: <?php echo $busDetails; ?></p>
                            <p>Route: <?php echo $route_from . ' - ' . $route_to; ?></p>
                            <p>On: <?php echo $ticketDate . ' at ' . $ticketTime; ?></p>
                        </blockquote>

                        <br/>
                        
                        <div>
                            <span id="loader-ticket-update" style="display: none">
                                Updating data..
                            </span>
                            <div class="alert alert-success" id="update-ticket-success" style="display: none">
                                <span id="update-ticket-successmessage"></span>
                            </div>
                            <div class="alert alert-danger" id="update-ticket-error" style="display: none">
                                <span id="update-ticket-errormessage"></span>
                            </div>
                        </div>
                        
                        <br/>

                        <div class="">
                            <form style="display: inline-block" method="" action="" id="confirm-ticket">
                                <input type="hidden" name="ticket_id" value="<?php echo $ticketId; ?>"/>
                                <button type="submit" class="btn btn-success">
                                    Confirm Ticket
                                </button>
                            </form>
                            <form style="display: inline-block" method="" action="" id="cancel-ticket">
                                <input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo $ticketId; ?>"/>
                                <button type="submit" class="btn btn-danger">
                                    Cancel Ticket
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="<?php echo base_url('style/js/jquery/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/main.js'); ?>"></script>


    </body>
</html>
