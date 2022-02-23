<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary\Cloudinary;


/**
 * @group Upload
 * File uploader apis
 */
class UploadController extends Controller
{
    protected $cloudinary;


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
    }


    /**
     * Upload file
     *
     * @bodyParam file file - File
     * @authenticated
     * @param Request $request
     * @return void
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

        return $upload->secure_url;
    }


    public function destroy(Request $request)
    {
        $request->validate([
            'url' => ['required', 'url']
        ]);


    }
}
