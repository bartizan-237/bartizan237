<?php

namespace App\NCP;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;


class ObjectStorage
{
    // Naver Cloud Platform
    // AwsS3 FileSystem Package

    private $client;
    private $filesystem;
    public function __construct()
    {
        $this->client = new S3Client([
            'credentials' => [
                'key'    => env('NCLOUD_ACCESS_KEY_ID'),
                'secret' => env('NCLOUD_SECRET_KEY')
            ],
            'region' => 'kr-standard',
            'endpoint' => 'https://kr.object.ncloudstorage.com',
            'version' => '2006-03-01',
        ]);
        $adapter = new AwsS3Adapter($this->client, env("NCLOUD_BUCKET"));
        $this->filesystem = new Filesystem($adapter);
    }

    public function upload($image, $file_name){
        // NCP ObjectStorage에 파일업로드
//        try {
//            $result = $this->client->putObject([
//                'Bucket' => env("NCLOUD_BUCKET"),
//                'Key' => $file_name,
//                'Body' => $image,
//                'ACL' => 'public-read',
//                'CacheControl' => 'max-age=2592000',
//            ]);
//            return $result;
//        } catch (\GuzzleHttp\Exception\RequestException $e){
//            info(__FUNCTION__ . " : " . __LINE__);
//            if ($e->hasResponse()) {
//                $response = $e->getResponse();
//                $response_header = $response->getHeaders();
//                $result = $response->getBody()->getContents();
//                info($response->getStatusCode()); // HTTP status code;
//                info($response->getReasonPhrase()); // Response message;
//            }
//            return false;
//        }

        info(__METHOD__ . " >> $file_name");
        try{
            $response = $this->filesystem->write("/bartizan/posts/". $file_name, $image, [
                'visibility' => 'public',
                'CacheControl' => 'max-age=2592000',
                'ContentType' => 'image/jpeg'
            ]);
            return $response;
        } catch (\GuzzleHttp\Exception\RequestException $e){
            info(__FUNCTION__ . " : " . __LINE__);
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $response_header = $response->getHeaders();
                $result = $response->getBody()->getContents();
                info($response->getStatusCode()); // HTTP status code;
                info($response->getReasonPhrase()); // Response message;
            }
            return false;
        }

    }
}

