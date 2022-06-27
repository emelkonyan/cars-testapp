<?php

class UserModel extends BaseModel {

    function __construct($userId = null) {
        /** If instanciated without userID get the current logged user
         * TODO: check if there is user logged
         */
        if(!$userId) {
            $userId = Session::get("logged_user_id");
        }
        $user = DB::from('users')::where("id", $userId)::first();
        $this->me = $user;
        return $this;
    }
    
    function subscribe($sub) {
        $values['user_id'] = $this->me['id'];
        $values['payload'] = json_encode($sub);

        DB::from("subs")::insert($values);
    }

    function unsubscribe($libid) {
        /** TODO: change the limit of delete */
        DB::from("subs")::where("id", $libid)::delete();
    }

    function getSubs() {
        $subs = DB::from("subs")::where("user_id", $this->me['id'])::get();
        return $subs;
    }

    /**
     * The static methods below are used for non-logged/non-instanciated users
     */

    static function checkIfExists($username) {
        return DB::from('users')::where("LOWER(username)", strtolower($username))::exists();
    }

    static function registerUser($username, $password) {
        $array = [
            'username' => $username,
            'password' => selft::makePassword($password)
        ];
        DB::from('users')::insert($array);
    }

    static function loginUser($username, $password) {
        $password = self::makePassword($password);

        return DB::from('users')::where("username", $username)::where("password", $password)::first();
    }

    static function makePassword($password) {
        /** Some basic password hash */
        $salt = SETTINGS['mysql']['salt'];
        return md5($salt . $password);
    }

    static function isLogged() {
        return Session::get("logged_user");
    }


}