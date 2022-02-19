<?php


class Employer
{
    private $conn;

    public $table_name = "tblemployer";


    public $employerid;
    public $c_name;
    public $c_location;
    public $c_website;
    public $c_contactname;
    public $c_mobile;
    public $c_email;
    public $c_password;
    public $c_photo;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function fetch_all()
    {
        $query = "SELECT * FROM $this->table_name";
        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function addEmployer()
    {

        $validate = "SELECT c_name, c_email FROM $this->table_name WHERE c_name = '$this->c_name' OR c_email = '$this->c_email'";
        $vallidate = mysqli_query($this->conn, $validate);

        if (mysqli_num_rows($vallidate) > 0) {
            http_response_code(400);
            echo "Creation failed, Company name is already exist!";
            return;
        }


        $query = "INSERT INTO $this->table_name (c_name, c_location, c_website, c_contactname, c_mobile, c_email, c_password, c_photo)
        VALUES (?,?,?,?,?,?,?,'assets/images/index/company.png')";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "sssssss",
            $this->c_name,
            $this->c_location,
            $this->c_website,
            $this->c_contactname,
            $this->c_mobile,
            $this->c_email,
            $this->c_password
        );

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function fetchDetails()
    {
        // Create query
		$query = "SELECT * FROM $this->table_name WHERE employerid = ?";

		//prepare and bind
		$stmt = mysqli_stmt_init($this->conn);

		if (!mysqli_stmt_prepare($stmt, $query)) {
			echo "SQL statement failed";
		} else {
			mysqli_stmt_bind_param($stmt, "i", $this->employerid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			while ($row = mysqli_fetch_assoc($result)) {
				$this->c_name = $row['c_name'];
				$this->c_location = $row['c_location'];
				$this->c_website = $row['c_website'];
				$this->c_contactname = $row['c_contactname'];
				$this->c_mobile = $row['c_mobile'];
				$this->c_email = $row['c_email'];
				$this->c_password = $row['c_password'];
                $this->c_photo = $row['c_photo'];
			}
		}
    }

	public function login(){
		$query = "SELECT * FROM $this->table_name WHERE c_email = ? AND c_password = ?";

		$stmt = mysqli_stmt_init($this->conn);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $this->c_email, $this->c_password);

			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			if(mysqli_stmt_execute($stmt)){
				
				if(mysqli_num_rows($result) == 1){

					while($row = mysqli_fetch_assoc($result)){
						$this->employerid = $row['employerid'];
						$this->c_name = $row['c_name'];
						$this->c_location = $row['c_location'];
						$this->c_website = $row['c_website'];
                        $this->c_contactname = $row['c_contactname'];
						$this->c_mobile = $row['c_mobile'];
						$this->c_email = $row['c_email'];
						$this->c_password = $row['c_password'];
                        $this->c_photo = $row['c_photo'];
					}

					$row = mysqli_fetch_assoc($result);
					session_start();
					$_SESSION['employerid'] = $this->employerid;
                    $_SESSION['c_name'] = $this->c_name;
                    $_SESSION['c_location'] = $this->c_location;
                    $_SESSION['c_website'] = $this->c_website;
                    $_SESSION['c_contactname'] = $this->c_contactname;
                    $_SESSION['c_mobile'] = $this->c_mobile;
                    $_SESSION['c_email'] = $this->c_email;
                    $_SESSION['c_password'] = $this->c_password;
                    $_SESSION['c_photo'] = $this->c_photo;
					return true;
				}
				else{
					return false;
				}
				
			}
			return false;
		} 
	
	}


    public function update()
	{
		$query = "UPDATE $this->table_name SET c_name = ?, c_location = ?, c_website = ?,
                 c_contactname = ?, c_mobile = ?, c_email = ?, c_password = ?, c_photo = ?
			WHERE employerid = ?";

		$stmt = mysqli_stmt_init($this->conn);

		if (!mysqli_stmt_prepare($stmt, $query)) {
			echo "SQL statement failed";
		} else {
			mysqli_stmt_bind_param($stmt, "ssssssssi", $this->c_name, $this->c_location,
             $this->c_website, $this->c_contactname, $this->c_mobile, $this->c_email, 
             $this->c_password, $this->c_photo, $this->employerid);

			if (mysqli_stmt_execute($stmt)) {
				return true;
			}
			return false;
		}
	}
}
