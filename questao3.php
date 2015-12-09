<?php

//Carrega o arquivo DatabaseConnection (a inclus�o deve ser feito com o nome do arquivo correto)
//include_once "DatabaseConnection.php";

class MyUserClass 
{
    
    private $dbconn;
    //Vari�veis de conex�o com o banco de dados
    private $conn = [
        'host' => 'localhost' ,
        'user' => 'user',
        'pass' => 'password'
    ];
    
    //M�todo que faz a conex�o com o banco de dados
    private function connect()
    {
        $this->dbconn = new DatabaseConnection(
            $this->conn['host'],
            $this->conn['user'],
            $this->conn['pass']
        );
        
        return $this->dbconn;
    }
    
    //M�todo que encerra a conex�o
    public function disconnect() {
        $this->dbconn = null;
    }
    
    //M�todo padr�o construtor
    public function __construct()
    {
        $this->connect();
    }

    //M�todo padr�o destrutor
    public function __destruct() {
        $this->disconnect();
    }
    
    //M�todo que lista e ordena os usu�rios
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

echo "<h3>Usu�rios</h3><br>";
$usuarios = $class->getUserList();

//Lista os dados na tela
foreach ($usuarios as $usu){
    echo $usu['name']."<br>";
}*/

?>