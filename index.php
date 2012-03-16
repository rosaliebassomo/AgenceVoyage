<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.5&sensor=false"></script>
<script type="text/javascript" src="./jquery.jmapping-2.1.0/vendor/markermanager.js"></script>
<script type="text/javascript" src="./jquery.jmapping-2.1.0/vendor/StyledMarker.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="./jquery.jmapping-2.1.0/vendor/jquery.metadata.js"></script>
<script type="text/javascript" src="./jquery.jmapping-2.1.0/jquery.jmapping.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#map').jMapping();
});
</script>
    </head>
    <body>
        <ul>
            <li><a href="./form.php" >Ajouter un Lieu</a></li>
        </ul>
        <hr/>
        <?php
        try
{
    $pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $db = new PDO('mysql:host=localhost;dbname=lieux','lieux','azerty', $pdo_option);
    $query = $db->prepare('SELECT * FROM location');
    $query->execute();
    while ($data =$query->fetch()) 
    {
        //echo $data['name'].''.$data['latitude'].''.$data['longitude'];
        //echo '<iframe src="http://maps.google.be/maps?q='.$data['latitude'].','.$data['longitude'].'&num=1&vpsrc=6&t=m&z=16&output=embed"></iframe>';
       echo '<iframe width="500" height="400" src="http://maps.google.be/maps?q='.$data['latitude'].','.$data['longitude'].'&vpsrc=0&t=m&z=16&output=embed"></iframe>';
    
    }
    
    echo'<p>Destinations possibles: '.$query->rowCount().'</p>';
    $query->closeCursor();
   
                
}
catch(Exception $error)
{
    die('Erreur:'.$error->getMessage());
}
        
        ?>
        
    </body>
</html>
