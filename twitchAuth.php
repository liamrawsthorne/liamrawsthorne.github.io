<?php

$client_id = '3m4yrd7fyyqs10ahrsn9isdhn85jne';
$redirect_uri = 'https://www.liamrawsthorne.com/triviatricks/auth.php/';
$response_type = 'code';
$scope = 'chat:read';


$auth_token = "https://id.twitch.tv/oauth2/authorize?response_type=" . $response_type . "&client_id=" . $client_id . "&scope=" . $scope . "&redirect_uri=" . $redirect_uri ;

header ('location: ' . $auth_token);
?>