<?php

class Login extends Controller
{
  public function __construct()
  {
    session_start();
    $this->users = $this->model('Users');
  }

  public function index()
  {
    $data = [
      'title' => 'Login'
    ];

    if (isset($_POST['submit'])) {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [

        'Email' => trim($_POST['Email']),
        'Password' => trim($_POST['Password']),
        'Email_err' => '',
        'Password_err' => '',

      ];


      if ($this->users->login($data)) {
        $user = $this->users->login($data);
        $_SESSION['idUser'] = $user->idUser;
        $_SESSION['FullName'] = $user->FullName;
        $_SESSION['Email'] = $user->Email;
        $_SESSION['Role'] = $user->Role;
        $_SESSION['Phone'] = $user->Phone;
        if ($user->Role == "Supplier") {
          echo '<script>window.location.href="' . URLROOT . '/Supplier/dashboard"</script>';
        } elseif($user->Role == "client") {
          echo '<script>window.location.href="' . URLROOT . '/Client/dashboard"</script>';
        } else {
          echo '<script>window.location.href="' . URLROOT . '/Admin/dashboard"</script>';
        }
      }
    }

    if (!isset($_SESSION['Role'])) {
      $this->view('/index', $data);
    } else {
      header('location:' . URLROOT . '/' . $_SESSION['Role'] . '/dashboard');
    }
  }
}
