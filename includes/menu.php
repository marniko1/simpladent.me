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
    if($menuItem['submenu'] == true){
        if($posCount == $getPos){

            // active page with submenu
            $class = "hasSubMenu active";
            echo '<li class="'.$class.' nav-item">';
            echo "<span>$menuItem->text</span>";
            echo '<div class="subMenu">
                    <ul class="clearfix inSubMenu">';


            foreach ($menuItem->submenu->item as $submenuItem){
                echo "<li><a class=\"showSubmenu\"  href=\"$submenuItem->link\">$submenuItem->text</a></li>";                            
            }
             echo "</ul></div></li>";
        } else {
            // Inactive submenumenu options
            $class = "hasSubMenu";
            echo '<li class="'.$class.' nav-item">';
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
          echo '<li class="active nav-item">
                <span>'.$menuItem->text.'</span>
            </li>';

        } else {
        echo '<li class="nav-item"><a href="'.$menuItem->link.'&i='.$posCount.'">'.$menuItem->text.'</a></li>';
        }

    }
    $posCount ++;
}
echo '</ul></nav></div>';
?>


<!-- low resolution menu -->

<div class="lr_menu">
    <div class="col-12 tab lr_menu_button"><?php echo $menu->menu_bar;?></div>
    <nav class="col-12 d-none">
        <ul>

<?php
$posCount = 0;

foreach($menu->menu->item as $menuItem){
    if($menuItem['submenu'] == true && $posCount == $getPos){
    ?>
        <li class="tab nav-item rounded hasSubMenu active"><a href="#"><?php echo $menuItem->text . ' &dtrif;'; ?></a>
            <ul class="sub_menu d-none  subMenu">
                <?php
                    foreach ($menuItem->submenu->item as $submenuItem) {
                    ?>
                        <li class="sub_menu"><a href="<?php echo $submenuItem->link; ?>"><?php echo $submenuItem->text; ?></a></li>
                    <?php
                    }
                ?>
            </ul>
        </li>
    <?php    
    } else {
    ?>
        <li class="tab nav-item rounded"><a href="<?php echo $menuItem->link.'&i='.$posCount; ?>"><?php echo $menuItem->text; ?></a></li>
    <?php
    }
    $posCount ++;
}
?>
        </ul>
    </nav>
</div>

<?php



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
