<?php 
class Validate{
    protected $data;
    public $errors = [];

    public function __construct($data){
        $this->data = $data;
    }

    protected function checkString($key,$value){
        $val = trim($this->data[$key]);
        if(empty($val)){
            $this->addError("$key","$value cannot be empty");
        }else{

            if($key=="name" || $key = "lastName"){
                if(!preg_match('/^[a-zA-Z]{0,150}$/',$val)){
                    $this->addError("name",'Name must be 6-12 chars & alphabetic');
                }
            }else{
                if(!preg_match('/^[a-zA-Z]{6,12}$/',$val)){
                    $this->addError("$key","$value must be 6-12 chars & alphabetic");
                }
            }
        }
        
    }


    protected function checkPassword(){
        $val = trim($this->data["password"]);
        if(empty($val)){
            $this->addError("password",'Password cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/',$val)){
                $this->addError("password",'Password must be 6-12 chars');
            }
        }
    }

    protected function addError($key,$value){
        $this->errors[$key] = $value;
    }


}

// private $number = preg_match('@[0-9]@', $password);
// private $uppercase = preg_match('@[A-Z]@', $password);
// private $lowercase = preg_match('@[a-z]@', $password);
// private $specialChars = preg_match('@[^\w]@', $password);
// preg_match('/^[a-zA-Z0-9]{6,12}$/',$user)
?>