<?php

// configuration
$width = 732;
$height = 1101;
$font = 'fonts/Vegur-Regular.otf';
$fontsize = 80;
$angle = 0;
$margin = 40;

foreach (scandir('images/') as $file) {
    if (preg_match('/^([QPL][0-9]+)\.png$/', $file, $match)) {
        $text = $match[1];
        
        // base image
        $img = new Imagick();
        $img->newImage($width, $height, new ImagickPixel('white'));
        
        // id
        if ($text != 'Q0') {
            $draw = new ImagickDraw();
            $draw->setFont($font);
            $draw->setFontSize($fontsize);
            $draw->setTextAlignment(Imagick::ALIGN_CENTER);
            $img->annotateImage($draw, $width / 2, $height - $fontsize - ($margin * 1.6), 0, $text);
        }
        
        // logo
        $logo = new Imagick('images/'.$text.'.png');
        // log cropping
        $logo->trimImage(0);
        // logo scaling
        // TODO two consecutive scalings should be avoided
        $logo->scaleImage($width - ($margin * 5), -1);
        if ($logo->getImageHeight() > $height / 2) {
            $logo->scaleImage(-1, $height / 2);
        }
        // put logo on image
        $logo_height = $logo->getImageHeight();
        $img->compositeImage($logo, Imagick::COMPOSITE_DEFAULT, ($width - $logo->getImageWidth()) / 2, ($height / 1.3 - $logo->getImageHeight()) / 2);
        
        // generate image
        $img->setImageFormat('tiff');
        $img->transformImageColorspace(Imagick::COLORSPACE_CMYK);
        file_put_contents('results/card_'.$text.'.tiff', $img);
        
        // free memory
        $logo->clear();
        $img->clear();
    }
}

echo 'Done!'."\n";

?>