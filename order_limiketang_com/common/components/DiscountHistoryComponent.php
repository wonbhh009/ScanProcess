<?php
namespace order_limiketang_com\common\components;
use Yii;
use order_limiketang_com\common\models\DiscountHistory;

class DiscountHistoryComponent
{
    /**
     * 添加抵扣卷历史记录
     * @param $data 抵扣卷数据
     * @author hanxaifei
     */
    public  function saveData($data){
        $verObject = new DiscountHistory();
        $res=$verObject->saveData($data);
        return $res;
    }

     /**
     * 获取历史列表
     * @author hanxiaofei
     */
    public function getHistoryList($page=1,$pageSize=100){
        $verObject = new DiscountHistory();
        $res=$verObject->getHistoryList();
        return $res;
    }
}