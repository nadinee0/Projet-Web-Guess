<?PHP
session_start();
include_once '../model/utilisateur.php';
include_once '../controller/utilisateurC.php';
$message="";
$userC = new utilisateurC();
if(isset($_POST["email"]) && isset($_POST["password"]))
 if (/empty($_POST["email"])&&/empty($_POST["password"]))
{
	$message=$userC->connexionUser($_POST["email"],$_POST["password"]);
	$_session ['e']=$_POST["email"];
	if($message ≠ 'pseudo ou le mot de passe est incorrect'){
		header ('location : ../back/index.php');}
		else{
			$message='pseudo ou le mot de passe est incorrecte';
		}
		}
		else
		$message="missing information"
}
?>