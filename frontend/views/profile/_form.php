<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
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
                    <label class="col-lg-3 control-label">Username:</label>
                    <div class="col-lg-8">
                        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Password:</label>
                    <div class="col-md-8">
                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Confirm password:</label>
                    <div class="col-md-8">
                        <?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8 text-center">
                        <?= Html::submitButton('<i class="glyphicon glyphicon-pencil"></i> '. Yii::t('app', 'Save Changes'), ['class' => 'btn btn-primary ']) ?>

                        <span></span>
                        <?=Html::resetButton('Reset',['class'=>'btn btn-default']) ?>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php ActiveForm::end(); ?>
