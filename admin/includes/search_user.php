<?php
    require("init.php");
    $user = new User();

    if(isset($_POST['search']) && !empty($_POST['search'])){
        $search = trim(strip_tags($_POST['search']));
        $result = $user->search($search);
        if(!empty($result)){
            echo '<div class="nav-right-down-wrap"><ul>';
            foreach($result as $user){
                echo '<li class="li_search">
                            <div class="nav-right-down-inner">
                                <div class="nav-right-down-left">
                                    <a href="'.BASE_URL.'admin/edit_user.php?id='.$user->id.'"><img class="img_search" src="'.'images/users/'.$user->user_image.'"></a>
                                </div>
                                <div class="nav-right-down-right">
                                    <div class="nav-right-down-right-headline">
                                        <a href="'.BASE_URL.'admin/edit_user.php?id='.$user->id.'">'.$user->first_name.'</a><span>@'.$user->username.'</span>
                                    </div>
                                    <div class="nav-right-down-right-body">

                                    </div>
                                </div>
                            </div>
                         </li>';
            }
            echo '</ul></div>';
        }
    }