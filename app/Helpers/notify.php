<?php
namespace App\Helpers;

class SendNotification
{

	private $url = 'https://fcm.googleapis.com/fcm/send';
    private  $server_key = 'AAAA1Ue8BA0:APA91bEjDdOflByMQbqUrHz4KqXiaeNg4Dr1f2qqbPHrtQkV94WDHSmHUdlzCXWrwrgzKIr6GauzDbUeA-MEWC7OX0dekUXlXSCb8iYYcgq5Wxu14322p0MqQU6Ri7sBtHWJqhEF89vp';
    
	public function sendAndroid($data)
    {
        $arr1 = $data['reg_token'];

        //$arr1 = "eBeyxafITaiklBpEAw18_B:APA91bGUnyHG3Bg4y1YpH4R50XYISXgaNaQRTn23pZNwve7Y51_MKNYqVr41EBYKDr8rtWFTkfKI3Vo54TuBW6W2z5YcvTCx1xF1SMJaBslPxSOHMoo1WK4kcvOST4hVFnikj0d2pQ0x";
        $data_push = array(
            'notification' => array(
                'title' => $data['title'],
                "body"=> $data['message'], 
            ),
            'to' => $arr1
        );
        
        $result = $this->sendPush($data_push);
		return  $result;
    }

    public function sendIos($data)
    {
       
        $arr2 = $data['reg_token'];
        $data_push = array(
            "to" => $arr2,
            'priority' => 'high',
            'content-available' => 1,
            'notification' => array(
                'title' => $data['title'],
                'body' => $data['message'],
                'vibrate' => 1,
                'sound' => 1,
                'force-start' => 0,
                'cold-start' => true,
                'badge' => 1,
                'additional' => $data,
            ),
        );
        $result = $this->sendPush($data_push);
		return  $result;
    }

    public function sendPush($data_push)
    {
        
        $data = json_encode($data_push);

        $headers = array(
            'Content-Type:application/json',
            'Authorization:key=' . $this->server_key,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
		curl_close($ch);
        
		if($result === false){
			return ['status' => "error", "message" => 'CURL error'];
		}else{
			return $result;
		}
        
    }
}
