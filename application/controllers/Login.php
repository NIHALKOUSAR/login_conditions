<?php 
class Login extends CI_Controller{

 public function __construct() {
       parent::__construct();
        $this->load->database();
        $this->load->helper('file');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
    }

public function index(){
	$this->load->view('admin/login_view');
}

////// LOGIN Function //////

       
       public function loginu() {
         $data = array();
        $this->form_validation->set_rules('username', 'username ', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
         if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = array();
            $username = $this->input->post('username');
            $password = $this->input->post('password');
         // print_r($password); die;
            $data = array('username' => $username,
           ) ;
            $this->db->where($data);
            $query = $this->db->get('users')->row();
            // print_r($query); die;
             $passresult = password_verify($this->input->post('password'),$query->password); 
             if ($passresult) {
                $userid = $query->id;
                $this->session->set_userdata("id", $userid);
                // $_SESSION['success_message'] = "Admin Login successfully";
                $this->session->set_flashdata('success', 'Login successfully');
                redirect('Login');
                // echo "success";
            } else {
            	$this->session->set_flashdata('danger', 'Login Failed');
                  // $_SESSION['error_message'] = "Error";
                redirect('Login');
                // echo"failed";
            }
        }
    }
    
     	# code...
    ////////////// Registration Form /////////////////

    public function Registration(){
       $data = array();
        $this->form_validation->set_rules('username', 'Username ', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
         if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = array();
            
          $data['username'] = $this->input->post('username');
          $data['email'] = $this->input->post('email');
          $data['password'] = $this->input->post('password');
          //$data['confirm_password'] = password_hash($this->input->post('cpassword'),PASSWORD_BCRYPT);
          $result = $this->db->insert('users',$data);
        if ($result) {
                // $_SESSION['success_message'] = "Admin Login successfully";
                $this->session->set_flashdata('success', 'Registration successfully');
                redirect('Login');
                // echo "success";
            } else {
              $this->session->set_flashdata('danger', 'Registration Failed');
                  // $_SESSION['error_message'] = "Error";
                redirect('Login');
                // echo"failed";
            }
        }

    }



////////// Forgot password ///////////////////

          public function change_password(){
          // print_r($_POST); die;
            $old_pass=$this->input->post('current_pass');
            $new_pass=$this->input->post('new_pass');
            $user_id=$this->session->userdata('id');
            $que=$this->db->query('select password from users where id=id');
             $row=$que->row();
            if(password_verify($old_pass,$row->password)){
                $this->db->where('id',$user_id);
                $this->db->set('password',password_hash($new_pass,PASSWORD_DEFAULT));
               $res =  $this->db->update('users');
               // print_r($res); die;
                if ($res == true) {
                  $this->session->set_flashdata("Change Password successfully");
                redirect('login');
                } else {
                  $this->session->set_flashdata('danger', 'Registration Failed');
                  // $_SESSION['error_message'] = "Error";
                  redirect('login');
               }
   
           }
        }

    
        # code...
      





























    // public function regists(){
    //     $data = array();
    //     $this->form_validation->set_rules('username', 'Username ', 'required');
    //     $this->form_validation->set_rules('password', 'Password', 'required');
    //      if ($this->form_validation->run() == false) {
    //         $this->index();
    //     } else {
    //         $data = array();
       
    //         $data['username'] = $this->input->post('username');
    //         $data['email'] = $this->input->post('email');
    //          $data['password'] = password_hash($this->input->post('password'),PASSWORD_BCRYPT);
    //           // print_r($password); die;
    //         $data['confirm_password'] = password_hash($this->input->post('cpassword'),PASSWORD_BCRYPT);
    //        $result =  $this->db->insert('admin_login',$data);

    //         if ($result) {
    //             // $_SESSION['success_message'] = "Admin Login successfully";
    //             $this->session->set_flashdata('success', 'Registration successfully');
    //             redirect('Login');
    //             // echo "success";
    //         } else {
    //           $this->session->set_flashdata('danger', 'Failed Registration');
    //               // $_SESSION['error_message'] = "Error";
    //             redirect('Login');
    //             // echo"failed";
    //         }
    //     }
    // }
	






        // public function change_password()  {
        // // print_r($_POST); die;
        //     $old_pass=$this->input->post('current_pass');
        //     $new_pass=$this->input->post('new_pass');
        //     $user_id=$this->session->userdata('id');
        //     $que=$this->db->query("select password from admin_login where id='$user_id'");
        //      $row=$que->row();
        //     if(password_verify($old_pass, $row->password)){
        //         $this->db->where('id',$user_id);
        //         $this->db->set('password',password_hash($new_pass,PASSWORD_DEFAULT));
        //        $res =  $this->db->update('admin_login');
        //         if ($res == true) {
        //         $_SESSION['success_message'] = "Change Password successfully";
        //         redirect('login');
        //         } else {
        //           $_SESSION['error_message'] = "Error";
        //           redirect('admin');
        //        }
   
        //    }
        // }



//  public function logout() {
// //        session_start();
//         unset($_SESSION["id"]);
//         unset($_SESSION["username"]);
//         redirect('login');
//     }
    


}






?>
