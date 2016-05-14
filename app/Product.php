<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Product extends Model {

    protected $fillable = ['name', 'description', 'photo', 'price'];

    public function images(){
        return $this->hasMany('App\Productimage', 'product_id');
    }

    public function shorten($num = 100){

        $string = strip_tags($this->description);

        $string = str_limit($string, $limit = $num, $end = '...');

        return $string;
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function productType(){
        return $this->belongsTo('App\ProductType', 'productType_id');
    }

    public function gallery()
    {
        return $this->belongsToMany('App\Gallery');
    }

// remove files

    public function removeFile(){
        
        $file_name = Self::where('id', $this->id)->first()->photo;

        $filepath = "assets/products/thumbs/" . $file_name;

        if (File::exists($filepath)){

            File::delete($filepath);

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