<?php

namespace order_limiketang_com\common\models;

use Yii;

/**
 * This is the model class for table "deduction_voucher_list".
 *
 * @property integer $id
 * @property integer $deduction_id
 * @property string $number
 * @property integer $is_receive
 * @property integer $ctime
 * @property string $ctime_man
 */
class DeductionVoucherList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deduction_voucher_list';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('livevideodb');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deduction_id', 'number', 'ctime', 'ctime_man'], 'required'],
            [['deduction_id', 'is_receive','is_receive', 'ctime'], 'integer'],
            [['ctime_man'], 'safe'],
            [['number'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deduction_id' => 'Deduction ID',
            'number' => 'Number',
            'is_receive' => 'Is Receive',
            'is_use' => 'Is use',
            'ctime' => 'Ctime',
            'ctime_man' => 'Ctime Man',
        ];
    }

    //----------------------------------------------以下为公共方法---------------------------------------------------
    /**
     * 添加抵扣卷
     * @author hanxiaofei
     */
    public function saveData($data){
        $model = new DeductionVoucherList;
        $model->deduction_id    =   $data['deduction_id'];
        $model->number          =   $data['number'];
        $model->is_receive      =   1;
        $model->is_use          =   1;
        $model->ctime           =   time();
        $model->ctime_man       =   date("Y-m-d H:i:s", time());
        $model->save();
        return $model->id;
    }
    //批量插入
    public function batchInser($data){
       $res=Yii::$app->livevideodb->createCommand()->batchInsert(DeductionVoucherList::tableName(),
             ['deduction_id','number','is_receive','is_use','ctime','ctime_man'],$data)->execute();
       return $res;

    }
    /**
     * 获取抵扣卷领取总数
     * @author hanxiaofei
     */
    public function getIsReceiveCount($deduction_id){
         $res= self::find()->where(['and',['deduction_id'=>$deduction_id],['is_receive'=>2]])->count();
         return $res;
    }

    /**
     * 获取一张未领取的抵扣卷
     * @author hanxiaofei
     */
    public function getOneIsReceive($deduction_id){
         $res= self::find()->where(['and',['deduction_id'=>$deduction_id],['is_receive'=>1]])->orderBy(['id'=>SORT_ASC])->asArray()->one();
         return $res;
    }

    /**
     * 获取抵扣卷使用总数
     * @author hanxiaofei
     */
    public function getIsUseCount($deduction_id){
        return self::find()->where(['and',['deduction_id'=>$deduction_id],['is_use'=>2]])->count();
    }

    /**
     * 修改抵扣卷状态
     * @param $id    消息ID
     * @param $data 修改数据
     * @author hanxiaofei
     */
    public function updateStatus($id,$data)
    {
        return self::updateAll($data,['id'=>$id]);
    }

    /**
     * 获取所有抵扣卷列表
     * @author hanxiaofei
     */
    public function getDeducVoucherList($page=1,$pageSize=20,$deduction_id=0){
        $pages = ($page - 1) * $pageSize;
        if(empty($deduction_id)){
          return self::find()->offset($pages)->limit($pageSize)->orderBy(['id'=>SORT_ASC])->asArray()->all();  
      }else{
        return self::find()->where(['deduction_id'=>$deduction_id])->offset($pages)->limit($pageSize)->orderBy(['id'=>SORT_ASC])->asArray()->all();  
        }
    }

    /**
     * 删除抵扣卷
     * @param  $id  抵扣卷id
     * @author hanxiaofei
     */
    public function delDeducList($deduction_id){
        return self:: deleteAll(['deduction_id'=>$deduction_id]);//删除id为这些的数据  
    }

}
