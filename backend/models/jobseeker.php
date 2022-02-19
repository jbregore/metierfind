<?php


class Jobseeker
{
    private $conn;

    public $table_name = "tbljobseeker";

    //basic info
    public $js_id;
    public $js_name;
    public $js_mobile;
    public $js_email;
    public $js_password;
    public $js_photo;

    //job prefer
    public $js_jp_availability;
    public $js_jp_job_type;
    public $js_jp_expected_sal;

    //about me
    public $js_am_highest_education;
    public $js_am_gender;
    public $js_am_birthday;
    public $js_am_introduce;
    public $js_resume;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addJobseeker()
    {

        $validate = "SELECT js_email FROM $this->table_name WHERE js_email = '$this->js_email'";
        $vallidate = mysqli_query($this->conn, $validate);

        if (mysqli_num_rows($vallidate) > 0) {
            http_response_code(400);
            echo "Creation failed, Company name is already exist!";
            return;
        }

        $query = "INSERT INTO $this->table_name (js_name, js_mobile, js_email, js_password, js_photo, 
                js_jp_availability, js_jp_job_type, js_jp_expected_sal,
                js_am_highest_education, js_am_gender, js_am_birthday,
                js_am_introduce, js_resume)
        VALUES (?,?,?,?,'assets/images/index/profile-img.jpg' ,'' ,'' ,'' ,'' ,'' ,'', '', '')";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "ssss",
            $this->js_name,
            $this->js_mobile,
            $this->js_email,
            $this->js_password
        );


        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login()
    {
        $query = "SELECT * FROM $this->table_name WHERE js_email = ? AND js_password = ?";

        $stmt = mysqli_stmt_init($this->conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            echo "SQL statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $this->js_email, $this->js_password);

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_stmt_execute($stmt)) {

                if (mysqli_num_rows($result) == 1) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $this->js_id = $row['js_id'];
                        $this->js_name = $row['js_name'];
                        $this->js_mobile = $row['js_mobile'];
                        $this->js_email = $row['js_email'];
                        $this->js_password = $row['js_password'];
                        $this->js_photo = $row['js_photo'];
                    }

                    $row = mysqli_fetch_assoc($result);
                    session_start();
                    $_SESSION['js_id'] = $this->js_id;
                    return true;
                } else {
                    return false;
                }
            }
            return false;
        }
    }

    public function update()
	{
		$query = "UPDATE $this->table_name SET js_photo = ? WHERE js_id = ?";

		$stmt = mysqli_stmt_init($this->conn);

		if (!mysqli_stmt_prepare($stmt, $query)) {
			echo "SQL statement failed";
		} else {
			mysqli_stmt_bind_param($stmt, "si", $this->js_photo, $this->js_id);

			if (mysqli_stmt_execute($stmt)) {
				return true;
			}
			return false;
		}
	}

    public function updatePrefer()
	{
		$query = "UPDATE $this->table_name SET js_jp_availability = ?, 
        js_jp_job_type = ?, js_jp_expected_sal = ? WHERE js_id = ?";

		$stmt = mysqli_stmt_init($this->conn);

		if (!mysqli_stmt_prepare($stmt, $query)) {
			echo "SQL statement failed";
		} else {
			mysqli_stmt_bind_param($stmt, "sssi", $this->js_jp_availability, $this->js_jp_job_type,
             $this->js_jp_expected_sal, $this->js_id);

			if (mysqli_stmt_execute($stmt)) {
				return true;
			}
			return false;
		}
	}

    public function updateAboutMe()
	{   
        $validate = "SELECT js_email FROM $this->table_name WHERE js_email = '$this->js_email'
        EXCEPT SELECT js_email = '$this->js_email'";
        $vallidate = mysqli_query($this->conn, $validate);

        


        if (mysqli_num_rows($vallidate) > 0) {
            http_response_code(400);
            echo "Creation failed!";
            return;
        }

		$query = "UPDATE $this->table_name SET js_email = ?, js_mobile = ?, js_name = ?,
         js_am_highest_education = ?, js_am_gender = ?, js_am_birthday = ?, js_am_introduce = ?
          WHERE js_id = ?";

		$stmt = mysqli_stmt_init($this->conn);

		if (!mysqli_stmt_prepare($stmt, $query)) {
			echo "SQL statement failed";
		} else {
			mysqli_stmt_bind_param($stmt, "sssssssi", $this->js_email, $this->js_mobile, $this->js_name,
             $this->js_am_highest_education, $this->js_am_gender, $this->js_am_birthday, $this->js_am_introduce,
             $this->js_id);

			if (mysqli_stmt_execute($stmt)) {
				return true;
			}
			return false;
		}
	}

    
    public function updateResumee()
	{
		$query = "UPDATE $this->table_name SET js_resume = ? WHERE js_id = ?";

		$stmt = mysqli_stmt_init($this->conn);

		if (!mysqli_stmt_prepare($stmt, $query)) {
			echo "SQL statement failed";
		} else {
			mysqli_stmt_bind_param($stmt, "si", $this->js_resume, $this->js_id);

			if (mysqli_stmt_execute($stmt)) {
				return true;
			}
			return false;
		}
	}
    
    public function fetchDetails()
    {
		$query = "SELECT * FROM $this->table_name WHERE js_id = ?";

		$stmt = mysqli_stmt_init($this->conn);

		if (!mysqli_stmt_prepare($stmt, $query)) {
			echo "SQL statement failed";
		} else {
			mysqli_stmt_bind_param($stmt, "i", $this->js_id);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			while ($row = mysqli_fetch_assoc($result)) {
				$this->js_name = $row['js_name'];
				$this->js_mobile = $row['js_mobile'];
				$this->js_email = $row['js_email'];
				$this->js_password = $row['js_password'];
				$this->js_photo = $row['js_photo'];

				$this->js_jp_availability = $row['js_jp_availability'];
				$this->js_jp_job_type = $row['js_jp_job_type'];
                $this->js_jp_expected_sal = $row['js_jp_expected_sal'];

                $this->js_am_highest_education = $row['js_am_highest_education'];
				$this->js_am_gender = $row['js_am_gender'];
                $this->js_am_birthday = $row['js_am_birthday'];
                $this->js_am_introduce = $row['js_am_introduce'];
                $this->js_resume = $row['js_resume'];

			}
		}
    }
}

