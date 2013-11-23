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
	
	public function sendLocation($vehicle_id,$x,$y)
	{
		$res = EDMSQuery::instance('vehicle')->insert(array('vehicle_id' => $vehicle_id, 'x' => $x, 'y' => $y));
		return $res;
	}
	
	public function setOperation($v_id,$operations)
	{
		$vehicle = array(
			'vehicle_id' => $v_id, 
			'operations' => $operations);
		$res = EDMSQuery::instance('services')->insert($vehicle);
		return $res;
	}
}
?>
