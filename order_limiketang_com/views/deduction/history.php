<?php
use order_limiketang_com\widgets\Popup;
$this->title = '抵扣卷历史记录';

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
        <div class="panel panel-default" style="font-size:12px">
            <?php
                if (empty($dataProvider)){
                    echo '<div class="panel-body panel-empty"><p>暂无数据</p></div>';
                }else{
                    echo '<table class="table table-hover table-bordered">';
                    echo '<tr>';
                    echo '  <th class="col-md-1">编号ID</th>';
                    echo '  <th class="col-md-1">操作时间</th>';
                    echo '  <th class="col-md-1">操作人</th>';
                    echo '  <th class="col-md-1">操作模块</th>';
                    echo '  <th class="col-md-1">抵扣卷名称</th>';
                    echo '  <th class="col-md-2">备注</th>';
                    echo '</tr>';
                    foreach ($dataProvider as $key => $value) {
                        echo '<tr class="rowSingle">';
                        echo '<td>'.$value['id'].'</td>';
                        echo '<td>'.$value['ctime_man'].'</td>';
                        echo '<td>'.$value['admin_name'].'</td>';
                        echo '<td>添加抵扣卷</td>';
                        echo '<td>'.$value['discount_name'].'</td>';
                        echo '<td>'.$value['remark'].'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
            ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    function refIndex(){
        location.href='/deduction/index';
    }
</script>
