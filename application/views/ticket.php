<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Ticket &CenterDot; Online bus booking</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo base_url('style/css/bootstrap.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('style/css/datepicker.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('style/css/font-awesome.min.css'); ?>"/>
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

                    <p class="navbar-text navbar-right"><strong>| Operator only:</strong></p>
                </div>
            </div>
        </nav>



        <!--Ticket Form-->
        <div class="section bus-page-spacer-mid" ng-app="myCalcModule">
            <div class="container" ng-controller="myController">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="modular-title">
                            { Ticket Bookings }
                        </h2>
                        <hr class="hr-maroon">
                    </div>
                </div>
                <div class="row trip-data">
                    <?php
                    foreach ($ticket_data as $data) {
                        # code...
                        $from = $data->scheduleFrom;
                        $bus = $data->scheduleBus;
                        $date = $data->scheduleDate;
                        $time = $data->scheduleTime;
                        $to = $data->scheduleTo;
                        $operatorId = $data->operatorId;
                        $busfair = $data->scheduleBusCost;
                        $busCapacity = $data->scheduleBusCapacity;
                        $scheduleId = $data->scheduleId;
                    }
                    ?>

                    <div class="col-md-9">
                        <?php echo $operatorId; ?>
                        <h4> PASSENGER'S DETAILS </h4><h4><small>Fields marked with <label class="asterick">*</label> are mandatory, used for identification</small></h4> 
                        <form class="form" role="form"  action ="<?php echo base_url('ticket_success'); ?>" method="POST">      
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="inputName" class="hidden-xs">Full Name <label class="asterick">*</label></label>
                                        <input type="text" class="form-control" name="inputName" id="inputName" title="follow format" pattern="/^[A-Z][a-zA-Z]*)$/" placeholder="Full Name:John Doe" required>
                                        <label id="nameErr"></label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="form-group">
                                        <label for="inputPhone" class="hidden-xs">Contact / Phone Number <label class="asterick">*</label></label>
                                        <input type="text" title="Start with +254" pattern="/^[*][0-9]*{13}$/" name="inputPhone" class="form-control" id="inputPhone" ng-model="messagePhone" placeholder="Phone Number(+254)" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="form-group">
                                        <label for="inputiD" class="hidden-xs">National Id / Passport <label class="asterick">* </label></label>
                                        <input type="text" title="Correct Number of characters" pattern="/^[0-9]*{8}$/"name="inputiD" class="form-control" id="inputiD"  placeholder="National Id" required>   
                                    </div>
                                </div>
                            </div>
                            <!--hidden forms to be posted-->
                            <input class="hidden" name="inputTime" value="<?php echo $time; ?>"/>
                            <input name="inputBus" class="hidden"value="<?php echo $bus; ?>" />
                            <input name="inputFrom" class="hidden" id="inputFrom" value="<?php echo $from; ?>" />
                            <input name="inputTo" class="hidden" id="inputTo" value="<?php echo $to; ?>" />
                            <input name="inputDate" class="hidden" id="inputDate" value="<?php echo $date; ?>" />
                            <input class="hidden" name="operatorId" value="<?php echo $operatorId; ?>"/>
                            <input class="hidden" name="capacity" id="capacity" value="<?php echo $busCapacity; ?>"/>
                            <input  class="hidden" name="scheduleBusCost" id="scheduleBusCost" value="<?php echo $busfair; ?>"/>
                            <input class="hidden" name="scheduleId" id="scheduledId" value="<?php echo $scheduleId; ?>"/>
                            <div class="row form-group form-group-sm">

                                <div class="col-md-6 pull-left">
                                    <label for="inputCost col-md-2" class="control-label pull-left"># of TRAVELERS <label class="asterick">*</label></label>
                                    <input class="form-control col-md-4" type="number" name="inputSeats" min="1" max="<?php echo $busCapacity; ?>" step="1" id="inputSeats"  ng-model="messageSeats" required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="inputCost col-md-2" class="control-label pull-left">TOTAL COST :</label>
                                    <input type="text" class="form-control disabled col-md-4" name="inputCost" value="{{'Kshs ' + messageSeats * <?php echo $busfair; ?>}}" id="inputCost" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pull-right ">
                                    <button type="submit" class="btn btn-block ticketBtn tBtn btn-lg  pull-right" style="margin-top: 40px;">Book Seats &nbsp;<span class="glyphicon glyphicon-ok-circle"></span></button>
                                </div>
                            </div>
                        </form>


                        <div class="col-md-1">
                            <!--Right Spacer-->
                        </div>

                    </div>
                    <div class="side-section col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $from . " "; ?><span class="glyphicon glyphicon-arrow-right"></span><?php echo " " . $to; ?></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td><span class="glyphicon glyphicon-calendar"></span></td>
                                            <td class="tdlabel"><?php echo $date ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-dashboard"></span></td>
                                            <td class="tdlabel"><?php echo $time ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-road"></span></td>
                                            <td class="tdlabel"><?php echo $bus ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-user"></span></td>
                                            <td class="tdlabel"><?php echo $busCapacity . " seats available" ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="glyphicon glyphicon-usd"></span></td>
                                            <td class="tdlabel"><?php echo $busfair ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--End Of Form-->
        <!-- Services -->
        <div class="container clearfix services">
            <div class="text-center footer-links">
                <a href="<?php echo base_url('contactus'); ?>">Contact Us |</a>
                <a href="<?php echo base_url('howitWorks'); ?>">How It Works |</a>
                <a href="<?php echo base_url('Terms'); ?>">Terms & Condition |</a>
                <a href="<?php echo base_url('faqs'); ?>">FAQs</a>
            </div>
        </div>

        <script src="<?php echo base_url('style/js/angular/angular.min.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/angular/mikeScripts.js'); ?>"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
        <script src="<?php echo base_url('style/js/jquery/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/main.js'); ?>"></script>
    </body>
</html>