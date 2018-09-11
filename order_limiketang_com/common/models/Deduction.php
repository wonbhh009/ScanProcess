<?php

namespace order_limiketang_com\common\models;

use Yii;

/**
 * This is the model class for table "deduction".
 *
 * @property integer $id
 * @property string $de_name
 * @property string $de_yx_name
 * @property integer $de_type
 * @property integer $de_grade
 * @property string $de_store
 * @property string $de_class
 * @property integer $de_count
 * @property string $de_full
 * @property string $de_money
 * @property integer $de_stime
 * @property integer $de_etime
 * @property integer $de_day
 * @property integer $de_contiue
 * @property string $de_remark
 * @property integer $de_get
 * @property integer $de_use
 * @property integer $de_status
 * @property integer $de_ctime
 */
class Deduction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deduction';
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
            [['de_type', 'de_grade', 'de_count', 'de_stime', 'de_etime', 'de_day', 'de_contiue', 'de_get', 'de_use', 'de_status', 'de_ctime'], 'integer'],
            [['de_full', 'de_money'], 'number'],
            [['de_name', 'de_yx_name'], 'string', 'max' => 50],
            [['de_store', 'de_class', 'de_remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'de_batch' => 'De Batch',
            'de_name' => 'De Name',
            'de_yx_name' => 'De Yx Name',
            'de_type' => 'De Type',
            'de_grade' => 'De Grade',
            'de_store' => 'De Store',
            'de_class' => 'De Class',
            'de_count' => 'De Count',
            'de_full' => 'De Full',
            'de_money' => 'De Money',
            'de_stime' => 'De Stime',
            'de_etime' => 'De Etime',
            'de_day' => 'De Day',
            'de_contiue' => 'De Contiue',
            'de_remark' => 'De Remark',
            'de_get' => 'De Get',
            'de_use' => 'De Use',
            'de_status' => 'De Status',
            'de_admin'=> 'De Admin',
            'de_admin_name'=> 'De Admin Name',
            'de_ctime' => 'De Ctime',
        ];
    }
//----------------------------------------------以下为公共方法---------------------------------------------------
    /**
     * 添加抵扣卷信息
     * @author hanxiaofei
     */
    public function saveData($data){
        $model = new Deduction;
        $model->de_batch        =   $data['de_batch'];
        $model->de_name         =   $data['de_name'];
        $model->de_yx_name      =   $data['de_yx_name'];
        $model->de_type         =   $data['de_type'];
        $model->de_grade        =   $data['de_grade'];
        $model->de_store        =   $data['de_store'];
        $model->de_class        =   $data['de_class'];
        $model->de_count        =   $data['de_count'];
        $model->de_full         =   $data['de_full'];
        $model->de_money        =   $data['de_money'];
        $model->de_stime        =   $data['de_stime'];
        $model->de_etime        =   $data['de_etime'];
        $model->de_day          =   $data['de_day'];
        $model->de_contiue      =   $data['de_contiue'];
        $model->de_remark       =   $data['de_remark'];   
        $model->de_get          =   0;  
        $model->de_use          =   0;  
        $model->de_status       =   1;  
        $model->de_admin        =   $data['de_admin'];   
        $model->de_admin_name   =   $data['de_admin_name']; 
        $model->de_ctime        =   time();
        $model->save();
        return $model->id;
    }

    /**
     * 获取抵扣卷列表
     * @author hanxiaofei
     */
    public function getDeducList($page=1,$pageSize=20){
        $pages = ($page - 1) * $pageSize;
        return self::find()->offset($pages)->limit($pageSize)->orderBy(['id'=>SORT_ASC])->asArray()->all();
    }

    /**
     * 获取一个抵扣卷名称
     * @author hanxiaofei
     */
    public function getOneDeduc($deduction_id){
        $res= self::find()->where(['de_batch'=>$deduction_id])->orderBy(['id'=>SORT_ASC])->asArray()->one();
        return $res;
    }

   /**
     * 抵扣卷查询列表
     * @author hanxiaofei
     */
    public function getListByCondition($data){
      if(empty($data['de_name'])){
           $ar='';
        }else{
           $ar= ['like','de_name',$data['de_name']];  
        }
        if(empty($data['de_grade'])&&empty($data['de_type'])&&empty($data['de_status'])){
            $arr=['and','1=1'];
        }else if($data['de_status']){
            $arr=['and',['de_grade'=>$data['de_grade']],['de_type'=>$data['de_type']],['de_status'=>$data['de_status']]];
        }else{
             $arr=['and',['de_grade'=>$data['de_grade']],['de_type'=>$data['de_type']]];
        }
        return self::find()->where($ar)->andwhere($arr)->asArray()->orderBy(['id'=>SORT_ASC])->all();
       
    }

    /**
     * 删除抵扣卷
     * @param  $id  抵扣卷id
     * @author hanxiaofei
     */
    public function delDeduc($id){
        return self:: deleteAll(' id in('.$id.')');//删除id为这些的数据  
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
     * 获取抵扣卷总数
     * @author hanxiaofei
     */
    public function getDeducCount(){
        return self::find()->count();
    }

    /**
     * 获取抵扣卷最大批次
     * @author hanxiaofei
     */
    public function getDeducBatch(){
        return self::find()->max('de_batch');
    }
}
