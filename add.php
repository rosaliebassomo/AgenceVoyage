<?php

$name= trim(htmlspecialchars($_POST['name']));
$latitude= trim(htmlspecialchars($_POST['latitude']));
$longitude= trim(htmlspecialchars($_POST['longitude']));

try
{
    $pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $db = new PDO('mysql:host=localhost;dbname=lieux','lieux','azerty', $pdo_option);
    $query = $db->prepare('INSERT 
                 INTO location(name,latitude,longitude) 
                 VALUES(:name,:latitude,:longitude)');
        $query->execute(array('name'=>$name,
                              'latitude'=>$latitude,
                              'longitude'=>$longitude)
                        );
        
        header('location: ./index.php');

                
}
catch(Exception $error)
{
    die('Erreur:'.$error->getMessage());
}
?>
