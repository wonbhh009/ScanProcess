<?php
	use order_limiketang_com\widgets\BreadHeader;
	use order_limiketang_com\widgets\Popup;

	$this->params['breadcrumbs'][] = '表格-弹出框';
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

</div>

<!-- 内容展示区 -->
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<?php
				echo '<table class="table table-bordered">';
				echo '<tr class="active">';
				echo '	<th class="col-md-1">#</th>';
				echo '	<th class="col-md-1">id</th>';
				echo '	<th class="col-md-2">标签内容</th>';
				echo '	<th class="col-md-1">使用次数</th>';
				echo ' 	<th class="col-md-2">操作</th>';
				echo '</tr>';

				// 表格内每行限单行显示
				if (!empty($dataList)){
					$index=0;
					foreach ($dataList as $key => $value) {
						echo '<tr class="rowSingle">';
						echo '<td>'.($index++).'</td>';
						echo '<td>'.$value['id'].'</td>';
						echo '<td>'.$value['tag'].'</td>';
						echo '<td>'.$value['count'].'</td>';
						echo '<td>';
						echo '<button data-id="'.$value['id'].'" data-tag="'.$value["tag"].'" class="J_btnEdit btn btn-default btn-sm pull-right">编辑</button>';
						if ($value['count']==0){
							echo '<button id="btnDel" data-id="'.$value['id'].'" class="J_btnDel btn btn-danger btn-sm pull-right btn-gap-right">删除</button>';
						}
						echo '</td>';
						echo '</tr>';
					}						
				}

				echo '<tr>';
				echo '<td colspan="5" class="col-md-7">';
				echo '<button id="btnAddTAg" class="btn btn-primary pull-right" onclick="addTag()">添加新标签</button>';
				echo '</td>';
				echo '</tr>';	
				echo '</table>';
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
    	initBtnDel();
    	initBtnEdit();
    }

	/**
	 * 初始化所有删除按键
	 * @author 	曹俊杰
	 */
	function initBtnDel(){
		$('.J_btnDel').click(function(){
			// 获取按键元素内存储的数据
			var tagId = $(this).data("id");
			
			if (tagId == ''){
				popup.iknow("当前未绑定");
			}else{
				// 语法
				// popup.confirm(msg,callback,btntext,title)
				popup.confirm("提示语句！",function(){
					$.ajax({
			            type   : 'GET',
			            url    : '?r=student-info/ajax-del-wx-bind&wx_openid='+tagId,
			            cache  : false,
			            success:function( data ) {
			                var ret = $.parseJSON(data);
			                if (ret.result==1){
			                	location.reload();
			            	}else{
			            		popup.iknow(ret.desc);
			            	}
			            },
			            error:function(XMLHttpRequest, textStatus, errorThrown){
			            	popup.iknow(errorThrown);
			            }
			        })
		        },"自定义确定词","自定义大标题")				
			}
		})
	}

	/**
	 * 初始化所有编辑按键
	 * @author 曹俊杰
	 */
	 function initBtnEdit(){

		$('.J_btnEdit').click(function(){
			// 获取按键元素内存储的数据
			var tagId 	= $(this).data("id");
			var tagText = $(this).data("tag");

			// 回写默认值
			$('#popup_input_text').val(tagText);

			if (tagId == ''){
				popup.iknow("标签id缺失",function(){return;});
			}else{
				popup.input('标签:',function(){
					// 获取弹出框内输入的内容
					var newText = $('#popup_input_text').val();
			        
			        // 不支持同时打开多个模态框,因此对于模态框上的检查与弹出,请直接用alert
					if(newText.length == 0){
						alert("标签内容不得为空");
						return;
			        }
			        
			        // 先关闭其它所有可能存在的模态框
			        popup.closeAll();
			        $.ajax({
		                url: '?r=coupon/copy', // 发送请求的URL字符串
		                async:false,     // 默认为true-异步请求，false-同步请求（必须执行完$.ajax();才能执行下面的）
		                data:{
		                    'text' : newText,
		                    'id' : tagId
		                }, 
		                type:'GET',
		                success:function(res) {
		            		ret = JSON.parse(res);
		            		if (ret.result == 1) {
		            			popup.iknow("操作成功",function(){
		    						location.href='?r=coupon/list';
		    					});
							}else{
								popup.iknow(ret.desc);
							}
		                },
			            error:function(XMLHttpRequest, textStatus, errorThrown){
			            	popup.iknow(errorThrown);
			            }
		           });

				},'确定2','各来');
			}
		});
	 }

    /**
     * 添加标签
     * @author 	曹俊杰
     */
     function addTag(){
		popup.input('标签内容:',function(){
			// 获取弹出框内输入的内容
			var newText = $('#popup_input_text').val();
	        
	        // 不支持同时打开多个模态框,因此对于模态框上的检查与弹出,请直接用alert
			if(newText.length == 0){
				alert("标签内容不得为空");
				return;
	        }
	        
	        // 先关闭其它所有可能存在的模态框
	        popup.closeAll();
	        $.ajax({
                url: '?r=coupon/copy', // 发送请求的URL字符串
                async:false,     // 默认为true-异步请求，false-同步请求（必须执行完$.ajax();才能执行下面的）
                data:{
                    'text' : newText,
                }, 
                type:'GET',
                success:function(res) {
            		ret = JSON.parse(res);
            		if (ret.result == 1) {
            			popup.iknow("操作成功",function(){
    						location.href='?r=coupon/list';
    					});
					}else{
						popup.iknow(ret.desc);
					}
                },
	            error:function(XMLHttpRequest, textStatus, errorThrown){
	            	popup.iknow(errorThrown);
	            }
           });

		},'确定','添加标签');
     }
</script>
