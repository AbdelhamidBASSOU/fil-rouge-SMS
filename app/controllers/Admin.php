<?php
class Admin extends Controller
{
  public function __construct()
  {
    session_start();
    $this->userModel = $this->model('Users');
  }

  public function dashboard()
  {
    if ($this->userModel->getAll()) {
      $data = [
        'title' => 'Dashboard',
        'users' => $this->userModel->getAll()
      ];
    } else {
      $data = [
        'title' => 'Dashboard',
      ];
    }
    if (!isset($_SESSION['Role'])) {
      header('location: ' . URLROOT . '/index');
    }
    if ($_SESSION['Role']  != "Admin") {
      header('location:' . URLROOT . '/' . $_SESSION['Role'] . '/dashboard');
    } else {
      $this->view('Admin/dashboard', $data);
    }
  }





  public function product()
  {
    $data = [
      'title' => 'Products',
      'Products' => $this->userModel->getProducts()
    ];

    $this->view('admin/product', $data);
  }





  public function category()
  {
    $data = [
      'title' => 'Category',
      'categories' => $this->userModel->getCategories()
    ];

    $this->view('admin/category', $data);
  }



  public function brand()
  {
    {
      if ($this->userModel->getBrands()) {
        $data = [
          'title' => 'Brands',
          'Brands' => $this->userModel->getBrands()
        ];
      } else {
        $data = [
          'title' => 'brands'
        ];
      }
  
      $this->view('admin/brand', $data);
    }}
  // public function logout(){
  //   session_start();
  //   session_destroy();
  //   header('location:'.URLROOT.'/index');
  // }


  public function order()
  {
    $data = [
      'title' => 'Order',
      'Orders'=>$this->userModel->getOrders()
    ];

    $this->view('admin/order', $data);
  }


  
  public function addProduct(){

    $data = [
      'title' => 'Add Product',
      'Brands' => $this->userModel->getBrands(),
      'Categories' => $this->userModel->getCategories(),
      'Users' => $this->userModel->getUsers()

    ];
    $this->view('Admin/addProduct', $data);

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
        if ($this->userModel->addProducts($data)) {
          '<script>window.location.href="' . URLROOT . '/Admin/product"</script>';
        } else {
          die('Something went wrong');
        }
      }
      // }
    }

}
public function updateProduct($id)
  {
    if ($this->userModel->getProductById($id)) {
      $data = [
        'title' => 'Update Product',
        'Products' => $this->userModel->getProductById($id),
        'Brands' => $this->userModel->getBrands(),
        'Categories' => $this->userModel->getCategories()
      ];
      $this->view('Admin/updateProduct', $data);
    } else {
      '<script >window.location.href= </script>';
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
        if ($this->userModel->updateProducts($data)) {
          header('location: ' . URLROOT . '/Admin/product');
        } else {
          die('Something went wrong');
        }
        // }
      }
    }
  }
  public function deleteProduct($data){
    if ($this->userModel->deleteProducts($data)) {
      header('location: ' . URLROOT . '/Admin/product');
    } else {
      die('Something went wrong');
    }
  }

  public function addBrand()
  {
    $data = [
      'title' => 'Add Brand',
      'Brands' => $this->userModel->getBrands(),
      'Users' => $this->userModel->getUsers()
    ];
    $this->view('Admin/addBrand', $data);
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
        if ($this->userModel->addBrand($data)) {
          header('location: ' . URLROOT . '/Admin/brand');
        } else {
          die('Something went wrong');
        }
        // }
      }
    }
  }
  public function updateBrand($id)
  {
    if ($this->userModel->getBrandById($id)) {
      $data = [
        'title' => 'Update Brand',
        'Brands' => $this->userModel->getBrandById($id),
        'Users' => $this->userModel->getUsers()
      ];
      $this->view('Admin/updateBrand', $data);
    } else {
      '<script >window.location.href= </script>';
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
        if ($this->userModel->updateBrand($data)) {
          header('location: ' . URLROOT . '/Admin/brand');
        } else {
          die('Something went wrong');
        }
        // }
      }
    }
  }
  public function deleteBrand($id)
  {
    if ($this->userModel->deleteBrands($id)) {
      header('location: ' . URLROOT . '/Admin/brand');
    } else {
      die('Something went wrong');
    }
  }
}
