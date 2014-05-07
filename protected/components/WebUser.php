<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 07.05.14
 * Time: 10:00
 * To change this template use File | Settings | File Templates.
 */
class WebUser extends CWebUser {
    private $_model = null;

    function getRole() {
        if($user = $this->getModel()){
            // в таблице User есть поле role
            return $user->role;
        }
    }

    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = Users::model()->findByPk($this->id, array('select' => 'role'));
        }
        return $this->_model;
    }
}