<?php
    use order_limiketang_com\widgets\BreadHeader;
    
	$this->params['breadcrumbs'][] = '基本页面结构-导航区';
?>

<!-- 页头导航, 页面调控 -->
<div class="page-header">
    <div class="row">
        <div class="col-md-8">
            <h3><?php echo BreadHeader::widget()?></h3>
        </div>
        <div class="col-md-2">
            <select id="project" class="form-control" onchange="reload()">
                <option selected>全部</option>'
                <?php
                    foreach ($projects as $key => $value) {
                        if ($value == $project){
                            echo '<option selected>'.$value.'</option>';
                        }else{
                            echo '<option>'.$value.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <a href="?r=project-role/new-user" class="btn btn-default btn-block">添加内部用户</a>
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
				if (empty($logList)){
					echo '<div class="panel-body panel-empty"><p>暂无数据</p></div>';
				}else{
					// 要输出的表格
				}
			?>
		</div>
	</div>
</div>

<!-- 加载通用弹出框 -->
<?php 

?>

<!-- js/ajax -->
<script type="text/javascript">

</script>
