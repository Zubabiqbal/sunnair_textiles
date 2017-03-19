<?php

namespace App;

use Carbon\Carbon;

class Page extends BaseModel
{
    public $defaultPages = [
        self::HOME,
        self::ABOUT_US,
        self::CONTACT_US
    ];
    const HOME = 'introduction';
    const ABOUT_US = 'about us';
    const CONTACT_US = 'contact us';

    protected $fillable = ['title', 'body', 'status', 'cover_image_path'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = str_slug($value);
    }

    public function getTitleAttribute()
    {
        return ucwords(str_replace('-', ' ', $this->attributes['title']));
    }

    public function scopeHavingStatus($query, $status = 1)
    {
        return $query->where('status', $status);
    }

    public function scopeDefault($query)
    {
        $query->whereIn('title', array_map('str_slug', $this->defaultPages));
    }

    public function scopeExcludingDefault($query)
    {
        $query->whereNotIn('title', array_map('str_slug', $this->defaultPages));
    }

    public function scopeDefaultPage($query, $page)
    {
        $page = str_slug($page);
        if(!in_array($page, array_map('str_slug', $this->defaultPages)))
            $page = str_slug(self::HOME);

        return $query->where('title', $page);
    }

    public function getImagePath()
    {
        if ($this->cover_image_path)
            return url('pages\\' . $this->cover_image_path);
        return '';
    }

    public function isDefault()
    {
        return in_array($this->attributes['title'], array_map('str_slug', $this->defaultPages));
    }

    public static function getDefaultPages()
    {
        $page = new Page();
        return $page->defaultPages;
    }

    public function getHumanDate()
    {
        $humanDate = new Carbon($this->created_at);
        return $humanDate->diffForHumans();
    }

    public function getSinglePageLink()
    {
        return url('/page'). '/'. str_slug($this->title);
    }

    public function scopeRecent()
    {
        return self::latest()->limit(3);
    }
}
