<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\snow;
use App\Http\Requests\SnowRequest;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class SnowController extends Controller
{
    public function __construct()
    {
        $this->snow = new snow();
    }

    //投稿一覧
    public function showDash() {
        $snows = $this->snow->findAllSnows();
        
        return view('dashboard',['snows' => $snows]);
    }

    //  //投稿一覧
    //  public function showList() {
    //     $snows = $this->snow->findAllSnows();
        
    //     return view('dashboard',['snows' => $snows]);
    // }

    //ゲスト投稿一覧
    public function showList() {
        $snows = $this->snow->findAllSnows();
        
        return view('snow.list',['snows' => $snows]);
    }

    //投稿詳細
     public function showDetail($id) {
        $snow = snow::find($id);

        if(is_null($snow)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('snows'));
        }
        
        return view('snow.detail',['snow' => $snow]);
    }
   
    // 投稿登録表示
    public function showCreate() {
        return view('snow.form');
    }

    // // 投稿登録
    // public function store(SnowRequest $request)
    // {
    //     \DB::beginTransaction();
    //     try {
    //         // 投稿登録
    //         $this->snow->InsertSnow($request);
    //         \DB::commit();
    //     } catch(\Throwable $e) {
    //         \DB::rollback();
    //         abort(500);
    //     }
        
    //     \Session::flash('err_msg', '投稿を登録しました。');
    //     return redirect()->route('snows');
    // }

     // 投稿登録
     public function store(SnowRequest $request)
     {
        
         \DB::beginTransaction();
         try {
             // 投稿登録
             $this->snow->InsertStore($request);
             \DB::commit();
         } catch(\Throwable $e) {
             \DB::rollback();
             abort(500);
         }
         
         \Session::flash('err_msg', '投稿を登録しました。');
         return redirect()->route('snows');
     }

    // public function exeStore(SnowRequest $request) 
    // {
    //     // 投稿のデータを受け取る
    //     $inputs = $request->all();
    //     $date = [
    //         'snowboard' => $inputs['title'], 
    //         'content' => $inputs['content']
    //     ];
            
    //     \DB::beginTransaction();
    //     try {
    //         // 投稿登録
    //         snow::create($date);
    //         \DB::commit();
    //     } catch(\Throwable $e) {
    //         \DB::rollback();
    //         abort(500);
    //     }
        
    //     \Session::flash('err_msg', '投稿を登録しました。');
    //     return redirect(route('snows'));
    // }

    //投稿編集フォーム
    public function showEdit($id) {
        $snow = snow::find($id);

        if(is_null($snow)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('snows'));
        }
        
        return view('snow.edit',['snow' => $snow]);
    }

    //  投稿更新
    public function UpdateSnow(SnowRequest $request)
    {
        $id = $request->get('id');
        
       
        \DB::beginTransaction();
        try {
            $snow = snow::find($id);
            $this->snow->exeUpdate($request, $snow);
            $snow->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg', '投稿を更新しました。');
        return redirect()->route('snows');
    }


    //  public function exeUpdate(SnowRequest $request) {
    //     // 投稿データ受け取る
    //     $inputs = $request->all();
    //     $date = [
    //         'snowboard' => $inputs['title'], 
    //         'content' => $inputs['content']
    //     ];

    //     \DB::beginTransaction();
    //     try {
    //         // 投稿更新
    //         $snow = snow::find($date)['id'];
    //         $snow->fill([
    //             'snowboard' => $inputs['title'],
    //             'content' => $inputs['content'],
    //         ]);
    //         $snow->save();

    //         \DB::commit();
    //     } catch(\Throwable $e) {
    //         \DB::rollback();
    //         abort(500);
    //     }
        
    //     \Session::flash('err_msg', '投稿を更新しました。');
    //     return redirect(route('snows'));
    // }

    //投稿削除
    public function exeDelete($id) {
        // var_dump($id);
        //     exit();
        
        if(empty($id)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('snows'));
        }
        try {
            // 投稿削除
            snow::destroy($id);
            // var_dump($id);
            // exit();
        } catch(\Throwable $e) {
            abort(500);
        }
        
        \Session::flash('err_msg', '投稿を削除しました。');
        return redirect(route('dashboard'));
    }

}
