<?php

namespace App\Http\Controllers;

use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Transformation\Delivery;
use Cloudinary\Transformation\Format;
use Cloudinary\Transformation\Quality;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;


/**
 * @group Upload
 * File uploader apis
 */
class UploadController extends Controller
{
    protected $cloudinary;
    protected $cloudinary_admin;


    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => 'kingrayhan',
                'api_key' => '565532172939264',
                'api_secret' => 'WY4z1hcbiTTZoCJ0OSODp2Ep6GM',
            ],
            'url' => [
                'secure' => true
            ]
        ]);

        $this->cloudinary_admin = new AdminApi([
            'cloud' => [
                'cloud_name' => 'kingrayhan',
                'api_key' => '565532172939264',
                'api_secret' => 'WY4z1hcbiTTZoCJ0OSODp2Ep6GM',
            ],
            'url' => [
                'secure' => true
            ]
        ]);
    }


    /**
     * Upload file
     *
     * @bodyParam file file - File
     * @authenticated
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Cloudinary\Api\Exception\ApiError
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file']
        ]);

        $upload = $this->cloudinary
            ->uploadApi()
            ->upload($request->file('file')->getRealPath());


        $url = (string) $this->cloudinary->image($upload['public_id'])
            ->delivery(
                Delivery::format(Format::auto())
            )->delivery(
                Delivery::quality(Quality::auto())
            )->toUrl();

        return response()->json([
            'url' => $url
        ]);
    }


    /**
     * Delete file
     * @bodyParam url string - File url
     * @authenticated
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Cloudinary\Api\Exception\ApiError
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'url' => ['required', 'url']
        ]);

        $file_url = $request->file_url;
        $split = explode("/", $file_url);
        $public_id = implode("/", array_slice($split, -2));

        $admin_api = $this->cloudinary_admin->deleteAssets([
            $public_id
        ]);

        return response()->noContent();
    }
}
