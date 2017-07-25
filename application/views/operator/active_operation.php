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
        <title><?php echo $oppName; ?> &CenterDot; Operations</title>
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
                        <!-- Edit profile button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#scheduleModal" data-backdrop="static" data-keyboard="false">Add new schedule</button>
                        </div>

                        <span id="edit-schedule-success" style="display: none" role="alert">
                            <span style="display: inline-block" id="edit-schedule-message"></span>
                        </span>
                    </div>

                    <br/>

                    <?php
                    if ($numberActiveOperations > 0) {
                        ?>

                        <div class="">
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
                                <!-- There is an operation available -->
                                <div class="col-md-8">
                                    <div class="media">
                                        <a class="pull-left" href="<?php echo base_url("schedule-view?schedule-id=$operationId"); ?>">
                                            <img class="media-object" src="<?php echo base_url("style/imgs/transport_6.png"); ?>" alt="<?php echo $operationBus; ?>">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php echo $operationBus; ?></h4>
                                            <ul class="operationList">
                                                <li>
                                                    <a>Travel date: <?php echo $operationDate; ?></a>
                                                </li>
                                                <li>
                                                    <a>Travel time: <?php echo $operationTime; ?></a>
                                                </li>
                                                <li>
                                                    <a>Bus capacity: <?php echo $operationBusCapacity; ?></a>
                                                </li>
                                                <li>
                                                    <a>Cost(one person): Ksh. <?php echo $operationBusCost; ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="col-md-4">
                                    <div class="opp-links">
                                        <a href="<?php echo base_url("schedule-view?schedule-id=$operationId"); ?>">
                                            <button type="button" class="btn-view">Update Operation</button>
                                        </a>

                                        <a href="<?php echo base_url("opp-ticket?oppId=$operationId"); ?>">
                                            <button type="button" class="btn-edit">Operation Tickets</button>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        } else {
                            ?>

                            <!-- There is no operation available -->
                            <div class="text-left">
                                <h3 class="">Sorry! You have no active schedules</h3>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add a new schedule</h4>
                    </div>
                    <div class="modal-body">
                        <form method="" action="" id="schedule-form">
                            <input type="hidden" name="opp_id" id="opp_id" value="<?php echo $oppId; ?>"/>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <input required="" type="text" name="sch_from" id="sch_from" class="inputSchedule"/>
                                    <p class="help-block">From eg. Nairobi</p>
                                </div>
                                <div class="col-md-6">
                                    <input required="" type="text" name="sch_to" id="sch_to" class="inputSchedule"/>
                                    <p class="help-block">Destination eg. Mombasa</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="sch_date">Date</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <select class="inputSchedule" id="sch_date_day" name="sch_date_day" required>
                                            <option value="">Day</option>
                                            <option value="01">1</option>
                                            <option value="02">2</option>
                                            <option value="03">3</option>
                                            <option value="04">4</option>
                                            <option value="05">5</option>
                                            <option value="06">6</option>
                                            <option value="07">7</option>
                                            <option value="08">8</option>
                                            <option value="09">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>

                                    </div>
                                    <div class="col-md-4">
                                        <select class="inputSchedule" id="sch_date_month" name="sch_date_month" required>
                                            <option value="">Month</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" readonly class="inputSchedule" id="sch_date_year" name="sch_date_year" value="2016" required/>
                                    </div>
                                </div>
                                <p class="help-block">Format Day-Month-Year</p>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <input required="" id="sch_time" name="sch_time" type="text" class="inputSchedule input-mdall" value="11:30 PM"/>
                                    <p class="help-block">Departure time. Format (Hours:Minutes AM/PM)</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <input required="" type="text" name="sch_bus" id="sch_bus" class="inputSchedule"/>
                                    <p class="help-block">Bus name or details eg. Modern Coast</p>
                                </div>
                                <div class="col-md-6">
                                    <input required="" type="number" name="sch_bus_capacity" id="sch_bus_capacity" class="inputSchedule"/>
                                    <p class="help-block">The total bus capacity eg. 72</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input required="" type="number" name="sch_bus_cost" id="sch_bus_cost" class="inputSchedule" value="KSh. "/>
                                    <p class="help-block">Total bus fare per person eg. KSh. 600</p>
                                </div>
                            </div> 

                            <div class="row form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <input type="submit" class="btn btn-success form-control" value="Add schedule"/>
                                </div>
                            </div>

                        </form>

                        <span id="loader" style="display: none">
                            Adding schedule..
                        </span>

                        <div class="alert alert-danger" id="edit-schedule-error" style="display: none">
                            <span id="edit-schedule-errormessage"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url('style/js/jquery/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/main.js'); ?>"></script>

    </body>
</html>
