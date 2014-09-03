<?php

class DefaultController extends Controller
{

    public $layout = 'main';

    public function getAssets() {
        Yii::app()->clientScript->reset();
        return  Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.' .  $this->getModule()->getId() . '.assets'));
    }

    public function actionIndex() {
        $this->render('index', array('assets' => $this->assets));
    }

}