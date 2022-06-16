<?php
class Logout extends Controller
{
  public function __construct()
  {
    session_start();
  }
  public function index()
  {
    session_destroy();
    unset($_SESSION['idUser']);
    echo '<script>window.location.href="' . URLROOT . '/index"</script>';
  }
}
