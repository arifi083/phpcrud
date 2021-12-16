<?php
class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $db_name = DB_NAME;

    public $link;
    public $error;

    public function __construct(){
        $this->connectDB();
    }

    private function connectDB(){
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->db_name);
        if(!$this->link){
            $this->error = "connection fail".$this->link->connect_error;
            return false;
        }
    }

    public function select($query){
        $result =  $this->link->query($query) or die ($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        } 
        else{
            return false;
        }
    }


    public function insert($query){
        $insert_row =  $this->link->query($query) or die ($this->link->error.__LINE__);
        if($insert_row){
            header("Location: index.php?msg=".urlencode('Data inserted Successfully'));
            exit();
        } 
        else{
            die("Error: (".$this->link->erron.")".$this->link->error);
        }
    }


    public function update($query){
        $update_row =  $this->link->query($query) or die ($this->link->error.__LINE__);
        if($update_row){
            header("Location: index.php?msg=".urlencode('Data updated Successfully'));
            exit();
        } 
        else{
            die("Error: (".$this->link->erron.")".$this->link->error);
        }
    }


    public function delete($query){
        $delete_row =  $this->link->query($query) or die ($this->link->error.__LINE__);
        if($delete_row){
            header("Location: index.php?msg=".urlencode('Data delete Successfully'));
            exit();
        } 
        else{
            die("Error: (".$this->link->erron.")".$this->link->error);
        }
    }
}


?>