<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function clickLike(Request $request){
        $user_id = $request->user_id;
        $target_id = $request->target_type;

    }


    /**
     * @param Request $request
     * @return false|string|void
     *
     * 23.3.9. Quill JS 에서 이미지 업로드 시, CLOUD 저장 후 URL 리턴
     */
    public function uploadImage(Request $request){
        info(__METHOD__);
        info($request);
        if (isset($_FILES['image'])) {
            $file = $_FILES['image'];

            // Change the directory below to your desired upload directory
            $upload_dir = 'uploads/';

            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $filename = uniqid() . '_' . $file['name'];
            $filepath = $upload_dir . $filename;
            info("\$filepath = $filepath");

            move_uploaded_file($file['tmp_name'], $filepath);

            $response = array(
                'url' => $filepath
            );

//            echo json_encode($response);
            return json_encode($response);
        }
    }
}
