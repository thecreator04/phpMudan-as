<?php
class UserModel extends MainModel
{
	/**
	* Consulta para verificar usuario e senha durante a autenticação
	* @
	*
	**/
	public function autenticar($email, $password){
		/*Lista  de colunas a serem retornadas */
		$cols=['id','nome','email','nivel'];
		
		$where['email']=$email;
		$where['senha']=$password;
		$user=$this->db->select("usuario", $cols, $where);
		if($user){
			return $user[0];
		}else{
			return false;
		}   
		
	}

	public function insert($nome, $email, $senha, $nivel){

		
		
		
       $data[] = [
			"nome" => $nome,
			"email" => $email,
			"senha" => $senha,
			"nivel" => $nivel,
		];

		//var_dump($data);
		$table ="usuario";

        return $resultado=$this->db->insert($table, $data);
    }

public function validateIfExists($email){



$cols=['id','nome','email','nivel'];
$where['email']=$email;
$user=$this->db->select("usuario", $cols, $where);

if($user){
	return true;
}else{


	//$user=$this->db->insert("user", $umArray);
	return false;
} 




	}

	public function loadCursoCoordenador($pessoa_id){
		$sql="SELECT c.* FROM coordenador co
		JOIN curso c ON c.id=co.curso_id
		WHERE
		co.professor_pessoa_id=".$pessoa_id;

		$result=$this->db->query($sql,null);
		$curso=null;
		While($item=$result->fetch(PDO::FETCH_ASSOC)){
			$curso[]=$item;
		}
		return $curso;
	}

	

}