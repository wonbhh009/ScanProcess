<?php
namespace order_limiketang_com\widgets;

class Affix extends \yii\base\Widget
{
	public $dropdownList 	= array();
	public $liList 		= array();
	public $nowDropdown 		= 0;
	public $nowLi 		= 0;

	public function init()
	{
		parent::init();
	}
	public function run()
	{
		parent::run();
		return $this->render('affix',array(
			'dropdownList' 	=> $this->dropdownList,
			'liList' 		=> $this->liList,
			'nowDropdown' 	=> $this->nowDropdown,
			'nowLi' 		=> $this->nowLi,
		));
	}
}
?>
