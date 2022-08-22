<?php
include 'define.php';
class Databases
{
    public $connect;

    //Default constructor
    public function __construct()
    {
        $this->connect = mysqli_connect(HOST, USER, PASS, DB);
        if (!$this->connect) {
            echo 'Database Connection Error ' . mysqli_connect_error($this->connect);
        } else {
            // echo 'Connect Success';
        }
    }

    //Insert data into database
    public function addData($tbl_name, $tbl_data)
    {

        $sql_query = "INSERT INTO " . $tbl_name . " (";
        $sql_query .= implode(",", array_keys($tbl_data)) . ') VALUES (';
        $sql_query .= "'" . implode("','", array_values($tbl_data)) . "')";

        if (mysqli_query($this->connect, $sql_query)) {
            return true;
        } else {
            echo mysqli_error($this->connect);
        }
    }

    //Select data from database
    public function viewData($tbl_name, $col_name, $data_id)
    {
        $data_id = !empty($data_id) ? " WHERE id = $data_id " : " ";
        $col_name = !empty($col_name) ? $col_name : " * ";
        $sql_query = "SELECT $col_name FROM $tbl_name $data_id";
        $array = array();
        $result = mysqli_query($this->connect, $sql_query);
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }

    //Delete data from database
    public function deleteData($tbl_name, $col_name, $data_id)
    {

        $sql_query = "DELETE FROM " . $tbl_name . " WHERE " . $col_name . " = '" . $data_id . "'";
        if (mysqli_query($this->connect, $sql_query)) {
            return true;
        } else {
            echo mysqli_error($this->connect);
        }
    }

    //Update data into database
    public function updateData($tbl_name, $tbl_data, $data_id)
    {

        if (count($tbl_data) > 0) {
            foreach ($tbl_data as $key => $value) {

                $value = "'$value'";
                $updates[] = "$key = $value";
            }
        }
        $implodeArray = implode(', ', $updates);
        $sql_query = ("UPDATE $tbl_name SET $implodeArray  WHERE id = $data_id");
        if (mysqli_query($this->connect, $sql_query)) {
            return true;
        } else {
            echo mysqli_error($this->connect);
        }

    }
}