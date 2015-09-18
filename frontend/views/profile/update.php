<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'แก้ไขโปรไฟล์ของฉัน';
$this->params['breadcrumbs'][] = ['label' => 'โปรไฟล์', 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'แก้ไขโปรไฟล์');
?>

<div class="user-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

