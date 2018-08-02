<?php 
            $mFile = "./languages/$language/menu.xml";
            if(is_file($mFile)){
                $menu = simplexml_load_file($mFile);
            } else {
                $menu = simplexml_load_file("languages/de/menu.xml") or die('Cant open Menufile');
            }
$posCount = 0;         
$getPos = filter_input(INPUT_GET, 'i');
foreach($menu->menu->item as $menuItem){
    if($menuItem[submenu] == true){
        if($posCount == $getPos){

            // active page with submenu
            $class = "hasSubMenu active";
            echo '<li class="'.$class.'">';
            echo "<span>$menuItem->text</span>";
            echo '<div class="subMenu">
                    <ul class="clearfix in">';


            foreach ($menuItem->submenu->item as $submenuItem){
                echo "<li><a class=\"showSubmenu\"  href=\"$submenuItem->link\">$submenuItem->text</a></li>";                            
            }
             echo "</ul></div></li>";
        } else {
            // Inactive submenumenu options
            $class = "hasSubMenu";
            echo '<li class="'.$class.'">';
            echo "<a href=\"$menuItem->link&i=$posCount\">$menuItem->text</a>";
            echo '<div class="subMenu ">
                    <ul class="clearfix in">';


            foreach ($menuItem->submenu->item as $submenuItem){
                echo "<li><a href=\"$submenuItem->link\">$submenuItem->text</a></li>";                            
            }
             echo "</ul></div></li>";

        }
    } else {
        if($posCount == $getPos){
          echo '<li class="active">
                <span>'.$menuItem->text.'</span>
            </li>';

        } else {
        echo '<li class=""><a href="'.$menuItem->link.'&i='.$posCount.'">'.$menuItem->text.'</a></li>';
        }

    }
    $posCount ++;
}



// Aditional Functions

function curentPageActive($page){

        if(onlyPage($_SERVER['REQUEST_URI']) == onlyPage($page->link)){

            return true ;
            echo $_SERVER['REQUEST_URI'];
            echo " == ";
            echo $page->link;
            echo "<br />";

        }else {

            echo $_SERVER['REQUEST_URI'];
            echo " != ";
            echo $page->link;
            echo "<br />";
        return false;
        }
}

function onlyPage($in){

    $afterPage = substr($in,  strpos($in, 'page'));

    $onlyPage = substr($afterPage,0,strpos($afterPage, '&'));
    return $onlyPage;
}
