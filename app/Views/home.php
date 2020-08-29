<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Management System</title>
    
    <link rel="stylesheet" href="<?php echo base_url('public/assets/bootstrap/css/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('public/assets/bootstrap/js/bootstrap.min.js'); ?>" ></script>
    
    
    
    <style>
    
        .box {
            background: #FFF;
            padding: 20px;
            margin: 5px;
            box-shadow: 2px 2px 4px 4px #BBB;
        }
        
        
        
        
        
     .nav {
            background: #FFF;
            margin: 5px;
            box-shadow: 2px 2px 4px 4px #BBB;
            height: 40px;
            line-height: 40px;
        }
        
        
        .nav ul { list-style-type: none;}
        
        .nav ul li {
            float: left;
            margin: 0 5px;
        }
        
        .nav ul li:hover{
            text-shadow: 5px 5px 10px #999;
        }
        
        
        a { color:#000; }    
        
        
        
        
       
        
        
    
    </style>
    
    
</head>
<body>
   
   
   
   
   
   
   
   <div class="container">
       
       <div class="row">
           
           <div class="col-md-12 box" >
               <h1>Project Management System</h1>
           </div>
           
           
           
           
           
           
           
           
           <div class="col-md-12 nav" >
               
               <ul>
                   <a href="<?php echo base_url('home/index'); ?>"><li>Login</li></a>
                   <a href="<?php echo base_url('home/create_account'); ?>"><li>Create account</li></a>
               </ul>
               
           </div>
           
           
           
           
           
           
           
           
           
           
           <div class="col-md-12 box" >
               
               <form action="<?php echo base_url('home/index'); ?>" method="post" style="width:50%; margin:30px auto">
                   
                   <?php
                   if(isset($errors))
                   {
                       echo $errors->listErrors();
                       
                   }
                   ?>
                   
                   <div class="form-group">
                      <label for="">Username</label>
                       <input type="text" name="username" class="form-control">
                   </div>
                   
                   <div class="form-group">
                      <label for="">Password</label>
                       <input type="password" name="password" class="form-control">
                   </div>
                   
                   <div class="form-group">
                       <input type="submit" name="login" value="Login" class="form-control btn btn-primary">
                   </div>
                   
               </form>
               
           </div>
           
           
           
           
           
           
           
           
           
           
           <div class="col-md-12 box" >
               <p>Designed and developed by: <b>Niaz Muhammad</b></p>
           </div>
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
       </div>
       
   </div>
   
   
    
</body>
</html>