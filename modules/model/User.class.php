<?php

/**
 * This is the starter class for User_Generated.
 *
 * @see User_Generated, CoughObject
 **/
class User extends User_Generated implements CoughObjectStaticInterface {
    
    static function getUser($login, $password) {
        $user = User::constructBySql("
                SELECT * FROM " . User::getTableName() . " 
                    WHERE login='$login' 
                    AND password = '$password' LIMIT 1");
        return $user;
    }
}
