<?php

class UserController extends ERestController {

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
        $UserService = new UserService();
        // Get Location of User from UserService Component
        $UserLocation = $UserService->getLocation($_GET);
        echo CJSON::encode($UserLocation);
    }

    public function doCustomRestPostSendLocation() {
        $UserService = new UserService();
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
        $longitude = isset($_POST['longitude']) ? $_POST['longitude'] : "";
        $latitude = isset($_POST['latitude']) ? $_POST['latitude'] : "";
        $UserLocation = $UserService->sendLocation($user_id, $longitude, $latitude);
    }
    
    public function doCustomRestGetSync() {
        
    }
}