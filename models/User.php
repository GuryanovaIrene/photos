<?php
namespace App;

class User extends MainModel
{
    public $userName;
    private $pwd;
    private $email;
    protected $age;
    protected $userDescribe;

    public function __construct($userID, $email, $pwd, $userName, $age, $userDescribe)
    {
        if ($userID > 0) {
            $this->userID = $userID;

            $pdo = $this->conn();
            $prepare = $pdo->prepare('select userName, email, pwd, age, userDescribe from users
                                        where userID = :userID');
            $prepare->execute(['userID' => $userID]);
            $data = $prepare->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($data as $user) {
                $this->email = $user['email'];
                $this->userName = $user['userName'];
                $this->pwd = $user['pwd'];
                $this->age = $user['age'];
                $this->userDescribe = $user['userDescribe'];
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
        $pdo = $this->conn();
        $prepare = $pdo->prepare('select userID from users
                                        where email = :email');
        $prepare->execute(['email' => $this->email]);
        $data = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        if (count($data) > 0) {
            $this->error[] = DOUBLE_USER;
            return null;
        }
        $prepare = $pdo->prepare('insert into users(userName, email, pwd, age, userDescribe)
                                        values (:userName, :email, :pwd, :age, :userDescribe)');
        $prepare->execute(['userName' => $this->userName, 'email' => $this->email, 'pwd' => password_hash($this->pwd, PASSWORD_DEFAULT),
                                    'age' => $this->age, 'userDescribe' => $this->userDescribe]);
    }

    public function auth()
    {
        $pdo = $this->conn();
        $prepare = $pdo->prepare('select userID, userName, age, userDescribe, pwd from users where lower(email) = lower(:email)');
        $prepare->execute(['email' => $this->email]);
        $data = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        if (count($data) == 0) {
            $this->error[] = WRONG_USER;
            return null;
        }
        foreach ($data as $user) {
            if (!password_verify($this->pwd, $user['pwd'])) {
                $this->error[] = WRONG_PASSWORD;
                return null;
            }
            $this->userID = $user['userID'];
            $this->userName = $user['userName'];
            $this->age = $user['age'];
            $this->userDescribe = $user['userDescribe'];
        }
    }
}
