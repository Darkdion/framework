<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\helpers\ArrayHelper;
use kartik\growl\Growl;


/* @var $this yii\web\View */
/* @var $model common\models\Blog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="blog-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
        <?php
        echo Growl::widget([
            'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
            'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
            'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
            'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
            'showSeparator' => true,
            'delay' => 0,
            'pluginOptions' => [
                'showProgressbar' => true,
                'placement' => [
                    'from' => 'top',
                    'align' => 'right',
                ]
            ]
        ]);

        ?>
    <?php endforeach; ?>
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
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'template'=>'<tr><th>{label}</th><td><i class="glyphicon glyphicon-ok-sign"></i></i> {value}</td></tr>',
        'attributes' => [
            [
                'label' => 'รหัส',
                'value' => $model->id,
            ],
            [
                'format'=>'html',
                'label' => 'ชื่อเรื่อง',
                'value' => '<span style="color:green;">'.$model->title.'</span>'
            ],

          //  'id',
           // 'title',
            'content:ntext',
            'category',
            'tag',
            [
                'label' => 'วันที่สร้าง',
                'value'=>thai_date($model->created_at),
                //'value'=>Yii::$app->thaiFormatter->asDate($model->created_at, 'full'),
               // 'value' =>  thai_date($model->created_at),
            ],
            'created_by',
            [
              'label' => 'แก้ไขเมื่อ',
              'value'=>thai_date($model->updated_at),
            ],
            //'updated_at:date:แก้ไขเมื่อ',
            'updated_by',
        ],
    ]) ?>

</div>
