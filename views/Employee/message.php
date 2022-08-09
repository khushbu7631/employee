<?php
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    
</head>
<body style= "background-color:#3e4144";>
    <div style= "background-color:white"; >
        <p>Hey, <?php echo Html::encode($model->name) ?>!</p>
        <p>You are now user dashboard page.</p>
        <p>
        <?= Html::a('Login ', ['login'], ['class' => 'btn btn-success']) ?>
    </p>
    </div>
</body>
</html>