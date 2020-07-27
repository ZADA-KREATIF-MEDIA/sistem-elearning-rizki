<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login')
{ 

    echo $this->render(
        'main-login',
        ['content' => $content]
    );
}
else if (Yii::$app->controller->action->id === 'siswa/login')
{ 

    echo $this->render(
        'main-login-siswa',
        ['content' => $content]
    );
}
else if (Yii::$app->controller->action->id === 'guru')
{ 

    echo $this->render(
        'main-login-siswa',
        ['content' => $content]
    );
}
 else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f189f7ba45e787d128bf253/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
        <?php $this->head() ?>
        <?php
            yii\bootstrap\Modal::begin([
                'headerOptions' => ['id' => 'modalHeader'],
                'id' => 'modal',
                'size' => 'modal-md',
                'clientOptions' => ['backdrop' => 'static', 'keyboard' => true]
            ]);
            echo "<div id='modalContent'></div>";
            yii\bootstrap\Modal::end();
            ?>
    </head>
    <body class="hold-transition skin-red-light sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
