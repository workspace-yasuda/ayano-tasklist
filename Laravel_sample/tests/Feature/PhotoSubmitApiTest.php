<?php

namespace Tests\Feature;

use App\Photo;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PhotoSubmitApiTest extends TestCase
{

     public function setUp(): void
   {
       parent::setUp();


       $this->user = factory(User::class)->create();
   }

    public function test_写真をアップロードできること()
    {
        $this->assertTrue(true);

        //ストレージオブジェクトのモックを作る
        Storage::fake('s3');

        //フェイクのストレージで画像をアップロードする
        $response = $this->actingAs($this->user)
        ->json('POST',route('photo.create'),
        ['photo'=>UploadedFile::fake()->image('photo.png')]);
//        var_dump($response->exception->getMessage());
        //アップロードできたか確認
        $response->assertStatus(201);

        //photoテーブルから保存したレコードを取得
        $photo = Photo::first();

        //レコードのファイル名が正しいか確認
        $this->assertRegExp('/^[(0-9)|(a-z)|(A-Z)|(-_)]{12}(\.gif$|\.png$|\.jpg$|\.jpeg$|\.bmp)$/i', $photo->filename);

        //ストレージに画像が入っているか確認
        $cloud = Storage::fake();


        $cloud->assertExists($photo->filename);
    }
}
