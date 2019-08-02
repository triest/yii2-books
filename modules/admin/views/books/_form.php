<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\models\Authors;
use yii\helpers\ArrayHelper;

$params = [];

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */

$authors = Authors::find()->all();
$items = ArrayHelper::map($authors, 'id', 'name');
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'year')->widget(etsoft\widgets\YearSelectbox::classname(), [
            'yearStart' => 0,
            'yearEnd' => -200,
    ]);
    ?>

    <?= $form->field($model, 'id_autor')->dropDownList($items, $params); ?>

    <?= $form->field($model, 'id_publishing')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
