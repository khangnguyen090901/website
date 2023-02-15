<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class contact
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function insert_contact($data){
            $name = mysqli_real_escape_string($this->db->link,$data['name']);
            $email = mysqli_real_escape_string($this->db->link,$data['email']);
            $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
            $content = mysqli_real_escape_string($this->db->link,$data['content']);
            if($name == "" || $email == "" || $phone == "" || $content =="")
            {
                $alert = "<span style='color:red;font-size:18px;'>Fields Must Be Not Empty</span>";
                return $alert;    
            }
            else{
                $query = "INSERT INTO tbl_contact(name,email,phone,content) VALUES('$name','$email','$phone','$content')";
                $result = $this->db->insert($query);
                if($result)
                {
                    $alert = "<span style='color:green;font-size:18px;'>Thanks For Contacting Us, We Will Respond As Soon As Possible</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span style='color:red;font-size:18px;>Something Wrong, Please Try Again ! </span>";
                    return $alert;
                }
                
            }

        }
        public function get_inbox_contact(){
            $query = "SELECT * FROM tbl_contact ORDER BY date_contact";
            $get_inbox_contact = $this->db->select($query);
            return $get_inbox_contact;
        }
        
    }
?>