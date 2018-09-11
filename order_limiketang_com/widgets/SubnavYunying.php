<?php
namespace common\widgets;

use Yii;
class SubnavYunying extends \yii\base\Widget
{
	public $title;

	public function init()
	{
		parent::init();      
	}

	public function run()
	{
		$view = 'subnav_yunying';
		return $this->render($view,[
			'title' => $this->title,
		]);
	}
}
?>