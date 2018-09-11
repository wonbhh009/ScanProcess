<?php
    foreach ($dataProvider as $key => $value) {
    echo '<tr class="rowSingle">';
    echo '<td>'.$value['id'].'</td>';
    echo '<td>'.$value['de_name'].'</td>';
    echo '<td>'.$value['de_admin_name'].'</td>';
    echo '<td>'.$value['syl'].'/'.$value['de_count'].'</td>';
    echo '<td>'.$value['lqv'].'</td>';
    echo '<td>'.$value['sybfb'].'</td>';
    echo '<td>'.$value['de_full'].'</td>';
    echo '<td>'.$value['de_money'].'</td>';
    echo '<td>'.$value['de_yxq'].'</td>';
    echo '<td>'.$value['de_ty'].'</td>';
    echo '<td>';
    if($value["de_status"]==3||$value["de_status"]==4){
    echo '<span id="sx"  data-id="'.$value['id'].'" data-tag="'.$value["de_status"].'" >'.$value['de_sx'].'</span>';
    echo '<span id="fx"  data-id="'.$value['id'].'" data-tag="'.$value["de_status"].'" >&nbsp;&nbsp;&nbsp;分享</span>';
    }else{
    echo '<span id="sx"  data-id="'.$value['id'].'" data-tag="'.$value["de_status"].'"  class="J_btnEdit"><a>'.$value['de_sx'].'</a></span>';
    echo '<span id="fx"  data-id="'.$value['id'].'" data-tag="'.$value["de_status"].'"  class="J_btnDel">&nbsp;&nbsp;&nbsp;&nbsp;<a>分享</a></span>';
    }    
    echo '</td>';
    echo '</tr>';
    }
?>

