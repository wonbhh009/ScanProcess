<?php
	use order_limiketang_com\widgets\BreadHeader;
	use order_limiketang_com\widgets\Affix;
	
	$this->params['breadcrumbs'][] = '固定附加层2';
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
	<div class="col-md-4">
		<div class="panel panel-default">
			<?php
				echo '<table class="table table-hover table-bordered">';
				echo '<tr class="active">';
				echo '	<th class="col-md-1">#</th>';
				echo '	<th class="col-md-3 col-md-offset-8">uid</th>';
				echo '</tr>';

				for ($i=0; $i < 100 ; $i++) { 
					echo '<tr>';
					echo '<td>'.($i).'</td>';
					echo '<td></td>';
					echo '</tr>';
				}					
				echo '</table>';
			?>
		</div>
	</div>
	<div class="col-md-offset-6 col-md-2" id="myScrollspy">
        <?php echo Affix::widget(['dropdownList'=>$classList,'liList'=>$liList,'nowDropdown'=>$nowClass,'nowLi'=>$nowLi]);?>
	</div>
</div>

<!-- 加载通过弹出框 -->
<?php 
	
?>

<script type="text/javascript">

</script>
