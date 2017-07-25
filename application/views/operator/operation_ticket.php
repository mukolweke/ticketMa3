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
        ?>
        <title><?php echo $oppName; ?> &CenterDot; Operation Tickets</title>
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
                                        <input type="text" class="form-control" required="" name="ticket-number" id="ticket-number" placeholder="Ticket ID">
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

                    <?php
                    if ($numberActiveTickets > 0) {
                        ?>
                        <br/>
                        <h3>Current booked tickets</h3>
                        <ul class="operationList">
                            <?php
                            foreach ($activeTickets as $activeTicket):
                                $ticketId = $activeTicket->ticketId;
                                $ticketName = $activeTicket->customerName;
                                $ticketFrom = $activeTicket->from;
                                $ticketTo = $activeTicket->to;
                                ?>
                                <li>
                                    <a href="<?php echo base_url("ticket-view?ticket-id=$ticketId"); ?>">
                                        <?php echo "$ticketName - ($ticketFrom - $ticketTo)"; ?>
                                    </a>
                                </li>

                                <?php
                            endforeach;
                        } else {
                            ?>
                        </ul>

                        <!-- There is no operation available -->
                        <div class="text-left">
                            <h3 class="">Sorry! No active tickets in this operation</h3>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>

        <script src="<?php echo base_url('style/js/jquery/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/main.js'); ?>"></script>

    </body>
</html>
