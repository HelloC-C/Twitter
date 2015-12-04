<?php

$ConsumerKey = "Your Consumer Key";
$ConsumerSecret = "Your Consumer Secret";
$AccessToken = "Your Token";
$AccessTokenSecret = "Your Token Secret";

require 'tmhOAuth.php';
require 'tmhUtilities.php';

$tmhOAuth = new tmhOAuth(array('consumer_key'=>$ConsumerKey,'consumer_secret'=>$ConsumerSecret,'user_token'=>$AccessToken,'user_secret'=>$AccessTokenSecret));

$image = 'cat.jpg';

$code = $tmhOAuth->request( 'POST','https://api.twitter.com/1.1/statuses/update_with_media.json',
    array(
        'media'  => "@{$image};type=image/jpeg;filename={$image}",
        'status'   => 'Hello Twitter~',
    ),
    true, // use auth
    true // multipart
);
if ($code == 200){
    tmhUtilities::pr(json_decode($tmhOAuth->response['response']));
    echo 'ok';
}else{
    tmhUtilities::pr($tmhOAuth->response['response']);
    echo 'error';
}
