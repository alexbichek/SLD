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
                <div id="<?= $model->categoryId; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">

                        <div class="container">
                            <?php foreach ($products->models as $product){?>
                                <?php if ($product->categoryId == $model->categoryId){?>
                                        <div class="col-lg-3 bg-info col-lg-offset-1">
                                            <div class="col-lg-12 lead">
                                                <?= $product->productName; ?>
                                            </div>
                                            <div class="col-lg-7">
                                                &nbsp Описание: <br/>
                                                <?= $product->description; ?>
                                            </div>
                                            <div class="col-lg-5 text-right">
                                                <?= $product->price; ?> грн.
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-primary btn-sm">
                                                        <input type="checkbox" value="<?= $product->productId; ?>" autocomplete="off"><span class="glyphicon glyphicon-shopping-cart"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                ?>
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
