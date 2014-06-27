<?php

class DefaultController extends Controller
{
        public $layout='/layouts/column2';
    
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Questions');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}