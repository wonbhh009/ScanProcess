<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    if (count($this->params['breadcrumbs'])>1){
        foreach ($this->params['breadcrumbs'] as $key => $value) {
            if ($key>0 && $key<count($this->params['breadcrumbs'])){
                echo '<span style="font-family:arial;color:#ccc;padding:0 8px;">/</span>';
            }
            if (is_array($value)){
                if (isset($value['url'])){
                    echo Html::a($value['label'],Url::to($value['url']));
                }else{
                    echo '<span style="font-weight:100;color:#777">'.$value['label'].'</span>';
                }                           
            }else{
                echo '<span style="font-weight:100;color:#777">'.$value.'</span>';
            }
        }        
    }else{
        echo $this->params['breadcrumbs'][0];
    }

?>
