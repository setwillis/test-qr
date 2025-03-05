<?php
// Проверка, что запрос пришел через AJAX
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    exit('Direct access not allowed');
}

// Подключение WordPress
require_once('../../../../wp-load.php');

// Проверка nonce для безопасности
$data = json_decode(file_get_contents('php://input'), true);
if (!wp_verify_nonce($data['_wpnonce'], 'process_payment_nonce')) {
    wp_send_json_error('Security check failed');
}

<?
$urlApi = 'http://dev-bill.unetcom.ru/api/find/payment';
$urlApiNDog = 'http://dev-bill.unetcom.ru/api/find/ndog';
// $urlApiNDog = 'https://unetcom.ru/api/find/ndog';

$result = array(
  'status' => 'ERROR',
  'data' => array(
    'errorLevel' => 'HIGH',
    'text' => 'Неверные данные'
  )
);

$ip = $_SERVER['REMOTE_ADDR'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $json = file_get_contents('php://input');
  $data = json_decode($json);

  if (is_object($data) && property_exists($data,'stype')) {
    switch ($data->stype) {
      case 'greatQr':
        $account = intval($data->account);
        $amount = intval($data->amount);
        if ($account > 0 && $account <= 1000000) {

          if ($amount > 9 && $amount < 15000) {
            $arrData = array (
              'stype' => 'greatQr',
              'account' => $account,
              'amount' => $amount,
              'ip' => $ip
            );
            $resRequest = request('POST',$arrData, $urlApi);
            if ($resRequest['status']) {
              $resRequest = $resRequest['data'];
              if ($resRequest->{'status'} == 'SUCCESS') {
                $result['status'] = 'SUCCESS';
                $result['data'] = $resRequest->{'data'};
                $result['platform'] = $data->platform;
              } else {
                $result['data']['text'] = $resRequest->{'data'}->{'text'};
              }
            } else {
              $result['data']['text'] = $resRequest['textError'];
              $result['data']['retErrCode'] = $resRequest['retErrCode'];
              $result['data']['retCode'] = $resRequest['retCode'];
            }
          } else {
            $result['data']['text'] = 'Сумма платежа меньше 10 или больше 150000';
          } 

        } else {
          $result['data']['text'] = 'Некорректный номер договора';
        }

        break;

      case 'getQrLink':
        $arrData = array(
          'stype' => 'getQrLink',
          'id' => $data->id,
          'ip' => $ip
        );
        $resRequest = request('POST', $arrData, $urlApi);
        if ($resRequest['status']) {
          $resRequest = $resRequest['data'];
          if ($resRequest->{'status'} == 'SUCCESS') {
            $result['status'] = 'SUCCESS';
            $result['data'] = $resRequest->{'data'};
            $result['platform'] = $data->platform;
            if ($data->getQr === true && ($data->platform == 'ios' || $data->platform == 'android') && $resRequest->{'data'}->{'statusQR'} == 'NEW' && $resRequest->{'data'}->{'payload'} !== '') {
              $result['data']->{'linkPayload'} = getLinksPayload($resRequest->{'data'}->{'payload'}, $data->platform);
            }
          } else {
            $result['data']['text'] = $resRequest->{'data'}->{'text'};
          }
        } else {
          $result['data']['text'] = $resRequest['textError'];
          $result['data']['retErrCode'] = $resRequest['retErrCode'];
          $result['data']['retCode'] = $resRequest['retCode'];
        }
        break;

      case 'get_ndog':
        $arrData = array(
          'stype' => 'get_ndog',
          'street' => (property_exists($data,'street') ? $data->street : ''),
          // 'street' => $data->street,
          'home' => (property_exists($data,'home') ? $data->home : ''),
          'korp' => (property_exists($data,'korp') ? $data->korp : ''),
          'fio' => (property_exists($data,'fio') ? $data->fio : '')
        );
        
        $resRequest = request('GET', '', $urlApiNDog . '?' . http_build_query($arrData));
        if ($resRequest['status']) {
          $resRequest = $resRequest['data'];
          if ($resRequest->{'result'} == 'success') {
            $result['status'] = 'SUCCESS';
            $result['data'] = $resRequest->{'payload'};
          } else {
            $result['data']['text'] = "Не получен ответ от сервера";
          }
        } else {
          $result['data']['text'] = $resRequest['textError'];
          $result['data']['retErrCode'] = $resRequest['retErrCode'];
          $result['data']['retCode'] = $resRequest['retCode'];
        }
        break;
        
      default:
        $result['data']['text'] = 'Ключ не найден';
    }
  }

}

echo json_encode($result);

function request($method, $data, $url){

  $data_string = json_encode($data);

  if ($method === 'POST') {
    $_config = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json;charset=utf-8',
          'Content-Length: ' . strlen($data_string)
      ),        
      CURLOPT_POSTFIELDS => $data_string,
      CURLOPT_CUSTOMREQUEST => $method,
      CURLOPT_SSL_VERIFYPEER => 0
    );
  } else {
    $_config = array(
      CURLOPT_URL => $url,
      CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json;charset=utf-8',
      ),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => $method,
      CURLOPT_SSL_VERIFYPEER => 0
    );
  }

  $curl = curl_init();
  curl_setopt_array($curl, $_config);
  $response = curl_exec($curl);
  $retCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $retErrCode = curl_errno($curl);
  
  if ($retErrCode || $retCode != 200) {
    return array(
      'status'=> false,
      'textError' => 'Сервер не отвечает. Повторите запрос через несколько минут',
      'retErrCode' => $retErrCode,
      'retCode' => $retCode
    );
  } else {
    return array(
      'status' => true,
      'data' => json_decode($response)
    );
  }

}

function requestPayload($method, $payload, $platform, $url)
{

  if ($method === 'GET') {
    $_config = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array(
        'X-CLIENT: brandname:UnetCommunication',
        'X-PLATFORM: ' . $platform,
        'X-PAYLOAD: ' . $payload
      ),
      CURLOPT_CUSTOMREQUEST => $method,
      CURLOPT_SSL_VERIFYPEER => 0
    );
  }

  $curl = curl_init();
  curl_setopt_array($curl, $_config);
  $response = curl_exec($curl);
  $retCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $retErrCode = curl_errno($curl);

  if ($retErrCode || $retCode != 200) {
    // echo 'The request was not completed, check the URL is correct. Code error: ' . $retErrCode;

    if ($response) {
      $res = json_decode($response);

      if ($retCode == 400) {
        // echo $res->{'message'} . ' code: ' . $res->{'code'} . ' Code error: ' . $retErrCode;
      } else {
        // echo $res->{'error'} . ' Code error: ' . $retErrCode;
      }
    }


    return false;
  }

  curl_close($curl);


  // echo "" . PHP_EOL; // TODO удалить строку
  // // print_r($response);
  // echo "-----------Начало ответа на запрос-----------" . PHP_EOL; // TODO удалить строку
  // print_r(json_decode($response)); //TODO удалить строчку
  // echo "" . PHP_EOL; // TODO удалить строку
  // echo "-----------Конец ответа на запрос------------" . PHP_EOL; // TODO удалить строку
  // // file_put_contents('bank.txt', print_r(json_decode($response), true));

  return json_decode($response);

}


/** 
 * Получение списка банков для оплаты по QR коду 
 * @param string $payload
 * @param string $platform
 * @return array
 */
function getLinksPayload($payload, $platform) {
  $url = 'https://widget.cbrpay.ru' . '/v1/members';
  $result = requestPayload('GET', $payload, $platform, $url);
  if ($result) {
    if (is_object($result) && property_exists($result,'members')) {
      return $result->members;
    }
  } else return array();

}

header('Content-Type: application/json');
echo json_encode($result);
exit;

?>
