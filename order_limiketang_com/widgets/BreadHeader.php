<?php
namespace order_limiketang_com\widgets;

class BreadHeader extends \yii\base\Widget
{
	public function init()
	{
		parent::init();
	}
	public function run()
	{
		return $this->render('breadheader');
	}
}
?>
