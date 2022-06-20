<?php 
class Client extends Controller  {
    public function __construct() {
        session_start();
        $this->userModel = $this->model('Users');
    }
    public function dashboard(){
        $data = [
          'title' => 'Dashboard',
          'product' => $this->userModel->getProductWithbrand(),
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

      public function orders(){
        $data = [

          'Orders' => $this->userModel->getOrdersbyid($_SESSION['idUser']),
        ];

            $this->view('Client/order', $data);




      }

      public function makeorder(){
        if (isset($_POST['makeorder'])) {
          $data = [
            'idUser' => $_SESSION['idUser'] ,
            'idProduct' => $_POST['id'] ,
            'Quantity' => $_POST['quantity'] ,
          ];

          if ($this->userModel->addOrder($data)) {
            header('location: ' . URLROOT . '/client/orders');
          } 


        }
      }

};