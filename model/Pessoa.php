<?php
require_once 'Crud.php';

class Pessoa extends Crud{

    protected $id;
    protected $nome;
    protected $email;
    protected $cpf;
    protected $nascimento;
    protected $senha;
    protected $imagem;
    private $table = "pessoa";
    private $primaryKey = "id";

    public function __construct() {
        parent::__construct($this->table, $this->primaryKey);
    }

    function getId(){
        return $this->id;
    }

    function getNome(){
        return $this->nome;
    }

    function setNome($nome = null){
        $this->nome = $nome;
    }

    function getEmail(){
        return $this->email;
    }

    function setEmail($email = null){
        $this->email = $email;
    }

    function getSenha(){
        return $this->senha;
    }

    function setSenha($senha = null){
        $this->senha = $senha;
    }

    function getCpf(){
        return $this->cpf;
    }

    function setCpf($cpf = null){
        $this->cpf = $cpf;
    }

    function getNascimento(){
        return $this->nascimento;
    }

    function setNascimento($nascimento = null){
        $this->nascimento = $nascimento;
    }

    function getImagem(){
        return $this->imagem;
    }

    function setImagem($imagem = null){
        $this->nascimento = $imagem;
    }

    function getPessoa($id = null){
        $query = "SELECT * FROM pessoa ";
        if($id != null){
            $query .= "WHERE id = " . $id;
        }

        $dbh = (new PdoHelper())->getConnection();
        $stmt = $dbh->query($query);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados;

    }

    function getPessoaByEmail($email = null){
        $query = "SELECT * FROM pessoa WHERE email like '%" . $email . "%'";
        $dbh = (new PdoHelper())->getConnection();
        $stmt = $dbh->query($query);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

}