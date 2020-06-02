<?php
    class Mail{
        public $address;
        public $subject;
        public $message;
        private $status;

        public function __construct($address, $subject, $message)
        {
            $this->address = $address;
            $this->subject = $subject;
            $this->message = $message;
            $this->status = 0;
        }

        public function __get($attribute)
        {
            return $this->$attribute;
        }

        public function __set($attribute , $value)
        {
            $this->$attribute = $value;
        }
    }

?>
