<?php

Class UserService extends CComponent {

    function __construct() {
        
    }

    /*
     * This method gets location of user.
     * @param user_id
     * @return $x, $y & $datetime
     */

    public function getLocation($get) {
        if (!array_key_exists('user_id', $get)) {
            return array('success' => false, 'message' => 'Invalid Parameters');
        }
			
        $res = EDMSQuery::instance('user_location')->findOne(array('user_id' => $get['user_id']));
		
		if(!$res) {
			return false;
		}
		
		$data['data'] = array(
			'user_id' => $res['user_id'],
			'x' => $res['x'],
			'y' => $res['y'],
			'datetime' => $res['datetime'],
		);
		
        return $data;
    }

    /*
     * This method sets the location of user.
     * @param string $user_id
     * @param integer $x
     * @param integer $y
     * @return boolean true or false
     */

    public function sendLocation($user_id, $x, $y) {
        $location = array(
            'user_id' => $user_id,
            'x' => $x,
            'y' => $y,
			'datetime'	=> time()
        );

        $res = EDMSQuery::instance('user_location')->upsert(array('user_id' => $user_id),$location);
		
		if($res)
		{
			return array('success' => true, 'message' => 'Valid Parameters');
		}
		else
		{
			return array('success' => false, 'message' => 'Invalid Parameters');
		}
    }

    public function syncData() {
        $res = EDMSQuery::instance('vehicles')->findArray();
    }

}

?>