<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Events extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_events';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image', 'title', 'description', 'background', 'type_activity', 'speaker',
        'is_published', 'link_feedback', 'deleted_at'
    ];
    public $timestamps = true;
}
