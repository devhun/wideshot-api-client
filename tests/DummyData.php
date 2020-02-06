<?php

namespace DevHun\Wideshot\Tests;

class DummyData
{
    private $response = [
        'message/sms' => '{
            "code": "200"
        }',
        'message/lms' => '{
            "code": "200"
        }',
        'message/mms' => '{
            "code": "200"
        }',
        'message/isms' => '{
            "code": "200"
        }',
        'message/alimtalk' => '{
            "code": "200"
        }',
        'message/friendtalk' => '{
            "code": "200"
        }',
        'message/result' => '{
            "code": "200",
            "data": [
                {"resultCode": ""}
            ]
        }',
        'message/results' => '{
            "code": "200",
            "data": [
                {"resultCode": ""},
                {"resultCode": ""},
                {"resultCode": ""},
                {"resultCode": ""},
                {"resultCode": ""},
                {"resultCode": ""},
                {"resultCode": ""}
            ]
        }',
    ];

    public function getResponse($url, array $args)
    {
        $response = '{}';

        switch ($url) {
            case 'message/result':
            case 'message/results':
//                $response = json_decode($this->response[$url], true);
                break;
            default:
                if (isset($args['userKey'])) {
                    $response = json_decode($this->response[$url], true);
                    $response['sendCode'] = $args['userKey'];
                    $response = json_encode($response);
                }
                break;
        }

        if ($response === '{}' && isset($this->response[$url])) {
            $response = $this->response[$url];
        }

        return $response;
    }
}
