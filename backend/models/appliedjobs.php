<?php


class AppliedJobs
{
    private $conn;

    public $table_name = "tblappliedjobs";
    public $table_job= "tbljobs";

    public $js_id;
    public $j_id;
    public $c_employerid;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addAppliedJob()
    {   
        $validate = "SELECT j_id FROM $this->table_name WHERE j_id = '$this->j_id' AND
        js_id = '$this->js_id'";
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

    public function fetch_allAppliedJob()
    {
        $query = "SELECT * FROM tblappliedjobs INNER JOIN tbljobs 
        ON (tbljobs.j_id = tblappliedjobs.j_id) 
        INNER JOIN tblemployer ON (tblemployer.employerid = tbljobs.c_employerid)
        WHERE tblappliedjobs.js_id = '$this->js_id'";
        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function fetch_allAppliedJobEmployer()
    {


        $query = "SELECT * FROM tblappliedjobs INNER JOIN tbljobs 
        ON (tbljobs.j_id = tblappliedjobs.j_id) 
        INNER JOIN tblemployer ON (tblemployer.employerid = tbljobs.c_employerid)
        INNER JOIN tbljobseeker ON (tbljobseeker.js_id = tblappliedjobs.js_id)
        WHERE tbljobs.c_employerid = '$this->c_employerid'";
        $stmt = $this->conn->query($query);

        // SELECT * FROM tblappliedjobs INNER JOIN tbljobs 
        // ON (tbljobs.j_id = tblappliedjobs.j_id) 
        // INNER JOIN tblemployer ON (tblemployer.employerid = tbljobs.c_employerid)
        
        // WHERE tbljobs.c_employerid = '18';
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

// SELECT * FROM tblsavedjobs INNER JOIN tbljobs ON (tbljobs.j_id = tblsavedjobs.j_id) 
// INNER JOIN tblemployer ON (tblemployer.employerid = tbljobs.c_employerid)
// WHERE tblsavedjobs.js_id = '7'