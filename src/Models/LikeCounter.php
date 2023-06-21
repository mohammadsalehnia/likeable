<?php

namespace mohammadsalehnia\Likeable\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class LikeCounter extends Model
{
    use HasFactory;

    protected $table = 'likeable_like_counters';
    public $timestamps = false;
    protected $fillable = ['likeable_id', 'likeable_type', 'count'];

    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }
}
