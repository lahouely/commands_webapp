<?php
session_start();

//vérification
$ok=false;
if(isset($_SESSION['id']))
{
	if($_SESSION['id']==-1)
	{
		$ok=true;
	}
}

if(!$ok)
{
	header('location:index.php');
}

include_once('dbc.php');

if(isset($_POST['Nom']) and isset($_POST['Description']))

{
	$bdd->exec('insert into categories (nom,description) values (\''.$_POST['Nom'].'\',\''.$_POST['Description'].'\')');
	header('location:categories_admin.php');
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" media="screen" type="text/css" title="design" href="design.css">
		<title>index</title>
	</head>
	<body>
	<?php
		include('tete.php');
		include('menu.php');	
	?>
	<div class="page">
		<script type="text/javascript">
	<!--
		function verif(f)
		{
			if(f.Nom.value=="")
			{
				alert("le champ Nom est vide !");
				return false;
			}
			return true;
		}
	//-->
	</script>
		
		<h3>Nouvelle categorie:</h3>
		<table>
			<form method="post" id="formcategorie" action="nouvellecategorie.php" onsubmit="return verif(this);">
				<tr>
					<td><label for="Nom">Nom:</label></td>
					<td><input id="Nom" name="Nom" type="text" size="40" /></td>
				</tr>
				<tr>
					<td><label for="Description">Description:</label></td>
					<td><input id="Description" name="Description" type="text" size="40" /></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:center;"><input type="submit" value="valider" onsubmit="return verif(this);" /></td>
				</tr>
			</form>
		</table>
	</div>
	</body>
</html>