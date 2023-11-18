<?php

class Database{

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = 'Lavish@1233';
    private $db_name = 'userdetails';

    private $mysqli = "";
    private $result = array();
    private $conn = false;

    public function __construct(){

        if(!$this->conn){
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $this->conn = true;
            if($this->mysqli->connect_error){
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            }
        }else{
            return true;
        }
    }

    public function insert($table,$params=array()){

    if($this->tableExists($table)){
      
        $table_columns = implode(', ', array_keys($params));
        $table_value = implode("', '", $params);
        $sql = "insert into $table($table_columns) values ('$table_value')";

        if($this->mysqli->query($sql)){
            array_push($this->result, $this->mysqli->insert_id);
            return true;

        }else{
            array_push($this->result, $this->mysqli->error);
            return false;

        }

    }else{
        return false;

    }

    }

    public function insertImage($table,$params=array()){

        if($this->tableExists($table)){
            print_r($params);
    
            $table_columns = implode(', ', array_keys($params));
            $table_value = implode("', '", array_values($params));
            $sql = "insert into $table($table_columns) values ('$table_value')";
    
            if($this->mysqli->query($sql)){
                array_push($this->result);
                return true;
    
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
    
            }
    
        }else{
            return false;
    
        }
    
        }

    public function update($table, $params = array(),$where = null){
        if($this->tableExists($table)){

            $args = array();
            foreach($params as $key => $value){
                $args[] = "$key = '$value'";
            }
            $sql = "update $table set ". implode(', ', $args);
            if($where != null){
                $sql .= " where $where";
            }
            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->affected_rows);
            }else{
                array_push($this->result, $this->mysqli->error);
            }
        }else{
            return false;
        }

    }

    public function delete($table, $where = null){
        if($this->tableExists($table)){
            $sql = "delete from $table";
        if($where != null){
            $sql .= " Where $where";
        }
        if($this->mysqli->query($sql)){
            array_push($this->result, $this->mysqli->affected_rows);
            return true;
        }else{
            array_push($this->result, $this->mysqli->error);
            return false;
        }
    }else{
        return false;
    }

    }

    public function select($table, $rows = "*", $join = null, $where = null, $order = null, $limit = null){

        if($this->tableExists($table)){
            $sql = "select $rows from $table";
            if($join != null){
                $sql .= "join $join" ;
            }
            if($where != null){
                $sql .= "where $where" ;
            }
            if($order != null){
                $sql .= "order by $order" ;
            }
            if($limit != null){
                $sql .= "limit 0 $limit" ;
            }
            echo $sql;
            $query = $this->mysqli->query($sql);

            if($query){
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true;
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }else{
            return false;
        }

        }
    

    public function selectId($sql){
        $query = $this->mysqli->query($sql);
        if($query){
            $this->result = $query->fetch_column();
            return $this->result;
        }else{
            array_push($this->result, $this->mysqli->error);
            return false;
        }
    }

      public function sql($sql){
        $query = $this->mysqli->query($sql);
        if($query){
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            array_push($this->result, $this->mysqli->error);
            return false;
        }
    }
    

    private function tableExists($table){
        $sql = "show tables from $this->db_name like '$table'";
        $tableInDb = $this->mysqli->query($sql);
        if($tableInDb){
            if($tableInDb->num_rows == 1){
                return true;
            }else{
                return false;
            }
        }
    }

    public function __destruct(){
        if($this->conn){
            if($this->mysqli->close()){
                $this->conn = false;
                return true;
            }
        }else{
            array_push($this->result, $table."does not exist in the database");
            return false;
        }
    }
    
    public function getResult(){
        $val = $this->result;
        $this->result = array();
        return $val;

    }

    public function getId(){
        $val = $this->mysqli->insert_id;
        return $val;

    }
    
}
?>