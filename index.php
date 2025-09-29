<?php
/*
This is to expose all possible web visitor data. This can later be inserted to a database.


*/

//print_r($_SERVER);
//var_dump($_SERVER);


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
</head>

<body>
    <center><h2>Web Visitor Info</h2></center>

    <center>
    <table>
    <th>IP Address</th> <th>User Agent</th> <th>Referrer</th> <th>Page Visited</th>
    <tr>
    <td>$ip_address</td> <td>$user_agent</td> <td>$referrer</td> <td>$page_visited</td>
    </tr>


    </table>
    </center>
    
</body>



</html>

";

echo $DaHtml;


?>
