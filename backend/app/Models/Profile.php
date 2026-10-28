<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    protected $appends = ['photo_url', 'cv_url', 'tag_list'];

    public function getPhotoUrlAttribute(): ?string
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }

    public function getCvUrlAttribute(): ?string
    {
        return $this->cv ? asset('storage/' . $this->cv) : null;
    }

    public function getTagListAttribute(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', $this->tags ?? ''))));
    }
}
