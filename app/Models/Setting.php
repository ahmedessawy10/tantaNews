<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Setting extends Model implements TranslatableContract
{
    use HasFactory;
    use softDeletes;
    use Translatable;
    public $translatedAttributes = ['title',
    'content',
    'address'];
    protected $fillable = [ 'logo',
    'favicon',
    'facebook_url',
    'linkedin_url',
    'email',
    'phone_number'];

   static  function getSetting(){
        if(Self::first()){
            return Self::first();
        }else{

            $data=[
                "id"=>'1',
            ];
            foreach(config("app.languages")as $key=>$value){
           $data[$key]['title']=$value;
           $data[$key]['content']=$value;
           $data[$key]['address']=$value;
            }
            return Self::create($data);

        }
    }
}
