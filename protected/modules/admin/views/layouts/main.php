<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="language" content="en"/>

       

        <?php Yii::app()->bootstrap->registerAllScripts(); ?>
        <?php Yii::app()->bootstrap->register(); ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">
            
            <div class="row-fluid">
                
                <div style="height: 40px;"></div>

                <div id="mainmenu">
                    <?php
                    $this->widget('bootstrap.widgets.TbNavbar', array(
                        'brandUrl' => array('site/index'),
                        'items' => array(
                            array(
                                'class' => 'bootstrap.widgets.TbNav',
                                'items' => array(
                                    array('label' => 'Открыть сайт', 'url' => array('/site/index')),
                                    array('label' => 'Вопросы', 'url' => array('questions/admin')),
                                    array('label' => 'Пользователи', 'url' => array('user/admin')),
                                    array('label' => 'Войти', 'url' => array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                    array('label' => 'Выйти('.Yii::app()->user->name.')', 'url' => array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                ),
                            ),
                        ),
                    ));
                    ?>
                </div><!-- mainmenu -->

                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->

                    <?php echo $content; ?>
                
            </div>

            

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
                All Rights Reserved.<br/>
<?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>