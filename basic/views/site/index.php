<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <?php foreach ($categories->models as $model){
            ?><div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#<?= $model->categoryId; ?>" aria-expanded="true" aria-controls="collapseOne">
                            <?= $model->categoryName; ?>
                        </a>
                    </h4>
                </div>
                <div id="<?= $model->categoryId; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?= $model->categoryId; ?>">
                    <div class="panel-body">

                        <div class="container">
                            <?php foreach ($products->models as $product){?>
                                <?php $form = ActiveForm::begin()?>
                                <?php if ($product->categoryId == $model->categoryId){?>
                                        <div class="col-lg-3 bg-info" style="margin: 10px">
                                            <div class="col-lg-12 lead">
                                                <?= $product->productName; ?>
                                            </div>
                                            <div class="col-lg-7">
                                                &nbsp Описание: <br/>
                                                <?= $product->description; ?>
                                            </div>
                                            <div class="col-lg-5 text-right">
                                                <?= $product->price; ?> грн.
                                                <?php Html::submitButton('Submit', ['class' => 'btn btn-primary glyphicon glyphicon-shopping-cart'])?>
<!--                                                <button id="cart" class="btn btn-success btn-sm" value="--><?//= $product->productId; ?><!--" ><span class="glyphicon glyphicon-shopping-cart"></span></button>-->
                                            </div>
                                        </div>
                                <?php
                                    }
                                ?>
                                <?php ActiveForm::end()?>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>

