<?php

namespace App\Http\Controllers;

use App\Http\Request\StorePhoto;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facedes\Storage;

class PhotoController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function create(StorePhoto $request)
  {
    //投稿写真の拡張子を取得する
    $extension = $request->photo->extension();

    $photo =new Photo();

    //インスタンス生成時に割り振られたランダム1D値と
    //本来の拡張子を組み合わせてファイル名とする

    $photo->filename = $photo->id .'.'. $extension;

    //S3にファイルを保存
    //第3引数の'public'はファイルを公開状態で保存するため
    Storage::cloud()
    ->putFileAs('',$request->photo,$photo->filename,'public');

    //データベースエラー時にファイル削除を行うため
    //トランザクションを利用する
    DB::beginTransaction();

    try{
        Auth::user()->photos()->save($photo);
        DB::commit();
    }catch(\Exception $exception){
      DB::rollback();
      //DBとの不整合を避けるためアップロードしたファイルを削除
      Storage::cloud()->delete($photo->filename);
      throw $exception;
    }

    //リソースの新規作成なので
    //レスポンスコードは201(CREATED)を返却する
    return response($photo,201);

  }
}
