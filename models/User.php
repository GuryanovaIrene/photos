<?php
namespace App;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class User extends MainModel
{
    public $userID;
    public $userName;
    public $pwd;
    public $email;
    public $age;
    public $userDescribe;

    public function __construct($userID, $email, $pwd, $userName, $age, $userDescribe)
    {
        if ($userID > 0) {
            $this->userID = $userID;

            require "../core/capsule.php";
            $data = Capsule::table('users')
                ->where('userID', '=', $userID)
                ->select(['email', 'userName', 'age', 'userDescribe', 'pwd'])
                ->get();
            foreach ($data as $user) {
                $this->email = $user->email;
                $this->userName = $user->userName;
                $this->pwd = $user->pwd;
                $this->age = $user->age;
                $this->userDescribe = $user->userDescribe;
            }
        } else {
            $this->userID = '';
            $this->email = $email;
            $this->userName = $userName;
            $this->pwd = $pwd;
            $this->age = $age;
            $this->userDescribe = $userDescribe;
        }
    }

    public function reg()
    {
        require "../core/capsule.php";
        $data = Capsule::table('users')
            ->where('email', '=', $this->email)
            ->get();
        if (isset($data->userID)) {
            $this->error[] = DOUBLE_USER;
            return null;
        }
        Capsule::table('users')
            ->insert(['userName' => $this->userName, 'email' => $this->email, 'pwd' => password_hash($this->pwd, PASSWORD_DEFAULT),
                    'age' => $this->age, 'userDescribe' => $this->userDescribe]);
    }

    public function auth()
    {
        require "../core/capsule.php";
        $data = Capsule::table('users')
            ->where('email', '=',  strtolower($this->email))
            ->select(['userID', 'userName', 'age', 'userDescribe', 'pwd'])
            ->get();

        if (empty($data)) {
            $this->error[] = WRONG_USER;
            return null;
        }
        foreach ($data as $user) {
            if (!password_verify($this->pwd, $user->pwd)) {
                $this->error[] = WRONG_PASSWORD;
                return null;
            }
            $this->userID = $user->userID;
            $this->userName = $user->userName;
            $this->age = $user->age;
            $this->userDescribe = $user->userDescribe;
        }
    }

    public function updateUser($userID, $userName, $age, $userDescribe)
    {
        require "../core/capsule.php";
        Capsule::table('users')
            ->where('userID', '=', $userID)
            ->update(['userName' => $userName, 'age' => $age, 'userDescribe' => $userDescribe]);
    }

    public function allImages()
    {
        require "../core/capsule.php";
        $data = Capsule::table('photos')
            ->where('userID', '=', $this->userID)
            ->select(['photoID', 'url'])
            ->get();
        return $data;
    }
}
