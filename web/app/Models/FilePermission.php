<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePermission extends Model
{
    protected $table = "file_permissions";

    protected $fillable = [
        'id', 'user_id', 'file_id', 'is_viewed'
    ];

    public function File() {
        return $this->belongsTo('App\Models\File');
    }

    public function User() {
        return $this->belongsTo('App\Models\User');
    }

}
