  <?php 
            $mFile = "./languages/de/menu.xml";
            if(is_file($mFile)){
                $menu = simplexml_load_file($mFile);
            } else {
                $menu = simplexml_load_file("languages/de/menu.xml") or die('Cant open Menufile');
            }
                
                foreach($menu->menu->item as $menuItem){
                    if($menuItem[submenu] == true){
                        if(curentPageActive($menuItem)){
                            
                            // active page with submenu
                            echo 'asdfdfasdfsd <br />';
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
                            echo "<a href=\"$menuItem->link\">$menuItem->text</a>";
                            echo '<div class="subMenu ">
                                    <ul class="clearfix in">';
                            
                            
                            foreach ($menuItem->submenu->item as $submenuItem){
                                echo "<li><a href=\"$submenuItem->link\">$submenuItem->text</a></li>";                            
                            }
                             echo "</ul></div></li>";
                            
                        }
                    } else {
                        if(curentPageActive($menuItem)){
                          echo '<li class="active">
                                <span>'.$menuItem->text.'</span>
                            </li>';
                            
                        } else {
                        echo '<li class=""><a href="'.$menuItem->link.'">'.$menuItem->text.'</a></li>';
                        }
                        
                    }
                }
                
                function curentPageActive($page){
                    
                            echo onlyPage($_SERVER['REQUEST_URI']);
                            echo " == ";
                            echo onlyPage($page->link);
                            echo "<br />";
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
                    echo $in.'<br /> ';
                    $afterPage = substr($in,  strpos($in, 'page'));
                    
                    $onlyPage = substr($afterPage,0,strpos($afterPage, '&'));
                    return $onlyPage;
                }
                
            ?>