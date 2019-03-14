<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $appends = ['img_url'];

    /**
     * Get the image url
     * @return string|null The image url
     */
    public function getImgUrlAttribute() {
        return $this->img_path?url(str_replace('public/', 'storage/', $this->img_path)):null;
    }
}
