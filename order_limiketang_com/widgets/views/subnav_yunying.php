<?php
// 运营系统,子导航
use common\extensions\support\ToolsAuth;
use common\extensions\support\ToolsDate;

?>


<!-- 销售统计 -->
<?php if (ToolsAuth::checkModule('channel_sale_count')){?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
            <li id="tab_index" class=""><a href="?r=teacher-credit-count/index">概览</a></li>
            <li id="tab_day" class=""><a href="?r=teacher-credit-count/by-date">逐日统计</a></li>
            <li id="tab_today" class=""><a href="?r=teacher-credit-log/index-by-student-pay&status=-1&lmcode=0&showmode=1&joined=0&hide=0&begin=<?=ToolsDate::today()?>">当日购买</a></li>
            <li id="tab_month" class=""><a href="?r=teacher-credit-count/by-month">逐月统计</a></li>           
            <li id="tab_hour" class=""><a href="?r=teacher-credit-count/by-hour">全天按小时分布</a></li>
            <li id="tab_teacher" class=""><a href="?r=teacher-credit-count/by-teacher&t=<?=strtotime(ToolsDate::now())?>">按老师统计</a></li>
            <li id="tab_school" class=""><a href="?r=teacher-credit-count/by-school">按学校统计</a></li>         
        </ul>
    </div>
</nav>
<?php 
    }else{
    if (ToolsAuth::checkModule('channel_sale_search')){
?>
    <!-- 销售查询 -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right">
                <li class=""><a href="?r=teacher-credit-count/index">概览</a></li>
                <li class="active"><a href="?r=teacher-credit-count/by-school">按学校统计</a></li>           
            </ul>
        </div>
    </nav>
<?php }} ?>


<div class="page-header">
  <h1><?=$title?></h1>
</div>