<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>ma3ticket &CenterDot; Online bus booking</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo base_url('style/css/bootstrap.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('style/css/datepicker.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('style/css/main.css'); ?>"/>

        <!-- Icon -->
        <link rel="icon" href="<?php echo base_url('style/imgs/favicon.ico'); ?>"/>

    </head>
    <body id="admin">

        <!-- Top Navbar -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">ma3ticket</a>
                </div>
                <div class="collapse navbar-collapse">
                    <form class="form ticketForm navbar-left" method="get" action="<?php echo base_url('group'); ?>">
                        <button class="btn form-control btn-success navbar-btn">Group Booking</button>
                    </form>
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
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="searchForm">
                            <h1 class="text-center bookingH1">Find your traveling bus</h1>

                            <form class="formSearch" method="get" action="<?php echo base_url('search'); ?>">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="destinationFrom">Traveling from</label>
                                        <input type="text" class="inputSearch" name="destinationFrom" id="destinationFrom" placeholder="eg. Nairobi"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="destinationTo">To</label>
                                        <input type="text" class="inputSearch" name="destinationTo" id="destinationTo" placeholder="eg. Mombasa"/>
                                    </div>
                                </div>


                                <div class="">                            
                                    <label class="control-label">Date of travel</label>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <select class="inputSearch" id="sch_date_day" name="sch_date_day" required>
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
                                    <div class="col-md-4 form-group">
                                        <select class="inputSearch" id="sch_date_month" name="sch_date_month" required>
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
                                    <div class="col-md-5 form-group">
                                        <input type="text" class="inputSearch" readonly id="sch_date_year" name="sch_date_year" value="2016"/>
                                    </div>
                                </div>

                                <div class="row">                            
                                    <div class="form-group col-md-3">
                                        <input type="submit" value="Find Bus" class="destinationSubmit"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="steps">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <i class="glyphicon glyphicon-search"></i>
                        <h3>Find Bus</h3>
                    </div>
                    
                    <div class="col-md-4">
                        <i class="glyphicon glyphicon-time"></i>
                        <h3>Check Space</h3>
                    </div>
                    
                    <div class="col-md-4">
                        <i class="glyphicon glyphicon-ok"></i>
                        <h3>Book Ticket</h3>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Footer -->
        <div class="container hidden">
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
