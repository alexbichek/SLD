<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Admin Panel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="btn-group">
        <?= Html::a('Attributes', ['attribute/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Attributes Categories', ['attribute-category/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Categories', ['category/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Comments', ['comment/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Customers', ['customer/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Orders', ['order/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Products', ['product/index'], ['class' => 'btn btn-success']) ?>
</div>


