<?php require_once 'vendor/autoload.php';?>
<?php session_start();?>
<?php 


$fb = new \Facebook\Facebook([
  'app_id' => '947928235605768',
  'app_secret' => '2e5c8b6b54b16e71b732b6d0ff797a84',
  'default_graph_version' => 'v5.0',
  'default_access_token' => '{access-token}'
]);
//geting token from fb user and placed innto our session/db//

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/Web_shop/");

$token_id =$helper->getAccessToken();


if (isset($token_id)) {
    $_SESSION['facebook_user_id'] = (string)$token_id;
}



?>