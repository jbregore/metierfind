<?php


class Jobs
{
    private $conn;

    public $table_name = "tbljobs";


    public $j_id;
    public $c_employerid;
    public $c_person_name;
    public $j_title;
    public $j_desc;
    public $j_quali;
    public $j_vacancies;
    public $j_location;
    public $j_type;
    public $j_salary;
    public $j_posted_date;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addJob()
    {

        $validate = "SELECT j_title FROM $this->table_name WHERE j_title = '$this->j_title'";
        $vallidate = mysqli_query($this->conn, $validate);

        if (mysqli_num_rows($vallidate) > 0) {
            http_response_code(400);
            echo "Creation failed, job title is already exist!";
            return;
        }


        $query = "INSERT INTO $this->table_name (c_employerid, c_person_name, j_title, j_desc, j_quali,
         j_vacancies, j_location, j_type, j_salary, j_posted_date)
        VALUES (?,?,?,?,?,?,?,?,?, NOW() )";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "isssssssi",
            $this->c_employerid,
            $this->c_person_name,
            $this->j_title,
            $this->j_desc,
            $this->j_quali,
            $this->j_vacancies,
            $this->j_location,
            $this->j_type,
            $this->j_salary
        );

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function fetch_all()
    {
        $query = "SELECT * FROM $this->table_name WHERE c_employerid = '$this->c_employerid'";
        $stmt = $this->conn->query($query);

        return $stmt;
    }

	public function fetch_single()
	{
		$query = "SELECT * FROM $this->table_name WHERE j_id = ?";

		$stmt = mysqli_stmt_init($this->conn);

		if (!mysqli_stmt_prepare($stmt, $query)) {
			echo "SQL statement failed";
		} else {
			mysqli_stmt_bind_param($stmt, "i", $this->j_id);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			while ($row = mysqli_fetch_assoc($result)) {

				$this->c_employerid = $row['c_employerid'];
				$this->c_person_name = $row['c_person_name'];
				$this->j_title = $row['j_title'];
				$this->j_desc = $row['j_desc'];
				$this->j_quali = $row['j_quali'];
				$this->j_vacancies = $row['j_vacancies'];
				$this->j_location = $row['j_location'];
                $this->j_type = $row['j_type'];
				$this->j_salary = $row['j_salary'];
				$this->j_posted_date = $row['j_posted_date'];
			}
		}
	}

    public function update()
	{
		$query = "UPDATE $this->table_name SET c_employerid = ?, c_person_name = ?, j_title = ?,
                 j_desc = ?, j_quali = ?, j_vacancies = ?, j_location = ?,
                 j_type = ?, j_salary = ?
			WHERE j_id = ?";

		$stmt = mysqli_stmt_init($this->conn);

		if (!mysqli_stmt_prepare($stmt, $query)) {
			echo "SQL statement failed";
		} else {
			mysqli_stmt_bind_param($stmt, "isssssssii", $this->c_employerid, $this->c_person_name,
             $this->j_title, $this->j_desc, $this->j_quali, $this->j_vacancies, $this->j_location,
              $this->j_type, $this->j_salary, $this->j_id);

			if (mysqli_stmt_execute($stmt)) {
				return true;
			}
			return false;
		}
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

    
    public function fetch_all_jobs_fulltime()
    {
        $query = "SELECT * FROM $this->table_name WHERE j_type = 'Full Time'";
        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function fetch_all_jobs_parttime()
    {
        $query = "SELECT * FROM $this->table_name WHERE j_type = 'Part Time'";
        $stmt = $this->conn->query($query);

        return $stmt;
    } 

    public function fetch_all_jobs_contract()
    {
        $query = "SELECT * FROM $this->table_name WHERE j_type = 'Contract'";
        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function fetch_allSavedJob()
    {
        $query = "SELECT * FROM $this->table_name WHERE j_id = '$this->j_id'";
        $stmt = $this->conn->query($query);

        return $stmt;
    }
}
