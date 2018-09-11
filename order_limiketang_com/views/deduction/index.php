<?php
use order_limiketang_com\widgets\Popup;

$this->title = '抵扣卷管理';

// 下接列表框
$dropDowntypeList = [
    0   =>'全部',
    1   =>'通用',
    2   =>'报名',
    3   =>'续费',
    4   =>'小程序',
    5   =>'推荐卷',
];

// 下接列表框
$dropDowngradeList = [
    0   =>'全部',
    1  =>'一年级',
    2  =>'二年级',
    3  =>'三年级',
    4  =>'四年级',
    5  =>'五年级',
    6  =>'六年级',
];

// 下接列表框
$dropDownstautsList = [
    0   =>'全部',
    1  =>'未生效',
    2  =>'已生效',
    3  =>'已到期',
];
?>
<!-- 页面标题 -->
<div class="page-header">
  <h3><?=$this->title?></h3>
</div>

<!-- 上部操作区 -->
 <div class="alert alert-warning">
    <!-- 时间选择器 -->
   <div class="row form ">
       <div class="col-md-12 form-control-static">
        <span>抵扣卷名称：</span> 
        <span><input id="dkjname"  value="" ></span>
        <span style="padding-left: 20px">年级：</span>
        <span><select id="grade" style="width: 100px" >
                <?php
                    foreach ($dropDowngradeList as $key => $value) {
                        if ($grade == $key){
                            echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
                        }else{
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    }
                ?>
            </select>
        </span>
         <span style="padding-left: 20px">报名类型：</span>
        <span> <select id="typelist" style="width: 100px">
                <?php
                    foreach ($dropDowntypeList as $key => $value) {
                        if ($typelist == $key){
                            echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
                        }else{
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    }
                ?>
            </select>
        </span>
                <span style="padding-left: 20px">状态：</span>
        <span>  
            <select id="stautsList" style="width: 100px"  >
                <?php
                    foreach ($dropDownstautsList as $key => $value) {
                        if ($stautsList == $key){
                            echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
                        }else{
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    }
                ?>
            </select>
        </span>
        <span style=" padding-left: 20px"> <button class="btn btn-primary  btn-xs"  style="width: 100px" onclick="reSearch()" >查询</button></span>
        <span style=" padding-left: 20px"> <button class="btn btn-primary  btn-xs"  style="width: 100px" onclick="refIndex()" >刷新</button></span>
    </div>
    </div>
    <!-- 下拉列表框 -->
    </div>

<div class="row">
    <div class="col-md-10">
       
    </div>
    <div class="col-md-1">
         <?php echo '<button data-id="add" class="J_btnNormal btn btn-primary btn-sm btn-gap-right" onclick="refCreate()">添加抵扣</button>'?>
    </div>
    <div class="col-md-1">
         <?php echo '<button data-id="add" class="J_btnNormal btn btn-primary btn-sm btn-gap-right" onclick="refHis()">历史记录</button>'?>
    </div>
</div>
<div class="row" style="padding-bottom:20px">
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
                    echo '  <th class="col-md-1">抵扣卷名称</th>';
                    echo '  <th class="col-md-1">创建人</th>';
                    echo '  <th class="col-md-1">剩余量/发行量</th>';
                    echo '  <th class="col-md-1">领取率</th>';
                    echo '  <th class="col-md-1">使用率</th>';
                    echo '  <th class="col-md-1">满减金额</th>';
                    echo '  <th class="col-md-1">优惠金额</th>';
                    echo '  <th class="col-md-2">抵扣卷有效期</th>';
                    echo '  <th class="col-md-1">状态</th>';
                    echo '  <th class="col-md-1">操作</th>';
                    echo '</tr>';
                    echo'<TBODY id="replace">';
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
                        echo '<span id="sx"  data-id="'.$value['id'].'" data-tag="'.$value["de_status"].'"  class="J_btnEdit"><a style="cursor:pointer;">'.$value['de_sx'].'</a></span>';
                        echo '<span id="fx"  data-id="'.$value['id'].'" data-tag="'.$value["de_batch"].'"  class="J_btnShare">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="cursor:pointer;">分享</a></span>';
                        }
                               
                        echo '</td>';
                        echo '</tr>';
                    }
                     echo'</TBODY>';                  
                    echo '</table>';
                }
            ?>
        </div>
    </div>
</div>
<!-- 加载通过弹出框 -->
<?php 
    // 在页面尾部加载js的初始化入口,以便在jquery等js加载完成后执行
    $this->registerJs("$(function(){init()})", \yii\web\View::POS_END);
    echo Popup::widget(['type'=>'iknow']);
    echo Popup::widget(['type'=>'confirm']);
    echo Popup::widget(['type'=>'input']);
?>

<script type="text/javascript">
    /**
     * 页面初始化
     */
    function init(){
        initBtnEdit();
        initBtnShare();
    }
    /**
     * 初始化所有编辑按键
     * @author 曹俊杰
     */
     function initBtnEdit(){

        $('.J_btnEdit').click(function(){
            var tagId = $(this).data("id");
            var tags = $(this).data("tag");
                    $.ajax({
                        url: '/deduction/update', // 发送请求的URL字符串
                        async:false,     // 默认为true-异步请求，false-同步请求（必须执行完$.ajax();才能执行下面的）
                        data:{
                            'id' : tagId,
                            'stauts':tags
                        }, 
                        type:'GET',
                        success:function(res) {
                            if (res == 1) {
                                popup.iknow("操作成功",function(){
                                    location.reload();
                                });
                            }else{
                                popup.iknow(ret.desc);
                            }
                        },
                        error:function(XMLHttpRequest, textStatus, errorThrown){
                            popup.iknow(errorThrown);
                     }
                });
        });
     }

    /**
     * 分享优惠卷
     *
     */
     function initBtnShare(){

        $('.J_btnShare').click(function(){
            var tagId = $(this).data("id");
            var tags = $(this).data("tag");
            location.href='/deduction/share?id='+tags;      
        });
     }

    function refCreate(){
        location.href='/deduction/create';
    }
    function refIndex(){
        location.href='/deduction/index';
    }
    function refHis(){
        location.href='/deduction/history';
    }

    function reSearch(){
        var data=checkFormInfo();
        location.href='/deduction/index?dkjname='+$("#dkjname").val()+'&grade='+$("#grade").val()+'&typelist='+$("#typelist").val()+'&stautsList='+$("#stautsList").val()+'&re=res';
/*        if(data==''){
          popup.iknow("保存数据有误");   
        }else{
            $.ajax({
                    type   : 'get',
                    url    : '/deduction/resarch',
                    cache  :  false,
                    data   :  {'dkjname':$("#dkjname").val(),'grade':$("#grade").val(),'typelist':$("#typelist").val(),'stautsList':$("#stautsList").val()},
                    success:function(data) {
                    $('#replace').empty();
                    $('#replace').html(data);
                    },
                    error:function(XMLHttpRequest, textStatus, errorThrown){
                        popup.iknow(errorThrown);
                    }
             })
        }*/
    }
    /**
     * 获取并检查所有表单内的信息
     */
     function checkFormInfo(){
        // 基本信息信息
        var formInfo = {
            'dkjname'         : $("#dkjname").val(),
            'grade'           : $("#grade").val(),
            'typelist'        : $("#typelist").val(),
            'stautsList'      : $("#stautsList").val(),
        }
        return formInfo;
     }

</script>
