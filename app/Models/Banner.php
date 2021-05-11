<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    // use HasFactory;
    protected $fillable = [
        'image_name',
        'goto_url',
    ];

    /**
     * gets image_name from banners table by row id
     *
     * @param [intiger] $id
     * @return void
     */
    public static function image_name($id) 
    {
        $banner = Banner::where('id', $id)->get()[0]->attributes['image_name'];
        return $banner;
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
