<?php
/*
This is to expose all possible web visitor data. This can later be inserted to a database.


*/

//print_r($_SERVER);
//var_dump($_SERVER);


$servername = "localhost";
$username = "demos";
$password = "ThisIsAHardPassword2024";
$dbname = "lourui_demos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



//website statistics
function trackVisitor($conn) {
    // Capture IP Address
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Capture User Agent
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // Capture Referrer (if available)
    $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Direct';

    // Capture Page Visited
    $page_visited = $_SERVER['REQUEST_URI'];



    // Insert the data into the web_statistics table
    $sql = "INSERT INTO web_statistics (ip_address, user_agent, referrer, page_visited) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $ip_address, $user_agent, $referrer, $page_visited);
    $stmt->execute();
}



trackVisitor($conn);


    // Capture IP Address
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Capture User Agent
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // Capture Referrer (if available)
    if (isset($_SERVER['HTTP_REFERER'])) {
    $referrer = $_SERVER['HTTP_REFERER'];
    } else {
        $referrer = 'Direct';
    }

    // Capture Page Visited
    $page_visited = $_SERVER['REQUEST_URI'];



$DaHtml = "
<html>
<head>
<title>Web Visitor Info</title>

    <!-- Start DataTables CSS and JS-->
    <link href='https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css' rel='stylesheet'>
     
    <script src='https://code.jquery.com/jquery-3.7.1.js'></script>
    <script src='https://cdn.datatables.net/2.3.4/js/dataTables.js'></script>



    <!-- End DataTables CSS and JS-->


</head>

<body>
    <center><h2>Web Visitor Info</h2></center>
    <center>Current Visitor</center>

    <center>
    <table id='myTable' class='display' style='width:90%; max-width:1200px;'>
    <thead>
    <tr>
    <th>IP Address</th> <th>User Agent</th> <th>Referrer</th> <th>Page Visited</th>
    </tr>
    </thead>

    <tr>
    <td>$ip_address</td> <td>$user_agent</td> <td>$referrer</td> <td>$page_visited</td>
    </tr>


    </table>
    </center>
    
</body>

<script>
new DataTable('#myTable');
//$('#myTable').DataTable();
</script>



</html>

";

echo $DaHtml;






?>
