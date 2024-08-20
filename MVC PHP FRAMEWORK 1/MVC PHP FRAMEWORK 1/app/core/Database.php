<?php

trait Database 
{
    private function connect()
    {
        $my_conn_string = 'mysql:hostname='.DBHOST.';dbname='.DBNAME;
        $connection = new PDO($my_conn_string, DBUSER, DBPASS);

        return $connection;
    }

    public function query($query, $data=[])
    {
        $conn = $this->connect();
        $stmt = $conn->prepare($query);

        $row_of_data = $stmt->execute($data);
        if($row_of_data){
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result))
                return $result;
        }

        return false;
    }

}

