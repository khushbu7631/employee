<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login" >
    <h1><?= Html::encode($this->title) ?></h1>
    

   
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
    <div class="card bg-dark text-white" style="border-radius: 1rem;">
    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                  <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group text-center pt-1 mb-5 pb-1 background: #fccb90;">
                     <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block fa-lg gradient-custom-2 mb-3', 'name' => 'login-button']) ?>
               </div>
               </div> 
               </div>         
    </div>
        
              
        
      <?php ActiveForm::end(); ?>
           
        
</div>
