<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Attribute */

$this->title = $model->productId;
$this->params['breadcrumbs'][] = ['label' => 'Attributes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attribute-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'productId' => $model->productId, 'AttrCatId' => $model->AttrCatId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'productId' => $model->productId, 'AttrCatId' => $model->AttrCatId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'productId',
            'AttrCatId',
            'Value',
        ],
    ]) ?>

</div>
