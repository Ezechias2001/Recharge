<?php 
use Mailjet\Client;
use Mailjet\Resources;

class MailClass
{
    private $api_key = 'e86ad5930fc766a12c107bd04a9af8d3';
    private $api_key_secret = '998c07d8c01668c6c5b75c13bf69b0b4';

    public function send($to_email, $to_name, $subject, $content)
    {
        $mj = new Client($this->api_key, $this->api_key_secret,true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "barrmurphyroy@caimmilawchamberof.com",
                        'Name' => "Recharge"
                    ],
                    'To' => [
                        [
                            'Email' => $to_email,
                            'Name' => $to_name
                        ]
                    ],
                    'TemplateID' => 3131753,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => [
                        'content' => $content,
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }
}
