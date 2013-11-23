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

        $res = EDMSQuery::instance('user_location')->findOne(array('_id' => new MongoId($get['user_id'])));

        return $res;
    }

    /*
     * This method sets the location of user.
     * @param string $user_id
     * @param integer $x
     * @param integer $y
     * @return boolean true or false
     */

    public function sendLocation($user_id, $latitude, $longitude) {
        $location = array(
            'user_id' => $user_id,
            'longitude' => $longitude,
            'latitude' => $latitude
        );

        $res = EDMSQuery::instance('services')->insert($location);
    }

    public function syncData() {
        $res = EDMSQuery::instance('vehicles')->findArray();
    }

}

?>