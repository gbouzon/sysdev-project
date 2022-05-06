<?php
    namespace app\models;

        class User extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }

            function get($email) {
                $SQL = 'SELECT * FROM user WHERE email = :email';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['email'=>$email]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
                return $STMT->fetch();
            }

            function getById($user_id) { //get by user_id
                $SQL = 'SELECT * FROM user WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
                return $STMT->fetch();
            }

            function exists() {
                return $this->get($this->email) != false;
            }

            //check inserts, updates and deletes later
            function insert() {
                $SQL = 'INSERT INTO user(first_name, last_name, email, password_hash)   
                    VALUES(:first_name, :last_name, :email, :password_hash';
		        $STMT = self::$_connection->prepare($SQL);
		        $STMT->execute(['first_name'=>$this->first_name,'last_name'=>$this->last_name, 
                    'email'=>$this->email,'password_hash'=>$this->password_hash]);
            }

            //check inserts, updates and deletes later
            function update() {
                $SQL = 'UPDATE user SET first_name = :first_name, last_name = :last_name, 
                email = :email , password_hash = :password_hash WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['first_name'=>$this->first_name,'last_name'=>$this->last_name, 
                'email'=>$this->email,'password_hash'=>$this->password_hash, 'user_id'=>$this->user_id]);
            }
            
            function delete() {
                $SQL = 'DELETE FROM user WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$_SESSION['user_id']]);
            }
        }