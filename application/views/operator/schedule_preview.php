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

        foreach ($scheduleDetails as $schData) {
            $schFrom = $schData->scheduleFrom;
            $schTo = $schData->scheduleTo;
            $schBus = $schData->scheduleBus;
            $schBusCapacity = $schData->scheduleBusCapacity;
            $schBusCost = $schData->scheduleBusCost;
            $schDate = $schData->scheduleDate;
            $schTime = $schData->scheduleTime;
            $schId = $schData->scheduleId;
        }
        ?>
        <title><?php echo $oppName; ?> &CenterDot; Schedule preview</title>
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
                <div class="col-md-4">
                    <div class="">
                        <div class="header">Current details</div>
                        <blockquote>
                            <p>From: <?php echo $schFrom; ?></p>
                            <p>To: <?php echo $schTo; ?></p>
                            <p>Bus name: <?php echo $schBus; ?></p>
                            <p>Bus capacity: <?php echo $schBusCapacity; ?></p>
                            <p>Cost(one person): Ksh. <?php echo $schBusCost; ?></p>
                            <p>Travel date: <?php echo $schDate; ?></p>
                            <p>Travel time: <?php echo $schTime; ?></p>
                        </blockquote>

                        <div class="header">Delete this schedule</div>
                        <form method="post" action="" id="schedule-delete-form">
                            <input type="hidden" name="sch_id" value="<?php echo $scheduleId; ?>"/>
                            <input type="submit" class="scheduleDelete" value="Delete schedule"/>
                        </form>
                        <br/>
                        <span id="loader-delete" style="display: none">
                            Deleting schedule..
                        </span>
                        <div class="alert alert-success" id="delete-schedule-success" style="display: none">
                            <span id="delete-schedule-successmessage"></span>
                        </div>
                        <div class="alert alert-danger" id="delete-schedule-error" style="display: none">
                            <span id="delete-schedule-errormessage"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="header">Update current details</div>
                    <div class="cardUpdate">
                        <form method="" action="" id="schedule-update-form">
                            <input type="hidden" name="sch_id" id="sch_id" value="<?php echo $schId; ?>"/>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <input required="" type="text" name="sch_from" id="sch_from" class="inputSchedule" value="<?php echo $schFrom; ?>"/>
                                    <p class="help-block">From</p>
                                </div>
                                <div class="col-md-6">
                                    <input required="" type="text" name="sch_to" id="sch_to" class="inputSchedule" value="<?php echo $schTo; ?>"/>
                                    <p class="help-block">Destination</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <div class="date" id="dp3" data-date="" data-date-format="dd-mm-yyyy">
                                        <input id="sch_date" name="sch_date" class="inputSchedule" size="16" type="text" value="<?php echo $schDate; ?>">
                                        <p class="help-block">Traveling date. Format (MONTH-DAY-YEAR)</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input required="" id="sch_time" name="sch_time" type="text" class="inputSchedule input-mdall" value="<?php echo $schTime; ?>"/>
                                    <p class="help-block">Departure time. Format (Hours:Minutes AM/PM)</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <input required="" type="text" name="sch_bus" id="sch_bus" class="inputSchedule" value="<?php echo $schBus; ?>"/>
                                    <p class="help-block">Bus name or details</p>
                                </div>
                                <div class="col-md-6">
                                    <input required="" type="number" name="sch_bus_capacity" id="sch_bus_capacity" class="inputSchedule" value="<?php echo $schBusCapacity; ?>"/>
                                    <p class="help-block">The total bus capacity</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input required="" type="number" name="sch_bus_cost" id="sch_bus_cost" class="inputSchedule" value="<?php echo $schBusCost; ?>"/>
                                    <p class="help-block">Total bus fare per person</p>
                                </div>
                            </div> 

                            <div class="row form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <input type="submit" class="btn btn-success form-control" value="Update schedule"/>
                                </div>
                            </div>

                        </form>

                        <span id="loader" style="display: none">
                            Updating schedule..
                        </span>
                        <div class="alert alert-success" id="update-schedule-success" style="display: none">
                            <span id="update-schedule-successmessage"></span>
                        </div>
                        <div class="alert alert-danger" id="update-schedule-error" style="display: none">
                            <span id="update-schedule-errormessage"></span>
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
