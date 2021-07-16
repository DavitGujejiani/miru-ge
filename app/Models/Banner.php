<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Banner extends Model
{
    // use HasFactory;
    protected $fillable = [
        'image_name',
        'goto_url',
    ];

    public static function delete_image($id) {
        $banner = Banner::find($id);
        $oldImagePath = public_path('images/banner-image/' . $banner->image_name);
        if (File::exists($oldImagePath)) {
            return File::delete($oldImagePath);
        }
        else {
            return dump("file doesn't exists");
        }
    }

    public static function upload_image($file) 
    {
        $filename = urlize(time() . '.' . $file->getClientOriginalName());
        $file->move(public_path().'/images/banner-image/', $filename);
        return $filename;
    }
    
    public static function update_table($request, $image_name, $id) {
        $banner = Banner::find($id);
        $banner->image_name = $image_name;
        $banner->goto_url = $request->url ?? null;
        $banner->slider_title_small = $request->header_small ?? null;
        $banner->slider_title_bold = $request->header_big ?? null;
        $banner->slider_button_title = $request->slider_button_title ?? null;
        return $banner->save();
    }
    
    /**
     * gets image_name from banners table by row id
     *
     * @param [intiger] $id
     * @return void
     */
    public static function image_name($id) 
    {
        return Banner::find($id)->image_name;
    }
    
    /**
     * fetches title according to id and type
     *
     * @param [intiger] $id
     * @param [text] $type
     * @return void
     */
    public static function slider_title($id, $type = null) 
    {
        // slider_title is fetched as default
        $col_title = 'slider_title';

        // if type is assigned, fetches column accordingly
        if ($type == 'small') {
            $col_title = 'slider_title_small';
        } 
        if ($type == 'bold') {
            $col_title = 'slider_title_bold';
        }
        
        $title = Banner::where('id', $id)->get()[0]->attributes[$col_title];

        return $title;
    }

    /**
     * gets value from database by row id and column name
     *
     * @param [intiger] $row_id
     * @param [text] $column_name
     * @return void
     */
    public static function getColumn($row_id, $column_name) 
    {
        $value = Banner::where('id', $row_id)->get()[0]->attributes[$column_name];

        return $value;
    }

    
}
