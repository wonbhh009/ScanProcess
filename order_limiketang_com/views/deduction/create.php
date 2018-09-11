<?php
use order_limiketang_com\widgets\Popup;

$this->title = '新建抵扣卷';

// 下接列表框
$dropDowntypeList = [
    1  =>'通用',
    2  =>'报名',
    3  =>'续费',
    4  =>'小程序',
    5  =>'推荐卷',
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

// 时间选择器,默认时间
$begin  =   '2017-09-01';
$end    =   '2017-12-31';
?>

<!-- 页面标题 -->
<div class="page-header">
    <dir class="row">
      <div class="col-md-11 form-control-static"> <h3><?=$this->title?></h3></div>
      <div class="col-md-1 form-control-static"> <?php echo '<button data-id="add" class="J_btnNormal btn btn-primary btn-sm btn-gap-right" onclick="refIndex()">返回</button>'?></div>    
    </dir>
 
</div>

<!-- 上部操作区 -->
 <div class="alert alert-warning">
    <div class="row form ">
    <div class="col-md-2 form-control-static">抵扣卷名称</div>
    </div>
    <div class="row form ">
        <div class="col-md-4">
            <input id="dkjname" class="form-control" value="" >
        </div>
    </div>
    <div class="row form ">
    <div class="col-md-2 form-control-static">营销抵扣卷名称</div>
    </div>
    <div class="row form ">
        <div class="col-md-4">
            <input id="yxjname" class="form-control" value="" >
        </div>
    </div>
  <div class="row">
        <div class="col-md-12 form-control-static">购买类型</div>
  </div>
   <div class="row form ">
        <div class="col-md-2">
             <select id="buytype" class="form-control">
                <?php
                    foreach ($dropDowntypeList as $key => $value) {
                        if ($buytype == $key){
                            echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
                        }else{
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
         <div class="col-md-10">
        </div>
  </div>
    <div class="row">
        <div class="col-md-12 form-control-static">使用年级</div>
  </div>
   <div class="row form ">
        <div class="col-md-2">
             <select id="usegrade" class="form-control">
                <?php
                    foreach ($dropDowngradeList as $key => $value) {
                        if ($usegrade == $key){
                            echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
                        }else{
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
         <div class="col-md-10">
        </div>
  </div>
   <div class="row">
        <div class="col-md-12 form-control-static">仅限门店使用</div>
  </div>
    <div class="row">
        <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon">
                    <input type="radio" name="optionsType" id="optionsMenRadios1" value="1" onclick="chonly()" checked="checked"></span>
                    <input id="onlystore" type="text" class="form-control">
                </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div>
    <div class="row">
        <div class="col-md-12 form-control-static">仅限班级使用</div>
    </div>
    <div class="row">
        <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon">
                    <input type="radio" name="optionsType" id="optionsMenRadios2" onclick="chonly()" value="2"></span>
                    <input id="onlyclass" type="text" class="form-control" disabled="true">
                </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div>
    <div class="row ">
    <div class="col-md-2 form-control-static">发行数量（张）</div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <input id="number" class="form-control" value="" >
        </div>
    </div>
    <div class="row ">
    <div class="col-md-12 form-control-static">减满需求（消费满足该框的金额，才可以使用该优惠券）</div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <input id="jmmoney" class="form-control" value="" >
        </div>
    </div>
    <div class="row ">
    <div class="col-md-12 form-control-static">抵扣卷金额（元）</div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <input id="dkmoney" class="form-control" value="" >
        </div>
    </div>
    <div class="row ">
    <div class="col-md-12 form-control-static">抵扣卷有效期</div>
    </div>
    <div class="row" style="background:#DEDDDE; width: 60%;">
        <div class="col-md-12" style="margin-top: 20px">
            <div class="input-group">
            <span class=""><input type="radio" name="optionsRadios" id="optionsRadios1" value="1" onclick="dkyxq()" checked></span>
            <span>固定日期</span>
            <span><input type="text"   id="beginDate" value=""></span>
            <span>至</span>
            <span><input type="text"   id="endDate" value=""></span>
            </div>
        </div>
         <div class="col-md-12" style="margin-top: 20px; margin-bottom: 20px">
            <div class="input-group">
            <span class=""><input type="radio" name="optionsRadios" id="optionsRadios2" onclick="dkyxq()" value="2"></span>
            <span>领取后生效，有效期</span>
            <span><input type="text"  id="lqts" value="" style="width: 50px" disabled="true"></span>
            <span>天</span>
            </div>
        </div>
    </div>
    <div class="row ">
    <div class="col-md-12 form-control-static"> <span class=""><input id="cflq" type="checkbox" onclick="chbox()" value="0"></span><span>  可以重复领取</span></div>
    </div>
    <div class="row ">
    <div class="col-md-12 form-control-static">备注</div>
    </div>
    <div class="row ">
    <div class="col-md-12 form-control-static"> <textarea id="ramark" class="form-control" rows="5" style=" width: 60%" ></textarea></div>
    </div>
    <div class="row ">
    <div class="col-md-12 form-control-static">
        <input class="btn btn-primary" type="submit" value="添加抵扣卷" onclick="addInfo()">
        <span>&nbsp;&nbsp;操作人：xxx</span>
    </div>
    </div>
</div>   
<!-- 查询结果区 -->

<!-- 加载通过弹出框 -->
<?php 
    // 在页面尾部加载js的初始化入口,以便在jquery等js加载完成后执行
    $this->registerJs("$(function(){init()})", \yii\web\View::POS_END);
    echo Popup::widget(['type'=>'iknow']);
    echo Popup::widget(['type'=>'confirm']);
    echo Popup::widget(['type'=>'input']);
?>

<script type="text/javascript">
    
    $("#beginDate").datepicker();//日期选择插件
    $("#endDate").datepicker();//日期选择插件

</script>
<script type="text/javascript">
    /**
     * 页面初始化
     */
    function init(){
        initBtnDel();
        initBtnEdit();
    }
    function refIndex(){
        location.href='/deduction/index';
    }
     function chbox(){
        if($("#cflq").prop("checked")){
             $("#cflq").val(1);
         }else{
             $("#cflq").val(0);
         }
    }
    function chonly(){
     var s=$("input[name='optionsType']:checked").val();
         if(s==1){
            $('#onlyclass').attr('disabled',true);
            $('#onlyclass').val("");
            $('#onlystore').attr('disabled',false);
            $('#onlystore').val("");
         }else{
            $('#onlyclass').val("");
            $('#onlyclass').attr('disabled',false);
            $('#onlystore').val("");
            $('#onlystore').attr('disabled',true);
            
         }
    }
    function dkyxq(){
     var s=$("input[name='optionsRadios']:checked").val();
         if(s==1){
            $('#lqts').attr('disabled',true);
            $('#lqts').val("");
            $('#beginDate').attr('disabled',false);
            $('#beginDate').val("");
            $('#endDate').attr('disabled',false);
            $('#endDate').val("");

         }else{
            $('#lqts').attr('disabled',false);
            $('#lqts').val("");
            $('#beginDate').attr('disabled',true);
             $('#beginDate').val("");
            $('#endDate').attr('disabled',true);
            $('#endDate').val("");
         }
    }
    function addInfo(){
        var data=checkFormInfo();
        if(data==''){
          popup.iknow("保存数据有误");   
        }else{
            $.ajax({
                    type   : 'post',
                    url    : 'add',
                    cache  : false,
                    data   :   data,
                    success:function(data) {
                    var ret = data;
                    if (ret==1){
                        popup.iknow("添加成功");
                        //location.reload();
                     }else{
                            popup.iknow("保存失败");
                          }
                    },
                    error:function(XMLHttpRequest, textStatus, errorThrown){
                        popup.iknow(errorThrown);
                    }
             })
        }
    }
    /**
     * 获取并检查所有表单内的信息
     */
     function checkFormInfo(){
        // 基本信息信息
        var formInfo = {
            'dkjname'           : $("#dkjname").val(),
            'yxjname'           : $("#yxjname").val(),
            'buytype'           : $("#buytype").val(),
            'usegrade'          : $("#usegrade").val(),
            'onlystore'         : $("#onlystore").val(),
            'onlyclass'         : $("#onlyclass").val(),
            'number'            : $("#number").val(),
            'jmmoney'           : $("#jmmoney").val(),
            'dkmoney'           : $("#dkmoney").val(),  
            'beginDate'         : $("#beginDate").val(),    
            'endDate'           : $("#endDate").val(),    
            'lqts'              : $("#lqts").val(), 
            'cflq'              : $('#cflq').val(),        
            'ramark'            : $('#ramark').val(),
        }
        return formInfo;
     }
</script>
