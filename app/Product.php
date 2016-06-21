<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Product extends Model {

    protected $fillable = ['name', 'description', 'photo', 'price', 'stars', 'gender', 'sale', 'oldprice', 'new'];

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

    public function productSubType(){
        return $this->belongsTo('App\ProductSubType', 'productSubType_id');
    }

    public function gallery()
    {
        return $this->belongsToMany('App\Gallery');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }    

    public function colors()
    {
        return $this->belongsToMany('App\Color');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Size');
    }

    public function ages()
    {
        return $this->belongsToMany('App\Age');
    }


// remove files

    public function removeFile($newphoto){
        
        $file_name = Self::where('id', $this->id)->first()->photo;

        if ($newphoto != $file_name){

            $filepath = "assets/products/thumbs/" . $file_name;

            if (File::exists($filepath)){

                File::delete($filepath);

            }
        }

        return true;
    }

    public function delete()
    {
        if ($this->exists) {
            $this->removeFile('delete');
        }  

        Self::where('id', $this->id)->delete();

        return true;

    }

    public function save(array $options = [])
    {
        if ($this->exists) {
            $this->removeFile($this->photo);
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