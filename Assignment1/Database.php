<!--
CREATE TABLE Pizzabase (
  id int not null auto_increment,
  fname varchar(255) NOT NULL,
  lname varchar(255) NOT NULL,
  age varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  address varchar(255) NOT NULL,
  primary key (id)
);
-->

<?php
// Create a class to hold the database connection information
class Database
{
    private $connection;

    function __construct()
    {
        // Constructor to establish the database connection
        $this->connect_db();
    }

    public function connect_db()
    {
        // Method to connect to the database
        $this->connection = mysqli_connect('172.31.22.43', 'Ramsin200484980', 'HBL6BO_2LU', 'Ramsin200484980');

        if (mysqli_connect_error()) {
            die("Database connection failed: " . mysqli_connect_error());
        }
    }

    public function create($fname, $lname, $age, $email)
    {
        // Method to insert data into the Pizzabase table
        $sql = "INSERT INTO Pizzabase (fname, lname, age, email) VALUES ('$fname', '$lname', '$age', '$email')";
        $res = mysqli_query($this->connection, $sql);

        if ($res) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }

    public function read($id = null)
    {
        // Method to retrieve data from the Pizzabase table
        $sql = "SELECT * FROM Pizzabase";

        if ($id) {
            $sql .= " WHERE id =$id";
        }

        $res = mysqli_query($this->connection, $sql);
        return $res;
    }

    public function sanitize($var)
    {
        // Method to sanitize user inputs
        $return = mysqli_real_escape_string($this->connection, $var);
        return $return;
    }
}

// Create an instance of the Database class
$database = new Database();
?>
