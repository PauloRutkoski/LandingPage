<?php 
    class User{
        private $name;
        private $email;
        private $telephone;

        public function __construct($name, $email, $telephone)
        {
            $this->name = addslashes($name);
            $this->email = addslashes($email);
            $this->telephone = addslashes($telephone);
        }

        public function __get($attribute)
        {
            return $this->$attribute;
        }

        public function __set($attribute , $value)
        {
            $this->$attribute = $value;
        }

        public function verifyEmail() {
            if (!preg_match('/([a-zA-Z0-9.-_])*([@])([a-z0-9]).([a-z]{2,3})/',$this->email)){
                return false;
            } else{
                
                $domain=explode('@',$this->email);
				if(!checkdnsrr($domain[1],'A')){
                    return false;
                }
            }
            return true;
        }
    }
?>