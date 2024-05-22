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


  public static  function  getSetting(){
        $setting=Self::all();
        if(count($setting)<1){
          $newSetting=['id'=>1,
          "facebook_url"=>"facebook",
          "linkedin_url"=>"https://www.linkedin.com/in/ahmed-mostaffa-essawy-1106b31a1/",
          "phone_number"=>"01091023782",
          "email"=>"elessawy238@gmail.com",
        ];
          foreach(config('app.languages') as $key=>$value ){
            $newSetting[$key]['title']="TanataNews";
            $newSetting[$key]['content']="all new about tanta";
            $newSetting[$key]['address']="tanta";
          }

          Self::create($newSetting);
        }
  return $setting;
    }
}
