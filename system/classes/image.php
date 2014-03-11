<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

final class DMVCImage {

	
	public function imageResize($imagePath, $newImagePath, $newWidth = null, $newHeight = null, $quality = 85)
	{
		
		list($orgWidth, $orgHeight) = getimagesize($imagePath);
	
		if($orgWidth <= $newWidth) {
			copy($imagePath, $newImagePath);
		}
		else if(($orgWidth != $orgHeight) && ($newWidth != null) && ($newHeight != null) && ($newWidth == $newHeight)) {
			if(substr($imagePath, -3) == 'png' || substr($imagePath, -3) == 'PNG')
					$sourceImage = imagecreatefrompng($imagePath);
				elseif(substr($imagePath, -3) == 'jpg' || substr($imagePath, -3) == 'JPG')
					$sourceImage = imagecreatefromjpeg($imagePath);
				elseif(substr($imagePath, -3) == 'gif' || substr($imagePath, -3) == 'GIF')
					$sourceImage = imagecreatefromgif($imagePath);
	
			$newImage = imagecreatetruecolor($newWidth, $newHeight);
	
			//setTransparency($newImage,$sourceImage);
	
	
			if($orgWidth > $orgHeight) {
				$posX = round(($orgWidth - $orgHeight)/2);
				imagecopyresized($newImage, $sourceImage, 0, 0, $posX, 0, $newWidth, $newHeight, $orgWidth-$posX*2, $orgHeight);
			}
			else {
				$posY = round(($orgHeight - $orgWidth)/2);
				imagecopyresized($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $orgWidth, $orgWidth);
			}
	
			imagejpeg($newImage, $newImagePath, $quality);
	
		}
		else {
	
			if(!$newHeight) {
				$newHeight = round(($newWidth * $orgHeight)/$orgWidth);
			}
	
			if(!$newWidth) {
				$newWidth = round(($newHeight * $orgWidth)/$orgHeight);
			}
	
			if(substr($imagePath, -3) == 'png' || substr($imagePath, -3) == 'PNG')
					$sourceImage = imagecreatefrompng($imagePath);
				elseif(substr($imagePath, -3) == 'jpg' || substr($imagePath, -3) == 'JPG')
					$sourceImage = imagecreatefromjpeg($imagePath);
				elseif(substr($imagePath, -3) == 'gif' || substr($imagePath, -3) == 'GIF')
					$sourceImage = imagecreatefromgif($imagePath);
	
			$newImage = imagecreatetruecolor($newWidth, $newHeight);
	
			if(substr($imagePath, -3) == 'png') $this->setTransparency($newImage,$sourceImage); 
			imagecopyresized($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $orgWidth, $orgHeight);
	
			imagejpeg($newImage, $newImagePath, $quality);
		}
	
	}
	
	
	
	private function setTransparency($newImage, $sourceImage)
	{
		$transparencyIndex = imagecolortransparent($sourceImage);
		$transparencyColor = array('red' => 255, 'green' => 255, 'blue' => 255);
		
		if ($transparencyIndex >= 0) {
		    $transparencyColor    = imagecolorsforindex($sourceImage, $transparencyIndex);   
		}
		           
		$transparencyIndex    = imagecolorallocate($newImage, $transparencyColor['red'], $transparencyColor['green'], $transparencyColor['blue']);
		imagefill($newImage, 0, 0, $transparencyIndex);
		imagecolortransparent($newImage, $transparencyIndex);
	       
	}
	
		
	
}



?>
