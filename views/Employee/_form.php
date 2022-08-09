<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
//use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Employee */
/* @var $form yii\widgets\ActiveForm */

$states = ArrayHelper::map(\frontend\models\State::find()->asArray()->all(), 'id', 'name');
$districts= ArrayHelper::map(\frontend\models\District::find()->asArray()->all(), 'id', 'name');
?>


<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="form-row"  >

    <div class="form-group col-md-6" style="background-color:#bdb8b9";>
          <?= $form->field($model, 'name')->textInput(['maxlength' => true ]) ?>
    </div>
    
    <div class="form-group col-md-6" style="background-color:#bdb8b9";>
           <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-md-6" style="background-color:#bdb8b9";>
         <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-md-6" style="background-color:#bdb8b9";>
        <?= $form->field($model, 'date_of_birth')->input('date'); ?>
    
    </div>

    <div class= "form-group col-md-6" style="background-color:#bdb8b9";>
         <?= $form->field($model, 'phone')->textInput() ?>
    </div>

    <div class="form-group col-md-6" style="background-color:#bdb8b9";>
         <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-md-6" style="background-color:#bdb8b9";>
        <?= $form->field($model, 'state')->dropDownList(
         $states,
             ['prompt'=>'Select a State',
                 'onchange'=>'
               $.post("index.php?r=employee/state-list&id="+$(this).val(), function( data ) {
                 $( "select#name" ).html( data );
               });
           ']); ?>
           
        </div>
        
        <div class="form-group col-md-6" style="background-color:#bdb8b9";>
           <?= $form->field($model, 'district')->dropDownList(
           $districts,
                ['prompt'=>'select District','id'=>'name']
                 ); ?>
        </div>

   
        <div class="form-group ml-4">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
      </div>
 </div> 
 

      
















   

    <?php ActiveForm::end(); ?>

</div>
