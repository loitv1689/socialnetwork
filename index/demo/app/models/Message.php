<?php
/**
* 
*/
class Message extends Eloquent
{

 public $table = "message";


// them tin nhan
 public static function addMessage($user_sent,$user_receive,$message){
  $check1 = DB::table("message")->where("user_id_recieve","=",$user_receive)->where("user_id_sent","=",$user_sent)->get();
  $check2 = DB::table("message")->where("user_id_recieve","=",$user_sent)->where("user_id_sent","=",$user_receive)->get();

  if($check1!=null){
    foreach ($check1 as $check) {
      $array = json_decode($check->content, true);
      $array[] = array("user_id_send" => $user_sent ,"content" => $message,"time" => date('h:i:s d-m-y'));
      $update = array("content" => json_encode($array),
        'status' => $user_sent);
      Message::where("user_id_recieve","=",$user_receive)->where("user_id_sent","=",$user_sent)->update($update);
    }
  } else if($check2!=null){
    foreach ($check2 as $check) {
      $array = json_decode($check->content, true);
      $array[] = array("user_id_send" => $user_sent ,"content" => $message,"time" => date('h:i:s d-m-y'));
      $update = array("content" => json_encode($array),
        'status' => $user_sent);
      Message::where("user_id_recieve","=",$user_sent)->where("user_id_sent","=",$user_receive)->update($update);
    }
  } else {
    $create = new Message();
    $create->user_id_recieve = $user_receive;
    $create->user_id_sent = $user_sent;
    $create->status = $user_sent;
    $arrayName = array("user_id_send" => $user_sent ,"content" => $message,"time" => date('h:i:s d-m-y'));
    $arrayJson = array($arrayName);
    $create->content = json_encode($arrayJson);
    $create->save();
  }
}

public static function getChatConversation($user_id_sent,$user_id_recieve){


  $query1 = Message::where("user_id_sent","=",$user_id_sent)->where("user_id_recieve","=",$user_id_recieve)->get();
  $query2 = Message::where("user_id_sent","=",$user_id_recieve)->where("user_id_recieve","=",$user_id_sent)->get();
  if($query1 != null){

    foreach ($query1 as $query) {

      $messages = json_decode($query->content, true);
      $size = sizeof($messages);
      $message = array($messages[0]["time"],$messages[0]["content"]);
      $array = array($message);
      for($i = 1; $i < $size; $i++){
        if($messages[$i]["user_id_send"] == $messages[$i-1]["user_id_send"]){
          $array[sizeof($array)-1][] = $messages[$i]["content"];
          $array[sizeof($array)-1][0] = $messages[$i]["time"];

        } else{
          $array1 = array($messages[$i]["time"],$messages[$i]["content"]);
          $array[] = $array1;
        }
      }

      $list_messages = array();
      $user1 = $user_id_sent;
      $user2 = $user_id_recieve;
      if($messages[0]["user_id_send"] == $user_id_recieve){
        $user1 = $user_id_recieve;
        $user2 = $user_id_sent;
      }
      for($i = 0; $i < sizeof($array); $i+=2){
        if($i<sizeof($array)){
          $list = array("user_id" => $user1,
            "content" => $array[$i]);
          $list_messages[] = $list;
        } if($i+1 < sizeof($array)){
          $list = array("user_id" => $user2,
            "content" => $array[$i+1]);
          $list_messages[] = $list;
        }
      }
      return $list_messages;
    }
  }
  if($query2 != null){
    foreach ($query2 as $query) {
      $messages = json_decode($query->content, true);
      $size = sizeof($messages);
      $message = array($messages[0]["time"],$messages[0]["content"]);
      $array = array($message);
      for($i = 1; $i < $size; $i++){
        if($messages[$i]["user_id_send"] == $messages[$i-1]["user_id_send"]){
          $array[sizeof($array)-1][] = $messages[$i]["content"];
          $array[sizeof($array)-1][0] = $messages[$i]["time"];

        } else{
          $array1 = array($messages[$i]["time"],$messages[$i]["content"]);
          $array[] = $array1;
        }
      }

      $list_messages = array();
      $user1 = $user_id_sent;
      $user2 = $user_id_recieve;
      if($messages[0]["user_id_send"] == $user_id_recieve){
        $user1 = $user_id_recieve;
        $user2 = $user_id_sent;
      }
      for($i = 0; $i < sizeof($array); $i+=2){
        if($i<sizeof($array)){
          $list = array("user_id" => $user1,
            "content" => $array[$i]);
          $list_messages[] = $list;
        } if($i+1 < sizeof($array)){
          $list = array("user_id" => $user2,
            "content" => $array[$i+1]);
          $list_messages[] = $list;
        }
      }
      return $list_messages;
    }
  }
}

public static function checkNewMessage($user_id){
  $message1 = DB::table("message")->where("user_id_sent", "=", $user_id)->get();
  $message2 = DB::table("message")->where("user_id_recieve", "=", $user_id)->get();

  $list_new_messages = array();
  if($message1 != null){
    foreach ($message1 as $key) {
      if($key->status == $key->user_id_recieve){
        $arrayName = array('user_id' => $key->status,
          'user_name' => User::getName($key->status),
          'time' => $key->updated_at);
        $list_new_messages[] = $arrayName;
      }
    }
  }
  if($message2 != null){
    foreach ($message2 as $key) {
      if($key->status == $key->user_id_sent){
        $arrayName = array('user_id' => $key->status,
          'user_name' => User::getName($key->status),
          'time' => $key->updated_at);
        $list_new_messages[] = $arrayName;
      }
    }
  }
  return $list_new_messages;
}
public static function removeNewMessage($user_id_recieve, $user_id_sent){
  $message1 = Message::where("user_id_sent", "=", $user_id_recieve)->where("user_id_recieve", "=", $user_id_sent)->get();
  $message2 = Message::where("user_id_recieve", "=", $user_id_recieve)->where("user_id_sent", "=", $user_id_sent)->get();
  if($message1!=null){
    foreach ($message1 as $key) {
      if($key->status == $user_id_sent){
        $array = array("status"=>"-1");
        Message::where("user_id_sent","=",$user_id_recieve)->where("user_id_recieve","=",$user_id_sent)->update($array);
      }
    }
  }
  if($message2!=null){
    foreach ($message2 as $key) {
      if($key->status == $user_id_sent){
        $array = array("status"=>"-1");
        Message::where("user_id_recieve","=",$user_id_recieve)->where("user_id_sent","=",$user_id_sent)->update($array);
      }
    }
  }
}
}