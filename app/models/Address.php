<?php
    namespace app\models;

        class Address extends \app\core\Model {
         
            function __construct() {
                parent::__construct();
            }

            function get($address_id) {
                $SQL = 'SELECT * FROM address WHERE address_id = :address_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['address_id'=>$address_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Address");
                return $STMT->fetch();
            }

            function insert() { 
                $SQL = 'INSERT INTO address(street_name, street_number, city, province, country, postal_code) VALUES (:street_number, :street_name, :city, :province, 
                    :country, :postal_code)';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['street_name'=>$this->street_name, 'street_number'=>$this->street_number, 'city'=>$this->city, 'province'=>$this->province, 
                    'country'=>$this->country, 'postal_code'=>$this->postal_code]);
            }

            function update() {
                $SQL = 'UPDATE address SET street_name = :street_name, street_number = :street_number, city = :city, province = :province, country = :country, 
                    postal_code = :postal_code WHERE address_id = :address_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['street_name'=>$this->street_name, 'street_number'=>$this->street_number, 'city'=>$this->city, 'province'=>$this->province, 
                    'country'=>$this->country, 'postal_code'=>$this->postal_code, 'address_id'=>$this->address_id]);
            }
        }