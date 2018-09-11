<?php
namespace common\widgets;

class Pager extends \yii\base\Widget
{
	public $pages = array();

	public function init()
	{
		parent::init();
	}
	public function run()
	{
		parent::run();
		return $this->render('pager',array(
			'pages' => $this->pages,
		));
	}
}
?>
