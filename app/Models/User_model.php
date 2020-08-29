<?php
namespace App\Models;
use \CodeIgniter\Model;

class User_model extends Model
{
    
    public function get_user($username,$password)
    {
        
//        $db = \Config\Database::connect();
//        
//        $db->table('users');
//        $result = $db->get();
//        
//        return $result->getResult();
        
        $db = \Config\Database::connect();
        
        $query = $db->query("SELECT * FROM users WHERE username='$username' AND user_password='$password'");
        $result = $query->getResult();
        
        return $result;
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    public function create_account($user_data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        if($builder->insert($user_data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    
    
    
    
    public function add_project($project_data)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('projects');
        if($builder->insert($project_data))
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    
    
    
    
    
    
    
    
    
    
    
    public function get_all_projects($user_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('projects');
        $builder->where('project_user_id',$user_id);
        $result=$builder->get();
        return $result->getResult();
    }
    
    
    
    
    
    
    
    public function project($project_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('projects');
        $builder->where('project_id',$project_id);
        $result=$builder->get();                                                                    
        return $result->getResult();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function add_task($task_data)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('tasks');
        if($builder->insert($task_data))
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    
    
    
    
    
    
    
    
    
    
    
    public function get_all_tasks($project_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tasks');
        $builder->join('projects','projects.project_id=tasks.task_project_id');
        $builder->where('task_project_id',$project_id);
        $result=$builder->get();
        return $result->getResult();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
     public function task($task_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tasks');
        $builder->join('projects','projects.project_id=tasks.task_project_id');
        $builder->where('task_id',$task_id);
        $result=$builder->get();
        return $result->getResult();
    }
    
    
    
    
    
    
    
    
    
    
    
    public function update_task($task_id,$task_data)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('tasks');
        $builder->where('task_id',$task_id);
        if($builder->update($task_data))
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    
    
    
    
    
    
    
    
    
    public function delete_task($task_id)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('tasks');
        $builder->where('task_id',$task_id);
        if($builder->delete())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    
    
    
    
    
    
    
    
    
    
}




?>