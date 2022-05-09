<?php
    namespace app\models;

        class Order extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }
               
            function get($order_id) {
                $SQL = 'SELECT * FROM `order` WHERE order_id = :order_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['order_id'=>$order_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order");
                return $STMT->fetch();
            }

            function getUserCart($user_id) {
                $SQL = 'SELECT * FROM `order` WHERE user_id = :user_id AND order_status = :order_status';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id, 'order_status'=> 0]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order");
                return $STMT->fetch();
            }
            
            function getAllFromUser($user_id) {
                // where status is != to 0
                $SQL = 'SELECT * FROM `order` WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Order");
                return $STMT->fetchAll();
            }
        
            function create() {
                $SQL = 'INSERT INTO `order`(user_id)VALUES(:user_id)';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$this->user_id]);
                    $this->order_id = self::$_connection->lastInsertId();
            }

            function delete() {
                $SQL = 'DELETE FROM `order` WHERE order_id = :order_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['order_id'=>$this->order_id]);
            }

            function addTotal($total) {
                $SQL = 'UPDATE `order` SET total  = :total WHERE order_id = :order_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['total'=>$total,'order_id'=>$this->order_id]);
            }
        }