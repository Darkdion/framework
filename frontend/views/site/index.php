<?php
use kartik\growl\Growl;
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'FrameWork Yii2';
?>
<?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
    <?php
    echo Growl::widget([
        'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
        //'title' => (!empty($message['title'])) ? Html::encode($message['title']) : Yii::$app->user->isGuest,
        'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
        'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
        'showSeparator' => true,
        'delay' => 2,
        'pluginOptions' => [
           // 'showProgressbar' => true,
            'placement' => [
                'from' => 'top',
                'align' => 'right',
            ]
        ]
    ]);

    ?>
<?php endforeach; ?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Framework Yii2</h1>

        <p class="lead">กำลังอยู่ในช่วงหัดและทดสอบ...</p>

        <p><a class="btn btn-lg btn-info" href="">Start with Yii</a></p>
    </div>

    <div class="body-content">



    </div>
</div>
