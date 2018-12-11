<?php

namespace App;
use Intervention\Image\ImageManagerStatic as IImage;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;


class TransformImage extends MainModel
{
    public $imageName;
    public $imageResult;

    public function __construct($userID, $photoID)
    {
        require "../core/capsule.php";
        $data = Capsule::table('photos')
            ->where('photoID', '=', $photoID)
            ->select(['url'])
            ->get();
        foreach ($data as $value) {
            $url = $value->url;
        }
        $this->imageName = $url;
        echo $this->imageName;
    }

    public function rotateImage()
    {
        $img = IImage::make($this->imageName);
        $img->rotate(45);
        $this->imageResult = str_replace('/images/', '/images/rotate_', $this->imageName);
        $img->save($this->imageResult);
        echo '<img src="' . $this->imageResult . '">';
    }

    public function resizeImage()
    {
        $img = IImage::make($this->imageName);
        $img->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $this->imageResult = str_replace('/images/', '/images/resize_', $this->imageName);
        $img->save($this->imageResult);
        echo '<img src="' . $this->imageResult . '">';
    }

    public function addWaterMark()
    {
        $img = IImage::make($this->imageName);
        $img->insert(PATH . 'Watermark.png', 'bottom');
        $this->imageResult = str_replace('/images/', '/images/wm_', $this->imageName);
        $img->save($this->imageResult);
        echo '<img src="' . $this->imageResult . '">';
    }
}