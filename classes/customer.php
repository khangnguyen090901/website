<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class customer
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function insert_customers($data){
            $name = mysqli_real_escape_string($this->db->link,$data['name']);
            $city = mysqli_real_escape_string($this->db->link,$data['city']);
            $gender = mysqli_real_escape_string($this->db->link,$data['gender']);
            $email = mysqli_real_escape_string($this->db->link,$data['email']);
            $address = mysqli_real_escape_string($this->db->link,$data['address']);
            $country = mysqli_real_escape_string($this->db->link,$data['country']);
            $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
            $password = mysqli_real_escape_string($this->db->link,$data['password']);
            if($name == "" || $city == "" || $gender == "" || $email == "" || $address == "" || $country == "" || $phone == "" || $password =="")
            {
                $alert = "<span style='color:red;font-size:18px;'>Fields must be not empty</span>";
                return $alert;    
            }
            else{
                $check_email = "SELECT * FROM tbl_customer WHERE email ='$email' LIMIT 1";
                $result_check = $this->db->select($check_email);
                if($result_check){
                    $alert = "<span style='color:red;font-size:18px;'>This Email Has Been Registered, Please Try Another One !</span>";
                    return $alert;
                }
                else{
                    $query = "INSERT INTO tbl_customer(name,city,gender,email,address,country,phone,password) VALUES('$name','$city','$gender','$email','$address','$country','$phone','$password')";
                    $result = $this->db->insert($query);
                    if($result)
                    {
                        $alert = "<span style='color:green;font-size:18px;'>Account Has Been Created Successfully</span>";
                        return $alert;
                    }
                    else
                    {
                        $alert = "<span style='color:red;font-size:18px;>Something Wrong, Please Try Again ! </span>";
                        return $alert;
                    }
                }
            }

        }
        public function login_customers($data){
            $email = mysqli_real_escape_string($this->db->link,$data['email']);
            $password = mysqli_real_escape_string($this->db->link,$data['password']);
            if($email == '' || $password == '')
            {
                $alert = "<span style='color:red;font-size:18px;'>Email And Password Must Be Not Empty</span>";
                return $alert;    
            }
            else{
                $check_login = "SELECT * FROM tbl_customer WHERE email ='$email' AND password ='$password'";
                $result_check = $this->db->select($check_login);
                if($result_check != false){
                    $value = $result_check->fetch_assoc();
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['id']);
                    Session::set('customer_name',$value['name']);
                    header('Location:index.php');
                }
                else{
                    $alert = "<span style='color:red;font-size:18px;'>Email And Password Do Not Match !</span>";
                    return $alert;
                }
            }
        }
        public function show_customers($id){
            $query = "SELECT * FROM tbl_customer WHERE id ='$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_customers($data,$id){
            $name = mysqli_real_escape_string($this->db->link,$data['name']);
            // $city = mysqli_real_escape_string($this->db->link,$data['city']);
            $gender = mysqli_real_escape_string($this->db->link,$data['gender']);
            $email = mysqli_real_escape_string($this->db->link,$data['email']);
            $address = mysqli_real_escape_string($this->db->link,$data['address']);
            // $country = mysqli_real_escape_string($this->db->link,$data['country']);
            $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
            $password = mysqli_real_escape_string($this->db->link,$data['password']);
        
            if($name == "" || $gender == "" || $email == "" || $address == "" || $phone == "" || $password == "")
            {
                $alert = "<span style='color:red;font-size:18px;'>Fields Must Be Not Empty</span>";
                return $alert;    
            }
            else{
                $query = "UPDATE tbl_customer SET name='$name',gender='$gender',email='$email',address='$address',phone='$phone',password='$password' WHERE id='$id'";
                $result = $this->db->insert($query);
                if($result)
                {
                    $alert = "<span style='color:green;font-size:18px;'>Your Profile Has Been Updated </span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span style='color:red;font-size:18px;>An Error Has Been Corrupted</span>";
                    return $alert;
                }
                
            }
        }
    }
?>