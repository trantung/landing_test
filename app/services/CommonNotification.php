<?php
class CommonNotification {

    protected $currentUser;

    function __construct(){
        $this->currentUser = currentUser();
    }

    public static function getUnread(){
        $user = currentUser();
        if( $user ){
            $data = Notification::where('receiver_model', $user->model)
                ->where('receiver_id', $user->id)
                ->where('read', 0)->get();

            Response::json($data->toArray());
        }
        return false;
    }

    public static function getUserNotification($model = null, $uid = null, $skip = 0, $perpage = 10, $notIn = [], $order = 'DESC'){
        $currentUser = currentUser();
        if( $model == null && $currentUser ){
            $model = $currentUser->model;
            $uid = $currentUser->id;
        }
        $data = Notification::where('receiver_model', $model)
            ->where('receiver_id', $uid)
            ->whereNotIn('id', $notIn)
            ->skip($skip)
            ->take($perpage)
            ->orderBy('created_at', $order)->get();
        return $data;
    }

    public static function pushNotification($title, $message, $model, $uid, $senderModel = null, $senderId = null){
        Notification::create([
            'receiver_model'    => $model,
            'receiver_id'       => $uid,
            'title'             => $title,
            'message'           => $message,
            'sender_model'      => $senderModel,
            'sender_id'         => $senderId,
        ]);
    }
    public static function pushNotificationTeacher($title, $message, $senderModel = null, $senderId = null)
    {
        $listTeacher = Teacher::all();
        foreach ($listTeacher as $key => $value) {
            self::pushNotification($title, $message, 'Teacher', $value->id, $senderModel, $senderId);
        }
    }

}