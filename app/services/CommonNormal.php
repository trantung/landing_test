<?php
use Carbon\Carbon;
class CommonNormal
{
    public static function delete($id, $name = NULL)
    {
        $name = self::commonName($name);
        $name::find($id)->delete();
    }

    public static function update($id, $input, $name = NULL)
    {
        $name = self::commonName($name);
        $name::find($id)->update($input);
    }
    
    public static function create($input, $name = NULL)
    {
        $name = self::commonName($name);
        $id = $name::create($input)->id;
        return $id;
    }
    public static function commonName($name = NULL)
    {
        if ($name == NULL) {
            $name = Request::segment(2);
        } 
        if ($name == 'subject') {
            return 'Subject';
        }
        if ($name == 'partner') {
            return 'Partner';
        }
        if ($name == 'class') {
            return 'ClassModel';
        }
        if ($name == 'user') {
            return 'User';
        }
        if ($name == 'level') {
            return 'Level';
        }
        if ($name == 'doc') {
            return 'Document';
        }
        if ($name == 'center') {
            return 'Center';
        }
        return $name;
    }
}