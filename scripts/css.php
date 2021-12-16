<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">




<?php
$query = "SELECT * FROM themes WHERE id = 1 limit 1";


$post = $db->select($query);

$themes = $post->fetch_assoc();  

if($themes['theme'] == "green") { ?>

<link rel="stylesheet" href="themes/green.css">
<?php } ?>