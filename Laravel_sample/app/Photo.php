<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Photo extends Model
{
    protected $keyType = "string";
    // 基本はpngで設定
    const DEFAULT_EXTENSION = ".png";
    const ID_LENGTH = 12;

    public function __construct(array $attributes = [])
    {

        parent::__construct($attributes);
        if (!Arr::get($attributes, "filename")) {
            //インスタンス生成時に割り振られたランダム1D値と
            //本来の拡張子を組み合わせてファイル名とする
            $this->setfileName();
        }
    }

    /*
     * filename を設定する
     *
     */
    public function setFileName($file_name_length = Photo::ID_LENGTH, $extension = Photo::DEFAULT_EXTENSION)
    {

        $file_name = $this->getRandomString($file_name_length) . $extension;
        if($this->validate_filename($file_name,$file_name_length)){
            $this->attributes["filename"] =$file_name;
        }else{
            throw new \Exception("invalid file name.");
        }

    }


    private function validate_filename($filename,$name_length)
    {
        return preg_match('/^[(0-9)|(a-z)|(A-Z)|(-_)]{'.$name_length.'}(\.gif$|\.png$|\.jpg$|\.jpeg$|\.bmp)$/i',$filename);
    }

    public function getRandomString($length)
    {
        $characters = array_merge(
            range(0, 9), range("a", "z"),
            range("A", "Z"), ["-", "_"]
        );

        $string = substr(str_shuffle(
            str_repeat(implode($characters),
                $length)),
            0, $length);

        return $string;

    }

}
