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
        
        #header_image {
            border-radius: 50px;
        }
    
    </style>
    
    
</head>
<body>
   
   
   
   
   
   
   
   <div class="container">
       
       <div class="row">
           
           <div class="col-md-12 box" >
             <div class="row">
             <div class="col-md-8">
              <?php if(session()->get('username')): ?>
               <h1>Welcome to <?php echo session()->get('username'); ?></h1>
               <?php endif; ?>
               </div>
               
               <div class="col-md-4" style="text-align:right;">
                   <img id="header_image"  src="<?php echo base_url(); ?>/public/uploads/<?php echo session()->get('user_image'); ?>" width="80" height="80" alt="<?php echo session()->get('user_image'); ?>">
               </div>
               </div>
               
           </div>
           
           
           
           
           
           <div class="col-md-12 nav" >
               
               <ul>
                   <a href="<?php echo base_url('admin/index'); ?>"><li>Home</li></a>
                   <a href="<?php echo base_url('admin/add_project/'.session()->user_id); ?>"><li>Add project</li></a>
                   <a href="<?php echo base_url('admin/logout'); ?>"><li>Logout</li></a>
                   
               </ul>
               
              
               
           </div>
           
           
           
           
           
           <div class="col-md-12 box" >
               
               
               
                <form action="<?php echo base_url('admin/add_project/'.session()->get('user_id')); ?>" enctype="multipart/form-data" method="post" style="width:50%; margin:30px auto">
                   
                   <?php
                   if(isset($errors))
                   {
                       echo $errors->listErrors();
                       
                   }
                   
                   
                   
                   if(isset($message))
                   {
                       echo $message;
                   }
                   
                   
                   ?>
                   
                   <div class="form-group">
                      <label for="">Project title</label>
                       <input type="text" name="project_title" class="form-control">
                   </div>
                   
                   <div class="form-group">
                      <label for="">Project description</label>
                       <textarea  name="project_body" rows="10" class="form-control"></textarea>
                   </div>
                   
                   <div class="form-group">
                      <label for="">Project end data</label>
                       <input type="date" name="project_end_date" class="form-control">
                   </div>
                   
                   
                   <div class="form-group">
                       <input type="submit" name="create_project" value="Create project" class="form-control btn btn-primary">
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