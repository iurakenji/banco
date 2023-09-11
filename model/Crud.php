<?php 
require_once 'PdoHelper.php';

abstract class Crud extends PdoHelper{
    
    private $table;
    private $primaryKey;
    
    function __construct($table, $primaryKey){
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }
    
    
    public function insert(array $data){
        
        $sql = "INSERT INTO {$this->table} ( ";
        $qtdeReg = count($data);
        $i = 1;
        foreach ($data as $k => $v){
            if($k != $this->primaryKey){
                $sql .= "{$k} " ;
                if($i < $qtdeReg){
                    $sql .= ",";
                }
            }
            $i++;
        }
        
        $sql .= " ) VALUES ( ";
        
        $z = 1;
        foreach ($data as $k => $v){
            if($k != $this->primaryKey){
                $sql .= "'{$v}'" ;
                if($z < $qtdeReg){
                    $sql .= ",";
                }
            }
            $z++;
        }
        
        $sql .= ")";

        //exit($sql);
        
        $pdo = (new PdoHelper())->getConnection();
        
        try {
            $pdo->beginTransaction();
            $stmt = $pdo->exec($sql);
            $id = $pdo->lastInsertId();
            $pdo->commit();
        } catch(PDOException $e) {
            $pdo->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }
        
        return $id;
        
    }
    
    /**
     * Summary of update
     * @param array $data
     * @return bool|int
     */
    public function update(array $data){
        
        $qUpdate = " UPDATE {$this->table} SET ";
        
        $qtdeReg = count($data);
        
        $i = 1;
        foreach ($data as $k => $v){
            if($k != $this->primaryKey){
                $qUpdate .= "{$k}='{$v}' " ;
                if($i < $qtdeReg-1){
                    $qUpdate .= ",";
                }
                $i++;
            }
            
        }
        
        $id = $data["{$this->primaryKey}"];
        $qUpdate .= "WHERE {$this->primaryKey}={$id}";
        
        
        $pdo = (new PdoHelper())->getConnection();
        try {
            $pdo->beginTransaction();
            $result = $pdo->exec($qUpdate);
            $pdo->commit();
        } catch(PDOException $e) {
            $pdo->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }
        
        return $result;
        
    }

    
}

?>