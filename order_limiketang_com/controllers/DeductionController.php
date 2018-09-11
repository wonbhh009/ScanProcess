<?php

namespace order_limiketang_com\controllers;

use Yii;
use order_limiketang_com\common\models\Deduction;
use order_limiketang_com\common\components\DeductionComponent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use order_limiketang_com\common\models\DeductionVoucherList;
use order_limiketang_com\common\components\DeductionVoucherListComponent;
use order_limiketang_com\common\components\DiscountHistoryComponent;

/**
 * StoreController implements the CRUD actions for Store model.
 */
class DeductionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * Lists all Store models.
     * @return mixed
     */
    public function actionIndex()
    {
        $app=Yii::$app;
        $re=$app->request->get('re','');
        $DeduCom = new DeductionComponent();
        if(!empty($re)&&$re==='res'){
        $de_name=$app->request->get('dkjname','');
        $de_grade=$app->request->get('grade','');
        $de_type=$app->request->get('typelist','');
        $de_status=$app->request->get('stautsList','');
        $data=[
                'de_name'        =>   $de_name,
                'de_type'        =>   $de_type,
                'de_grade'       =>   $de_grade,
                'de_status'       =>  $de_status,
        ];
           $dataProvider = $DeduCom->getListByCondition($data);
        }else{
           $dataProvider = $DeduCom->getDeducList();   
        }
       foreach ($dataProvider as $key => $value) {
        if($value['de_stime']<>0){
            $dataProvider[$key]['de_yxq']='固定日期'.date('Y-m-d',$value['de_stime']).'至'.date('Y-m-d',$value['de_etime']);
        }
        if($value['de_day']<>0){
            $dataProvider[$key]['de_yxq']='领取后生效,有效期'.$value['de_day'].'天';
        }
       switch ($value['de_status']) {
            case '1':
                $dataProvider[$key]['de_ty']='未生效';
                $dataProvider[$key]['de_sx']='生效';
                break;
            case '2':
                $dataProvider[$key]['de_ty']='已生效';
                $dataProvider[$key]['de_sx']='废除';
                break;
            case '3':
                $dataProvider[$key]['de_ty']='已过期';
                $dataProvider[$key]['de_sx']='已过期';
                break;
            case '4':
                $dataProvider[$key]['de_ty']='已废除';
                $dataProvider[$key]['de_sx']='已废除';
                break;    
            default:
                # code...
                break;
            }
        $DeduList = new DeductionVoucherListComponent();
        $lql=$DeduList->getIsReceiveCount($value['de_batch']);//领取张数
        $syzs=$DeduList->getIsUseCount($value['de_batch']);//使用张数
        $dataProvider[$key]['syl']=$value['de_count']-$lql;//剩余量
        if($value['de_count']==0){
          $ls=0;
        }else{
          $ls=($lql/$value['de_count'])*100; //领取百分比 
        }
        if($lql==0){
          $sy=0;  
        }else{
          $s=($syzs/$lql);
          $sy=substr($s, 0,6) *100;//使用百分比
        }
        $dataProvider[$key]['lqv']= $ls.'%';
        $dataProvider[$key]['sybfb']= $sy.'%';
        }
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    //搜索 因JQ问题废弃
    public function actionResarch()
    {
        $app=Yii::$app;
        $de_name=$app->request->get('dkjname','');
        $de_grade=$app->request->get('grade','');
        $de_type=$app->request->get('typelist','');
        $de_status=$app->request->get('stautsList','');
        $data=[
                'de_name'        =>   $de_name,
                'de_type'        =>   $de_type,
                'de_grade'       =>   $de_grade,
                'de_status'       =>  $de_status,
        ];

        $DeduCom = new DeductionComponent();
        $dataProvider = $DeduCom->getListByCondition($data);
        foreach ($dataProvider as $key => $value) {
        if($value['de_stime']<>0){
            $dataProvider[$key]['de_yxq']='固定日期'.date('Y-m-d',$value['de_stime']).'至'.date('Y-m-d',$value['de_etime']);
        }
        if($value['de_day']<>0){
            $dataProvider[$key]['de_yxq']='领取后生效,有效期'.$value['de_day'].'天';
        }
        switch ($value['de_status']) {
            case '1':
                $dataProvider[$key]['de_ty']='未生效';
                $dataProvider[$key]['de_sx']='生效';
                break;
            case '2':
                $dataProvider[$key]['de_ty']='已生效';
                $dataProvider[$key]['de_sx']='废除';
                break;
            case '3':
                $dataProvider[$key]['de_ty']='已过期';
                $dataProvider[$key]['de_sx']='已过期';
                break;
            case '4':
                $dataProvider[$key]['de_ty']='已废除';
                $dataProvider[$key]['de_sx']='已废除';
                break;      
            default:
                # code...
                break;
            }
        $DeduList = new DeductionVoucherListComponent();
        $lql=$DeduList->getIsReceiveCount($value['de_batch']);//领取张数
        $syzs=$DeduList->getIsUseCount($value['de_batch']);//使用张数
        $dataProvider[$key]['syl']=$value['de_count']-$lql;//剩余量
        if($value['de_count']==0){
          $ls=0;
        }else{
          $ls=($lql/$value['de_count'])*100; //领取百分比 
        }
        if($lql==0){
          $sy=0;  
        }else{
          $sy=($syzs/$lql)*100;//使用百分比
        }
        $dataProvider[$key]['lqv']= $ls.'%';
        $dataProvider[$key]['sybfb']= $sy.'%';
        }
        return $this->renderPartial('update',['dataProvider' => $dataProvider,]);
    }

    //添加抵扣卷页面
    public function actionCreate()
    {
        return $this->render('create');
    }

    //抵扣卷历史记录
    public function actionHistory()
    {
        $his= new DiscountHistoryComponent();
        $dataProvider=$his->getHistoryList();
        return $this->render('history',[
            'dataProvider' => $dataProvider,
        ]);
    }

    //添加抵扣卷方法
    public function actionAdd(){
     if (Yii::$app->request->isPost) {
            $de_name=Yii::$app->request->post('dkjname');
            $de_yx_name=Yii::$app->request->post('yxjname');
            $de_type=Yii::$app->request->post('buytype');
            $de_grade=Yii::$app->request->post('usegrade');
            $de_store=Yii::$app->request->post('onlystore');
            $de_class=Yii::$app->request->post('onlyclass');
            $de_count=Yii::$app->request->post('number');
            $de_full=Yii::$app->request->post('jmmoney');
            $de_money=Yii::$app->request->post('dkmoney');
            $de_stime=Yii::$app->request->post('beginDate');
            if($de_stime){
                $de_stime=strtotime($de_stime);  
            }else{
                $de_stime=0;
            }
            $de_etime=Yii::$app->request->post('endDate');
            if($de_etime){
                $de_etime=strtotime($de_etime);  
            }else{
                $de_etime=0;
            }
            $de_day=Yii::$app->request->post('lqts');
            $de_contiue=Yii::$app->request->post('cflq');
            $de_remark=Yii::$app->request->post('ramark');
            $data=[
                'de_name'        =>   $de_name,
                'de_yx_name'     =>   $de_yx_name,
                'de_type'        =>   $de_type,
                'de_grade'       =>   $de_grade,
                'de_store'       =>   $de_store,
                'de_class'       =>   $de_class,
                'de_count'       =>   $de_count,
                'de_full'        =>   $de_full,
                'de_money'       =>   $de_money,
                'de_stime'       =>   $de_stime,
                'de_etime'       =>   $de_etime,
                'de_day'         =>   $de_day,
                'de_contiue'     =>   $de_contiue,
                'de_remark'      =>   $de_remark,
                'de_admin'       =>   '123',  //需要权限
                'de_admin_name'  =>   '韩笑菲', //需要权限
            ];
            $Hisdata=[
                'admin_id' => '123',
                'admin_name' => '韩笑菲',
                'module_id' => 3,
                'remark'=> '添加抵扣卷,抵扣卷名称:'.$de_name.'营销名称:'.$de_yx_name.'发行数量:'.$de_count.'抵扣卷金额:'.$de_money,
                'discount_name'=> $de_name,
            ];
            $DeduCom = new DeductionComponent();
            $DisHistory = new DiscountHistoryComponent();
            $batch=$DeduCom->getDeducBatch();
            if($batch==''){
              $data['de_batch']='100000';  
            }else{
              $data['de_batch']=$batch+1; 
            }
            $res = $DeduCom->saveData($data);
            if($res){
                $this->cre($data['de_batch'],$data['de_count']);
                $DisHistory->saveData($Hisdata);
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }

    //处理抵扣卷数量
    public function cre($id,$num){
        $sa=0;
        $sw=0;
        $gw=0;
        if($num>10000){
           $sa=$num/10000;
           $ss = explode(".",$sa);
           $sw=$ss[0];
           $ss[1]='0.'.$ss[1];
           $gw=$ss[1]*10000;
        }else{
            $gw=$num;
        }
       $res = $this->createDeduc($id,$sw,$gw);
       return $res;
    }

    //生成抵扣卷
    public function createDeduc($id,$sw=0,$gw=0){
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        if($sw>0){
            for($k=0;$k<$sw;$k++){
                for($i =0;$i<10000;$i++){
                    $password='';
                    for ($j=0; $j < 9 ; $j++) { 
                        $password .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
                    }
                    $list=[$id,$id.$password,1,1,time(),date("Y-m-d H:i:s", time())];
                    $passlist[$i]=$list;
                }
            $DeduList = new DeductionVoucherListComponent();
            $res = $DeduList->batchInser($passlist);  
            }
        }
        if($gw>0){
                for($i =0;$i<$gw;$i++){
                    $password='';
                    for ($j=0; $j < 9 ; $j++) { 
                        $password .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
                    }
                    $lists=[$id,$id.$password,1,1,time(),date("Y-m-d H:i:s", time())];
                    $passlists[$i]=$lists;
                }
             $DeduList = new DeductionVoucherListComponent();
             $res = $DeduList->batchInser($passlists);      
        }
        return $res;
    }



    //修改抵扣卷状态
    public function actionUpdate()
    {
        $app=Yii::$app;
        $id=$app->request->get('id','');
        $stauts=$app->request->get('stauts','');
        $ms='';
        switch ($stauts) {
            case '1':
                $data=['de_status'=>2];
                $ms='修改抵扣卷状态，从 未生效 状态 修改为 生效';
                break;
            case '2':
                $data=['de_status'=>4];
                $ms='修改抵扣卷状态，从 生效 状态 修改为 废除';
                break;
            default:
                break;
        }
        $Hisdata=[
                'admin_id' => '123',
                'admin_name' => '韩笑菲',
                'module_id' => 3,
                'remark'=> $ms,
                'discount_name'=> '抵扣卷管理，抵扣卷编号：'.$id,
            ];
        $DeduCom = new DeductionComponent();
        $DisHistory = new DiscountHistoryComponent();
        $batch=$DeduCom->updateStatus($id,$data);
        if($batch){
            $DisHistory->saveData($Hisdata);
        }
        return $batch;
    }

    //分享页面
    public function actionShare()
    {
        $app=Yii::$app;
        $id=$app->request->get('id');
        $deucList=new DeductionVoucherList();
        $DeduCom = new DeductionComponent();
        $name=$DeduCom->getOneDeduc($id);
        if($name['de_status']==2){
            $data=$deucList->getOneIsReceive($id);
            if($data){
                $da=['is_receive'=>2];
                $deucList->updateStatus($data['id'],$da);
            }else{
                $data['number']='该抵扣卷已经发完了';
            }  
        }else{
            $data['number']='该抵扣卷尚未激活,请激活后发放';
        }
       
        return $this->render('share',[
            'data' => $data,
            'names'=> $name,
        ]);
    }
}
