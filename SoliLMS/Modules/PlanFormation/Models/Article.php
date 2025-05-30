<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Blog\Models\Category;

class Article extends Model
{
  //
  use HasFactory;


  protected $fillable = ['title', 'content', 'category_id' , 'user_id'];
  public function user(){
    return $this->belongsTo(User::class);
}

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }

  public function comments()
  {
    return $this->morphMany(Comment::class, 'commentable');
  }


}
