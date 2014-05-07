<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 07.05.14
 * Time: 10:01
 * To change this template use File | Settings | File Templates.
 */
class PhpAuthManager extends CPhpAuthManager{
    public function init(){
        // Иерархию ролей расположим в файле auth.php в директории config приложения
        if($this->authFile===null){
            $this->authFile=Yii::getPathOfAlias('application.config.auth').'.php';
        }

        parent::init();

        // Для гостей у нас и так роль по умолчанию guest.
        if(!Yii::app()->user->isGuest){
            // Связываем роль, заданную в БД с идентификатором пользователя,
            // возвращаемым UserIdentity.getId().
            $this->assign(Yii::app()->user->role, Yii::app()->user->id);
        }
    }
}