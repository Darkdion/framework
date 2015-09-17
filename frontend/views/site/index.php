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
     $thai_date_return.= " เวลา ".date("H:i",$time)." น.";
      return $thai_date_return;

  }
      ?>

    <div class="jumbotron">
      <p><?php
      $eng_date=time(); // แสดงวันที่ปัจจุบัน
echo thai_date($eng_date);
       ?> </p>




        <h1>Framework Yii2</h1>

        <p class="lead">กำลังอยู่ในช่วงหัดและทดสอบ...</p>

        <p><a class="btn btn-lg btn-info" href="">Start with Yii</a></p>
    </div>

    <div class="body-content">



    </div>
</div>
