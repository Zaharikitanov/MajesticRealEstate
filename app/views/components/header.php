<?php
    require_once dirname(dirname(dirname(__FILE__)))."/cookieCheck.php";
    require_once dirname(dirname(dirname(__FILE__)))."/core/databaseLayer/retrieve/getUserRole.php";
    require_once dirname(dirname(dirname(__FILE__)))."/core/databaseLayer/retrieve/userName.php";
    require_once dirname(dirname(dirname(__FILE__)))."/core/databaseLayer/retrieve/brokerSurveysForTheDay.php";
    
    function getBGDate(){
        $bg_days = array('Неделя', 'Понеделник', 'Вторник', 'Сряда', 'Четвъртък', 'Петък', 'Събота');
        $bg_months = array('Януари', 'Февруари', 'Март', 'Април', 'Май', 'Юни', 'Юли', 'Август', 'Септември', 'Октомври', 'Ноември', 'Декември'); 
        return ($bg_days[strftime('%w',time())].', '.strftime('%d',time()).' '.$bg_months[intval(strftime('%B',time()))]. ' '.strftime('%Y',time()));
    }
    
    getUserToken(COOKIE_NAME);
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
    <?php
        $FileLoader = new FileLoader();
        $FileLoader->loadScripts("css");
        $FileLoader->loadScripts("js");
    ?>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" navigate-page='landing'>Majestic Real Estate</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <?php echo getBGDate(); ?>
                <div class="surveysWrapper">
                    <a href="#" navigate-page='brokerSurveysForTheDayList'>
                        <i class="fa fa-eye fa-fw"></i>
                    </a>
                    <div class="surveysCount"><?php echo brokerSurveysForTheDayCount(getUserName());?></div>
                </div>
                <li class="dropdown">
                    <div class="dropdown-toggle" data-toggle="dropdown" href="user">
                        
                        <?php echo getUserName();?>
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="app/dbb9bed556e645783499ed0f1d804797.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php require_once dirname(dirname(dirname(__FILE__)))."/core/userMenu.php"; 
                            $userRole = getUserRole();
                            
                            switch (getUserRole()) {
                                case "broker":
                                    brokerMenu();
                                    break;
                                case "admin":
                                    adminMenu();
                                    break;
                                case "owner":
                                    ownerMenu();
                                    break;
                            }
                        ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Page Content -->
        <div id="page-wrapper">
            <?php include (INCLUDE_DIR.'pages/landing.php'); ?>