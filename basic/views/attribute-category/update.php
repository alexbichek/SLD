<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AttributeCategory */

$this->title = 'Update Attribute Category: ' . ' ' . $model->attributeCategoryId;
$this->params['breadcrumbs'][] = ['label' => 'Attribute Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->attributeCategoryId, 'url' => ['view', 'id' => $model->attributeCategoryId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attribute-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
