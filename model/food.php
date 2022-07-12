<?php
Class Food {
	  
    private $conn;
    function __construct() {
   
    $servername = "localhost";
    $dbname = "id18897796_foodordersmanager";
    $username = "id18897796_foodmanager";
    $password = "FoodTFTproject01@";
  

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
       }else{
        $this->conn=$conn;  
       }

    } 
    
    // for Dasboard
     public function dashboard_orders(){
     	 $sql = "SELECT * FROM Orders ORDER BY Order_Id desc limit 20";
       $result=  $this->conn->query($sql);
      
       return $result;  
     }
     
     public function dashboard_order_total(){
     	 $sql = "SELECT COUNT(Order_Id) from Orders";
       $result=  $this->conn->query($sql);
        
       return $result;  
     }
      public function dashboard_order_sales(){
     	 $sql = "SELECT SUM(Total_Cost) from Orders";
       $result=  $this->conn->query($sql);
       
       return $result;   
     }
      public function dashboard_order_feedback(){
     	 $sql = "SELECT COUNT(Order_Id) FROM Orders WHERE remarks = OK ";
       $result=  $this->conn->query($sql);
       return $result;  
     }
     
     
     
     // for listing and selecting 
     
      public function list_orders(){
     	 $sql = "SELECT * FROM Orders ORDER BY Order_Id desc ";
       $result=  $this->conn->query($sql);
      
       return $result;  
     }
     
      public function list_menu(){
     	 $sql = "SELECT * FROM FoodMenu ORDER BY id desc ";
       $result=  $this->conn->query($sql);
       return $result;  
     }
      public function list_staffs(){
     	 $sql = "SELECT * FROM users ORDER BY id asc ";
       $result=  $this->conn->query($sql);
      
       return $result;  
     }
     
     
     // for creating 
     
     public function create_staff($post_data = array()){
     	 if(isset($post_data['create_staff'])){
     	     $name = mysqli_real_escape_string($this->conn,trim($post_data['firstname']));
     	     $email = mysqli_real_escape_string($this->conn,trim($post_data['email']));
     	      $password = mysqli_real_escape_string($this->conn,trim($post_data['password']));
     	       $role = mysqli_real_escape_string($this->conn,trim($post_data['role']));
     	        $sql="INSERT INTO users (name,email,password, role) VALUES ('$name', '$email', '$password', '$role')";
     	        
     	          $result=  $this->conn->query($sql);
        
           if($result){
           
               $_SESSION['message']="Successfully";
               
           }
          
       unset($post_data['create_staff']);
     	     
     	 }
     }
     
      public function create_menu($post_data=array()){
     	  if(isset($post_data['create_menu'])){
     	     $food_details = mysqli_real_escape_string($this->conn,trim($post_data['food_details']));
     	     $bun = mysqli_real_escape_string($this->conn,trim($post_data['bun']));
     	      $price = mysqli_real_escape_string($this->conn,trim($post_data['price']));
     	      
     	        $sql="INSERT INTO FoodMenu (Food_details,BUN,Price) VALUES ('$food_details', '$bun', '$price')";
     	        
     	          $result=  $this->conn->query($sql);
        
           if($result){
           
               $_SESSION['message']="Successfully";
               
           }
          
       unset($post_data['create_menu']);
     	     
     	 }
     }
     
    //for editing 
    public function edit_menu($post_data = array()){
     	 $sql = "SELECT * FROM users ORDER BY id asc ";
       $result=  $this->conn->query($sql);
      
       return $result;  
     }
     public function update_order($id){
     	if(isset($id)){
       $id= mysqli_real_escape_string($this->conn,trim($id));
     	     $sql="UPDATE Orders SET status = 'Done' WHERE  Order_Id =$id";
     	      $result=  $this->conn->query($sql);
     	      if($result){
               $_SESSION['message']="Successfully";
            
           }
     	}

     }
     
     //for deleting 
     public function delete_order($Order_Id){
     	if(isset($Order_Id)){
       $Order_Id= mysqli_real_escape_string($this->conn,trim($Order_Id));

       $sql="DELETE FROM  Orders  WHERE Order_Id =$Order_Id";
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Deleted";
            
           }
       }
      
     }
      public function delete_menu($id){
     if(isset($id)){
       $id= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  FoodMenu  WHERE id =$id";
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Deleted";
            
           }
       }
      
     }
      public function delete_user($id){
     	if(isset($id)){
       $id= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  users  WHERE id =$id";
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Deleted";
            
           }
       }
      
     }
     
    
}
?>