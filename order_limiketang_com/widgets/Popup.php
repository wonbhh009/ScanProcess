<?php
namespace order_limiketang_com\widgets;

class Popup extends \yii\base\Widget
{
	public $type;

	public function init()
	{
		parent::init();
		if ($this->type === null) {
            $this->type = 'iknow';
        }
	}
	public function run()
	{
		$view = 'popup_'.$this->type;
		return $this->render($view);
	}
}
?>
