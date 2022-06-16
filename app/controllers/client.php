<?php
class Client extends Controller
{
  public function __construct()
  {
    session_start();
  }
  public function dashboard()
  {
    $data = [
      'title' => 'Dashboard',
    ];
    // if (!isset($_SESSION['Role'])) {
    //     header('location: ' . URLROOT . '/index');
    //   }
    //   elseif ($_SESSION['Role']  != "Client") {
    //     header('location:' . URLROOT . '/' . $_SESSION['Role'] . '/dashboard');
    //   } else {
    $this->view('Client/dashboard', $data);
    //   }


  }
};
