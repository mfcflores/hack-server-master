<?php

class AuthService extends CComponent {

    public function checkToken($id) {
        $id = EDMSQuery::instance('tokens')->findOne(array('_id' => new MongoId($id)));
    }

}

?>
