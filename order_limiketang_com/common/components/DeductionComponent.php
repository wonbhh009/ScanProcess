<?php
namespace order_limiketang_com\common\components;
use Yii;
use order_limiketang_com\common\models\Deduction;

class DeductionComponent
{
    /**
     * 添加抵扣卷数据
     * @param $data 抵扣卷数据
     * @author hanxaifei
     */
    public  function saveData($data){
        $verObject = new Deduction();
        $res=$verObject->saveData($data);
        return $res;
    }

    /**
     * 更新抵扣卷状态
     * @param $id 抵扣卷id 
     * @param $data 更新数据
     * @author hanxaifei
     */
    public function updateStatus($id,$data){
        $verObject = new Deduction();
        $res=$verObject->updateStatus($id,$data);
        return $res;
    }

    /**
     * 获取抵扣卷列表
     * @param $id 抵扣卷id 
     * @author hanxaifei
     */
    public function getDeducList($page=1,$pageSize=20){
        $verObject = new Deduction();
        $res=$verObject->getDeducList($page=1,$pageSize=20);
        return $res;
    }

    /**
     * 获取一张抵扣卷名称
     * @param $id 抵扣卷id 
     * @author hanxaifei
     */
    public function getOneDeduc($deduction_id){
        $verObject = new Deduction();
        $res=$verObject->getOneDeduc($deduction_id);
        return $res;
    }

    /**
     * 获取抵扣卷搜索列表
     * @param $id 抵扣卷id 
     * @author hanxaifei
     */
    public function getListByCondition($data){
        $verObject = new Deduction();
        $res=$verObject->getListByCondition($data);
        return $res;
    }

    /**
     * 获取抵扣卷最大批次
     * @param $id 抵扣卷id 
     * @author hanxaifei
     */
    public function getDeducBatch(){
        $verObject = new Deduction();
        $res=$verObject->getDeducBatch();
        return $res;
    }

}