<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class SupportFile extends Model
{
     public function saveImage($folder,$file)
    {
        $filenameWithExt = $file->getClientOriginalName();          
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);               
        $extension = $file->getClientOriginalExtension();    
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $file->storeAs('public/'.$folder, $fileNameToStore);
        return $fileNameToStore; 
    }

    public function deleteImage($folder,$path)
    {
    	 $file_path = '../storage/app/public/'.$folder.'/'.$path;             
         if(File::exists($file_path)){   
            File::delete($file_path);
            return true;
         }
         return false;
    }
}
