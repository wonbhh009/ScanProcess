<?php
use common\widgets\BreadHeader;
use common\widgets\Popup;

$this->params['breadcrumbs'][] = '曹俊杰，13910839867，三年级';

// 年级
$gradeList = [
	0=>'未知',
	1=>'一年级',
	2=>'二年级',
	3=>'三年级',
	4=>'四年级',
	5=>'五年级',
	6=>'六年级',
];

// 性别
$sexList = [
	0=>'未知',
	1=>'男生',
	2=>'女生',
];

// 人际关系
$relationshipList =[
	0=>'未知',
	1=>'父亲',
	2=>'母亲',
	3=>'爷爷',
	4=>'奶奶',
	5=>'姥爷',
	6=>'姥姥',
];

// 用户等级
$userLevelList = [
	1=>'A',
	2=>'B',
	3=>'C',
	4=>'D',
];

// 任务等级(紧急度)
$taskLevelList = [
	1=>'紧急',
	2=>'不紧急',
];

// 任务结果
$taskResultList =[
	1=>'号码无效',
	2=>'关机',
	3=>'拒绝',
	4=>'打通无人接听',
	5=>'打不通',
	6=>'打通但无效',
	7=>'预约跟进',
	8=>'预约体验课',
	9=>'报班',
	10=>'放弃',
];

$grade = 1;
$sex   = 2;
$contact_relationship = 2;
$parent_relationship  = 2;
$userLevel = 1;
$taskLevel = 1;

$default_pid = 140000;
$default_cid = 140100;
$default_aid = 140107;
$default_sid = 95509;
?>

<!-- 页头导航, 页面调控 -->
<div class="page-header">
    <div class="row">
        <div class="col-md-10">
            <h3><?php echo BreadHeader::widget()?></h3>
        </div>
    </div>
</div>


<!-- 内容展示区 -->
<div class="row">
	<!-- 左侧面板 -->
	<div class="col-md-6">
		<!-- 面板-用户来源 -->
		<div class="alert alert-info" role="alert">
			<div class="row form">
				<div class="col-md-12 form-control-static">
					<?php echo '来源：狸米学习-首次沟通';?>
				</div>
			</div>
		</div>

		<!-- 面板-基本信息 -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-10"><h5>基本信息</h5></div>
					<div class="col-md-2">
						<?php echo '<a href="#" target="_blank">历史记录</a>';?>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<table class="tableform">
						<!-- 基本信息 -->
						<tr>
		                    <td class="col-md-2"><span class="pull-right text-muted">姓名:</span></td>
		                    <td class="col-md-3"><input id="username" type="text" class="form-control" maxlength="4" value=""></td>
		               
		                    <td class="col-md-1"><span class="pull-right text-muted">年级:<span></td>
		                    <td class="col-md-2">
		                    	<select id="grade" class="form-control">
									<?php
										foreach ($gradeList as $key => $value) {
											if ($grade == $key){
												echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
											}else{
												echo '<option value="'.$key.'">'.$value.'</option>';
											}
										}
									?>
		                    	</select>
		                    </td>
		                
		                    <td class="col-md-1"><span class="pull-right text-muted">性别:</span></td>
		                    <td class="col-md-2">
		                    	<select id="sex" class="form-control">
									<?php
										foreach ($sexList as $key => $value) {
											if ($sex == $key){
												echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
											}else{
												echo '<option value="'.$key.'">'.$value.'</option>';
											}
										}
									?>
		                    	</select>
		                    </td>
	                	</tr>
						<tr>
		                    <td class="col-md-2"><span class="pull-right text-muted">出生日期:</span></td>
		                    <td class="col-md-3"><input id="birthday" type="text" class="form-control" value=""></td>
		               
		                    <td class="col-md-1"><span class="pull-right text-muted">年龄:</span></td>
		                    <td class="col-md-2">9岁</td>

		                    <td></td>
		                    <td></td>
	                	</tr>
	                	<!-- 紧急联系人 -->
						<tr>
		                    <td class="col-md-2"><span class="pull-right text-muted">紧急联系人:</span></td>
		                    <td class="col-md-3"><input id="contact_name" type="text" class="form-control" maxlength="4" value=""></td>
		               
		                    <td colspan="2" class="col-md-3">
		                    	<select id="contact_relationship" class="form-control">
									<?php
										foreach ($relationshipList as $key => $value) {
											if ($contact_relationship == $key){
												echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
											}else{
												echo '<option value="'.$key.'">'.$value.'</option>';
											}
										}
									?>
		                    	</select>
		                    </td>
		                
		                    <td colspan="2" class="col-md-3">
		                    	<input id="contact_phone" type="text" class="form-control" maxlength="11" value="">
		                    </td>
	                	</tr>
	                	<!-- 家长 -->
 						<tr>
		                    <td class="col-md-2"><span class="pull-right text-muted">家长:</span></td>
		                    <td class="col-md-3"><input id="parent_name" type="text" class="form-control" maxlength="4" value=""></td>
		               
		                    <td colspan="2" class="col-md-3">
		                    	<select id="parent_relationship" class="form-control">
									<?php
										foreach ($relationshipList as $key => $value) {
											if ($parent_relationship == $key){
												echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
											}else{
												echo '<option value="'.$key.'">'.$value.'</option>';
											}
										}
									?>
		                    	</select>
		                    </td>
		                
		                    <td colspan="2" class="col-md-3"><input id="parent_phone" type="text" class="form-control" maxlength="11" value=""></td>
	                	</tr>
	                	<!-- 学校省市区 -->
						<tr>
		                    <td class="col-md-2"><span class="pull-right text-muted">学校:</span></td>
		                    <td class="col-md-3">
								<select name="pid" id="pList" class="form-control">
								</select>
		                    </td>
		                    <td colspan="2" class="col-md-3">
								<select name="cid" id="cList" class="form-control">
								</select>
		                    </td>
		                    <td colspan="2" class="col-md-3">
								<select name="aid" id="aList" class="form-control">
								</select>
		                    </td>
	                	</tr>
	                	<!-- 学校名称 -->
						<tr>
		                    <td class="col-md-2"></td>
		                    <td colspan="5" class="col-md-9">
								<input id="school_name" class="form-control" value="" placeholder="学校名称,增量搜索">
		                    </td>
	                	</tr>
	                	<tr>
		                    <td class="col-md-2"></td>
		                    <td colspan="5" class="col-md-9">
		                    	<div class="panel-collapse" id="sListWrap" style="display:none">
				                <select id="sList" multiple="multiple" class="form-control" size="5">
				                </select>
				                </div>  
		                    </td>	
	                	</tr>
	                	<!-- 数学老师 -->
						<tr>
		                    <td class="col-md-2"><span class="pull-right text-muted">数学老师:</span></td>
		                    <td class="col-md-3"><input id="teacher_name" type="text" class="form-control" maxlength="4" value=""></td>

		                    <td colspan="2" class="col-md-3">
		                    	<input id="teacher_phone" type="text" class="form-control" maxlength="11" value="">
		                    </td>

		                    <td></td>
		                    <td></td>
	                	</tr>	                	
	            	</table>
            	</div>
			</div>			
		</div>

		<!-- 面板-狸米学习信息 -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-12"><h5>狸米学习中的学习信息</h5></div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<table class="tableform">
						<tr>
							<td class="col-md-3"><span class="pull-right text-muted">加班状态:</span></td>
							<td class="col-md-3">未加班</td>
							<td class="col-md-3"><span class="pull-right text-muted">当前练习册:</span></td>
							<td class="col-md-3">人教版三年级上册</td>
						</tr>
						<tr>
							<td class="col-md-3"><span class="pull-right text-muted">班内排行:</span></td>
							<td class="col-md-3">12</td>
							<td class="col-md-3"><span class="pull-right text-muted">学习进度:</span></td>
							<td class="col-md-3">23/45</td>
						</tr>
					</table>
				</div>				
			</div>			
		</div>

		<!-- 面板-直播课信息 -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-12"><h5>直播课中的上课记录</h5></div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<table class="tableform">

					</table>
				</div>				
			</div>			
		</div>				
	</div>

	<!-- 右侧面板 -->
	<div class="col-md-6">
		<!-- 面板-用户分级 -->
		<div class="alert alert-info" role="alert">
			<div class="row form">
				<div class="col-md-2 form-control-static">客户分级</div>
				<div class="col-md-4">
					<div class="btn-group" data-toggle="buttons" id="btnRadioUserLevel">
						<?php
							foreach ($userLevelList as $key => $value) {
								if ($userLevel == $key){
									echo '<label class="btn btn-default active">';
									echo '<input type="radio" name="optionsUserLevel" value="'.$key.'" checked>'.$value.'</input>';
								}else{
									echo '<label class="btn btn-default">';
									echo '<input type="radio" name="optionsUserLevel" value="'.$key.'">'.$value.'</input>';
								}
								echo '</label>';
							}
						?>						
					</div>
				</div>
				<div class="col-md-2 form-control-static">任务状态</div>
				<div class="col-md-4">
					<div class="btn-group" data-toggle="buttons" id="btnRadioTaskLevel">
						<?php
							foreach ($taskLevelList as $key => $value) {
								if ($taskLevel == $key){
									echo '<label class="btn btn-default active">';
									echo '<input type="radio" name="optionsTaskLevel" value="'.$key.'" checked>'.$value.'</input>';
								}else{
									echo '<label class="btn btn-default">';
									echo '<input type="radio" name="optionsTaskLevel" value="'.$key.'">'.$value.'</input>';
								}
								echo '</label>';
							}
						?>							
					</div>					
				</div>
			</div>
		</div>

		<!-- 面板-本次通话记录 -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-12"><h5>本次通话记录</h5></div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row form-group">
					<div class="col-md-1"></div>
					<div class="col-md-11">
						<div class="btn-group" data-toggle="buttons" id="btnRadioTaskResult">
							<?php
								foreach ($taskResultList as $key => $value) {
									if ($key<7){
										echo '<label class="btn btn-default">';
										echo '<input type="radio" name="optionsTaskResult" value="'.$key.'">'.$value.'</input>';		
										echo '</label>';
									}
								}
							?>																									
						</div>								
					</div>
				</div>
				<div class="row form-group">					
					<div class="col-md-1 form-control-static"><span class="pull-right text-muted">预约</span></div>
					<div class="col-md-5"><input id="followtime" type="text" class="form-control" value=""></div>
				</div>
				<div class="row form-group">
					<div class="col-md-1"><span class="pull-right text-muted">备注</span></div>
					<div class="col-md-11"><textarea id="memo" class="form-control" rows="6"></textarea></div>
				</div>
				<div class="row form-group">
					<div class="col-md-1"></div>
					<div class="col-md-2"><button id="btnFollow" class="btn btn-default btn-lg" onclick="follow()">跟进</button></div>
					<div class="col-md-3">
						<div class="btn-group">
							<button type="button" class="btn btn-primary dropdown-toggle btn-lg" data-toggle="dropdown">
							预约体验课 <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<?php
									foreach ($gradeList as $key => $value) {
										if ($key>0){
											echo '<li><a href="#" class="J_seeclass" data-grade="'.$key.'">'.$value.'</a></li>';
										}
									}
								?>							
							</ul>
						</div>						
					</div>
					<div class="col-md-2"><button id="btnBuy" class="btn btn-success btn-lg" onclick="buy()">报班</button></div>
					<div class="col-md-2"></div>
					<div class="col-md-2"><button id="btnGiveup" class="btn btn-warning btn-lg" onclick="giveup()">放弃</button></div>
				</div>					
			</div>			
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
	var default_pid = <?=$default_pid?>;
	var default_cid = <?=$default_cid?>;
	var default_aid = <?=$default_aid?>;
	var default_sid = <?=$default_sid?>;
	/**
	 * 页面初始化
	 */
	function init(){
		// 指定省市区校的容器
		cityarea.provinceWrap 	= '#pList';
		cityarea.cityWrap 		= '#cList';
		cityarea.areaWrap 		= '#aList';
		cityarea.schoolWrap 	= '#sList';

		// 先加载全部区县列表
		cityarea.getAllArea(function(){
			// 加载完毕后,继续加载全部城市列表
			cityarea.getAllCity(function(){
				// 绑定
				$(cityarea.provinceWrap).bind("change", cityarea.changeProvince);
				$(cityarea.cityWrap).bind("change", cityarea.changeCity);
				$(cityarea.areaWrap).bind("change", cityarea.changeArea);
				// 最后初始化,指定省市区校的各级id,数值型
				cityarea.setDefault(default_pid,default_cid,default_aid,default_sid);

				// 绑定搜索功能
				cityarea.bindInputToSearchInList("#school_name", cityarea.schoolWrap);

				// 选中学校
				$(cityarea.schoolWrap).on("click",function() {
					$('#school_name').val($(this).find("option:selected").text());
				})
			})
		});

		// 初始化日期插件
		$("#birthday").datepicker();
	    $('#followtime').datetimepicker({
	        timeFormat: "HH:mm:ss",
	        dateFormat: "yy-mm-dd"
	    });

	    // 初始化预约体验课中的所有下拉菜单
	    initSeeClassList();
	}
	/**
	 * 初始化预约体验课中的所有下拉菜单
	 */
	 function initSeeClassList(){
	 	$(".J_seeclass").click(function(){
	 		var grade = $(this).data('grade');
	 		seeclass(grade);
	 	})
	 }

	/**
	 * 获取并检查所有表单内的信息
	 */
	 function checkFormInfo(){
	 	// 基本信息信息
	 	var formInfo = {
	 		'username'				: $("#username").val(),
		 	'grade' 				: $("#grade").val(),
		 	'sex' 					: $("#sex").val(),
		 	'birthday'				: $("#birthday").val(),
		 	'contact_name'			: $("#contact_name").val(),
		 	'contact_relationship'	: $("#contact_relationship").val(),
		 	'contact_phone'			: $("#contact_phone").val(),
		 	'parent_name'			: $("#parent_name").val(),
		 	'parent_relationship'	: $("#parent_relationship").val(),
		 	'parent_phone'			: $("#parent_phone").val(),	
		 	'pid'					: $("#pList").val(),	
		 	'cid'					: $("#cList").val(),	
		 	'aid'					: $("#aList").val(),	
		 	'sid'					: $("#sList").val()[0],	
		 	'userLevel' 			: $('#btnRadioUserLevel input:radio:checked').val(),		
	 		'taskLevel' 			: $('#btnRadioTaskLevel input:radio:checked').val(),
	 		'taskResult' 			: $('#btnRadioTaskResult input:radio:checked').val(),
	 		'followtime' 			: $('#followtime').val(),
	 		'memo' 					: $('#memo').val(),
	 	}

	 	// 检查学生基本信息
	 	if (formInfo.username.length<2){
	 		popup.iknow("必须输入学生姓名");return null;
	 	}
	 	if (formInfo.userLevel == 0){
	 		popup.iknow("请标记用户等级");return null;
	 	}

	 	return formInfo;

	 }

	 /**
	  * 跟进
	  */
	 function follow(){
	 	
	 	var formInfo = checkFormInfo();

	 	if (formInfo != null) {
	 		if (formInfo.followtime == ''){
	 			popup.iknow("必须指定预约时间");return;
	 		}

	 		// 跟进
	 		console.log(formInfo);
	 	}
	 }

	 /**
	  * 预约体验课
	  */
	 function seeclass(grade){
	 	
	 	var formInfo = checkFormInfo();

	 	if (formInfo != null) {
	 		if (formInfo.followtime == ''){
	 			popup.iknow("必须指定预约时间");return;
	 		}

	 		formInfo.grade = grade;
	 		
	 		var msg='<h4>确认给当前学生预约:<span class="text-danger">'+formInfo.followtime+'</span>, <span class="text-primary">'+grade+'年级</span> 的体验课?</h4>';
	 		popup.confirm(msg,function(){
	 			console.log("sss");
	 		},'确认预约','预约确认')
	 	}
	 }

	 /**
	  * 报班
	  */
	 function buy(){
	 	
	 	var formInfo = checkFormInfo();

	 	if (formInfo != null) {
	 		location.href = "demo.limiketang.com";
	 	}
	 }
	 /**
	  * 放弃
	  */
	 function giveup(){
	 	
	 	var formInfo = checkFormInfo();

	 	if (formInfo != null) {
	 		location.href = "demo.limiketang.com";
	 	}
	 }	 
</script>
