<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title><?=Yii::app()->name?></title>
    <link href="<?=Yii::app()->baseUrl?>/static/img/Swiss.ico" rel="shortcut icon" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="<?=Yii::app()->baseUrl?>/static/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?=Yii::app()->baseUrl?>/static/js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
    <script type="text/javascript" src="<?=Yii::app()->baseUrl?>/static/js/jquery-1.11.0.min.js"></script>

</head>

<body>

<div id="container">
    <?php $this->widget('LeftBlockWidget'); ?>
<div id="header">
    <div class="in">
        <div class="lang_block">
            <div class="header">Language</div>
            <ul class="lang_list">
                <li class="active"><a href="#">рУССКИЙ</a></li>
                <li><a href="#">уКРАИНСКИЙ</a></li>
                <li><a href="#">eNGLISH</a></li>
                <li><a href="#">deutsch</a></li>
            </ul>
        </div>
        <div class="logo">
            <a href="<?=Yii::app()->baseUrl?>/">
                <img src="<?=Yii::app()->baseUrl?>/static/img/logo.png" alt="" />
            </a>
        </div>
        <?php $this->widget("MenuWidget"); ?>
    </div>
</div>
<div id="wrapper">
    <?=$content?>
</div>
<div id="empty"></div>
</div>
<div id="footer">
    <div class="in">
        <ul class="contacts_col">
            <li class="email">
                <div class="name">Почта:</div>
                <div class="text"><a href="mailto:info@simpladent.ua">info@simpladent.ua</a></div>
                <div class="clear"></div>
            </li>
            <li>
                <div class="name">Партнеры:</div>
                <div class="text">
                    <p><a href="http://www.implant.com">www.implant.com</a></p>
                    <p><a href="http://www.implantfoundation.org">www.implantfoundation.org</a></p>
                    <p><a href="http://www.sibasi.org">www.sibasi.org</a></p>
                </div>
                <div class="clear"></div>
            </li>
        </ul>
        <ul class="contacts_col">
            <li class="facebook">
                <div class="name">Facebook</div>
                <div class="text"><a href="#">Simpladent Official</a></div>
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


<script type="text/javascript" src="<?=Yii::app()->baseUrl?>/static/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script type="text/javascript" src="<?=Yii::app()->baseUrl?>/static/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="<?=Yii::app()->baseUrl?>/static/js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="https://www.youtube.com/iframe_api"></script>
<script type="text/javascript" src="<?=Yii::app()->baseUrl?>/static/js/function.js"></script>

</body>
</html>
