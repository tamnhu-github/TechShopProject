<?php
namespace App\Models;
    
    class User 
    {

        private $connection;

         public function __construct()
        {
            // Replace these values with your actual database configuration
            $host = DB_HOST;
            $username = DB_USER;
            $password = DB_PASSWORD;
            $database = DB_NAME;

            $this->connection = new \mysqli($host, $username, $password, $database);

            // Check connection
            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }
        }   

        public function getAllUsers()
        {
            $result = $this->connection->query("SELECT * FROM users");
            return $result->fetch_all(MYSQLI_ASSOC);  
        }
    
        public function getUserById($userId) 
        {
            // Dùng prepared statement để tránh SQL injection
            $sql = "SELECT * FROM users WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            
            if (!$stmt) {
                // Log lỗi nếu câu SQL không prepare được
                error_log("Failed to prepare statement: " . $this->connection->error);
                return null;
            }
    
            // Bind parameter
            $stmt->bind_param("i", $userId);  // i for integer
            
            // Execute query
            if (!$stmt->execute()) {
                // Log lỗi nếu execute thất bại
                error_log("Failed to execute statement: " . $stmt->error); 
                return null;
            }
    
            // Get result
            $result = $stmt->get_result();
            
            if (!$result) {
                // Log lỗi nếu không lấy được result
                error_log("Failed to get result: " . $stmt->error);
                return null; 
            }
    
            // Fetch data
            $user = $result->fetch_assoc();
            
            // Close statement
            $stmt->close();
            
            return $user;
        }
        public function createUser($username, $firstname, $lastname, $password_input, $password_check, $email)
        {
            $username = $this->connection->real_escape_string($username);
            $firstname = $this->connection->real_escape_string($firstname);
            $lastname = $this->connection->real_escape_string($lastname);
            $password_input = $this->connection->real_escape_string($password_input);
            $password_check = $this->connection->real_escape_string($password_check);
            $email = $this->connection->real_escape_string($email);


            $this->connection->query("INSERT INTO users (username, firstname, lastname, password_input, password_check, email) VALUES ('$username', '$firstname', '$lastname', '$password_input', '$password_check', '$email')");
            
            // Redirect to the index page after creating post
            header('Location: ../../index.php');
        }

        public function updateUser($userId, $username, $firstname, $lastname, $password_input, $password_check, $email)
        {
            $userId = $this->connection->real_escape_string($userId);
            $username = $this->connection->real_escape_string($username);
            $firstname = $this->connection->real_escape_string($firstname);
            $lastname = $this->connection->real_escape_string($lastname);
            $password_input = $this->connection->real_escape_string($password_input);
            $password_check = $this->connection->real_escape_string($password_check);
            $email = $this->connection->real_escape_string($email);


            $this->connection->query("UPDATE users 
                                    SET username='$username', 
                                        firstname='$firstname',
                                        lastname='$lastname',
                                        password_input='$password_input',
                                        password_check='$password_check',
                                        email='$email'
                                    WHERE id=$userId");
            
            // Redirect to the index page after update
            header('Location: ../../index.php');
            
        }

        public function deleteUser($userId)
        {
            $userId = $this->connection->real_escape_string($userId);
            $this->connection->query("DELETE FROM users WHERE id=$userId");
        }
}
?>
