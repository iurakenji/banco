<?php
require_once 'Crud.php';

class Conta extends Crud{

    protected $id;
    protected $agencia;
    protected $contacorrente;
    protected $saldo;
    protected $pessoa_id;
    private $table = "conta";
    private $primaryKey = "id";

    public function __construct() {
        parent::__construct($this->table, $this->primaryKey);
    }


    function getContaByPessoa($idPessoa = null){
        
        $query = "SELECT * FROM conta";
        if(null != $idPessoa){
            $query .= " WHERE pessoa_id = " . $idPessoa;
        }
        //exit($query);
        $dbh = (new PdoHelper())->getConnection();
        $stmt = $dbh->query($query);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados[0];
    }

    function getContaByConta($ag = null, $cc = null){
        
        $query = "SELECT * FROM conta";
        if(null != $ag && null != $cc){
            $query .= " WHERE agencia = " . $ag . " AND contacorrente = " . $cc;
        }
        //exit($query);
        $dbh = (new PdoHelper())->getConnection();
        $stmt = $dbh->query($query);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($dados) != 0) {
        return $dados[0];
        } else {
        return null;
        }
    }




}