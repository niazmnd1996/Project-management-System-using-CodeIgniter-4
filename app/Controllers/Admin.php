<?php
namespace App\Controllers;
use \CodeIgniter\Controller;

use App\Models\User_model;
class Admin extends Controller
{
    
    
    public $session = '';
    
    
    
    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper('uri');
        if(!session()->get('username'))
        {
            header('Location: '.base_url());
            exit(); 
        }

    }
    
    
    

    
    
    public function index()
    {
        $data =[];
        
        $user_model = new User_model();
        $data['projects'] = $user_model->get_all_projects($this->session->get('user_id'));

        return view('admin_layouts/index',$data);
    }
    
    
    
    
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('home'));
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function add_project($user_id)
    {
        
        $data=[];
        
        if($this->request->getMethod()=='post')
        {
            $rules = ['project_title'=>'required'];
            if($this->validate($rules))
            {
                $project_title = $this->request->getPost('project_title');
                $project_body = $this->request->getPost('project_body');
                $project_end_date = $this->request->getPost('project_end_date');
                
                $project_data = [
                    'project_user_id'=>$user_id,
                    'project_title'=>$project_title,
                    'project_body'=>$project_body,
                    'project_end_date'=>$project_end_date
                ];
                
                $user_model = new User_model();
                if($user_model->add_project($project_data))
                {
                    return redirect()->to(base_url('admin/index'));
                }
                
            }
            else
            {
                $data['errors'] = $this->validator;
                return view('admin_layouts/add_project',$data);
            }
        }
        else
        {
            return view('admin_layouts/add_project',$data);
        }
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function project($project_id)
    {
        $data =[];
        
        $user_model = new User_model();
        $data['project'] = $user_model->project($project_id);
        $data['tasks'] = $user_model->get_all_tasks($project_id);

        return view('admin_layouts/project',$data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function add_task($project_id)
    {
        $data['project_id']=$project_id;
        if($this->request->getMethod()=='post')
        {
            $task_title = $this->request->getPost('task_title');
            $task_body = $this->request->getPost('task_body');
            $task_end_date = $this->request->getPost('task_end_date');
            
            $user_data = [
                'task_project_id'=>$project_id,
                'task_title'=>$task_title,
                'task_body'=>$task_body,
                'task_end_date'=>$task_end_date
            ];
            
            $user_model = new User_model();
            if($user_model->add_task($user_data))
            {
                return redirect()->to(base_url('admin/index'));
            }
            
        }
        else
        {
            return view('admin_layouts/add_task',$data);
        }
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function task($task_id)
    {
        $data =[];
        
        $user_model = new User_model();
        $data['task'] = $user_model->task($task_id);

        return view('admin_layouts/task',$data);
    }
    
    
    
    
    
    
    
    
    
     public function update_task($task_id)
    {
        $data =[];
        
        $user_model = new User_model();
        $data['task'] = $user_model->task($task_id);
         if($this->request->getMethod()=='post')
        {
            $task_title = $this->request->getPost('task_title');
            $task_body = $this->request->getPost('task_body');
            $task_end_date = $this->request->getPost('task_end_date');
            $task_status = $this->request->getPost('task_status');
            
            $user_data = [
                'task_title'=>$task_title,
                'task_body'=>$task_body,
                'task_end_date'=>$task_end_date,
                'task_status'=>$task_status
            ];
            
            $user_model = new User_model();
            if($user_model->update_task($task_id,$user_data))
            {
                return redirect()->to(base_url('admin/task/'.$task_id));
            }
            
        }
        else
        {
            return view('admin_layouts/update_task',$data);
        }

        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function delete_task($task_id)
    {
        $user_model = new User_model();
        if($user_model->delete_task($task_id))
        {
            return redirect()->to(base_url('admin/index'));
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
}

?>