<?php
	use order_limiketang_com\widgets\BreadHeader;
	use order_limiketang_com\widgets\Popup;

	$this->params['breadcrumbs'][] = '基本页面结构-操作区';

	// 下接列表框
	$dropDownItemList = [
		0  	=>'下拉列表框',
		10	=>'项目一',
		31	=>'项目二',
		93	=>'项目三',
		183	=>'更多文字内容',
		366	=>'很长的文字内容',
	];

	// 时间选择器,默认时间
	$begin  =	'2017-09-11';
	$end 	=	'2017-12-31';
?>

<!-- 页头导航, 页面调控 -->
<div class="page-header">
    <div class="row">
        <div class="col-md-10">
            <h3><?php echo BreadHeader::widget()?></h3>
        </div>
    </div>
</div>

<!-- 上部操作区 -->
<div class="alert alert-warning">

	<!-- 下拉列表框 -->
	<div class="row form form-group">
		<div class="col-md-2 form-control-static">单行列表项</div>	
		<div class="col-md-2">
			<select id="type" class="form-control">
				<?php
					foreach ($dropDownItemList as $key => $value) {
						if ($days == $key){
							echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
						}else{
							echo '<option value="'.$key.'">'.$value.'</option>';
						}
					}
				?>
			</select>
		</div>
	</div>
	
	<!-- 时间选择器 -->
	<div class="row form form-group">
		<div class="col-md-2 form-control-static">时间范围</div>
		<div class="col-md-2">
			<input type="text" class="form-control" id="beginDate" value="<?=$begin?>">
		</div>
		<div class="col-md-2">
			<input type="text" class="form-control" id="endDate" value="<?=$end?>">
		</div>
	</div>

	<!-- 标准输入框 -->
	<div class="row form form-group form-group-last">
		<div class="col-md-2 form-control-static">标准文本输入</div>
		<div class="col-md-2">
			<input id="phone" class="form-control" value="" onkeypress="if(event.keyCode==13) getResultBySearch();" placeholder="手机号" maxlength="11">
		</div>
		<div class="col-md-2">
			<button class="btn btn-primary"  onclick="getResultBySearch()">查询</button>
		</div>
	</div>

</div>

<!-- 内容展示区 -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" style="font-size:12px">
			<?php
				if (empty($logList)){
					echo '<div class="panel-body panel-empty"><p>暂无数据</p></div>';
				}else{
					// 数据展示
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
?>

<script type="text/javascript">
	
	/**
	 * 页面初始化
	 */
	function init(){

		$("#beginDate").datepicker();//日期选择插件
		$("#endDate").datepicker();//日期选择插件

	}


	/**
     * 根据搜索条件获取结果
     * @author 曹俊杰
     */
	function getResultBySearch()
	{
		var type 		= $("#type").val();
		var beginDate 	= $("#beginDate").val();
		var endDate 	= $("#endDate").val();
		var phone 		= $("#phone").val();

		if (phone==""){
			popup.iknow("填写要查询验证码的手机号");
		}else{
			var url= '?r=find/getsmsloglistbyphone&phone='+phone+'&type='+type+'&begindate='+beginDate+'&enddate='+endDate;
			location.href=url;
		}
	}


</script>
