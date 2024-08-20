<?php

trait Model{

    use Database;

    //The limit, offset, order_by and order_column comes here

    public function getAllRow(){
        $query = "SELECT * FROM $this->table";
        return $this->query($query);
    }

    public function strictlyWhereRow($data, $data_not=[])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $str = "SELECT * FROM $this->table";

        foreach ($keys as $key) {
            $str .= $key . " = :".$key . " && ";
        }

        foreach ($keys_not as $key) {
            $str .= $key . " != :".$key . " && ";
        }

        $query = trim($str, " && ");
        $query .= ";";

        $row_field = array_merge($data, $data_not);
        $result = $this->query($query, $row_field);

        if($result)
            return $result;

        return false;

    }

    public function WhereRow($data, $data_not=[])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $str = "SELECT * FROM $this->table";

        foreach ($keys as $key) {
            $str .= $key . " = :".$key . " || ";
        }

        foreach ($keys_not as $key) {
            $str .= $key . " != :".$key . " || ";
        }

        $query = trim($str, " || ");
        $query .= ";";

        $row_field = array_merge($data, $data_not);
        $result = $this->query($query, $row_field);

        if($result)
            return $result;

        return false;

    }

    public function insertRow($data)
    {
        $keys = array_keys($data);

        $query = "INSERT INTO $this->table (" . implode(" , ", $keys) . ") VALUES(:" . implode(" , :", $keys) .");";
        $this->query($query, $data);

    }

    public function updateRow($id, $data, $id_column = 'id')
    {

        $keys = array_keys($data);        

        $str = "UPDATE $this->table SET ";

        foreach ($keys as $key) {
            $str .= $key . " = :".$key . ", ";
        }

        $query = trim($str, ", ");
        $query .= " WHERE $id_column = :$id_column ;";

        $data[$id_column] = $id; 
        
        $this->query($query, $data);
    }

    public function deleteRow($id, $id_column = 'id')
    {

        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column ;";

        $this->query($query, $data);
        return false;

    }

}