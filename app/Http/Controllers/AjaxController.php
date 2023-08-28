<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Imagick;
use Illuminate\Http\Request;
use App\NCP\ObjectStorage;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
        /**
         * 23.7.26. 이미지 업로드
         * as-is : /public/uploads/ 디렉토리에 업로드
         * to-be : AwsS3 패키지로 NCP ObjectStorage에 업로드
        */
//        if (isset($_FILES['image'])) {
//            $file = $_FILES['image'];

        $file = $_FILES['image'];
        info("FILES file" );
        info($file);

        if($request->file("image")) {
            $file = $request->file("image");
            info("REQUEST FILE");
            info($file);
//            $file_name = date("ymdhis") . "_" . $file['name'];
            $file_name = date("ymdhis") . "_" . $file->getClientOriginalName();

//            $ObjectStorage = new ObjectStorage();
//            $image_url_in_ncp = $ObjectStorage->upload($file, $file_name);
//
//            $response = array(
//                'url' => $image_url_in_ncp
//            );

            $file_origin_fullname = $file->getClientOriginalName();
            Storage::putFileAs('public/posts/' , $file, $file_origin_fullname); // 임시 이미지

            $img1 = Image::make(storage_path('app/public/posts/' . $file_origin_fullname));
            $img1->save(storage_path('app/public/posts/' . $file_origin_fullname)); // Save Temp Image
            $image_file = Storage::disk('local')->get("/public/posts/" . $file_origin_fullname); // Get Temp Image

            $file_ncp_fullname = $file_name;
            Storage::disk('ncloud')->put('/bartizan/posts/' . $file_ncp_fullname, $image_file); // Upload To NCP ObjectStorage
            Storage::delete('public/posts/' . $file_origin_fullname); // Delete Temp Image
            
            $image_url_in_ncp = "https://kr.object.ncloudstorage.com/immanuel/bartizan/posts/" . $file_ncp_fullname;
            $response = array(
                'url' => $image_url_in_ncp
            );

            return json_encode($response);

            // /public/uploads/ 디렉토리에 업로드

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
