<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class product
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function insert_product($data,$files)
        {

            $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
            $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
            $category = mysqli_real_escape_string($this->db->link,$data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link,$data['price']);
            $type = mysqli_real_escape_string($this->db->link,$data['type']);

            // kiem tra hinh anh va lay hinh anh cho vao folder upload
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(time(), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "" || $file_name =="")
            {
                $alert = "<span class='error'>Fields Must Be Not Empty</span>";
                return $alert;    
            }
            else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,type,image) VALUES('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
                $result = $this->db->insert($query);
                if($result)
                {
                    $alert = "<span class='success'>Product Has Been Added</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span class='error'>An Error Has Been Corrupted</span>";
                    return $alert;
                }
            }
        }
        public function show_product()
        {
            $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 
            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId 
            order by tbl_product.productId desc";
            // $query = "SELECT * FROM tbl_product order by productId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data,$files,$id)
        {
            $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
            $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
            $category = mysqli_real_escape_string($this->db->link,$data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link,$data['price']);
            $type = mysqli_real_escape_string($this->db->link,$data['type']);

            // kiem tra hinh anh va lay hinh anh cho vao folder upload
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(time(), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

           if($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "")
            {
                $alert = "<span class='error'>Fields Must Be Not Empty</span>";
                return $alert;    
            }
            else{
                move_uploaded_file($file_temp,$uploaded_image);
                if(!empty($file_name)){
                    //neu nguoi dung chon anh
                    if($file_size > 102400){
                        $alert = "<span class='success'>Image Size Should Be Less Than 100MB!</span>";
                        return $alert;
                    }
                    elseif (in_array($file_ext, $permited) == false){
                        // echo "<span class='error'>You Can Upload Only:-".implde(',',$permited)."</span>";
                        $alert = "<span class='success'>You Can Upload Only:-".implde(',',$permited)."</span>";
                        return $alert;
                    }
                    $query = "UPDATE tbl_product SET 
                    productName ='$productName',
                    brandId ='$brand',
                    catId ='$category',
                    type ='$type',
                    price ='$price',
                    image ='$unique_image',
                    product_desc ='$product_desc'
                    WHERE productId = '$id' ";
                }
                else{
                    //Neu nguoi dung chon anh
                    $query = "UPDATE tbl_product SET 
                    productName ='$productName',
                    brandId ='$brand',
                    catId ='$category',
                    type ='$type',
                    price ='$price',
                    product_desc ='$product_desc' 
                    WHERE productId = '$id' ";
                }
                $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<span class='success'>Product Has Been Updated</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span class='error'>An Error Has Been Corrupted</span>";
                    return $alert;
                }
            }
            
        }
        public function del_product($id)
        {
            $query = "DELETE FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->delete($query);
            if($result)
            {
                $alert = "<span class='success'>Product Has Been Deleted</span>";
                return $alert;
            }
            else
            {
                $alert = "<span class='error'>An Error Has Been Corrupted</span>";
                return $alert;
            }
        } 
        
        public function getproductbyId($id)
        {
            $query = "SELECT * FROM tbl_product where productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        //end racked
        public function getproduct_feathered(){
            $query = "SELECT * FROM tbl_product where type = '0' LIMIT 4";
            $result = $this->db->select($query);
            return $result;

        }

        public function getproduct_new(){
            $query = "SELECT * FROM tbl_product order by productId desc LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_details($id){
            $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 
            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId = '$id'";
            
            $result = $this->db->select($query);
            return $result;
        }
        public function getlastestApple(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '4' order by productId desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getlastestSamsung(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '1' order by productId desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getlastestToshiba(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '7' order by productId desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getlastestLG(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '6' order by productId desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproductbySamsung(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '1' order by productId desc LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproductbyApple(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '4' order by productId LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproductbyToshiba(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '7' order by productId desc LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }
        public function search_product($keyword){
            $keyword = $this->fm->validation($keyword);
            $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$keyword%'";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>