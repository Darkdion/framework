<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Profile';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <?php
    function thai_date($time){
        global $thai_day_arr,$thai_month_arr;
        $thai_date_return="วัน ".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
        $thai_date_return.= " ที่ ".date("j",$time);
        $thai_date_return.=" เดือน".$thai_month_arr=array(
                "","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน", "พฤษภาคม",
                "มิถุนายน", "กรกฎาคม", "สิงหาคม","กันยายน", "ตุลาคม",
                "พฤศจิกายน", "ธันวาคม"
            )[date("n",$time)];
        $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
        //  $thai_date_return.= "  ".date("H:i",$time)." น.";
        return $thai_date_return;
    }
    ?>
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="container" >
        <div class="row">
            <!-- left column -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="text-center">
                    <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="text-center center-block well well-sm">
                </div>
            </div>
            <!-- edit form column -->
            <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

                <h3>ข้อมูลส่วนตัว</h3>
                <form class="form-horizontal" role="form">
                    <div class="form-group">

                        <?= ListView::widget([
                            'model' => $model,
                            'attributes' => [

                               // 'username',
                                [
                                    'label'=>'ชื่อผู้ใช้งาน :',
                                    'value'=>$model->username,
                                ],
                                'email:email',
                                //'statusName',
                                [
                                    'label'=>'สถานะ :',
                                    'value'=>$model->getStatusName(),
                                ],
                                [
                                    'label' => 'สร้างเมื่อ :',
                                    'value'=>thai_date($model->created_at),
                                ],
                                [
                                  'label'=>'แก้ไขเมื่อ :' ,
                                    'value'=>thai_date($model->updated_at),
                                ],

                            ],
                        ]) ?>


                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
