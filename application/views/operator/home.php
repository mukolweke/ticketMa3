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
            $oppId = $oppData->operatorId;
            $oppName = $oppData->operatorName;
            $oppMail = $oppData->operatorMail;
            $oppZipcode = $oppData->operatorZipcode;
        }
        ?>
        <title><?php echo $oppName; ?> &CenterDot; Online bus booking</title>
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
                <div class="col-md-7">
                    <div class="profileView">
                        <!-- Edit profile button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <?php echo $oppName; ?> <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu panel panel-default" role="menu">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Welcome to your operator dashboard</h3>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        Manage daily operation schedules
                                    </p>
                                    <a href="" data-toggle="modal" data-target="#profileModal" data-backdrop="static" data-keyboard="false">Edit or update profile</a>
                                </div>
                            </div>
                        </div>

                        <span id="edit-profile-success" style="display: none" role="alert">
                            <span style="display: inline-block" id="edit-profile-message"></span>
                        </span>
                    </div>

                    <div class="">
                        <h1>Hello, <?php echo $oppName; ?>!</h1>
                        <p>
                            ma3ticket helps you connect with your clients and travelers from
                            every part of the country
                        </p>
                        <p>
                            Click the <b>Add Schedule</b> button to get started
                        </p>
                        <p>
                            <a href="<?php echo base_url("active-operation"); ?>">
                                <button type="button" class="btn btn-primary">
                                    Add Schedule
                                </button>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-md-5 shortCuts">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Quick Links</h3>
                        </div>
                        <div class="panel-body">
                            <ul id="myTab" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#operations" data-toggle="tab">
                                        Operations
                                    </a>
                                </li>
                                <li>
                                    <a href="#tickets" data-toggle="tab">
                                        Tickets
                                    </a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="operations">
                                    <?php
                                    if ($numberActiveOperations > 0) {
                                        ?>
                                        <ul class="operationList">
                                            <?php
                                            foreach ($activeOperations as $activeOpp):
                                                $operationId = $activeOpp->scheduleId;
                                                $operationFrom = $activeOpp->scheduleFrom;
                                                $operationTo = $activeOpp->scheduleTo;
                                                $operationDate = $activeOpp->scheduleDate;
                                                $operationTime = $activeOpp->scheduleTime;
                                                $operationBus = $activeOpp->scheduleBus;
                                                $operationBusCapacity = $activeOpp->scheduleBusCapacity;
                                                $operationBusCost = $activeOpp->scheduleBusCost;
                                                $operationStatus = $activeOpp->scheduleStatus;
                                                ?>
                                                <li>
                                                    <a href="<?php echo base_url("schedule-view?schedule-id=$operationId"); ?>">
                                                        <?php echo $operationBus . " - " . $operationTime; ?>
                                                    </a>
                                                </li>

                                                <?php
                                            endforeach;
                                        } else {
                                            ?>
                                        </ul>

                                        <!-- There is no operation available -->
                                        <div class="text-center">
                                            <p class="text-primary">Sorry! You have no active schedules</p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="tab-pane fade" id="tickets">
                                    <?php
                                    if ($numberActiveTickets > 0) {
                                        ?>
                                        <ul class="operationList">
                                            <?php
                                            foreach ($activeTickets as $activeTicket):
                                                $ticketId = $activeTicket->ticketId;
                                                $ticketName = $activeTicket->customerName;
                                                $ticketFrom = $activeTicket->from;
                                                $ticketTo = $activeTicket->to;
                                                ?>
                                                <li>
                                                    <a href="<?php echo base_url("schedulePreview/$operationId"); ?>">
                                                        <?php echo "$ticketName - ($ticketFrom - $ticketTo)"; ?>
                                                    </a>
                                                </li>

                                                <?php
                                            endforeach;
                                        } else {
                                            ?>
                                        </ul>

                                        <!-- There is no operation available -->
                                        <div class="text-center">
                                            <p class="text-primary">Sorry! You have no active tickets</p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Edit profile modal -->
        <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Update current profile</h4>
                    </div>
                    <form method="" action="" id="profileEdit">
                        <div class="modal-body">

                            <span id="loader" style="display: none">
                                Updating your profile..
                            </span>

                            <div class="alert alert-danger" id="edit-profile-error" style="display: none">
                                <span id="edit-profile-errormessage"></span>
                            </div>


                            <div class="row">
                                <input type="hidden" name="oppId" id="oppId" value="<?php echo $oppId; ?>"/>
                                <div class="col-md-6">
                                    <label class="control-label" for="oppName">Company name</label>
                                    <input class="input-account" type="text" name="oppName" id="oppName" value="<?php echo $oppName; ?>"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="oppMail">Email</label>
                                    <input class="input-account" type="email" name="oppMail" id="oppMail" value="<?php echo $oppMail; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="oppZipcode">Location</label>
                                <input class="input-account" type="text" name="oppZipcode" id="oppZipcode" value="<?php echo $oppZipcode; ?>"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                           <button type="submit" class="destinationSubmit">Update profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src="<?php echo base_url('style/js/jquery/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/main.js'); ?>"></script>


    </body>
</html>
