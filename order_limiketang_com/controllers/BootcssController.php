<?php

namespace order_limiketang_com\controllers;

use Yii;

class BootcssController extends \yii\web\Controller
{
    /**
     * 基本页面结构
     *
     * @author 曹俊杰
     */
    public function actionIndexStru()
    {
        return $this->render('index-stru');
    }
    /**
     * 基本页面结构-导航区
     *
     * @author 曹俊杰
     */
    public function actionIndexStruPageheader()
    {
        $projects = [
            'yunying',
            'yun',
            'tiku'
        ];

        return $this->render('index-stru-pageheader',array(
            'projects' => $projects,
        ));
    }
    /**
     * 基本页面结构-操作区
     *
     * @author 曹俊杰
     */
    public function actionIndexStruControl()
    {
        return $this->render('index-stru-control');
    }    
    // =================================================================================================================================

    /**
     * 表格-简单样式
     * 参数传递
     *
     * @author 曹俊杰
     */
    public function actionIndexTableSimple()
    {

        // 模拟数据
        $dataList = [
            [ 
                'uid'           => 221,
                'from_type'     => 0,
                'from_company'  => "",
                'from_user'     => "",
                'name'          => "朱俊芳",
                'phone'         => "17803296696",
                'regtime'       => "2017-12-07",
                'memo'          => "备注内容",
            ],
            [
                'uid'           => 222,
                'from_type'     => 1,
                'from_company'  => "大同门店",
                'from_user'     => "何生",               
                'name'          => "许晓敏",
                'phone'         => "13626718980",
                'regtime'       => "2017-12-11",
                'memo'          => "没打过电话",
            ],
            [
                'uid'           => 223,
                'from_type'     => 7,
                'from_company'  => "",
                'from_user'     => "13910839867",                
                'name'          => "闫娥",
                'phone'         => "13789588217",
                'regtime'       => "2017-12-12",
                'memo'          => "",
            ]                         
        ];

        // 用户来源描述
        $fromTypeList = [
            0=>"狸米学习",
            1=>"总部录入",
            2=>"门店录入",
            3=>"主动申请-官网",
            4=>"主动申请-APP",
            5=>"主动申请-公众号",
            6=>"主动申请-狸米学习",
            7=>"转介绍-CC",
        ];

        return $this->render('index-table-simple',array(
            'dataList'      => $dataList,
            'fromTypeList'  => $fromTypeList,
        ));
    }

    /**
     * 表格-按键与链接
     * 参数传递
     *
     * @author 曹俊杰
     */
    public function actionIndexTableButton()
    {

        // 模拟数据
        $dataList = [
            [ 
                'uid'           => 221,
                'from_type'     => 0,
                'from_company'  => "",
                'from_user'     => "",
                'name'          => "朱俊芳",
                'phone'         => "17803296696",
                'regtime'       => "2017-12-07",
                'memo'          => "备注内容",
            ],
            [
                'uid'           => 222,
                'from_type'     => 1,
                'from_company'  => "大同门店",
                'from_user'     => "何生",               
                'name'          => "许晓敏",
                'phone'         => "13626718980",
                'regtime'       => "2017-12-11",
                'memo'          => "没打过电话",
            ],
            [
                'uid'           => 223,
                'from_type'     => 7,
                'from_company'  => "",
                'from_user'     => "13910839867",                
                'name'          => "闫娥",
                'phone'         => "13789588217",
                'regtime'       => "2017-12-12",
                'memo'          => "",
            ]                         
        ];

        // 用户来源描述
        $fromTypeList = Yii::$app->params['payTypeList'];

        return $this->render('index-table-button',array(
            'dataList'      => $dataList,
            'fromTypeList'  => $fromTypeList,
        ));
    }
    /**
     * 表格-弹框
     * 参数传递
     *
     * @author 曹俊杰
     */
    public function actionIndexTablePopup()
    {
        // 模拟数据
        $dataList = [
            [ 
                'id'    => 221,
                'tag'   => "孩子上初中了",
                'count' => 12,
            ],
            [
                'id'    => '',
                'tag'   => "没设备",
                'count' => 0,
            ],
            [
                'id'    => 223,
                'tag'   => "直接拒绝",
                'count' => 0,
            ],                                     
        ];        

        return $this->render('index-table-popup',array(
            'dataList' => $dataList,
        ));
    }    
    
    // =================================================================================================================================

    /**
     * 表单
     *
     * @author 曹俊杰
     */
    public function actionIndexForm()
    {
        return $this->render('index-form');
    }

    /**
     * 固定附加栏1
     *
     * @author 曹俊杰
     */
    public function actionIndexAffix1()
    {
        $nowClass = Yii::$app->request->get('nowclass',1);
        $nowLi  = Yii::$app->request->get('nowli',1);

        return $this->render('index-affix1',array(
            'classList' => $this->getClassList(),
            'nowClass'  => $nowClass,
            'liList'  => $this->getliList(),
            'nowLi'   => $nowLi,
        ));     
    }
    /**
     * 固定附加栏2
     *
     * @author 曹俊杰
     */
    public function actionIndexAffix2()
    {
        $nowClass = Yii::$app->request->get('nowclass',1);
        $nowLi  = Yii::$app->request->get('nowli',1);

        return $this->render('index-affix2',array(
            'classList' => $this->getClassList(),
            'nowClass'  => $nowClass,
            'liList'  => $this->getliList(),
            'nowLi'   => $nowLi,
        ));    
    } 
    /**
     * 获取班级列表
     */
    private function getClassList(){
        
        // 班级列表
        $classList = [
            0=>'一班',
            1=>'二班',
            2=>'三班',
            3=>'四班',
            4=>'五班',
            5=>'六班',
        ];

        return $classList;
    }
    /**
     * 获取链接数组
     */
    private function getliList(){
        
        // 操作列表
        $liList = [
            1=>['固定附加栏1','?r=bootcss/index-affix1&nowclass=1&nowli=1'],
            2=>['固定附加栏2','?r=bootcss/index-affix2&nowclass=1&nowli=2'],
            3=>['表格-弹出框','?r=bootcss/index-table-popup']
        ];

        return $liList;
    }    
}
