<?php 

    include_once '../validation/validate.php';

    class ValidateRegister extends Validate{
        private $fields = [];

        public function __construct($data){
            parent::__construct($data);
        }
    
        public function checkRegisterData(){
            foreach ($this->fields as $field) {
                if(!array_key_exists($field,$this->data)){
                    trigger_error("'$field' is not present in the data");
                    return;
                }
            }


            $this->checkString("username","username");
            $this->checkPassword();
            $this->checkRepeatedPassword();

            if(!array_key_exists("password1",$this->errors) && !array_key_exists("password",$this->errors)){
                $this->checkPasswords();
            }

            $this->checkEmail();

            $this->checkString("name","Name");
            $this->checkString("lastName","Lastname");

            return $this->errors;
        }


        protected function checkRepeatedPassword(){
            $val = trim($this->data["password1"]);
            if(empty($val)){
                $this->addError("password1",'Password cannot be empty');
            }else{
                if(!preg_match('/^[a-zA-Z0-9]{6,12}$/',$val)){
                    $this->addError("password1",'Password must be 6-12 chars & alphanumeric');
                }
            }
        }

        private function checkPasswords(){
            if(!($this->data["password1"] === $this->data["password"])){
                $this->addError("notSamePasswords",'Both password must be the same!');
            }
        }
    
        private function checkEmail(){
            $val = trim($this->data["email"]);

            if(empty($val)){
                $this->addError("email",'Email cannot be empty');
            }else{
                if(!filter_var($val,FILTER_VALIDATE_EMAIL)){
                    $this->addError('email', 'email must be a valid email address');
                }
            }
        }

        // private function checkName(){
        //     $val = trim($this->data["name"]);
        //     if(empty($val)){
        //         $this->addError("name",'Name cannot be empty');
        //     }else{
        //         if(!preg_match('/[^a-z\s-]/i',$val)){
        //             $this->addError("name",'Name must be 6-12 chars & alphabetic');
        //         }
        //     }
            
        // }

        // private function checkLastName(){
        //     $val = trim($this->data["lastName"]);
        //     if(empty($val)){
        //         $this->addError("lastName",'Lastname cannot be empty');
        //     }else{
        //         if(!preg_match('/[^a-z\s-]/i',$val)){
        //             $this->addError("lastName",'Lastname must be 6-12 chars & alphabetic');
        //         }
        //     }
            
        // }
    
    }

?>