<?php 
    require 'Models/user.model.php';
    require 'Database/connection.php';    

    class UserService{
        private $connection;
        private $user;

        public function __construct(Connection $connection, User $user)
        {
            $this->connection = $connection->connect();
            $this->user = $user;
        }

        public function insert()
        {
            $query = "insert into tb_users (name, email, telephone) values (:name, :email, :telephone)";
            $stmt = $this->connection->prepare($query);

            $stmt->bindValue(':name', $this->user->__get('name'));
            $stmt->bindValue(':email', $this->user->__get('email'));
            $stmt->bindValue(':telephone', $this->user->__get('telephone'));

            $stmt->execute();
        }
    }

?>