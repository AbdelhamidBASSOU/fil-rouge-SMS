<?php
class register extends Controller{
    public function __construct(){
    $this->users=$this->model('Users');
      }
    public function index(){
        $data=[
            'title'=>'Register'
        ];
        $this->view('register/index',$data);
        if(isset($_POST['submit'])){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        
            $data=[
                'Role'=>trim($_POST['Role']),
                'FullName'=>trim($_POST['FullName']),
                'Email'=>trim($_POST['Email']),
                'cPassword'=>trim($_POST['cPassword']),
                'Phone'=>trim($_POST['Phone']),
                'password'=>trim($_POST['Password']),
                'FullName_err'=>'',
                'Email_err'=>'',
                'Password_err'=>'',
                'Phone_err'=>''
            ];
            
            if($data['cPassword']!=$data['password']){
                $data['Password_err']='Password do not match';
            }
            if(empty($data['FullName_err']) && empty($data['Email_err']) && empty($data['Password_err']) && empty($data['Phone_err']) && !empty($data['FullName']) && !empty($data['Email']) && !empty($data['cPassword']) && !empty($data['Phone'])){
                if($this->users->register($data)){
                    echo '<script>alert("Registration Successful")</script>';
                    echo '<script>window.location.href="'.URLROOT.'/login"</script>';
                }else{
                    echo "<script>alert('Something went wrong');</script>";
                    die('Something went wrong');
                }
            }else{
                $this->view('register/index',$data);
            }
        }else{
            $data=[
                'Role'=>'',
                'FullName'=>'',
                'Email'=>'',
                'Password'=>'',
                'Phone'=>'',
                'FullName_err'=>'',
                'Email_err'=>'',
                'Password_err'=>'',];
}


    }};




?>