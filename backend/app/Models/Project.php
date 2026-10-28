<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    protected $appends = ['image_url', 'tag_list'];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getTagListAttribute(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', $this->tags ?? ''))));
    }
}
