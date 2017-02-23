<?php namespace app\Http\Controllers\Front\Trail\Images;

use Image;

class ImagesController
{
    public $img;

    public $transparent;

    public $width;

    public $height;

    public function __construct($img = null)
    {
        if (!empty($img)) {
            $this->img = imagecreatefrompng($img);
            $this->width = imagesx($this->img);
            $this->height = imagesy($this->img);
            $this->setTransparentColour();
        }
    }

    public function create($width, $height, $transparent)
    {
        $this->img = imagecreatetruecolor($width, $height);
        $this->width = $width;
        $this->height =$height;

        $this->setTransparentColour();

        if (true === $transparent) {
            imagefill($this->img, 0, 0, $this->transparent);
        }
    }

    public function setTransparentColour($red = 255, $green = 0, $blue = 255)
    {
        $this->transparent = imagecolorallocate($this->img, $red, $green, $blue);
        imagecolortransparent($this->img, $this->transparent);
    }

    public function circleCrop()
    {
        $mask = imagecreatetruecolor($this->width, $this->height);
        $black = imagecolorallocate($mask, 0, 0, 0);
        $magenta = imagecolorallocate($mask, 255, 0, 255);

        imagefill($mask, 0, 0, $magenta);

        imagefilledellipse(
            $mask,
            ($this->width / 2),
            ($this->height / 2),
            $this->width,
            $this->height,
            $black
        );

        imagecolortransparent($mask, $black);

        imagecopymerge($this->img, $mask, 0, 0, 0, 0, $this->width, $this->height, 100);

        imagedestroy($mask);
    }

    public function merge(Img $in, $dst_x = 0, $dst_y = 0)
    {
        imagecopymerge(
            $this->img,
            $in->img,
            $dst_x,
            $dst_y,
            0,
            0,
            $in->width,
            $in->height,
            100
        );
    }

    public function render()
    {
        header('Content-type: image/png');
        imagepng($this->img);
    }
}

