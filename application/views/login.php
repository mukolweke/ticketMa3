<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sign in &CenterDot; Online bus booking</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo base_url('style/css/bootstrap.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('style/css/main.css'); ?>"/>

        <!-- Icon -->
        <link rel="icon" href="<?php echo base_url('style/imgs/favicon.ico'); ?>"/>

    </head>
    <body id="account">

        <!-- sign up pane -->
        <div class="container">
            <div class="bus-account text-center">
                <a class="" href="<?php echo base_url(); ?>">ma3ticket</a>
                <h2>Operator Sign In</h2>
            </div>
            <div class="loginDivision">

                <div class="alert alert-success <?php echo $hd; ?>">
                    <span><?php echo $activationMessage; ?></span>
                </div>
                <div class="alert alert-danger <?php echo $hderror; ?>">
                    <span><?php echo validation_errors(); ?></span>
                </div>
                <br/>
                <div class="accountForm">

                    <?php
                    echo form_open("signinAction");
                    ?>
                    <div class="form-group">
                        <label class="control-label" for="opp_mail">Email</label>
                        <input type="email" name="opp_mail" id="opp_mail" required="" class="input-account"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="opp_pass">Password</label>
                        <input type="password" name="opp_pass" id="opp_pass" required="" class="input-account"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="destinationSubmit" value="Sign in"/>
                    </div>
                    </form>
                </div>

                <p>Not a registered operator? <a href="<?php echo base_url('signup'); ?>">Sign up</a></p>
            </div>
        </div>


        <script src="<?php echo base_url('style/js/jquery/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('style/js/main.js'); ?>"></script>
    </body>
</html>
