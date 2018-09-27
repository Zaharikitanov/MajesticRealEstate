<?php
// this is the user login page
require_once dirname(__FILE__) . '/globals.php';

unset($_COOKIE[COOKIE_NAME]);
setcookie(COOKIE_NAME, null, -1, '/');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Majestic Real Estate</title>

        <link rel="stylesheet" href="../app/sources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../app/sources/css/metisMenu.min.css">
        <link rel="stylesheet" href="../app/sources/css/1-0-theme.css">
        <link rel="stylesheet" href="../app/sources/css/sb-admin-2.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">User login</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <!--                                    <div class="checkbox">
                                                                            <label>
                                                                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                                                            </label>
                                                                        </div>-->
                                    <div class="alert alert-danger"></div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <div class="btn btn-lg btn-primary btn-block">Login
                                        <img src="<?php echo IMAGES_DIR."/spinner-icon-0.gif" ?>"  class="loading" width="28" height="28" alt="spinner-icon-12091"/>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <style>
        .alert-danger, .loading {display:none;}
    </style>
    <script src="../app/sources/js/3.1.0-jquery.min.js"></script>
    <script>
        jQuery(function ($) {
            
            function sendingData(data, responceOutput) {
                $.ajax({
                    type: "POST",
                    url: "core/ajaxCalls/authenticate.php",
                    cache: false,
                    data: data,
                    success: function (response) {
                        responceOutput(response);
                    }
                });
            }

            function errorResponse(response) {
                try {

                    var redirect = JSON.parse(response);
                    $(".alert-danger").hide(700);
                    if (redirect.url) {
                        $('.loading').show();
                        setTimeout(function () {
                            window.location.href = redirect.url;
                        }, 2000);
                    }
                } catch (e) {

                    if (response) {
                        $(".alert-danger").empty().append(response).show(700);
                    }
                }
            }

            $("body").on("click", ".btn", function () {
                
                var mail = $(this).parent().find("input[name='email']").val();
                var password = $(this).parent().find("input[name='password']").val();
                var ajax_data = {
                    'mail': mail,
                    'password': password
                };
                sendingData(ajax_data, errorResponse);
            });
        });
    </script>
</html>