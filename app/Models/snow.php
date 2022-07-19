<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class snow extends Model{
    use HasFactory;

    // テーブル名
    protected $table = 'snows';

    // 可変項目
    protected $fillable = 
    [
        'title',
        'image',
        'content',
        'update_at',
        'created_at'
    ];

    public function InsertSnow($request) {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'title'             => $request->title,
            'content'           => $request->content
        ]);
    }

    public function findAllSnows()
    {
        return snow::all();
    }

    public function exeUpdate($request, $snow)
    {
        $result = $snow->fill([
            'title'             => $request->title,
            'content'           => $request->content
        ])->save();

    }
    
    public function InsertStore($request)
    {
            $snow = new snow();

        // if($request->hasFile('image')) {
        //     $snow->image = $request->file('image')->store('public/image');
        //     $snow->image = $request->image->store('');
        //     $snow = str_replace('storage/image/', '', $snow);

        //     $snow = new snow;
        //     $snow->file = $snow;
        // } else {
        //     $snow->image = null;
        // }

        
            $snow->image = $request->file('image')->store('public/image');
            $snow->image = $request->image->store('');
             
            // $snow = str_replace('public/image/', '', $snow);
            // $snow = "{'image':'s06q418RgeKTmMBMFatXpHJdTu2eyrPFIu32R6Ns.jpg'}";
            // var_dump($snow);
            // exit();

            $image = new snow;
            // $image->image = $snow;
            // $request = $snow('title');
            $image->title = $request->title;
            $image->content = $request->content;
            $image->image = $snow->image;
            $image->save();
    }     
}
