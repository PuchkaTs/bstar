<?php

namespace App;
use Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Banner extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banners';
    protected $fillable = ['title', 'image', 'description', 'position'];

    public function getBanners(){

    	$banners = self::orderBy('position', 'asc')->get();

    	return $banners;
    }
	public function removeFile(){
	    
	    $file_name = Self::where('id', $this->id)->first()->image;

		$filepath = "assets/banners/mainbanners/" . $file_name;

		$filepath_thumb = "assets/banners/mainbanners/thumbs/" . $file_name;

		if (File::exists($filepath)){

			File::delete($filepath);

		}

		if (File::exists($filepath_thumb)){

			File::delete($filepath_thumb);

		}
	}

    public function delete()
	{
		$this->removeFile();

	    Self::where('id', $this->id)->delete();

	    return true;

	}

    public function save(array $options = [])
    {
    	if ($this->exists) {
			$this->removeFile();
        }

        $query = $this->newQueryWithoutScopes();

        // If the "saving" event returns false we'll bail out of the save and return
        // false, indicating that the save failed. This provides a chance for any
        // listeners to cancel save operations if validations fail or whatever.
        if ($this->fireModelEvent('saving') === false) {
            return false;
        }

        // If the model already exists in the database we can just update our record
        // that is already in this database using the current IDs in this "where"
        // clause to only update this model. Otherwise, we'll just insert them.
        if ($this->exists) {
            $saved = $this->performUpdate($query, $options);
        }

        // If the model is brand new, we'll insert it into our database and set the
        // ID attribute on the model to the value of the newly inserted row's ID
        // which is typically an auto-increment value managed by the database.
        else {
            $saved = $this->performInsert($query, $options);
        }

        if ($saved) {
            $this->finishSave($options);
        }

        return $saved;
    }	

}
