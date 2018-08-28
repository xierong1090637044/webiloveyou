<?php
include_once '../lib/BmobUser.class.php';
class GetUser {

  public function __construct()
  {
      $this->objectId = $_COOKIE["objectId"];
      $this->bmobUser = new BmobUser();
  }

  public function nickname() {
      $res = $this->bmobUser->get($this->objectId);
      $info=json_encode($res);
      $info=json_decode($info,true);
      return $info["username"];
  }

  public function avatar() {
      $res = $this->bmobUser->get($this->objectId);
      $info=json_encode($res);
      $info=json_decode($info,true);
      return $info["avatar"];
  }

  public function city() {
      $res = $this->bmobUser->get($this->objectId);
      $info=json_encode($res);
      $info=json_decode($info,true);
      return $info["city"];
  }

  public function appconsole() {
      $res = $this->bmobUser->get($this->objectId);
      $info=json_encode($res);
      $info=json_decode($info,true);
      return $info["appconsole"];
  }

}
