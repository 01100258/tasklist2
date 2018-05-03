<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // 下記のような書き方をする場合、idのようなlaravel側が設定する値も
    // リクエストから送信されてくると変更できてしまう
    // $task->fill($request->all()); //<-edit
    // Task::create($request->all()); //<-create
    // そのため、$fillableを正しく設定する必要がある
    protected $fillable = ['content', 'user_id', 'type','state'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function parenttasks()
    {
        return $this->hasMany(Parenttask::class);
    }
    
}
