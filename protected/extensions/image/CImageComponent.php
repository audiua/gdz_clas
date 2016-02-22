<?php

Yii::import('application.extensions.image.Image');

/**
 * Description of CImageComponent
 *
 * @author Administrator
 */
class CImageComponent extends CApplicationComponent
{
    /**
     * Drivers available:
     *  GD - The default driver, requires GD2 version >= 2.0.34 (Debian / Ubuntu users note: Some functions, eg. sharpen may not be available)
     *  ImageMagick - Windows users must specify a path to the binary. Unix versions will attempt to auto-locate.
     * @var string
     */
    public $driver = 'GD';

    /**
     * ImageMagick driver params
     * @var array
     */
    public $params = array();

    public function init()
    {
        parent::init();
        if ($this->driver != 'GD' && $this->driver != 'ImageMagick') {
            throw new CException('driver must be GD or ImageMagick');
        }
    }

    public function load($image)
    {
        $config = array(
            'driver' => $this->driver,
            'params' => $this->params,
        );

        return new Image($image, $config);
    }
	
	public function cropSave($sourse, $maxWidth, $maxHeight, $file, $watemark=false)
	{
		$crop = true; 
		$zoom = false; 
		
		$data = getimagesize($sourse);

		if ($data['mime'] == 'image/png') {
			$src = @imagecreatefrompng($sourse); 
		}
		if ($data['mime'] == 'image/jpg' || $data['mime'] == 'image/jpeg') {
			$src = @imagecreatefromjpeg($sourse); 
		}
		if ($data['mime'] == 'image/gif') {
			$src = @imagecreatefromgif($sourse); 
		}
		if ($data['mime'] == 'image/wbmp') {
			$src = @imagecreatefromwbmp($sourse); 
		}
		
		$srcWidth = imagesx($src); 
		$srcHeight = imagesy($src); 

		$k = $crop ? min($srcHeight/$maxHeight, $srcWidth/$maxWidth) : max($srcHeight/$maxHeight, $srcWidth/$maxWidth); 
		$k = !$zoom && $k < 1 ? 1 : $k; 
		$xDiff = $srcWidth/$k - $maxWidth > 0 ? $srcWidth/$k - $maxWidth : 0; 
		$yDiff = $srcHeight/$k - $maxHeight > 0 ? $srcHeight/$k - $maxHeight: 0; 
		$dst = imagecreatetruecolor($srcWidth/$k-$xDiff, $srcHeight/$k-$yDiff); 
		imagecopyresampled($dst, $src, 0, 0, $xDiff/2*$k, $yDiff/2*$k, $srcWidth/$k-$xDiff, $srcHeight/$k-$yDiff, $srcWidth-$xDiff*$k, $srcHeight-$yDiff*$k); 
		
		if ($watemark)
		{
			// Load the stamp and the photo to apply the watermark to
			$stamp = imagecreatefrompng($_SERVER['DOCUMENT_ROOT'] . '/photos/watemark.png');

			// Set the margins for the stamp and get the height/width of the stamp image
			$marge_right = 10;
			$marge_bottom = 10;
			$sx = imagesx($stamp);
			$sy = imagesy($stamp);
			// Copy the stamp image onto our photo using the margin offsets and the photo 
			// width to calculate positioning of the stamp. 
			imagecopy($dst, $stamp, imagesx($dst) - $sx - $marge_right, imagesy($dst) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
		}
		
		imagejpeg($dst, $file, 100); 	
	}	
	
	public function watemark($sourse)
	{
		$data = getimagesize($sourse);

		if ($data['mime'] == 'image/png') {
			$im = imagecreatefrompng($sourse); 
		}
		if ($data['mime'] == 'image/jpg' || $data['mime'] == 'image/jpeg') {
			$im = imagecreatefromjpeg($sourse); 
		}
		if ($data['mime'] == 'image/gif') {
			$im = imagecreatefromgif($sourse); 
		}
		if ($data['mime'] == 'image/wbmp') {
			$im = imagecreatefromwbmp($sourse); 
		}		
		
		// Load the stamp and the photo to apply the watermark to
		$stamp = imagecreatefrompng($_SERVER['DOCUMENT_ROOT'] . '/photos/watemark.png');

		// Set the margins for the stamp and get the height/width of the stamp image
		$marge_right = 10;
		$marge_bottom = 10;
		$sx = imagesx($stamp);
		$sy = imagesy($stamp);

		// Copy the stamp image onto our photo using the margin offsets and the photo 
		// width to calculate positioning of the stamp. 
		imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

		imagejpeg($im, $sourse, 100); 
		imagedestroy($im);	
	}	
	
}

?>
