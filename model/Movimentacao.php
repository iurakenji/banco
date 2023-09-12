<?php

require_once "Crud.php";

class Mov extends Crud{

    protected $id;
    protected $acao;
    protected $valor;
    protected $data_movimentacao;
    protected $conta_id;
    private $table = "movimentacao";
    private $primaryKey = "id";

    public function __construct() {
        parent::__construct($this->table, $this->primaryKey);
    }

    function getId(){
        return $this->id;
    }

    function getAcao(){
        return $this->acao;
    }

    function setAcao($acao = null){
        $this->acao = $acao;
    }

    function getValor(){
        return $this->valor;
    }

    function setValor($valor = null){
        $this->valor = $valor;
    }

    function getDataMovimentacao(){
        return $this->data_movimentacao;
    }

    function setDataMovimentacao($data_movimentacao = null){
        $this->data_movimentacao = $data_movimentacao;
    }

    function getContaId(){
        return $this->conta_id;
    }

    function setContaId($conta_id = null){
        $this->conta_id = $conta_id;
    }

    function getMov($id = null){
        $query = "SELECT * FROM movimentacao ";
        if($id != null){
            $query .= "WHERE conta_id = " . $id;
            $query .= " ORDER BY data_movimentacao DESC";
        }

        $dbh = (new PdoHelper())->getConnection();
        $stmt = $dbh->query($query);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados;

    }

    function getMovPeriodo($id = null, $inicio = null, $fim = null){

        $query = "SELECT * FROM movimentacao";
        if($id != null){
            $query .= " WHERE conta_id = " . $id;
            if ($inicio != null & $fim != null){
                $query .= " AND data_movimentacao BETWEEN '" . $inicio . "' AND ADDDATE('" . $fim . "',1)";
                //print_r($query);
            }
            $query .= " ORDER BY data_movimentacao DESC";
        }

        $dbh = (new PdoHelper())->getConnection();
        $stmt = $dbh->query($query);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

}

?>