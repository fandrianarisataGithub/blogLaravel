<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content'];
    public function setTitleAttribute(string $title){
        $this->attributes['title'] = $title;
    }
    public function setContentAttribute(string $content){
        $this->attributes['content'] = $content;
    }
   
}
