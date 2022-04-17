<?php 


    class Users{
        private $table = "kundenverwaltung.users";
        private $conn;



        public function __construct($db){
            $this->conn = $db;
        }


        //Select user
        public function selectUser($username,$password){
            $sql = "SELECT user_name,user_id,user_username,user_added,user_edited,user_deleted FROM $this->table WHERE user_username = ? AND user_password = ?";

            $statement = $this->conn->prepare($sql);

            $statement->execute([htmlspecialchars($username),htmlspecialchars($password)]);

            return $statement->fetch(PDO::FETCH_ASSOC);
        }


        //Check if username already exsist
        public function checkUsername($username){
            $sql = "SELECT user_name FROM $this->table WHERE user_username = ?";

            $statement = $this->conn->prepare($sql);

            $statement->execute([htmlspecialchars($username)]);

            return $statement->fetch(PDO::FETCH_ASSOC);
        
        }

        //Check if email already exsist
        public function checkEmail($email){
            $sql = "SELECT user_email FROM $this->table WHERE user_email = ?";

            $statement = $this->conn->prepare($sql);

            $statement->execute([htmlspecialchars($email)]);

            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        //Insert new user
        public function insert($data){
            $username = htmlspecialchars($data["username"]);
            $password = htmlspecialchars($data["password"]);
            $email = htmlspecialchars($data["email"]);
            $name = htmlspecialchars($data["name"]);
            $lastName = htmlspecialchars($data["lastName"]);
            $birthday= htmlspecialchars(date("Y-m-d", strtotime($data["birthday"])));

            try{
                $sql = "INSERT INTO $this->table (user_username,user_email,user_password,user_name,user_lastName,user_birthday) VALUES ('$username','$email','$password','$name','$lastName','$birthday')";

                $statement = $this->conn->prepare($sql);
                $statement->execute();
                return true;
            }catch(Error $e){
                return false;
            }
        }

        //sELECT DELETED ADDED AND UPDATED
        public function selectDataUser($id){
            try{
                $sql = "SELECT user_added,user_edited,user_deleted FROM $this->table WHERE user_id = ?";

                $statement = $this->conn->prepare($sql);

                $statement->execute([htmlspecialchars($id)]);

                return $statement->fetch(PDO::FETCH_ASSOC);
            }catch(Error $e){
                trigger_error("Error:" . $e);
            }
        }

        // Edit after delete
        public function afterDelete($value,$id){
            
            try{
                $sql = "UPDATE $this->table SET  user_deleted = ? WHERE user_id = ?";

                $statement = $this->conn->prepare($sql);

                $statement->execute([htmlspecialchars($value),htmlspecialchars($id)]);

                return true;
            }catch(Error $e){
                trigger_error("Error:" . $e);
            }
        }


         // Edit after add
         public function afterAdd($value,$id){
            
            try{
                $sql = "UPDATE $this->table SET  user_added = ? WHERE user_id = ?";

                $statement = $this->conn->prepare($sql);

                $statement->execute([htmlspecialchars($value),htmlspecialchars($id)]);

                return true;
            }catch(Error $e){
                trigger_error("Error:" . $e);
            }
        }


         // Edit after edit
         public function afterEdit($value,$id){
            
            try{
                $sql = "UPDATE $this->table SET  user_edited = ? WHERE user_id = ?";

                $statement = $this->conn->prepare($sql);

                $statement->execute([htmlspecialchars($value),htmlspecialchars($id)]);

                return true;
            }catch(Error $e){
                trigger_error("Error:" . $e);
            }
        }

        
    }

?>