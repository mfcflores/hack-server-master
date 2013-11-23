<?php
Yii::import('application.components.UserService');
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
		
		if(!$UserLocation) 
		{
			throw new CHttpException(404, 'Not Found');
		}
		else 
		{
			echo CJSON::encode($UserLocation);
		}
    }

    public function doCustomRestPostSendLocation() {
        $UserService = new UserService();
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
        $x = isset($_POST['x']) ? $_POST['x'] : "";
        $y = isset($_POST['y']) ? $_POST['y'] : "";
		
		$UserLocation = $UserService->sendLocation($user_id, $x, $y);
		
		echo CJSON::encode($UserLocation);
    }
    
    public function doCustomRestGetSync() {
        
    }
}