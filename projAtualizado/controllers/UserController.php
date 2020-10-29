<?php
/**
 * UserController - Controller de usuários
 * @author Cândido Farias
 * @package mvc
 * @since 0.1
 */
class UserController extends MainController
{

	/**
	 * Carrega a página "/views/user/index.php"
	 * @author Cândido Farias
	 */
    public function index() {
		$this->loadArchives();
		
	} // index
	
    /**
	 * Carrega a página "/views/user/login.php"
	 * @author Cândido Farias
	 */
    public function login() {
		// Título da página
		$this->title = 'Login';
		/** Carrega os arquivos do view **/
		require PATH . '/views/user/login.php';
	} // login

	public function security(){

		$this->title = 'segurança';

		$this->loadArchives();

	

	}

	public function validateSec(){

		

if(!empty($_POST['inputSec'])){

	$senhaInput = $_POST['inputSec'];

	if($senhaInput == 'ABC321'){
		
		$msg['class']="success";
		$msg['msg']="A senha está correta, agora você poderá adicionar mais usuários ao sistema";
		$_SESSION['msg'][]=$msg;
		header('location:'.HOME_URI.'/user/formNewUser');
	}
	else{
		$msg['class']="danger";
		$msg['msg']="Esta senha não está correta";
		$_SESSION['msg'][]=$msg;
		$this->loadArchives();
		
		
	}

	
		
}

	}
public function formNewUser(){
	$this->loadArchives();


}

public function validateUser(){
	if (isset($_POST['checkbox'])) {
		$nivel = "admin";
	} else {
		$nivel = "geral";
	}

	if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])&& isset($_POST['nome']) && !empty($_POST['nome'])){

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = md5 ($_POST['senha']);
	


	//testa se já existe no banco de dados

	$userModel=$this->load_model("user");
	$user=$userModel->validateIfExists($email);

	if($user){
		//$this->setUser($user);
		$msg['class']="danger";
		$msg['msg']="Este endereço de email já consta no sistema";
		header('location:'.HOME_URI.'/user/formNewUser');
		
	}else{

		$msg['class']="success";
		$msg['msg']="endereço de email válido";
		$modelo=$this->load_model("user");

		$newUser=$modelo->insert($nome, $email, $senha, $nivel);
	
		
	}
	
	$_SESSION['msg'][]=$msg;

	

	

	}
	else{
echo "não deu certro";

	}

	header('location:'.HOME_URI.'/user/formNewUser');

	//$conteudo = require_once PATH . '/views/user/index.php';
}



    /**
	 * Encerra a sessão do usuário
	 * @author Cândido Farias
	 */
    public function logout() {
		$this->unsetUser();
		$msg['class']="success";
		$msg['msg']="By";
		$_SESSION['msg'][]=$msg;
		header("Refresh: 2; url =".HOME_URI);
    } // logout

    /**
	 * Autentica o usuario"
	 * @author Cândido Farias
	 */
    public function autenticar() {
		if(isset($_POST['user'])){
			$userModel=$this->load_model("user");
			$user=$userModel->autenticar($_POST['user']['email'],md5($_POST['user']['password']));
			if($user){
				$this->setUser($user);
				$msg['class']="success";
				$msg['msg']="Login realizado com sucesso!";
				
			}else{
				$msg['class']="danger";
				$msg['msg']="Falha ao realizar login!";
			}
			$_SESSION['msg'][]=$msg;
			
		}
		
		header("Refresh: 2; url =".HOME_URI);
	
    } // autenticar
	
} // class UserController