<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AttributeCategory */

$this->title = 'Create Attribute Category';
$this->params['breadcrumbs'][] = ['label' => 'Attribute Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attribute-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
