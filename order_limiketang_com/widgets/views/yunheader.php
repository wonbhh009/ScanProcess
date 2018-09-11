<!-- 页头导航, 页面调控 -->
<div class="page-header">
    <div class="row">
        <div class="col-md-10">
            <h3 class="schoolname"><?php echo $school['province']." ".$school['city']." ".$school['area']." ".$school['school']."(".$school['scode'].")";?></h3>
        </div>       
    </div>
</div>
<!--页签区-->
<div style="margin-bottom: 40px;">
  	<ul class="nav nav-tabs" role="tablist">
        <li role="presentation" id="info">
            <a href="?r=school/info&schoolCode=<?=$schoolCode?>">基本信息</a>
        </li>
        <li role="presentation" id="manager">
            <a href="?r=school/manager&schoolCode=<?=$schoolCode?>">校方管理员</a>
        </li>
        <li role="presentation" id="term">
            <a href="?r=school/term&schoolCode=<?=$schoolCode?>">选定学期</a>
        </li>
        <li role="presentation" id="course">
            <a href="?r=school/course&schoolCode=<?=$schoolCode?>">选定课时</a>
        </li>        
        <li role="presentation" id="teacher">
            <a href="?r=school/teacher&schoolCode=<?=$schoolCode?>">选定教师(<?=$count['teacher']?>)</a>
        </li>
        <li role="presentation" id="class">
            <a href="?r=school/class&schoolCode=<?=$schoolCode?>">选定班级(<?=$count['class']?>)</a>
        </li>
        <li role="presentation" id="basic">
            <a href="?r=school/index&schoolCode=<?=$schoolCode?>">服务购买</a>
        </li>    
    	<li role="presentation" id="shot">
    	   <a href="?r=school/shot-service&schoolCode=<?=$schoolCode?>">
        	<?php
                echo '校本定制(';
                echo empty($addQuestionList['ordercount']) ? 0 : $addQuestionList['ordercount']; 
                echo'/';
            	if (empty($questionCount[0])) {
            	 	echo 0;
            	}else{ 
            		echo ($questionCount[0]['on_off'] == 0) ? 0 :$questionCount[0]['question_count'];
            	}
                echo ')';
        	?>
    	</a>
    	</li>
    	<li role="presentation" id="active">
            <a href="?r=school/active&schoolCode=<?=$schoolCode?>">学生活跃</a>
        </li>
        <li role="presentation" id="dule">
            <a href="?r=school/dule&schoolCode=<?=$schoolCode?>">教学进度</a>
        </li>
	</ul>
</div>