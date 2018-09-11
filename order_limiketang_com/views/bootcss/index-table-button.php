<?php
	use order_limiketang_com\widgets\BreadHeader;
	
	$this->params['breadcrumbs'][] = '表格-按键与链接';
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
	<div class="col-md-12">
		<div class="panel panel-default" style="font-size:12px">
			<?php
				if (empty($dataList)){
					echo '<div class="panel-body panel-empty"><p>暂无数据</p></div>';
				}else{
					echo '<table class="table table-hover table-bordered">';
					echo '<tr class="active">';
					echo '	<th class="col-md-1">#</th>';
					echo '	<th class="col-md-1">uid</th>';
					echo '	<th class="col-md-1">学生姓名</th>';
					echo '	<th class="col-md-1">手机号</th>';
					echo ' 	<th class="col-md-6">备注</th>';
					echo ' 	<th class="col-md-2">操作</th>';
					echo '</tr>';

					// 表格内每行限单行显示
					$index=0;
					foreach ($dataList as $key => $value) {
						echo '<tr class="rowSingle">';
						echo '<td>'.($index++).'</td>';
						echo '<td>'.$value['uid'].'</td>';
						echo '<td><a href="index.php?r=school/index&scode='.$value['uid'].'" target="_blank">'.$value["name"].'</a></td>';
						echo '<td>'.$value['phone'].'</td>';
						echo '<td>';
						echo '<button data-uid="'.$value['uid'].'" data-name="'.$value["name"].'" class="J_btnEdit btn btn-default btn-sm btn-gap-right">备注</button>';
						echo '<span>'.$value['memo'].'</span>';
						echo '</td>';
						echo '<td>';
						echo '<button data-uid="'.$value['uid'].'" data-name="'.$value["name"].'" class="J_btnNormal btn btn-default btn-sm btn-gap-right">一般操作</button>';
						echo '<button data-uid="'.$value['uid'].'" class="J_btnDel btn btn-danger btn-sm">删除操作</button>';						
						echo '</td>';
						echo '</tr>';
					}					
					echo '</table>';
				}
			?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" style="font-size:12px">
			<?php
				if (empty($dataList)){
					echo '<div class="panel-body panel-empty"><p>暂无数据</p></div>';
				}else{
					echo '<table class="table table-hover table-bordered">';
					echo '<tr class="active">';
					echo '	<th class="col-md-1">#</th>';
					echo '	<th class="col-md-1">uid</th>';
					echo '	<th class="col-md-1">学生信息</th>';
					echo ' 	<th class="col-md-7">备注</th>';
					echo ' 	<th class="col-md-2">操作</th>';
					echo '</tr>';

					// 表格内每行多行显示
					$index=0;
					foreach ($dataList as $key => $value) {
						echo '<tr>';
						echo '<td>'.($index++).'</td>';
						echo '<td>'.$value['uid'].'</td>';
						echo '<td>';
						echo $value['name'].'</br>';
						echo $value['phone'].'</br>';
						echo '非会员';
						echo '</td>';
						echo '<td>';
						echo '<button data-uid="'.$value['uid'].'" data-name="'.$value["name"].'" class="J_btnEdit btn btn-default btn-sm btn-gap-right">备注</button>';
						echo '<span>'.$value['memo'].'</span>';
						echo '</td>';
						echo '<td>';
						echo '<button data-uid="'.$value['uid'].'" data-name="'.$value["name"].'" class="J_btnNormal btn btn-default btn-sm btn-gap-right">一般操作</button>';
						echo '<button id="btnDel'.$index.'" data-uid="'.$value['uid'].'" class="J_btnDel btn btn-danger btn-sm">删除操作</button>';						
						echo '</td>';
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
