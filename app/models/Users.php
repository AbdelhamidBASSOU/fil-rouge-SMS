<?php

class Users
{
    public $db;
    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAll()
    {
        $this->db->query('SELECT * FROM users');
        $results = $this->db->resultSet();
        return $results;
    }

    public function register($data)
    {
        $result = $this->db->query('INSERT INTO users (Role,FullName,Email,cPassword,Phone) VALUES (:Role,:FullName,:Email,:cPassword,:Phone)');
        $result = $this->db->bind(':Role', $data['Role']);
        $result = $this->db->bind(':FullName', $data['FullName']);
        $result = $this->db->bind(':Email', $data['Email']);
        $result = $this->db->bind(':cPassword', $data['cPassword']);
        $result = $this->db->bind(':Phone', $data['Phone']);
        $result = $this->db->execute();
        return $result;
    }
    public function login($data)
    {
        $result = $this->db->query('SELECT * FROM users WHERE Email=:Email AND cPassword=:Password');
        $result = $this->db->bind(':Email', $data['Email']);
        $result = $this->db->bind(':Password', $data['Password']);
        $result = $this->db->execute();
        $result = $this->db->single();

        return $result;
    }
    public function getProducts()
    {
        $result = $this->db->query('SELECT * FROM product');
        // $result = $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }
    public function getProductById($id)
    {
        $result = $this->db->query('SELECT * FROM product WHERE idProduct=:id');
        $result = $this->db->bind(':id', $id);
        $result = $this->db->execute();
        $result = $this->db->single();
        return $result;
    }
    public function getBrands()
    {
        $result = $this->db->query('SELECT * FROM brand');
        // $result = $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }
    public function getBrandById($id)
    {
        $result = $this->db->query('SELECT * FROM brand WHERE idBrand=:id');
        $result = $this->db->bind(':id', $id);
        $result = $this->db->execute();
        $result = $this->db->single();
        return $result;
    }
    public function addBrand($data)
    {
        $result = $this->db->query('INSERT INTO `brand`(`idBrand`, `idUser`, `Name`, `Rating`, `sells`, `buys`) VALUES (:idBrand,:idUser,:Name,:Rating,:sells,:buys)');
        $result = $this->db->bind(':idBrand', $data['idBrand']);
        $result = $this->db->bind(':idUser', $data['idUser']);
        $result = $this->db->bind(':Name', $data['Name']);
        $result = $this->db->bind(':Rating', $data['Rating']);
        $result = $this->db->bind(':sells', $data['sells']);
        $result = $this->db->bind(':buys', $data['buys']);
        $result = $this->db->execute();
        return $result;
    }
    public function getOrders()
    {
        $result = $this->db->query('SELECT * FROM commande ORDER BY date');
        // $result = $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }

    public function getUsers()
    {
        $result = $this->db->query('SELECT * FROM users');
        // $result = $this->db->execute();
        $result = $this->db->resultSet();

        return $result;
    }

    public function addProducts($data)
    {
        $result = $this->db->query('INSERT INTO product (Price,Name,Quantity,Description,idBrand,idCategory,img) VALUES (:Price,:Name,:Quantity,:Description,:idBrand,:idCategory,:image)');
        $result = $this->db->bind(':Price', $data['price']);
        $result = $this->db->bind(':Name', $data['Name']);
        $result = $this->db->bind(':Quantity', $data['Quantity']);
        $result = $this->db->bind(':Description', $data['description']);
        $result = $this->db->bind(':idBrand', $data['idBrand']);
        $result = $this->db->bind(':idCategory', $data['idCategory']);
        $result = $this->db->bind(':image', $data['img']);
        $result = $this->db->execute();
        return $result;
    }
    public function getCategories()
    {
        $result = $this->db->query('SELECT * FROM category');
        // $result = $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }
    public function updateProducts($data)
    {
        $result = $this->db->query('UPDATE product SET idCategory=:idCategory,idBrand=:idBrand,Price=:Price,Name=:Name,Quantity=:Quantity,Description=:Description , img=:image WHERE idProduct=:idProduct');
        $result = $this->db->bind(':idProduct', $data['idProduct']);
        $result = $this->db->bind(':Price', $data['price']);
        $result = $this->db->bind(':Name', $data['Name']);
        $result = $this->db->bind(':Quantity', $data['Quantity']);
        $result = $this->db->bind(':Description', $data['description']);
        $result = $this->db->bind(':idBrand', $data['idBrand']);
        $result = $this->db->bind(':idCategory', $data['idCategory']);
        $result = $this->db->bind(':image', $data['img']);
        $result = $this->db->execute();
        return $result;
    }
    public function deleteProducts($id)
    {
        $result = $this->db->query('DELETE FROM product WHERE idProduct=:id');
        $result = $this->db->bind(':id', $id);
        $result = $this->db->execute();
        return $result;
    }
    public function updateBrand($data)
    {
        $result = $this->db->query('UPDATE brand SET idUser=:idUser, Name=:Name,Rating=:Rating,sells=:sells,buys=:buys WHERE idBrand=:idBrand');
        $result = $this->db->bind(':idUser', $data['idUser']);
        $result = $this->db->bind(':idBrand', $data['idBrand']);
        $result = $this->db->bind(':Name', $data['Name']);
        $result = $this->db->bind(':Rating', $data['Rating']);
        $result = $this->db->bind(':sells', $data['sells']);
        $result = $this->db->bind(':buys', $data['buys']);
        $result = $this->db->execute();
        return $result;
    }
    public function deleteBrands($id)
    {
        $result = $this->db->query('DELETE FROM brand WHERE idBrand=:id');
        $result = $this->db->bind(':id', $id);
        $result = $this->db->execute();
        return $result;
    }
    public function addCategory($data)
    {
        $result = $this->db->query('INSERT INTO category (idCategory,Name,Description) VALUES (:idCategory,:Name,:Description)');
        $result = $this->db->bind(':idCategory', $data['idCategory']);
        $result = $this->db->bind(':Name', $data['Name']);
        $result = $this->db->bind(':Description', $data['Description']);
        $result = $this->db->execute();
        return $result;
    }
    public function updateCategory($data)
    {
        $result = $this->db->query('UPDATE category SET idCategory=:idCategory,Name=:Name,Description=:Description WHERE idCategory=:idCategory');
        $result = $this->db->bind(':idCategory', $data['idCategory']);
        $result = $this->db->bind(':Name', $data['Name']);
        $result = $this->db->bind(':Description', $data['Description']);
        $result = $this->db->execute();
        return $result;
    }
    public function getCategoryById($id)
    {
        $result = $this->db->query('SELECT * FROM category WHERE idCategory=:id');
        $result = $this->db->bind(':id', $id);
        $result = $this->db->execute();
        $result = $this->db->single();
        return $result;
    }
    public function deleteCategory($id)
    {
        $result = $this->db->query('DELETE FROM category WHERE idCategory=:id');
        $result = $this->db->bind(':id', $id);
        $result = $this->db->execute();
        return $result;
    }
    public function getrapport()
    {
        $result = $this->db->query('SELECT * FROM rapport');
        $result = $this->db->resultSet();
        return $result;
    }
    public function deleteRapports($id)
    {

        $result = $this->db->query('DELETE FROM rapport WHERE idRapport=:id');
        $result = $this->db->bind(':id', $id);
        $result = $this->db->execute();
        return $result;
    }
    public function deleteOrders($id)
    {
        $result = $this->db->query('DELETE FROM commande WHERE idOrder=:id');
        $result = $this->db->bind(':id', $id);
        $result = $this->db->execute();
        return $result;
    }
    public function updateOrders($id)
    {
        $result = $this->db->query('UPDATE commande SET Status=:Status WHERE idOrder=:idOrder');
        $result = $this->db->bind(':idOrder', $id);
        $result = $this->db->bind(':Status', 'validated');
        $result = $this->db->execute();
        return $result;
    }
    public function ordersCount()
    {
        $result = $this->db->query('SELECT * FROM commande');
        $result = $this->db->resultSet();
        $result = count($result);




        return $result;
    }
    public function OrderCountBySup()
    {
        $result = $this->db->query('SELECT * FROM commande WHERE idUser=:idUser');
        $result = $this->db->bind(':idUser', $_SESSION['idUser']);
        $result = $this->db->resultSet();
        $result = count($result);
        return $result;
    }
    public function categoryCount()
    {
        $result = $this->db->query('SELECT * FROM category');
        $result = $this->db->resultSet();
        $result = count($result);
        return $result;
    }

    public function productCount()
    {
        $result = $this->db->query('SELECT * FROM product');
        $result = $this->db->resultSet();
        $result = count($result);
        return $result;
    }
    public function brandCount()
    {
        $result = $this->db->query('SELECT * FROM brand');
        $result = $this->db->resultSet();
        $result = count($result);
        return $result;
    }
    public function supplierCount()
    {
        $result = $this->db->query('SELECT * FROM Users WHERE Role=:Supplier');
        $result = $this->db->bind(':Supplier', 'Supplier');
        $result = $this->db->resultSet();
        $result = count($result);
        return $result;
    }
    public function clientCount()
    {
        $result = $this->db->query('SELECT * FROM Users WHERE Role=:Client');
        $result = $this->db->bind(':Client', 'Client');
        $result = $this->db->resultSet();
        $result = count($result);
        return $result;
    }

    public function brandUser()
    {
        $result = $this->db->query('SELECT * FROM brand INNER JOIN users ON brand.idUser=users.idUser; ');
        $result = $this->db->resultSet();
        // print_r($result);
        // die();

        return $result;
    }
    public function getOrdersbyid($id)
    {
        $result = $this->db->query('SELECT commande.idOrder, product.Name , commande.Quantity, commande.Status FROM commande JOIN product on product.idProduct= commande.idProduct where idUser=:idUser');
        $result = $this->db->bind(':idUser', $id);
        // $result = $this->db->execute();
        $result = $this->db->resultSet();


        return $result;
    }
    public function addOrder($data)
    {
        $result = $this->db->query('INSERT INTO commande( idUser, idProduct, Quantity) VALUES (:idUser , :idProduct , :Quantity  )');

        $result = $this->db->bind(':idUser', $data['idUser']);
        $result = $this->db->bind(':idProduct', $data['idProduct']);
        $result = $this->db->bind(':Quantity', $data['Quantity']);
        $result = $this->db->execute();
        return $result;
    }
    public function getProductWithbrand()
    {
        $result = $this->db->query('SELECT product.idProduct , product.Price, product.img, product.Name, brand.Name as brandName, Quantity, Description FROM product JOIN brand ON product.idBrand=brand.idBrand');
        $result = $this->db->resultSet();
        return $result;
    }
}
