<?php

$nom = (isset($_POST['nom']))? $_POST['nom'] : '';
$prenom = (isset($_POST['prenom']))? $_POST['prenom'] : '';
$email = (isset($_POST['email']))? $_POST['email'] : '';
$response = '';

?>

<form method="post" action="#">
    <table>
        <tr>
            <td>Nom : </td>
            <td><input type="text" name="nom" value="<?php echo $nom;?>"></td>
        </tr>
        <tr>
            <td>Prénom : </td>
            <td><input type="text" name="prenom" value="<?php echo $prenom;?>"></td>
        </tr>
        <tr>
            <td>Email : </td>
            <td><input type="text" name="email" value="<?php echo $email;?>"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td align="right"><input type="submit" name="submit" value="Submit"></td>
        </tr>    
    </table>
</form>

<?php

if(!empty($nom) || !empty($prenom)){    
    if(strlen($nom) <= 3 || strlen($prenom) <= 3){
        $response .= 'les champs "nom" et "prénom" doivent contenir plus de 3 charactères<br/>';
    }  
}

if(!empty($email)){
    $pos = strpos($email, '@');
    if($pos === false){
        $response .= 'veuillez renseigner une adresse email avec un "@"<br/>';
    }
}

if(empty($response)){
	$response = $nom .' '.$prenom .'<br/>'. $email;
}

if((isset($_POST['nom']) && empty($nom)) || (isset($_POST['prenom']) && empty($prenom)) || (isset($_POST['email']) && empty($email))){
    $response = 'veuillez remplir tous les champs';
}

echo $response;

?>