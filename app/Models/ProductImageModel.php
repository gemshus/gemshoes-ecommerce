<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImageModel extends Model
{
    use HasFactory;

    protected $table = 'product_image';

    static public function getSingle($id)
    {
        return ProductImageModel::find($id);
    }

    public function getlogo()
    {
        if(!empty($this->image_name) && file_exists('upload/product/'.$this->image_name))
        {
           return url('upload/product/'. $this->image_name);
        }
        else
        {
            return "";
        }
    }
}
