<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parenttask extends Model
{
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
