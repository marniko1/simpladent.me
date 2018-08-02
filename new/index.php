<?php session_start();

   include 'includes/init.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $elements->title;?></title>
    <link href="img/Swiss.ico" rel="shortcut icon" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="scripts/jquery-ui-1.11.1.custom/jquery-ui.css" />
    <link type="text/css" rel="stylesheet" href="scripts/jquery-ui-1.11.1.custom/jquery-ui.structure.min.css" />
    <link type="text/css" rel="stylesheet" href="scripts/jquery-ui-1.11.1.custom/jquery-ui.theme.min.css" />
    <link type="text/css" rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" type="text/css" href="style/jquery.fancybox.css?v=2.1.5" media="screen" />
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>

</head>

<body>

<div id="container">
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
<div id="header">
    <div class="in">
        <div class="lang_block">
            <div class="header">Language</div>
            <ul class="lang_list">
                <li <?php if($_SESSION['lang'] == 'hr'){ echo 'class="active"';} ?>><a href="./?l=hr">Hrvatski</a></li>
                <li <?php if($_SESSION['lang'] == 'en'){ echo 'class="active"';} ?>><a href="./?l=en">eNGLISH</a></li>
                <li <?php if($_SESSION['lang'] == 'de'){ echo 'class="active"';} ?>><a href="./?l=de">deutsch</a></li>
            </ul>
        </div>
        <div class="logo">
            <a href="/">
                <img src="img/logo.png" alt="" />
            </a>
        </div>
        
    <!-- Main Menu  -->
    <div id="main_menu">
        <ul class="clearfix">
  <?php 
  // Include main Menu File
  include 'includes/menu.php';  ?>
    </div>    
    </div>
</div> 
<!-- End Menu -->

<!-- Main content -->
<div id="wrapper">

    <?php 
        $alloed = array('about', 'methology', 'video', 'price', 'contact');
        
        if(!isset($_GET['page'])){
            $module = 'about';
        }else {
            $module = filter_input(INPUT_GET, 'page');
        }
        
        if(in_array($module, $alloed)){
            try{
                include "languages/$language/$module.php";
            } catch (Exception $ex) {
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
    <div class="in">
        <ul class="contacts_col">
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
                            echo "<p><a href=\"http://$partner->link\">$partner->name</a></p>";
                        }
                    ?>
                </div>
                <div class="clear"></div>
            </li>
        </ul>
        <ul class="contacts_col">
            <li class="facebook">
                <div class="name">Facebook</div>
                <div class="text"><a href="<?php echo $elements->footer->facebook->link; ?>"><?php echo $elements->footer->facebook->text; ?></a></div>
                <div class="clear"></div>
            </li>
            
            <!--<li class="twitter">
                <div class="name">Twitter</div>
                <div class="text"><a href="#">@simpladent</a></div>
                <div class="clear"></div>
            </li>-->
        </ul>
        <div class="clear"></div>
    </div>
</div>
<!-- end footer -->

<script type="text/javascript" src="scripts/jquery.carouFredSel-6.2.1-packed.js"></script>
<script type="text/javascript" src="scripts/jquery.maskedinput.js"></script>
<script type="text/javascript" src="scripts/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.11.1.custom/jquery-ui.min.js"></script>
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
