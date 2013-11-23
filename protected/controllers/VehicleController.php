<?php

Yii::import('application.components.VehicleService');

class VehicleController extends ERestController {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    public function doCustomRestGetGetLocation() {
        $vService = new VehicleService();
        $res = $vService->getLocation($_GET);
        echo CJSON::encode($res);
    }

}