<?php namespace App\Controllers;


use \CodeIgniter\Controller;
use App\Models\User_model;

class Home extends Controller
{
    
    
    
    public $session='';
    
    public function __construct()
    {
        $this->session  = \Config\Services::session();
        helper(['session','validate']);
        
        if($this->session->get('username'))
        {
            header("Location:".base_url('admin/index'));
            exit();
        }
        
    }
    
	public function index()
	{
        $data=[];
        
        $session  = \Config\Services::session();
        
        if($this->request->getMethod()=='post')
        {
            $rules = [
                'username'=>'required',
                'password'=>'required'
            ];
            
            
            if($this->validate($rules))
            {
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');
                
                
                
                $user_model = new User_model();
                $user = $user_model->get_user($username,$password);
                if($user)
                {
                    session()->set(['username'=>$user[0]->username,'password'=>$password,'user_id'=>$user[0]->user_id,'user_image'=>$user[0]->user_image]);
                    return redirect()->to(base_url('admin/index'));
                }
                else
                {
                     return view('home',$data);
                }
                
                
            }
            else
            {
                
                $data['errors']=$this->validator;               

                return view('home',$data);
            }
            
            
            
            
        }
        else
        {
            return view('home',$data);
        }
        
        
		
	}

	//--------------------------------------------------------------------
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function create_account()
    {
        
        
        $data = [];

        
        if($this->request->getMethod()=='post')
        {
            $rules = [
                'username'=>'required',
                'user_password'=>'required',
                'user_firstname'=>'required',
                'user_lastname'=>'required',
                'user_email'=>'required'
                
            ];
            
            
            if($this->validate($rules))
            {
                $user_model = new User_model();
                
                $username = $this->request->getVar('username');
                $user_password = $this->request->getVar('user_password');
                $user_firstname = $this->request->getVar('user_firstname');
                $user_lastname = $this->request->getVar('user_lastname');
                $user_email = $this->request->getVar('user_email');
                $user_image = $this->request->getFile('user_image');
                $image_name=$user_image->getName();
                
                $user_image->move(ROOTPATH.'public/uploads');
                
                $user_data = [
                    'username'=>$username,
                    'user_password'=>$user_password,
                    'user_firstname'=>$user_firstname,
                    'user_lastname'=>$user_lastname,
                    'user_email'=>$user_email,
                    'user_image'=>$image_name
                ];
                
                if($user_model->create_account($user_data))
                {
                    $data['message'] = "User created successfully";
                    return view('home_layouts/create_account',$data);
                }
                
                
                
            }
            else
            {
                $data['errors'] = $this->validator;
                return view('home_layouts/create_account',$data);
            }
            
            
        }
        else
        {
            echo view('home_layouts/create_account');
        }
        
        
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}
