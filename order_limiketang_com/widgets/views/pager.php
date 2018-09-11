<?php
    
    if ($pages['count']>0){
        echo '<div class="row">';
        echo '<div class="col-md-2">';
        echo '  <a class="btn btn-default" href="'.$pages['perpage'].$pages['count'].'">共'.$pages['count'].'条记录</a>';
        echo '</div>';
        echo '<div class="col-md-10">';
        echo '  <nav class="navbar pull-right" style="margin-bottom:auto;">';
        echo '      <a class="btn btn-default" href="'.$pages['prevurl'].'">上一页</a>';
        echo '      [<b>'.$pages['pagenow'].'</b>/'.ceil($pages['count']/$pages['records']).'] ';
        echo '      <a class="btn btn-default" href="'.$pages['nexturl'].'">下一页</a>';
        echo '  </nav>';
        echo '</div>';
        echo '</div>';
    }
?>
