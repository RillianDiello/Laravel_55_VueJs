<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'content',
        'datePublish'
    ];

    protected $dates =['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User'); // relationship where one article has one user, so use belongsTo
    }

    public static function listArticles($paginate)
    {
        return DB::table('articles')
        ->join('users', 'users.id', '=', 'articles.user_id')
        ->select('articles.id', 'articles.title', 'articles.description', 'users.name','articles.datePublish')
        ->whereNull('deleted_at')
        ->paginate($paginate);
    }

    public static function listArticlesFor($paginate)
    {
        $articlesList = Article::select('id', 'title', 'description', 'user_id','datePublish')->paginate($paginate);

        
        foreach ($articlesList as $key => $value) {
            $value->user_id = User::find($value->user_id)->name;            
            
        }

        return $articlesList;
    }

    public static function listArticlesSite($paginate)
    {
        return DB::table('articles')
        ->join('users', 'users.id', '=', 'articles.user_id')
        ->select('articles.id', 'articles.title', 'articles.description', 'users.name as author','articles.datePublish as data')
        ->whereDate('datePublish', '<=', date('Y-m-d'))
        ->whereNull('deleted_at')
        ->orderBy('datePublish', 'DESC')
        ->paginate($paginate);
    }
}
