<?php

  require_once('class.db.php');
  require_once('class.phpmailer.php');
  $db = new Db();

  class User
  {
    private $id;
    private $email;
    private $password;
    private $repeat_password;
    private $name;
    private $user_phone;
    private $user_status;
    private $activate;
    private $activation_key;

    /**
     * Wysyła do bazy zapytanie sql
     * @param  string $sql [zapytanie w języku SQL]
     * @return [obiekt mysqli_result]
     */
    public static function find_by_sql($sql="")
    {
      global $db;

      $result = $db->queryDb($sql);
      return $result;
    }

    /**
     * Szuka w bazie użytkownika o podanym id
     * @param  integer $id [id użytkownika]
     * @return object      [zwraca obiekt z polami jak nazwy kolumn w tabeli users]
     */
    public static function find_by_id($id=0)
    {
      $result = self::find_by_sql("SELECT * FROM users WHERE id='{$id}' LIMIT 1");
      $found = $result->fetch_object();
      return $found;
    }

    /**
     * Sprawdza czy istnieje użytkownik o podanym emailu i haśle
     * Sprawdza też czy email i hasło są poprawnie podane w formularzu logowania
     *
     * @param  string $username [description]
     * @param  string $password [description]
     * @return object      [zwraca obiekt z polami jak nazwy kolumn w tabeli users]
     * @return false      [jeśli dane do logowania się nie zgadzają]
     */
    public static function authenticate($username="", $password="")
    {
      global $db;

      $username = $db->escape_value($username);
      $password = $db->escape_value($password);
      $password = md5($password);

      $result = self::find_by_sql("SELECT * FROM users WHERE email='{$username}' AND password='{$password}' LIMIT 1");

      return !empty($result) ? $result->fetch_object() : false;
    }

    // public function cerate_user()
    // {
    //   global $db;
    //
    //   $name = $db->escape_value($this->name);
    //   $email = $db->escape_value($this->email);
    //   $password = $db->escape_value($this->password);
    //   $repeat_password = $db->escape_value($this->repeat_password);
    //   $phone = $db->escape_value($this->user_phone);
    // }

    public static function register($name="", $email="", $password="", $repeat_password="", $phone="", $kid="", $institution="", $group="", $agree_www="", $agree_ad="", $agree_email="")
    {
      global $db;

      $name = $db->escape_value($name);
      $email = $db->escape_value($email);
      $password = $db->escape_value($password);
      $repeat_password = $db->escape_value($repeat_password);
      $phone = $db->escape_value($phone);
      $kid = $db->escape_value($kid);
      $institution = $db->escape_value($institution);
      $group = $db->escape_value($group);
      $agree_www = $db->escape_value($agree_www);
      $agree_ad = $db->escape_value($agree_ad);
      $agree_email = $db->escape_value($agree_email);

      //Sprawdzam czy użytkownik o podanym adresie email jest już zapisany w bazie
      $name_check = self::find_by_sql("SELECT email FROM users WHERE email='{$email}'");
      $row = mysqli_num_rows($name_check);
      if ($row!=0) {
        return "Użytkownik o adresie <strong>$email</strong> już istnieje. Wpisz proszę inny adres email.";
      }

      if($name && $email && $password && $repeat_password && $phone && $kid && $institution && $group)
      {
        if ($password == $repeat_password)
        {
          if (strlen($password)>128 || strlen($password)<8) {
            return "Hasło musi się składać z min. 8 znaków i max. 128 znaków";
          } else {
            $password = md5($password);
            $activation_key = md5(rand(23456789, 98765432));

            $new_user = self::find_by_sql("INSERT INTO users VALUES (NULL, '{$email}', '{$password}', '{$name}', '{$phone}', '{$kid}', '{$institution}', '{$group}', '{$agree_www}', '{$agree_ad}', '{$agree_email}', 'user', '0', '{$activation_key}', CURRENT_TIMESTAMP)");

            if($new_user)
            {
              //var_dump($new_user);
              $last_id = mysqli_insert_id($db->get_mysqli());

              $mail = new PHPMailer();
              $mail->SetLanguage('pl');
              $mail->CharSet = "UTF-8";
              $mail->IsSMTP();  // telling the class to use SMTP
              $mail->IsHTML(true);
              $mail->SMTPDebug  = 0; // enables SMTP debug information (for testing)
          												   // 1 = errors and messages
          												   // 2 = messages only
              $mail->SMTPAuth   = true;                  // enable SMTP authentication
           		$mail->SMTPSecure = "ssl";
           		$mail->Host       = "az0024.srv.az.pl";    // sets the SMTP server
           		$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
           		$mail->Username   = "sklep@annaosiak.pl"; // SMTP account username
           		$mail->Password   = "az_sklep-2017";        // SMTP account password


              $mail->SetFrom("sklep@annaosiak.pl", "Sklep - Anna Osiak");
              $mail->AddAddress($email);
              $mail->Subject  = "Aktywacja konta w sklepie na annaosiak.pl";
              //$mail->Body     = "
              $mail->MsgHTML("
								Witaj $name.<br><br>

								Aby w pełni korzystać ze Strefy Klienta na annaosiak.pl, potrzebujesz tylko aktywować swoje konto.<br>
                Proszę kliknij w poniższy link aktywacyjny lub wklej go do swojej przeglądarki<br><br>
                <a href='http://annaosiak.pl/sklep/activate.php?id=$last_id&code=$activation_key'>http://annaosiak.pl/sklep/activate.php?id=$last_id&code=$activation_key</a>
								<br><br>
							");

              if(!$mail->Send()) {
                  return "Mam problem z wysłaniem wiadomości z linkiem aktywacyjnym. Proszę zadzwoń do mnie na nr 605 335 875 lub napisz na foto.annaosiak@gmail.com";
              }
              else {
                  return "Dziękuję za wypełnienie formularza. Na podany email została wysłana wiadomość z linkiem aktywującym Twoje konto.";
              }
            }
          }
        } else {
          return "Wprowadzone hasła nie są takie same. Wpisz proszę jednakowe hasła";
        }
      } else {
        return "Wypełnij proszę wszystkie pola";
      }
    }
  }
