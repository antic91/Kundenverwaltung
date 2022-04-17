
<?php 


    class Custromers{

        private $table = "kunde";
        private $connent;

        public function __construct($db){
            $this->connent = $db;
        }

        public function selectAllCustomers(){
            $sql = "SELECT $this->table.*,users.user_username FROM $this->table INNER JOIN users WHERE $this->table.user_id = users.user_id";

            $statement = $this->connent->prepare($sql);
            $statement->execute();
            
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }


        public function selectUserCustomers($user_id){
            $sql = "SELECT $this->table.*,users.user_username FROM $this->table INNER JOIN users WHERE $this->table.user_id = $user_id  AND $this->table.user_id = users.user_id";

            $statement = $this->connent->prepare($sql);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }


        public function deleteCustomers($id){
            try{
                $sql = "DELETE FROM $this->table WHERE kun_id = $id";

                $statement = $this->connent->prepare($sql);
                $statement->execute();
                
            }catch(Error $e){
                trigger_error("Error in deleting customer!!!");
            }
        }


        public function insertCustomer($data){
            $dataArray = [
                htmlspecialchars($_SESSION["userData"]["user_id"]),
                htmlspecialchars($data["companyname"]),
                htmlspecialchars($data["cPerson"]),
                htmlspecialchars($data["phone"]),
                htmlspecialchars($data["street"]),
                htmlspecialchars($data["town"]),
                htmlspecialchars($data["plz"]),
                htmlspecialchars($data["country"]),
                htmlspecialchars($data["streetNum"])
            ];

            try{
                $sql = "INSERT INTO $this->table (user_id, kun_firmename, kun_anspr_person, kun_telefon, kun_adresse, kun_town, kun_plz, kun_country, kun_street_num) VALUES (?,?,?,?,?,?,?,?,?)";

                $statement = $this->connent->prepare($sql);
                $statement->execute($dataArray);
                return true;
            }catch(Error $e){
                return false;
            }
        }

        public function editCustomer($data,$id){
            $dataArray = [
                htmlspecialchars($_SESSION["userData"]["user_id"]),
                htmlspecialchars($data["companyname"]),
                htmlspecialchars($data["cPerson"]),
                htmlspecialchars($data["phone"]),
                htmlspecialchars($data["street"]),
                htmlspecialchars($data["town"]),
                htmlspecialchars($data["plz"]),
                htmlspecialchars($data["country"]),
                htmlspecialchars($data["streetNum"]),
                $id
            ];

            try{
                $sql = "UPDATE $this->table SET user_id = ?, kun_firmename = ?, kun_anspr_person = ?, kun_telefon = ?, kun_adresse = ?, kun_town = ?, kun_plz = ?, kun_country = ?, kun_street_num = ? WHERE kun_id = ?";
                $statement = $this->connent->prepare($sql);
                $statement->execute($dataArray);
                return true;
            }catch(Error $e){
                return false;
            }
        }



        public function selectOneCustomer($customerId){
            $sql = "SELECT * FROM $this->table WHERE kun_id = ?";

            $statement = $this->connent->prepare($sql);

            $statement->execute([htmlspecialchars($customerId)]);

            return $statement->fetch(PDO::FETCH_ASSOC);
        }

    }


?>