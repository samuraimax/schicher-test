<?php
# Fill our vars and run on cli
# $ php -f db-connect-test.php

$dbname = 'schicher_db';
$dbuser = 'root';
$dbpass = '1234567890';
$dbhost = 'schicher_db';

// $connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
// mysql_select_db($dbname) or die("Could not open the db '$dbname'");

// $test_query = "SHOW TABLES FROM $dbname";
// $result = mysql_query($test_query);

// $tblCnt = 0;
// while($tbl = mysql_fetch_array($result)) {
//   $tblCnt++;
//   #echo $tbl[0]."<br />\n";
// }

// if (!$tblCnt) {
//   echo "There are no tables<br />\n";
// } else {
//   echo "There are $tblCnt tables<br />\n";
// }

$dsn= "mysql:host=$dbhost;port=3306;dbname=$dbname";
// $conn = new PDO("mysql:host=$servername;port=8889;dbname=AppDatabase", $username, $password);

try{
 // create a PDO connection with the configuration data
 $conn = new PDO($dsn, $dbuser, $dbpass);

 // display a message if connected to database successfully
 if($conn){
 echo "Connected to the <strong>$dbname</strong> database successfully!";
        }
}catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}

?>
<!-- put in ./www directory -->

<html>
 <head>
  <title>Hello...</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
    <?php echo "<h1>Hi! I'm happy</h1>"; ?>

    <?php

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


    $query = 'SELECT * From users';
    $result = mysqli_query($conn, $query);

    echo '<table class="table table-striped">';
    echo '<thead><tr><th></th><th>id</th><th>name</th></tr></thead>';
    while($value = $result->fetch_array(MYSQLI_ASSOC)){
        echo '<tr>';
        echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
        foreach($value as $element){
            echo '<td>' . $element . '</td>';
        }

        echo '</tr>';
    }
    echo '</table>';

    $result->close();

    mysqli_close($conn);

    ?>
    </div>
</body>
</html>
