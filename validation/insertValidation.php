<?php 
    
    include '../validation/validate.php';

    class insertValidation extends Validate{
        private $fields = ["cPerson","street","town"];

        public function __construct($data){
            parent::__construct($data);
        }

        public function checkInsertVal(){
            
            foreach ($this->fields as $field) {
                if(!array_key_exists($field,$this->data)){
                    trigger_error("'$field' is not present in the data");
                    return;
                }
            }

            $this->checkString("cPerson","Contact person");
            $this->checkString("street","Street name");
            $this->checkString("town","Town");

            return $this->errors;
        }
    }
?>



