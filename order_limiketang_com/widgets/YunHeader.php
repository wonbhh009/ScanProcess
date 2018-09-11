<?php
namespace common\widgets;
use Yii;
class YunHeader extends \yii\base\Widget
{
	public $schoolCode;

	public function init()
	{
		parent::init();      
	}

	public function getAddQuestion()
	{
		$schoolCode = $this->schoolCode;
		$addQuestionList = Yii::$app->WorkorderComponent->getOneSchoolOrderList($schoolCode,'3','');
		return $addQuestionList;
	}

	public function getQuestionCount()
	{
		$schoolCode = $this->schoolCode;
		//获取题库增量包的信息
    	$questionCount = Yii::$app->SchoolGoodsService->getServiceDay($schoolCode,4);
    	return $questionCount;
	}

	/**
	 * 获取统计的 教师人数和班级人数
	 */
	public function getTeacherAndClassCount()
	{
		$schoolCode = $this->schoolCode;
		//获取通过审核教师数量
        $teacherInfo = Yii::$app->TeacherInfoService->getTeacherInfoBySchoolCode($schoolCode);
        $countTeacher = !empty($teacherInfo[1]) ? count($teacherInfo[1]) : 0;
        $teacherIdArr = array();
        if (!empty($teacherInfo[1])) {
        	foreach ($teacherInfo[1] as $key => $value) {
        		$teacherIdArr[] = $value['uid'];
        	}
        	//通过老师获取通过的班级
        	$classInfo = Yii::$app->ClassInfoService->getClassByTeacheridArr($teacherIdArr,1);
        	$countClass = !empty($classInfo) ? count($classInfo) : 0;
        }else{
        	$countClass = 0;
        }
        $count = array();
        $count['teacher'] = $countTeacher;
        $count['class'] = $countClass;
        return $count;
	}

	/**
	 * 根据schoolCode获取学校全名
	 * @param  $schoolCode
	 * @author  zhangcong 2016/10/26
	 */
	public function getAllNameBySchoolCode()
	{
		$schoolCode = $this->schoolCode;
		//根据schoolCode查询学校的省 市 区 名称信息
		$school = Yii::$app->SchoolComponent->getSchoolDatum($schoolCode);
		
		return current($school);
	}

	public function run()
	{
		$view = 'yunheader';
		return $this->render($view,[
			'schoolCode' => $this->schoolCode,
			'school' => $this->getAllNameBySchoolCode(),
			'questionCount' => $this->getQuestionCount(),
			'addQuestionList' => $this->getAddQuestion(),
			'count' => $this->getTeacherAndClassCount(),
		]);
	}
}
?>