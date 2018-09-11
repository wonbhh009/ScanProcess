<?php
    echo '<div id="div_nav_zone_right"  class="row" style="position:fixed;top:20%;right:2%;">';
    echo '<div class="list-group">';
    if (!empty($dropdownList)){
        echo '<div class="list-group-item">';
        echo '<select id="dropdownlist_class" class="form-control">';
        
        foreach ($dropdownList as $key => $value) {
            if ($nowDropdown == $key){
                echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
            }else{
                echo '<option value="'.$key.'">'.$value.'</option>';
            }
        }
        echo '</select>';
        echo '</div>';
    }
    if (!empty($liList)){
        foreach ($liList as $key => $value){
            if ($nowLi == $key){
                // echo '<a class="list-group-item active">';
                echo '<a class="list-group-item active" href="'.$value[1].'">'.$value[0].'</a>';
            }else{
                // echo '<a class="list-group-item">';
                echo '<a class="list-group-item" href="'.$value[1].'">'.$value[0].'</a>';
            }
            
            // echo '</div>';
        }
    } 
    echo '</div>';
    echo '</div>';
?>
