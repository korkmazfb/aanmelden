<!DOCTYPE html>
<html>
<head>
<title>aanmeld formulier</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
   
    <form action="" method="post">
    <p>
        <label for="voornaam"><p class="p__label">Voornaam</p>   </label>
        <input type="text" name="voornaam" id="voornaam" />
    </p>
    <p>
        <label for="email"><p class="p__label">Email</p></label>
        <input type="text" name="email" id="email" />
    </p>
    <p>
        <label for="text"><p class="p__label">telefoonnummer</p></label>
        <input type="text" name="telefoonnummer" id="telefoonnummer" />
    </p>
    <p>
        <label for="wachtwoord"><p class="p__label">wachtwoord</p></label>
        <input type="text" name="wachtwoord" id="wachtwoord" />
    </p>
    <p>
        <input type="submit" name="submit" value="submit" />
    </p>
    </form>

   
</body>
<?php


    require_once 'database.php'; 
    $pdo=db_connect();

   


   

    foreach (filter_list() as $id =>$filter) {
        echo  '</br><tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
        }




if (isset($_POST['submit'])) {
    echo 'niet leeg';
    print_r ($pdo);

    print_r($_POST);
    $user = $_POST['voornaam'];
    $user__validate = trim(stripslashes(htmlspecialchars($user)));
    
    $email = $_POST['email'];
    $email__validate = trim(stripslashes(htmlspecialchars($email)));

    $telefoonnummer = $_POST['telefoonnummer'];
    $text__telefoonnumer = trim(stripslashes(htmlspecialchars($telefoonnummer)));

    $wachtwoord = $_POST['wachtwoord'];
    $wachtwoord__validate = trim(stripslashes(htmlspecialchars($wachtwoord)));

    $sql = "INSERT INTO aanmelden ('naam','email','telefoonnummer','wachtwoord') VALUES ('".$user__validate."', '".$email__validate."' , '".$text__telefoonnumer."', '".$wachtwoord__validate."')";
    echo 'Query: '.$sql;
    if($pdo->query($sql) === TRUE){
        echo "connectie gelukt";
    }
    else{
        echo "connectie gefaald";
    }

    print_r($pdo) ;

    // $pdo->close();


    
}
else{
    echo "je hebt niet alles ingevuld";
}

// $sql = "INSERT INTO aanmelden (naam,email,telefoonnummer,wachtwoord) VALUES('$user','$email','$text','$wachtwoord')";

// echo $sql
?>

</html>