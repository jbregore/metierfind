<?php


class SavedJobs
{
    private $conn;

    public $table_name = "tblsavedjobs";
    public $table_job= "tbljobs";

    public $js_id;
    public $j_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addSavedJob()
    {   
        $validate = "SELECT j_id FROM $this->table_name WHERE j_id = '$this->j_id'";
        $vallidate = mysqli_query($this->conn, $validate);

        if (mysqli_num_rows($vallidate) > 0) {
            http_response_code(400);
            return;
        }

        $query = "INSERT INTO $this->table_name (js_id, j_id) VALUES (?,?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "ii",
            $this->js_id,
            $this->j_id
        );


        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function fetch_allSavedJob()
    {
        $query = "SELECT * FROM tblsavedjobs INNER JOIN tbljobs 
        ON (tbljobs.j_id = tblsavedjobs.j_id) 
        INNER JOIN tblemployer ON (tblemployer.employerid = tbljobs.c_employerid)
        WHERE tblsavedjobs.js_id = '$this->js_id'";
        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function delete()
	{   
		$query = "DELETE FROM $this->table_name WHERE j_id = ?";

		$stmt = mysqli_stmt_init($this->conn);

		if (!mysqli_stmt_prepare($stmt, $query)) {
			echo "SQL statement failed";
		} else {
			mysqli_stmt_bind_param($stmt, "i", $this->j_id);

			if (mysqli_stmt_execute($stmt)) {
				return true;
			}
			return false;
		}
	}

}
