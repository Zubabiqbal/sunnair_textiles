<?php

namespace App;

class SliderImage extends BaseModel
{
    protected $fillable = ['path', 'order', 'status', 'slogan'];

    public function getImagePath()
    {
        return  url('admin\images\\'. $this->path);
    }


}


