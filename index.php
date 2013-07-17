require_once('lib/facebook.php');
$appid = '225579727456616';
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
'appId' => $appid,
'secret' => '1e893964d2de3f24de084a95eed4662f',
'cookie' => true
));
// Session based API call.
$session = $facebook->getSession();
$me = null;
/* Autenticacion */
$app_id = "225579727456616";
$canvas_page = "http://apps.facebook.com/gracias-maestro/";
/* URL that will be used for authentication */
$auth_url = "http://www.facebook.com/dialog/oauth?client_id="
. $app_id . "&redirect_uri=" . urlencode($canvas_page);
$signed_request = $_REQUEST["signed_request"];
list($encoded_sig, $payload) = explode('.', $signed_request, 2);
$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
/* Validate if the user authorized the application */
if (empty($data["user_id"])) {
echo("");
}else{
if ($session) {
try {
$uid = $facebook->getUser();
$me = $facebook->api('/' . $uid);
} catch (FacebookApiException $e) {
$e="";
}
}
}
