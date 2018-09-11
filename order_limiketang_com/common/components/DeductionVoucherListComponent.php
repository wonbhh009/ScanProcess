<?php
namespace order_limiketang_com\common\components;
use Yii;
use order_limiketang_com\common\models\DeductionVoucherList;

class DeductionVoucherListComponent
{
    /**
     * 批量添加抵扣卷数据
     * @param $data 抵扣卷数据
     * @author hanxaifei
     */
    public  function batchInser($data){
        $verObject = new DeductionVoucherList();
        $res=$verObject->batchInser($data);
        return $res;
    }

    /**
     * 获取抵扣券领取数量
     * @param $id 抵扣卷id 
     * @param $data 更新数据
     * @author hanxaifei
     */
    public function getIsReceiveCount($deduction_id){
        $verObject = new DeductionVoucherList();
        $res=$verObject->getIsReceiveCount($deduction_id);
        return $res;
    }

    /**
     * 获取抵扣卷使用数量
     * @param $id 抵扣卷id 
     * @param $data 更新数据
     * @author hanxaifei
     */
    public function getIsUseCount($deduction_id){
        $verObject = new DeductionVoucherList();
        $res=$verObject->getIsUseCount($deduction_id);
        return $res;
    }

    /**
     * 更新抵扣卷状态
     * @param $id 抵扣卷id 
     * @param $data 更新数据
     * @author hanxaifei
     */
    public function updateStatus($id,$data){
        $verObject = new DeductionVoucherList();
        $res=$verObject->updateStatus($id,$data);
        return $res;
    }

    /**
     * 获取抵扣卷列表
     * @param $id 抵扣卷id 
     * @author hanxaifei
     */
    public function getDeducVoucherList($page=1,$pageSize=20,$deduction_id=0){
        $verObject = new DeductionVoucherList();
        $res=$verObject->getDeducVoucherList($page=1,$pageSize=20,$deduction_id);
        return $res;
    }

    /**
     * 删除抵扣卷
     * @param $deduction_id deduction_id 
     * @author hanxaifei
     */
    public function delDeducList($deduction_id){
        $verObject = new DeductionVoucherList();
        $res=$verObject->delDeducList($deduction_id);
        return $res;
    }

    /**
     * 获取一条未使用的抵扣卷
     * @param $deduction_id deduction_id 
     * @author hanxaifei
     */
    public function getOneIsReceive($deduction_id){
        $verObject = new DeductionVoucherList();
        $res=$verObject->getOneIsReceive($deduction_id);
        return $res;
    }

}