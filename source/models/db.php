<?php
/**
 * Very basic query builder
 */

class DB {

    static private $instance;
    static private $table;
    static private $selects;
    static private $wheres;

    static function returnInstance() {
        /** Singleton method */
        if(!self::$instance) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    static function from($table) {
        self::$table = $table;
        return self::returnInstance();
    }

    static function select($field) {
        self::$selects[] = "{$field}";
        return self::returnInstance();
    }

    static function where($field, $value, $sign = '=') {
        self::$wheres[] = "{$field} {$sign} '{$value}'";
        return self::returnInstance();
    }

    static function insert($array) {
        foreach($array as $k => $v) {
            $fieldsArray[] = $k;
            $valuesArray[] = "'{$v}'";
        }
        $table = self::$table;
        $fields = implode(", ", $fieldsArray);
        $values = implode(", ", $valuesArray);
        $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";

        self::query($query);
        self::initClauses();
    }

    function delete() {
        $table = self::$table;
        $wheres = implode(' AND ', self::$wheres);
        /** We curently use the delete method to delete a single line
         * TODO: either implement limit() method
         * or take the limit as a parameter for this method
         */
        $query = "DELETE FROM {$table} WHERE {$wheres} LIMIT 1";
        self::query($query);
        self::initClauses();
    }

    static function buildQuery() {
        $table = self::$table;
        /** SANITIZE!!!!! INPUTS!!!!! */
        $selects = self::$selects ? implode(',', self::$selects) : '*';
        $wheres = implode(' AND ', self::$wheres);
        
        $query = "SELECT {$selects} FROM {$table} WHERE {$wheres}";
        self::initClauses();
        return $query;
    }

    static function initClauses() {
        self::$wheres = [];
        self::$selects = [];
    }

    static function get() {
        $query = self::buildQuery();
        $result = self::query($query);
        $output = [];
        while($row = $result->fetch_array()){
            $output[] = $row;
        }
        return $output;
    }

    static function first() {
        return @self::get()[0];
    }

    static function query($query) {
        $mysqlData = SETTINGS['mysql'];
        $connection = new mysqli($mysqlData['hostname'], $mysqlData['username'], $mysqlData['password'], $mysqlData['database']);
        /** Defintatelly not the best way to init a new connection every time
         *  TODO: make a constant DB connection for thread optimization
         */
        if ($connection->connect_errno) {
            echo "Failed to connect to MySQL database: " . $connection->connect_error;
            exit();
        }
        //echo $query;
        return $connection->query($query);
    }

    static function exists() {
        return self::get() == null ? false : true;
    }
    
}