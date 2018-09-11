<?php
	use order_limiketang_com\widgets\BreadHeader;
	
	$this->params['breadcrumbs'][] = '表格-最简样式';
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
	<div class="col-md-12">
		<div class="panel panel-default">
			<?php
				if (empty($dataList)){
					echo '<div class="panel-body panel-empty"><p>暂无数据</p></div>';
				}else{
					echo '<table class="table table-hover table-bordered">';
					echo '<tr class="active">';
					echo '	<th class="col-md-1">#</th>';
					echo '	<th class="col-md-1">uid</th>';
					echo '	<th class="col-md-1">用户来源</th>';
					echo '	<th class="col-md-1">来源详情</th>';
					echo '	<th class="col-md-1">学生姓名</th>';
					echo '	<th class="col-md-1">手机号</th>';
					echo '	<th class="col-md-2">注册时间</th>';
					echo ' 	<th class="col-md-1">备注</th>';
					echo ' 	<th class="col-md-3">操作</th>';
					echo '</tr>';
					$index=0;
					foreach ($dataList as $key => $value) {
						echo '<tr>';
						echo '<td>'.($index++).'</td>';
						echo '<td>'.$value['uid'].'</td>';
						echo '<td>'.$fromTypeList[$value['from_type']].'</td>';
						echo '<td>'.$value['from_company'].'_'.$value['from_user'].'</td>';
						echo '<td>'.$value['name'].'</td>';
						echo '<td>'.$value['phone'].'</td>';
						echo '<td>'.$value['regtime'].'</td>';
						echo '<td>'.$value['memo'].'</td>';
						echo '<td></td>';
						echo '</tr>';
					}					
					echo '</table>';
				}
			?>
		</div>
	</div>
</div>

<!-- 加载通过弹出框 -->
<?php 
	
?>

<script type="text/javascript">

</script>
