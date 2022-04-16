
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
    }


?>