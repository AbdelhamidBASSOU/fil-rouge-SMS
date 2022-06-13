<?php
class Supplier extends Controller
{
  public function __construct()
  {
    session_start();
    $this->UserModel = $this->model('Users');
  }
  public function dashboard()
  {
    $data = [
      'title' => 'Dashboard',

    ];
    
    if (!isset($_SESSION['Role'])) {
      header('location: ' . URLROOT . '/index');
    } elseif ($_SESSION['Role']  != "Supplier") {
      header('location:' . URLROOT . '/' . $_SESSION['Role'] . '/dashboard');
    } else {
      $this->view('Supplier/dashboard', $data);
    }
  }







  public function product()
  {
    if ($this->UserModel->getProducts()) {
      $data = [
        'title' => 'Products',
        'Products' => $this->UserModel->getProducts()
      ];
    } else {
      $data = [
        'title' => 'Products'
      ];
    }

    $this->view('supplier/product', $data);
  }

  public function brand()
  {
    if ($this->UserModel->getBrands()) {
      $data = [
        'title' => 'Brands',
        'Brands' => $this->UserModel->getBrands()
      ];
    } else {
      $data = [
        'title' => 'brands'
      ];
    }

    $this->view('supplier/brand', $data);
  }
  public function order()
  {
    if ($this->UserModel->getOrders()) {
      $data = [
        'title' => 'Orders',
        'Orders' => $this->UserModel->getOrders()
      ];
    } else {
      $data = [
        'title' => 'orders'
      ];
    }

    $this->view('supplier/order', $data);
  }

  public function addProduct()
  {

    $data = [
      'title' => 'Add Product',
      'Brands' => $this->UserModel->getBrands(),
      'Categories' => $this->UserModel->getCategories(),
      'Users' => $this->UserModel->getUsers()

    ];
    $this->view('supplier/addProduct', $data);

    if (isset($_POST['addProduct'])) {
      $data = [
        'price' => trim($_POST['Price']),
        'Name' => trim($_POST['Name']),
        'description' => trim($_POST['Description']),
        'Quantity' => trim($_POST['Quantity']),
        'idBrand' => trim($_POST['idBrand']),
        'idCategory' => trim($_POST['idCategory']),
        'img' => trim($_FILES['img']['name']),
        'image_tmp' => trim($_FILES['img']['tmp_name']),
        'name_err' => '',
        'price_err' => '',
        'description_err' => '',
        'image_err' => ''
      ];
      if (empty($data['Name'])) {
        $data['name_err'] = 'Please enter name';
      }
      if (empty($data['price'])) {
        $data['price_err'] = 'Please enter price';
      }
      if (empty($data['description'])) {
        $data['description_err'] = 'Please enter description';
      }


      // if (empty($data['img'])) {
      //   $data['image_err'] = 'Please select image';
      // }
      if (empty($data['name_err']) && empty($data['price_err']) && empty($data['description_err'])) {
        // if (move_uploaded_file($data['image_tmp'],  URLROOT."/public/img/" . $data['img'])) {
        if ($this->UserModel->addProducts($data)) {
          echo "<script>window.location.href='".URLROOT."/Supplier/product ';</script>";
        } 
      }
      // }
    }
  }
  public function updateProduct($id)
  {
    if ($this->UserModel->getProductById($id)) {
      $data = [
        'title' => 'Update Product',
        'Products' => $this->UserModel->getProductById($id),
        'Brands' => $this->UserModel->getBrands(),
        'Categories' => $this->UserModel->getCategories()
      ];
      $this->view('supplier/updateProduct', $data);
    } else {
      echo "<script>window.location.href='".URLROOT."/Supplier/product ';</script>";
    }
    // $this->view('supplier/updateProduct', $data);
    if (isset($_POST['updateProduct'])) {
      $data = [
        'idProduct' => trim($_POST['idProduct']),
        'price' => trim($_POST['Price']),
        'Name' => trim($_POST['Name']),
        'description' => trim($_POST['Description']),
        'Quantity' => trim($_POST['Quantity']),
        'idBrand' => trim($_POST['idBrand']),
        'idCategory' => trim($_POST['idCategory']),
        'img' => trim($_FILES['img']['name']),
        'image_tmp' => trim($_FILES['img']['tmp_name']),
        'name_err' => '',
        'price_err' => '',
        'description_err' => '',
        'image_err' => ''
      ];
      if (empty($data['Name'])) {
        $data['name_err'] = 'Please enter name';
      }
      if (empty($data['price'])) {
        $data['price_err'] = 'Please enter price';
      }
      if (empty($data['description'])) {
        $data['description_err'] = 'Please enter description';
      }
      // if (empty($data['img'])) {
      //   $data['image_err'] = 'Please select image';
      // }
      if (empty($data['name_err']) && empty($data['price_err']) && empty($data['description_err'])) {
        // if (move_uploaded_file($data['image_tmp'],  URLROOT."/public/img/" . $data['img'])) {
        if ($this->UserModel->updateProducts($data)) {
          echo "<script>window.location.href='".URLROOT."/Supplier/product ';</script>";
        } 
        // }
      }
    }
  }
  public function deleteProduct($id)
  {
    if ($this->UserModel->deleteProducts($id)) {
      header('location: ' . URLROOT . '/supplier/product');
    } else {
      die('Something went wrong');
    }
  }
  public function deleteBrand($id)
  {
    if ($this->UserModel->deleteBrands($id)) {
      header('location: ' . URLROOT . '/supplier/brand');
    } else {
      die('Something went wrong');
    }
  }
 
  public function addBrand()
  {
    $data = [
      'title' => 'Add Brand',
      'Brands' => $this->UserModel->getBrands(),
      'Users' => $this->UserModel->getUsers()
    ];
    $this->view('supplier/addBrand', $data);
    if (isset($_POST['addBrand'])) {
      $data = [
        'idBrand' => trim($_POST['idBrand']),
        'idUser' => trim($_POST['idUser']),
        'Name' => trim($_POST['Name']),
        'Rating' => trim($_POST['Rating']),
        'sells' => trim($_POST['Sells']),
        'buys' => trim($_POST['Buys']),
        'name_err' => '',
        'rating_err' => '',
        'sell_err' => '',
        'buy_err' => '',
       
      ];

      // if (empty($data['img'])) {
      //   $data['image_err'] = 'Please select image';
      // }

      if (empty($data['name_err']) && empty($data['rating_err']) && empty($data['sell_err']) && empty($data['buy_err'])) {
        // if (move_uploaded_file($data['image_tmp'],  URLROOT."/public/img/" . $data['img'])) {
        if ($this->UserModel->addBrand($data)) {
          echo "<script>window.location.href='".URLROOT."/Supplier/brand ';</script>";
        } 
        // }
      }
    }
  }
 
  public function updateBrand($id)
  {
    if ($this->UserModel->getBrandById($id)) {
      $data = [
        'title' => 'Update Brand',
        'Brands' => $this->UserModel->getBrandById($id),
        'Users' => $this->UserModel->getUsers()
      ];
      $this->view('supplier/updateBrand', $data);
    } else {
      echo "<script>window.location.href='".URLROOT."/Supplier/brand ';</script>";
    }
    // $this->view('supplier/updateProduct', $data);
    if (isset($_POST['updateBrand'])) {
      $data = [
        'idBrand' => trim($_POST['idBrand']),
        'idUser' => trim($_POST['idUser']),
        'Name' => trim($_POST['Name']),
        'Rating' => trim($_POST['Rating']),
        'sells' => trim($_POST['Sells']),
        'buys' => trim($_POST['Buys']),
        'name_err' => '',
        'rating_err' => '',
        'sell_err' => '',
        'buy_err' => '',
       
      ];

      // if (empty($data['img'])) {
      //   $data['image_err'] = 'Please select image';
      // }

      if (empty($data['name_err']) && empty($data['rating_err']) && empty($data['sell_err']) && empty($data['buy_err'])) {
        // if (move_uploaded_file($data['image_tmp'],  URLROOT."/public/img/" . $data['img'])) {
        if ($this->UserModel->updateBrand($data)) {
          echo "<script>window.location.href='".URLROOT."/Supplier/brand';</script>";
        } 
        // }
      }
    }
  }
}