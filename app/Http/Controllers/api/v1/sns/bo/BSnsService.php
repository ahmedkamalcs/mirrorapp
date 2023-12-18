<?php

namespace App\Http\Controllers\api\v1\sns\bo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\v1\ModelFactory;
use App\Http\Model\v1\event\EventCategoryModel;
use App\Http\Controllers\api\v1\dto\InvoiceDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Models\api\v1\paymentmodel\InvoiceModel;
use App\Http\Controllers\api\v1\dto\BusinessInterface;

/* * *
 * @author ISG.
 * Business event class that handles business logic for Event Details table.
 */
use AWS;
use Aws\Sns\SnsClient;
use Aws\Exception\AwsException;
use App\Http\Controllers\api\v1\dto\SnsDTO;

class BSnsService {

    public static function sendSMS(SnsDTO $snsDTO) {
        $aws = AWS::createClient('sns');
        $aws->publish([
            'Message' => $snsDTO->getSMS(),
            'PhoneNumber' => $snsDTO->getPhoneNumber(),
            'DefaultSenderID' => SnsDTO::$DEFAULT_SENDER_ID
        ]);
    }

    public function pushMessage() {

//        $SnSclient = AWS::createClient('sns');
//        ///Try and Error
//        try {
//            $SnSclient->setSMSAttributes([
//                'attributes' => [
//                    'DefaultSMSType' => 'Promotional',
//                    'DefaultSenderID' => 'ISG',
//                ],
//            ]);
//
//            $SnSclient->publish([
//                'Message' => 'D1',
////          'TargetArn' => 'arn:aws:sns:us-east-2:725382632977:snsISGFWTopicV2',
//                'PhoneNumber' => '+201002521807',
//                'DefaultSenderID' => 'ISG',
////             'PhoneNumber' => '+966543996969',
//            ]);
//
////            var_dump($SnSclient);
//            return "Done";
//        } catch (AwsException $e) {
//            // output error message if fails
//            error_log($e->getMessage());
//        }
//        return;
        ///Try and Error
//        //Register Phone Nummber. Start
        /* $snsClient = AWS::createClient('sns');
          $protocol = 'sms';
          $endpoint = '+201090097125';
          $topic = 'arn:aws:sns:us-east-2:725382632977:snsISGFWTopicV2';

          try {
          $result = $snsClient->subscribe([
          'Protocol' => $protocol,
          'Endpoint' => $endpoint,
          'ReturnSubscriptionArn' => true,
          'TopicArn' => $topic,
          ]);
          //            var_dump($result);
          } catch (AwsException $e) {
          // output error message if fails
          error_log($e->getMessage());
          }
          return; */
//        */
        //Register Phone Nummber. End
        //Notify
//        $snsClient = new SnsClient([
//            'region' => 'us-east-2',
//            'version' => 'latest',
//            'credentials' => ['key' => 'AKIA2RZBMSYI5EFZA7RB', 'secret' => 'gZ21BdZ30cmrnErycEdzn/wAYs5pjH4GkvdCVwn+']
//        ]);
////
//        $message = 'This message is sent from a Amazon SNS code sample.';
//        $phone = '+201002521807';
//
//        try {
//            $result = $snsClient->publish([
//                'Message' => $message,
////                'PhoneNumber' => $phone,
//                 'TargetArn' => 'arn:aws:sns:us-east-2:725382632977:snsISGFWTopicV1:14584c4b-6eff-45ac-a6d0-30f63982a737',
//            ]);
//            var_dump($result);
//        } catch (AwsException $e) {
//            // output error message if fails
//            error_log($e->getMessage());
//        }
        //Send Notification
//        //11111..Good example
        $aws = AWS::createClient('sns');
//         $endPointArn = array("EndpointArn" => 'arn:aws:sns:us-east-2:725382632977:snsISGFWTopicV2');
//         $endpointAtt = $aws->getEndpointAttributes($endPointArn);
//         return $endpointAtt;
        $result = $aws->publish([
            'Message' => 'S',
//          'TargetArn' => 'arn:aws:sns:us-east-2:725382632977:snsISGFWTopicV2',
            'PhoneNumber' => '+201002521807',
            'DefaultSenderID' => 'ISG',
//             'PhoneNumber' => '+966543996969',
        ]);
        return $result;
//        //11111
        //A
//        $sdk = new SnsClient([
//            'region' => 'us-east-2',
//            'version' => 'latest',
//            'credentials' => ['key' => 'AKIA2RZBMSYI5EFZA7RB', 'secret' => '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']
//        ]);
//
//        $result = $sdk->publish([
//            'Message' => 'This is a test message.',
//            'PhoneNumber' => '+201002521807',
//            'MessageAttributes' => ['AWS.SNS.SMS.SenderID' => [
//                    'DataType' => 'String',
//                    'StringValue' => 'WebNiraj'
//                ]
//        ]]);
//
//        print_r($result);
        //A
        //22222
//        $SnSclient = AWS::createClient('sns');
//        $message = 'This message is sent from ISG framework';
//        $phone = '+201002521807';
//        $subject = 'ISG Smart Framework';
//
//        try {
//            $result = $SnSclient->publish([
//                'Message' => $message,
//                'PhoneNumber' => $phone,
//            ]);
//            var_dump($result);
//        } catch (AwsException $e) {
//            // output error message if fails
//            error_log($e->getMessage());
//        }
        //22222
        //33333333333
//        $phone = '+201002521807';
//        $data = [
//            "type" => "Manual Notification" // You can add your custom contents here 
//        ];
//        $notificationMessage = "ISGFW Message";
//        $arn = "arn:aws:sns:us-east-2:725382632977:snsISGFWTopicV1";
////        $endPointArn = array("EndpointArn" => $arn);
//        try {
//                $sns = AWS::createClient('sns');;//App::make('aws')->createClient('sns');
////                $endpointAtt = $sns->getEndpointAttributes($endPointArn);
////                if ($endpointAtt != 'failed' && $endpointAtt['Attributes']['Enabled'] != 'false') {
//                    
//                $fcmPayload = json_encode(
//                    [
//                        "notification" =>
//                            [
//                                "title"             => "ISGFW",
//                                "body"              => "Message from ISGFW v1",
//                                "sound"             => 'default',
//                                /*"notificationid"    => $notificationid,
//                                "dataid"            => $dataid,
//                                "notificationcount" => $notificationcount*/
//
//                            ],
////                        "data" => $data // data key is used for sending content through notification.
//                    ]
//                );
//                $message = json_encode(["default" => $notificationMessage, "GCM" => $fcmPayload]);
//                $sns->publish([
//                    'TargetArn' => $arn,
//                    'Message' => $message,
////                    'PhoneNumber' => $phone,
//                    'MessageStructure' => 'json'
//                ]);
//                    
////                }
//            } catch (SnsException $e) {
//                Log::info($e->getMessage());
//            }
        //33333333333
        //44444
//        $phone = "+201002521807";
//         $snsClient = AWS::createClient('sns');
//         $result = $snsClient->listPhoneNumbersOptedOut([
//    ]);
//    var_dump($result);
//        return $result;
        //44444
    }

}
