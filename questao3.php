<?php

//Carrega o arquivo DatabaseConnection (a inclusão deve ser feito com o nome do arquivo correto)
//include_once "DatabaseConnection.php";

class MyUserClass 
{
    
    private $dbconn;
    //Variáveis de conexão com o banco de dados
    private $conn = [
        'host' => 'localhost' ,
        'user' => 'user',
        'pass' => 'password'
    ];
    
    //Método que faz a conexão com o banco de dados
    private function connect()
    {
        $this->dbconn = new DatabaseConnection(
            $this->conn['host'],
            $this->conn['user'],
            $this->conn['pass']
        );
        
        return $this->dbconn;
    }
    
    //Método que encerra a conexão
    public function disconnect() {
        $this->dbconn = null;
    }
    
    //Método padrão construtor
    public function __construct()
    {
        $this->connect();
    }

    //Método padrão destrutor
    public function __destruct() {
        $this->disconnect();
    }
    
    //Método que lista e ordena os usuários
    public function getUserList()
    {
        $results = $this->connect()->query('select name from user');
        $rs = $results->fetchAll();
        sort($rs);
        
        return $rs;
    }
}

/*
$class = new MyUserClass();

echo "<h3>Usuários</h3><br>";
$usuarios = $class->getUserList();

//Lista os dados na tela
foreach ($usuarios as $usu){
    echo $usu['name']."<br>";
}*/

?>