<?php

class VehicleService extends CComponent {

    function __construct() {
        
    }

    public function getLocation($get) {
        $keys = array('vehicle_id');
        foreach ($get as $k) {
            if (!in_array($k, $keys)) {
                return array('success' => false, 'message' => 'Invalid Parameters');
            }
        }
        $res = EDMSQuery::instance('vehicle')->findOne(array('_id' => new MongoId($get['vehicle_id'])));
        return $res;
    }

}
?>
