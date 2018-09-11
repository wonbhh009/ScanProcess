<?php
	use order_limiketang_com\widgets\BreadHeader;
	use order_limiketang_com\widgets\Affix;
	
	$this->params['breadcrumbs'][] = '固定附加层1';
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

				for ($i=0; $i < 100 ; $i++) { 
					echo '<tr>';
					echo '<td>'.($i).'</td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '</tr>';
				}					
				echo '</table>';
			?>
		</div>
	</div>
</div>

	<div id="myScrollspy">
        <?php echo Affix::widget(['dropdownList'=>$classList,'liList'=>$liList,'nowDropdown'=>$nowClass,'nowLi'=>$nowLi]);?>
	</div>

<!-- 加载通过弹出框 -->
<?php 
	
?>

<script type="text/javascript">

</script>
