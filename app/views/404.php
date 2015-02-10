

<?php



function parseRequestHeaders() {
    $headers = array();
    foreach($_SERVER as $key => $value) {
        if (substr($key, 0, 5) <> 'HTTP_') {
            continue;
        }
        $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
        $headers[$header] = $value;
    }
    return $headers;
}

// print_r( parseRequestHeaders() );

//
var_dump(http_response_code());


// echo $name;

if (isset($array)) {
    echo "This var is set so I will print.";
}


$messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here...', 'Huh?');

echo $messages[array_rand($messages)];
echo "\nThe page you are looking could not be found.";
echo 'Sorry';



define('FLIGHT_END_TIME', microtime(TRUE));


// print_r(FLIGHT_START_TIME - FLIGHT_END_TIME);



?>
///
ddd
...
