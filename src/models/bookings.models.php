<?php
require("./base_model.php");

class Bookings extends BaseModel
{

    public function sync($bookings_json_data)
    {

        try {
            $bookings = json_decode($bookings_json_data, true); //converting json data to php array for further processing

            if (!$bookings) { //making sure we have some data in bookings before proceeding with import
                throw new Exception("An error occured whiles importing data please try again");
            }

            // Turn autocommit off before running transaction query
            mysqli_autocommit($this->conn, FALSE);
            //delete existing bookings data
            mysqli_query($this->conn, "DELETE from emp_bookings");

            //add new bookings
            foreach ($bookings as $booking) {
                if ($this->isImportDataValid($booking)) { //validate data before inserting to database
                    $query = "INSERT INTO emp_bookings(employee_name, employee_mail, event_id, event_name, participation_fee, event_date, participation_id, version) VALUES('{$booking["employee_name"]}','{$booking["employee_mail"]}','{$booking["event_id"]}','{$booking["event_name"]}','{$booking["participation_fee"]}','{$booking["event_date"]}','{$booking["participation_id"]}','{$booking["version"]}')";
                    mysqli_query($this->conn, $query);
                } else {
                    mysqli_rollback($this->conn);
                    throw new Exception("Error: Some booking records may be incorrectly filled please check your import file.");
                }
            }

            // Commit transaction
            if (!mysqli_commit($this->conn)) {
                mysqli_rollback($this->conn);
                mysqli_close($this->conn);
                throw new Exception("An error occured whiles importing data please try again");
            } else {
                return $this->fetch(); //if import was successful fetch new data and return to ui
            }
        } catch (Exception $e) {
            mysqli_close($this->conn);
            echo $e->getMessage();
        }
    }

    public function fetch($filter = null)
    {
        try {
            //select bookings based on filter or not
            if ($filter) {
                $query = $filter["key"] == "event_date" ? "SELECT * FROM emp_bookings where DATE('event_date')='{$filter["value"]}'" : "SELECT * FROM emp_bookings WHERE {$filter["key"]} like '%{$filter["value"]}%'";
            } else {
                $query = "SELECT * FROM emp_bookings";
            }
            $result = mysqli_query($this->conn, $query);
            $bookings = [];
            if ($result)
                while ($row = mysqli_fetch_array($result)) {
                    $bookings[] = $row;
                }
            return $bookings;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function isImportDataValid($data)
    { //validating uploaded data content to see if it matches with what is expected in database
        $expected_fields = ['employee_name', 'employee_mail', 'event_id', 'event_name', 'participation_fee', 'event_date', 'participation_id', 'version'];
        foreach ($data as $key => $value) {
            if (!in_array($key, $expected_fields)) {
                return false;
            }
        }

        return true;
    }
}
