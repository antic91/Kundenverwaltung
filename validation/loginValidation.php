<?php 
    
    include_once '../validation/validate.php';

    class ValidateLogin extends Validate{
        private $fields = ["username","password"];

        public function __construct($data){
            parent::__construct($data);
        }

        public function checkLogin(){
            
            foreach ($this->fields as $field) {
                if(!array_key_exists($field,$this->data)){
                    trigger_error("'$field' is not present in the data");
                    return;
                }
            }

            $this->checkString("username","username");
            $this->checkPassword();

            return $this->errors;
        }
    }
?>



