<?php
namespace Engtuncay\Phputils\core;

/** 
 * This class has all the necessary code for making API calls thru curl library
 */
class FiCurl
{

  // This method will perform an action/method thru HTTP/API calls
// Parameter description:
// Method= POST, PUT, GET etc
// Data= array("param" => "value") ==> index.php?param=value
  public static function requestHttp($method, $url, $data = false, $headerParams)
  {
    $curl = curl_init();

    switch ($method) {
      case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);

        if ($data)
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
      case "PUT":
        curl_setopt($curl, CURLOPT_PUT, 1);
        break;
      default:
        if ($data)
          $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    if (isset($headerParams)) {

      curl_setopt($curl, CURLOPT_HTTPHEADER, $headerParams);
    }

    //array(
    // 'Content-Type: application/xml',
    // 'Connection: Keep-Alive'
    // )

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
  }

}

// require_once("FiCurl.php");
// ...
// $action = "GET";
// $url = "api.server.com/model"
// echo "Trying to reach ...";
// echo $url;
// $parameters = array("param" => "value");
// $result = CurlHelper::perform_http_request($action, $url, $parameters);
// echo print_r($result)