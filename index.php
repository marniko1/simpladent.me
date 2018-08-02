<?php session_start();

   include 'includes/init.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $elements->title;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="img/Swiss.ico" rel="shortcut icon" type="image/x-icon">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="scripts/jquery-ui-1.11.1.custom/jquery-ui.css" />
        <link type="text/css" rel="stylesheet" href="scripts/jquery-ui-1.11.1.custom/jquery-ui.structure.min.css" />
        <link type="text/css" rel="stylesheet" href="scripts/jquery-ui-1.11.1.custom/jquery-ui.theme.min.css" /> 
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="style/style.css" />
        <link type="text/css" rel="stylesheet" href="style/clinic.css" />
        <link rel="stylesheet" type="text/css" href="style/responsive.css">
        <link rel="stylesheet" type="text/css" href="style/jquery.fancybox.css?v=2.1.5" media="screen" />
        <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="bootstrap/bootstrap.js"></script>
    </head>
    <body>
        <div id="top"></div>
        <a href="#top" class="back_to_top"><i class="fas fa-angle-up"></i></a>
        <div class="container">
            <div class="row">
            <!-- Phone Numbers and contacts -->
                <div id="tools">
                    <div class="free">
                        <div class="phone"><?php echo $elements->contact->phone;?></div>
                        <div class="header"><?php echo $elements->contact->hours;?></div>
                    </div>
                    <div class="callback form_block">
                        <div class="header"><?php echo $elements->contact->callMe;?></div>
                        <div class="form">
                            <form action="" method="post" id="callBackForm">
                                <input id="customerIDCall" type="text" name="customerID" />
                                <div class="label"><?php echo $elements->contact->name;?></div>
                                <div class="input">
                                    <input type="text" name="name" />
                                </div>
                                <div class="label"><?php echo $elements->contact->number;?></div>
                                <div class="input">
                                    <input type="text" name="phone" />
                                </div>
                                <div class="submit">
                                    <input type="submit" value="<?php echo $elements->contact->send;?>"/>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="appointment form_block">
                        <div class="header"><?php echo $elements->appointments->title;?></div>
                        <div class="form">
                            <form action="" method="post" id="leftForm">
                                <input id="customerIDApp" type="text" name="customerID" />
                                <div class="label"><?php echo $elements->contact->name;?></div>
                                <div class="input">
                                    <input type="text" name="name" />
                                </div>
                                <div class="label"><?php echo $elements->contact->number;?></div>
                                <div class="input">
                                    <input type="text" name="phone" />
                                </div>
                                <div class="label"><?php echo $elements->appointments->mail;?></div>
                                <div class="input">
                                    <input type="text" name="mail" />
                                </div>
                                <div class="label"><?php echo $elements->appointments->comment;?></div>
                                <div class="input">
                                    <textarea name="comment"></textarea>
                                </div>
                                <div class="submit">
                                    <input type="submit" value="<?php echo $elements->appointments->send;?>"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Contacts -->    


                <!-- Header  -->
                <div id="header" class="col-12">
                    <div class="header_in col-12 row">
                        <div class="lang_block">
                            <div class="header <?php echo 'header_' . $img ?>"><?php echo $elements->lg;?></div>
                            <ul class="lang_list">
                                <li <?php if($_SESSION['lang'] == 'me'){ echo 'class="active"';} ?>><a href="./?l=me">crnogorski</a></li>
                                <!--<li <?php //if($_SESSION['lang'] == 'hr'){ echo 'class="active"';} ?>><a href="./?l=hr">Srbski</a></li>-->
                                <li <?php if($_SESSION['lang'] == 'ru'){ echo 'class="active"';} ?>><a href="./?l=ru">рУССКИЙ</a></li>
                                <li <?php if($_SESSION['lang'] == 'en'){ echo 'class="active"';} ?>><a href="./?l=en">ENGLISH</a></li>
                                <li <?php if($_SESSION['lang'] == 'de'){ echo 'class="active"';} ?>><a href="./?l=de">deutsch</a></li>
                            </ul>
                        </div>
                        <div class="logo col-md-3 col-sm-12">
                            <a href="/">
                                <img src="img/logo.png" alt="" />
                            </a>
                        </div>
                        
                    <!-- Main Menu  -->
                    <div id="main_menu" class="col-sm-9 col-lg-7 ml-lg-5 row pr-sm-0">
                        <nav class="navbar col-12 navbar-expand pr-0 pl-sm-5 pl-lg-0 ml-sm-4 ml-lg-0">
                            <ul class="clearfix nav navbar-nav">
                  <?php 
                  // Include main Menu File
                  include 'includes/menu.php';

                  ?>
             <!--  </ul>
          </nav> -->
                        <!-- </div>   -->  
                    </div>
                </div> 
                <!-- End Menu -->
            </div>
        </div>

            <!-- Main content -->
            <div id="wrapper">

                <?php 
                    $alloed = array('about', 'methology', 'video', 'price', 'contact', 'question','clinic','impressum');
                    
                    if(!isset($_GET['page'])){
                        $module = 'about';
                    }else {
                        $module = filter_input(INPUT_GET, 'page');
                    }
                    
                    if(in_array($module, $alloed)){
                        
                        if(is_file("languages/$language/$module.php")){
                            include "languages/$language/$module.php";
                        }else if(is_file("includes/module/$module.php")){
                                include "includes/module/$module.php";
                        }else {
                            include "languages/$language/404.php";
                        }
                        
                    } else {
                        include "languages/$language/403.php";
                    }
                    
                
                
                ?>
            </div>

            <!-- End Main Content -->


            <!-- start footer  -->
            <div id="empty"></div>
            </div>
            <div id="footer">
                <!-- <div> -->
                <div class="in row">
                    <ul class="contacts_col col-md-6 col-12">
                        <li class="email">
                            <div class="name"><?php echo $elements->footer->mail->text; ?></div>
                            <div class="text"><a href="mailto:<?php echo $elements->footer->mail->adress; ?>"><?php echo $elements->footer->mail->adress; ?></a></div>
                            <div class="clear"></div>
                        </li>
                        <li>
                            <div class="name"><?php echo $elements->footer->partners->text; ?></div>
                            <div class="text">
                                <?php 
                                    foreach($elements->footer->partners->partner as $partner){
                                        echo "<p><a href=\"http://$partner->link\" target='_blank'>$partner->name</a></p>";
                                    }
                                ?>
                            </div>
                            <div class="clear"></div>
                        </li>
                    </ul>
                    <ul class="contacts_col col-md-6 col-12">
                        <li class="facebook">
                            <div class="name">Facebook</div>
                            <div class="text"><a href="<?php echo $elements->footer->facebook->link; ?>" target="_blank"><?php echo $elements->footer->facebook->text; ?></a></div>
                            <div class="clear"></div>
                        </li>
                        <li>
                            <a href="/index.php?page=impressum&i=10"><b>Impressum</b></a>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            <!-- end footer -->
        </div>
        <script type="text/javascript" src="scripts/jquery-ui-1.11.1.custom/jquery-ui.min.js"></script>
        <script type="text/javascript" src="scripts/fancybox/jquery.fancybox.js?v=2.1.5"></script>
        <script type="text/javascript" src="scripts/jquery.carouFredSel-6.2.1-packed.js"></script>
        <script type="text/javascript" src="scripts/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="https://www.youtube.com/iframe_api"></script>
        <script type="text/javascript" src="scripts/function.js"></script>
        <script>
            $(function(){
                $("#customerIDApp").hide();
                $("#customerIDCall").hide();
            });
            
            $(document).ready(function(){
                $("#leftForm").submit(function(){
                    $.ajax({
                        url: 'includes/contact/contact.php',
                        type: "POST",
                        data: $("#leftForm").serialize(),
                        dataType: 'html',
                        statusCode: {
                            
                                403: function(data) { 
                                    alert(data.responseText);
                                },
                                200: function(data) {
                                    alert(data);
                                    $("#leftForm").trigger('reset');
                                    $(".appointment").removeClass('active');
                                }
                        }
                    });
                    return false;
                });
                $("#callBackForm").submit(function(){
                    $.ajax({
                        url: 'includes/contact/phone.php',
                        type: "POST",
                        data: $("#callBackForm").serialize(),
                        dataType: 'html',
                        statusCode: {
                            
                                403: function(data) { 
                                    alert(data.responseText);
                                },
                                200: function(data) {
                                    alert(data);
                                    $("#callBackForm").trigger('reset');
                                    $(".callback").removeClass('active');
                                }
                        }
                    });
                    return false;
                });
                
            });
        </script>
    </body>
</html>