<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Search &CenterDot; Online bus booking</title>
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

        <!-- Search pane -->
        <div class="navbar-search hidden-xs">
            <div class="container">
                <div class="searchForm">
                    <form class="formSearch form-inline" method="get" action="">
                        <div class="form-group">
                            <label class="control-label hidden" for="destinationFrom">From</label>
                            <input type="text" class="inputSearch" name="destinationFrom" id="destinationFrom" value="<?php echo $from; ?>" placeholder="From"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label hidden" for="destinationTo">Destination</label>
                            <input type="text" class="inputSearch" name="destinationTo" id="destinationTo" value="<?php echo $to; ?>" placeholder="To"/>
                        </div>
                        <div class="form-group">
                            <select class="inputSearch" id="sch_date_day" name="sch_date_day" required>
                                <option value="<?php echo $sch_date_day;?>"><?php echo $sch_date_day;?></option>
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
                        <div class="form-group">
                            <select class="inputSearch" id="sch_date_month" name="sch_date_month" required>
                                <option value="<?php echo $sch_date_month;?>"><?php echo $sch_date_month;?></option>
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
                        <div class="form-group">
                            <input type="text" class="inputSearch" readonly id="sch_date_year" name="sch_date_year" value="<?php echo $sch_date_year;?>"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="destinationSubmit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>            
        </div>

        <div class="container">
            <div class="col-md-5 pull-right">
                <form class="form ticketForm" method="get" action="<?php echo base_url('group'); ?>">
                    <button class="btn btnGroup">For Group | Organization Booking</button>
                </form>
            </div>
        </div>

        <!-- Results pane -->
        <div class="searchPane">
            <div class="container">
                <h4 id="scheduleDate"><b><?php echo "Departures: " . $travel_date . " {" . $num_search_result . " Buses available }"; ?></b></h4>                    
                <?php
                if ($num_search_result > 0) {
                    foreach ($search_result as $cur_results):
                        $busName = $cur_results->scheduleBus;
                        $busCapacity = $cur_results->scheduleBusCapacity;
                        $busPrice = $cur_results->scheduleBusCost;
                        $scheduleDate = $cur_results->scheduleDate;
                        $scheduleTime = $cur_results->scheduleTime;
                        $from = $cur_results->scheduleFrom;
                        $to = $cur_results->scheduleTo;
                        $id = $cur_results->scheduleId;
                        $bus_fair = $cur_results->scheduleBusCost;
                        $bus_capacity = $cur_results->scheduleBusCapacity;
                        $operatorId = $cur_results->operatorId;
                        ?>

                        <form class="form ticketForm" method="get" action="<?php echo base_url('ticket'); ?>">

                            <input type="hidden" value="<?php echo $id; ?>" name="scheduleId"/>
                            <input type="hidden" value="<?php echo $bus_fair; ?>" name="scheduleBusCost"/>
                            <input type="hidden" value="<?php echo $bus_capacity; ?>" name="scheduleBusCapacity"/>
                            <input type="hidden" value="<?php echo $operatorId; ?>" name="operatorId"/>

                            <div class="row trip-data">
                                <div class="col-md-2 col-sm-2 col-xs-6">
                                    <div>
                                        <div class="data" id="scheduleFrom">From: <?php echo $from ?></div>
                                        <div id="scheduleTime">Time: <?php echo $scheduleTime ?></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6">
                                    <div class="data" id="scheduleTo">To: <?php echo $to ?></div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="data" id="scheduleBus">Bus Name: <?php echo $busName ?></div>
                                    <div>Capacity: <?php echo $busCapacity ?></div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="data">KSH <?php echo $bus_fair ?> /=</div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6">
                                    <button type="submit" class="btn btn-danger btn-block" data-toggle="tooltip" data-placement="left" title="Select Bus" >SELECT BUS&nbsp; </button>
                                </div>
                            </div>
                        </form>
                    <?php endforeach; ?>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-info text-center">
                        <p>Sorry. No results found</p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>



        <!-- Services -->
        <div class="container clearfix services">
            <div class="servicelist route">
                <span>
                    Create account
                </span>
                <h2>BUS OPERATORS</h2>
            </div>
            <div class="servicelist busoperator">
                <span>
                    Search &amp; Book
                </span>
                <h2>TRAVELERS</h2>
            </div>
            <div class="servicelist ticketsold">
                <span>
                    Print your ticket
                </span>
                <h2>SPACE BOOKED</h2>
            </div>
            <div class="servicedetails">
                ma3ticket.com is a Kenyan online bus ticketing platform.
                You can now choose your bus and your seat, have the tickets delivered
                printed for you and pay the cash on delivery. Try the ma3ticket experience today.

            </div>
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
