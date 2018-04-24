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
            if ($name == 'vi' || $name == 'en') {
                $name = Request::segment(3);
            }
        } 
        if ($name == 'user') {
            return 'User';
        }
        if ($name == 'teacher') {
            return 'Teacher';
        }
        if ($name == 'student') {
            return 'Student';
        }

        return $name;
    }
}