<?php

namespace App\ExternalApi;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class Slack
{
    public function __construct()
    {

    }

    public function pushProjectCreate($data){

        $SLACK_URL = "https://hooks.slack.com/services/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";
        $slack_api = new Client();

        $name = $data['name'];
        $response = $slack_api->request('POST', $SLACK_URL, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                "text" =>"Project created!",
                "blocks" => [
                    [
                        "type" => "section",
                        "text" => [
                            "type" => "mrkdwn",
                            "text" => "프로젝트가 생성되었습니다"
                        ]
                    ],
                    [
                        "type" => "section",
                        "fields" => [
                            [
                                "type" => "mrkdwn",
                                "text" => "제목 :*\n" . $name
                            ],
                        ]
                    ],
                ]
            ]
        ]);
    }

    public function pushImageUpload($data){

        $SLACK_URL = "https://hooks.slack.com/services/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";
        $slack_api = new Client();

        $image_url = $data['file_path'] . $data['file_name'];
        $response = $slack_api->request('POST', $SLACK_URL, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                "text" =>"Image uploaded!",
                "blocks" => [
                    [
                        "type" => "section",
                        "text" => [
                            "type" => "mrkdwn",
                            "text" => "이미지가 업로드 되었습니다"
                        ]
                    ],
                    [
                        "type" => "section",
                        "fields" => [
                            [
                                "type" => "mrkdwn",
                                "text" => "이미지 URL :*\n" . $image_url
                            ],
                        ]
                    ],
                ]
            ]
        ]);
    }

}



