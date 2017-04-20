<?php
  //http://lukasz-socha.pl/php/obiektowy-mechanizm-sesji/

  $session = new Session();

  class Session
  {
    private $logged_in = false;
    private $logged_in_admin = false;
    public $user_id;
    private $user_status;

    /**
     * pole określające dostęp do strony zabezpieczonej hasłem
     * @var boolean
     */
    private $access = false;

    public function __construct(){
      session_start();
      $this->check_login_user();
      $this->check_login_admin();
      $this->check_access();
    }

    public function is_logged_in(){
      return $this->logged_in;
    }

    public function is_logged_in_admin(){
      return $this->logged_in_admin;
    }

    public function login($user, $user_status){
      if ($user) {
        $this->user_id = $_SESSION['user_id'] = $user->id;
        $this->logged_in = true;

        if($user_status == "admin"){
          $this->logged_in_admin = true;
        }
      }
    }

    public function login_admin($user){
      if ($user) {
        $this->user_id = $_SESSION['user_id'] = $user->id;
        $this->user_status = $_SESSION['user_status'] = $user->user_status;
        $this->logged_in_admin = true;
      }
    }

    public function logout()
    {
      unset($_SESSION['user_id']);
      unset($_SESSION['user_status']);
      unset($this->user_id);
      unset($this->user_status);
      $this->logged_in = false;
      $this->logged_in_admin = false;
    }

    private function check_login_user(){
      if (isset($_SESSION['user_id'])) {
        $this->user_id = $_SESSION['user_id'];
        $this->logged_in = true;
      } else {
        unset($this->user_id);
        $this->logged_in = false;
      }
    }

    private function check_login_admin(){
      if (isset($_SESSION['user_id']) && isset($_SESSION['user_status'])) {
        if($_SESSION['user_status'] == "admin")
        {
          $this->user_id = $_SESSION['user_id'];
          $this->logged_in_admin = true;
        }
      } else {
        unset($this->user_id);
        unset($this->user_status);
        $this->logged_in_admin = false;
      }
    }

    private function check_access(){
      if(isset($_SESSION['access'])){
        $this->access = $_SESSION['access'];
      }
      else{
        $this->access = false;
      }
    }

    public function get_access()
    {
      return $this->access;
    }

    public function set_access($access)
    {
      $this->access = $access;
    }

  }
