<?php

namespace order_limiketang_com\common\models;

use Yii;

/**
 * This is the model class for table "discount_history".
 *
 * @property integer $id
 * @property integer $admin_id
 * @property string $admin_name
 * @property integer $module_id
 * @property string $remark
 * @property integer $ctime
 * @property string $ctime_man
 * @property string $discount_name
 */
class DiscountHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discount_history';
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
            [['admin_id', 'admin_name', 'module_id', 'remark', 'ctime', 'ctime_man'], 'required'],
            [['admin_id', 'module_id', 'ctime'], 'integer'],
            [['ctime_man'], 'safe'],
            [['admin_name'], 'string', 'max' => 50],
            [['remark', 'discount_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => 'Admin ID',
            'admin_name' => 'Admin Name',
            'module_id' => 'Module ID',
            'remark' => 'Remark',
            'ctime' => 'Ctime',
            'ctime_man' => 'Ctime Man',
            'discount_name' => 'Discount Name',
        ];
    }

    //----------------------------------------------以下为公共方法---------------------------------------------------
    /**
     * 添加历史记录信息
     * @author hanxiaofei
     */
    public function saveData($data){
        $model = new DiscountHistory;
        $model->admin_id        =   $data['admin_id'];
        $model->admin_name      =   $data['admin_name'];
        $model->module_id       =   $data['module_id'];
        $model->remark          =   $data['remark'];
        $model->ctime           =   time();;
        $model->ctime_man       =   date("Y-m-d H:i:s", time());
        $model->discount_name   =   $data['discount_name'];
        $model->save();
        return $model->id;
    }

    /**
     * 获取历史列表
     * @author hanxiaofei
     */
    public function getHistoryList($page=1,$pageSize=100){
        $pages = ($page - 1) * $pageSize;
        return self::find()->where(['module_id'=>3])->offset($pages)->limit($pageSize)->orderBy(['id'=>SORT_ASC])->asArray()->all();  
    }
}
