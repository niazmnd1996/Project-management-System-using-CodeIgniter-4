<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project detail</title>
    
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
<body style="">
   

   
   
   
   
   
   
   
   
   
   
   
   
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
               
                <?php if(isset($project)): ?>
                <h2><?php echo $project[0]->project_title; ?> <small><small><?php echo $project[0]->project_status; ?></small></small></h2>
                
                <div style="text-align:right;">
                <a class="btn btn-primary" href="<?php echo base_url('admin/add_task/'.$project[0]->project_id); ?>">Add task</a>
                </div>
                <h5>Start date: <?php echo $project[0]->project_date; ?></h5>
                
                <p><?php echo $project[0]->project_body; ?></p>
                
                
                <h5>End date: <?php echo $project[0]->project_end_date; ?></h5>
                
                
                
                <?php if(isset($tasks)): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Task title</th>
                            <th>Project</th>
                            <th>Task body</th>
                            <th>Task start date</th>
                            <th>Task end date</th>
                            <th>Task status</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                       <?php foreach($tasks as $task): ?>
                        <tr>
                            <td><?php echo $task->task_title; ?></td>
                            <td><?php echo $task->project_title; ?></td>
                            <td><?php echo substr($task->task_body,0,50); ?></td>
                            <td><?php echo $task->task_date; ?></td>
                            <td><?php echo $task->task_end_date; ?></td>
                            <td><?php echo $task->task_status; ?></td>
                            <td><a class="btn btn-primary" href="<?php echo base_url('admin/task/'.$task->task_id); ?>">View detail</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    
                </table>
                <?php endif; ?>
                
                
                
                <?php endif; ?>
               
           </div>
           
           
           
           
           
           
           
           
           
           
           <div class="col-md-12 box" >
               <p>Designed and developed by: <b>Niaz Muhammad</b></p>
           </div>
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
       </div>
       
   </div>
   
   
   
   
   
   
   
   
   
    
</body>
</html>