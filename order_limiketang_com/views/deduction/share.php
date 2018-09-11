<?php
use order_limiketang_com\widgets\Popup;
$this->title = '分享抵扣卷';

?>
<!-- 页面标题 -->
<div class="page-header">
    <dir class="row">
      <div class="col-md-11 form-control-static"> <h3><?=$this->title?></h3></div>
      <div class="col-md-1 form-control-static"> <?php echo '<button data-id="add" class="J_btnNormal btn btn-primary btn-sm btn-gap-right" onclick="refIndex()">返回</button>'?></div>    
    </dir>
 
</div>

<!-- 查询结果区 -->
<div class="row">
    <div class="col-md-12">
    <?php
        echo'<span>抵扣卷名称：</span><span>'.$names['de_name'].'</span>'
    ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <?php
        echo'<span>抵扣卷编号：</span><span>'.$data['number'].'</span>'
    ?>
    </div>
</div>

<script type="text/javascript">
    function refIndex(){
        location.href='/deduction/index';
    }
</script>
