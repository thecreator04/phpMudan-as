<?php

class AlunoModel extends MainModel{

    

    public function listar(){
        $sql="SELECT * FROM aluno";

		$retorno=$this->db->query($sql, null);
		While($item=$retorno->fetch(PDO::FETCH_ASSOC)){
			$resultado[]=$item;
		}
		return $resultado;
    }

    public function select($id=null){
		if($id){
			$where['id']=$id;
		}else{
			$where=null;
        }
        return $this->db->select("aluno", null, $where);
    }
    public function validateIfExists($matricula){



        $cols=['id','nome','matricula','data_nascimento'];
        $where['matricula']=$matricula;
        $user=$this->db->select("aluno", $cols, $where);
        
        if($user){
            return true;
        }else{
        
        
            //$user=$this->db->insert("user", $umArray);
            return false;
        } 
    }

    public function insert($aluno){
        $array[]=$aluno;
        return $resultado=$this->db->insert("aluno",$array);
    }

    /**
     * 
     */
    public function update($aluno){
        return $this->db->update("aluno","id",$aluno['id'], $aluno);
    }

    /**
     * 
     */
    public function delete($id){
        return $this->db->delete("aluno","id",$id);
    }



}