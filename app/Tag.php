<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tagName', 'tagStatus'
    ];
    public function questions()
    {
        return $this->belongsToMany('App\Question');
    }

}
