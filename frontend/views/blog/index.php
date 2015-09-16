<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Alert;
use kartik\growl\Growl;

use prawee\widgets\ButtonAjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บทความ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
        <?php
        echo Growl::widget([
            'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
            'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
            'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
            'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
            'showSeparator' => true,
            'delay' => 20,
            'pluginOptions' => [
                'showProgressbar' => true,
                'placement' => [
                    'from' => 'top',
                    'align' => 'right',
                ]
            ]
        ]);
//
        ?>
    <?php endforeach; ?>
    <p align="right">
   <?php echo ButtonAjax::widget([
    'name'=>'Create Blog',
    'route'=>['create'],
    'modalId'=>'#main-modal',
    'modalContent'=>'#main-content-modal',
    'options'=>[
    'class'=>'btn btn-success',
    'title'=>'Button for create application',
    ]
    ]);

   Modal::begin(['id'=>'main-modal']);
   echo '<div id="main-content-modal"></div>';
   Modal::end();
   ?>


    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content:ntext',
            'category',
            'tag',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            [
                'header' =>'<center><a>เพิ่มเติม</a></center>',
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions'=>['class'=>'btn btn-default'],
              'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>',
              'options'=> ['style'=>'width:150px;'],
            ],
        ],
    ]); ?>

</div>
