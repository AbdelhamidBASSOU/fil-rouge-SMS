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
        'users' => $this->userModel->getAll(),
        'orderCount' => $this->userModel->ordersCount(),
        'categoryCount' => $this->userModel->categoryCount(),
        'productCount' => $this->userModel->productCount(),
        'brandCount' => $this->userModel->brandCount(),
        'supplierCount' => $this->userModel->supplierCount(),
        'brandUser' => $this->userModel->brandUser(),
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
    if ($this->userModel->getCategories()) {
      $data = [
        'title' => 'Categories',
        'Categories' => $this->userModel->getCategories()
      ];
    } else {
      $data = [
        'title' => 'Categories'
      ];
    }

    $this->view('Admin/category', $data);
  }



  public function brand()
  { {
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
    }
  }
  // public function logout(){
  //   session_start();
  //   session_destroy();
  //   header('location:'.URLROOT.'/index');
  // }


  public function order()
  { {
      if ($this->userModel->getOrders()) {
        $data = [
          'title' => 'Orders',
          'Orders' => $this->userModel->getOrders()
        ];
      } else {
        $data = [
          'title' => 'Orders'
        ];
      }

      $this->view('admin/order', $data);
    }
  }

  public function addProduct()
  {


    if (isset($_POST['addProduct'])) {



      $output_dir = "public/uploads"; //Path for file upload

      $RandomNum = time();



      $ImageName = str_replace(' ', '-', strtolower($_FILES['img']['name']));

      $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
      $ImageExt = str_replace('.', '', $ImageExt);
      $ImageName = preg_replace("/.[^.\s]{3,4}$/", "", $ImageName);
      $NewImageName = $ImageName . '-' . $RandomNum . '.' . $ImageExt;
      $ret[$NewImageName] = $output_dir . $NewImageName;
      move_uploaded_file($_FILES["img"]["tmp_name"], "C:/xampp/htdocs/fil-rouge-SMS" . "/" . $output_dir . "/" . $NewImageName);

      $data = [
        'price' => trim($_POST['Price']),
        'Name' => trim($_POST['Name']),
        'description' => trim($_POST['Description']),
        'Quantity' => trim($_POST['Quantity']),
        'idBrand' => trim($_POST['idBrand']),
        'idCategory' => trim($_POST['idCategory']),
        'img' => $NewImageName,

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
          echo "<script>window.location.href='" . URLROOT . "/Admin/product ';</script>";
        }
      }
      // }
    } else {
      $data = [
        'title' => 'Add Product',
        'Brands' => $this->userModel->getBrands(),
        'Categories' => $this->userModel->getCategories(),
        'Users' => $this->userModel->getUsers()

      ];
      $this->view('Admin/addProduct', $data);
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
      echo "<script>window.location.href='" . URLROOT . "/Admin/product ';</script>";
    }
    // $this->view('supplier/updateProduct', $data);
    if (isset($_POST['updateProduct'])) {


      $output_dir = "public/uploads"; //Path for file upload

      $RandomNum = time();



      $ImageName = str_replace(' ', '-', strtolower($_FILES['img']['name']));

      $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
      $ImageExt = str_replace('.', '', $ImageExt);
      $ImageName = preg_replace("/.[^.\s]{3,4}$/", "", $ImageName);
      $NewImageName = $ImageName . '-' . $RandomNum . '.' . $ImageExt;
      $ret[$NewImageName] = $output_dir . $NewImageName;
      move_uploaded_file($_FILES["img"]["tmp_name"], "C:/xampp/htdocs/fil-rouge-SMS" . "/" . $output_dir . "/" . $NewImageName);


      $data = [
        'idProduct' => trim($_POST['idProduct']),
        'price' => trim($_POST['Price']),
        'Name' => trim($_POST['Name']),
        'description' => trim($_POST['Description']),
        'Quantity' => trim($_POST['Quantity']),
        'idBrand' => trim($_POST['idBrand']),
        'idCategory' => trim($_POST['idCategory']),
        'img' => $NewImageName,

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
          echo "<script>window.location.href='" . URLROOT . "/Admin/product ';</script>";
        }
        // }
      }
    }
  }
  public function deleteProduct($data)
  {
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
          echo "<script>window.location.href='" . URLROOT . "/Admin/brand ';</script>";
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
          echo "<script>window.location.href='" . URLROOT . "/Admin/brand';</script>";
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
  public function addCategory()
  {
    $data = [
      'title' => 'Add Category',
      'Categories' => $this->userModel->getCategories(),
      'Users' => $this->userModel->getUsers()
    ];
    $this->view('Admin/addCategory', $data);
    if (isset($_POST['addCategory'])) {
      $data = [
        'idCategory' => trim($_POST['idCategory']),
        'Name' => trim($_POST['Name']),
        'Description' => trim($_POST['Description']),
        'name_err' => '',
        'description_err' => '',

      ];

      // if (empty($data['img'])) {
      //   $data['image_err'] = 'Please select image';
      // }

      if (empty($data['name_err']) && empty($data['description_err'])) {
        // if (move_uploaded_file($data['image_tmp'],  URLROOT."/public/img/" . $data['img'])) {
        if ($this->userModel->addCategory($data)) {
          echo "<script>window.location.href='" . URLROOT . "/Admin/category';</script>";
        }
        // }
      }
    }
  }
  public function updateCategory($id)
  {
    if ($this->userModel->getCategoryById($id)) {
      $data = [
        'title' => 'Update Category',
        'Categories' => $this->userModel->getCategoryById($id),
        'Users' => $this->userModel->getUsers()
      ];
      $this->view('Admin/updateCategory', $data);
    } else {
      echo "<script>window.location.href='" . URLROOT . "/Admin/category';</script>";
    }
    // $this->view('supplier/updateProduct', $data);
    if (isset($_POST['updateCategory'])) {
      $data = [
        'idCategory' => trim($_POST['idCategory']),
        'Name' => trim($_POST['Name']),
        'Description' => trim($_POST['Description']),
        'name_err' => '',
        'description_err' => '',
      ];
      if (empty($data['name_err']) && empty($data['description_err'])) {
        // if (move_uploaded_file($data['image_tmp'],  URLROOT."/public/img/" . $data['img'])) {
        if ($this->userModel->updateCategory($data)) {
          echo "<script>window.location.href='" . URLROOT . "/Admin/category';</script>";
        }
      }
    }
  }
  public function deleteCategory($id)
  {
    if ($this->userModel->deleteCategory($id)) {
      header('location: ' . URLROOT . '/Admin/category');
    } else {
      die('Something went wrong');
    }
  }
  // public function orderCount()
  // {
  //   $data = [
  //     'title' => 'Order Count',
  //     'Order' => $this->userModel->ordersCount()
  //   ];
  //   $this->view('Admin/order', $data);
  // }
  public function rapport()
  {
    $data = [
      'title' => 'Rapport',
      'Rapports' => $this->userModel->getRapport()
    ];
    $this->view('Admin/rapport', $data);
  }


  public function deleteRapport($id)
  {


    if ($this->userModel->deleteRapports($id)) {
      header('location: ' . URLROOT . '/Admin/rapport');
    } else {
      die('Something went wrong');
    }
  }
  public function deleteOrder($id)
  {
    if ($this->userModel->deleteOrders($id)) {
      header('location: ' . URLROOT . '/Admin/order');
    } else {
      die('Something went wrong');
    }
  }
  public function updateOrder($id)
  {
    if ($this->userModel->updateOrders($id)) {
      header('location: ' . URLROOT . '/Admin/order');
    } else {
      die('Something went wrong');
    }
  }
}
