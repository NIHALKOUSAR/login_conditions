<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

// ADD user

//     function add()
// {
//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         $username = $this->input->post('username');
//         $birthday = $this->input->post('birthday');
//         $email = $this->input->post('email');
//         $mobile = $this->input->post('mobile');
//         $address = $this->input->post('address');
//         $password = $this->input->post('password');

//         //Check if email or mobile already exist

//         if ($this->user_model->isEmailExist($email)) {
//             // $this->session->set_flashdata('error', 'Email or Mobile already exists');
//             // redirect(base_url('user/add'));

//             echo '<script>alert("Email already exists");</script>';
//                 echo '<script>window.location.href="' . base_url('user/add') . '";</script>';

//         }
//         elseif ( $this->user_model->isMobileExist($mobile)) {
//             // $this->session->set_flashdata('error', 'Email or Mobile already exists');
//             // redirect(base_url('user/add'));
//             echo '<script>alert("  Mobile already exists");</script>';
//                     // echo '<script>window.location.href="' . base_url('user/add') . '";</script>';
//                     $this->load->view('user/add_user');
//         }
//         elseif ( $this->user_model->isMobileExist($mobile) || $this->user_model->isEmailExist($email)) {
//             // $this->session->set_flashdata('error', 'Email or Mobile already exists');
//             // redirect(base_url('user/add'));
//             echo '<script>alert("  email And  Mobile already exists");</script>';
//                     // echo '<script>window.location.href="' . base_url('user/add') . '";</script>';
//                     $this->load->view('user/add_user');
//         }

//         // Load the view
//         // $this->load->view('user/add_user');

//         else {
//             $data = array(
//                 'username' => $username,
//                 'birthday' => $birthday,
//                 'email' => $email,
//                 'mobile' => $mobile,
//                 'address' => $address,
//                 'password' => $password,
//             );

//             $status =  $this->user_model->insertUser($data);

//             if ($status == true) {
//                 echo '<script>alert("user added successfully ");</script>';
//                 echo '<script>window.location.href="' . base_url('user/add') . '";</script>';
//             } else {
//                 echo '<script>alert("fill the required");</script>';
//                 echo '<script>window.location.href="' . base_url('user/add') . '";</script>';
//             }
//         }
//     } else {
//         $this->load->view('user/add_user');
//     }
// }

// function add()
// {
//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         $username = $this->input->post('username');
//         $birthday = $this->input->post('birthday');
//         $email = $this->input->post('email');
//         $mobile = $this->input->post('mobile');
//         $address = $this->input->post('address');
//         $password = $this->input->post('password');

//         // Check if required fields are filled
//         if (empty($username) || empty($birthday) || empty($email) || empty($mobile) || empty($password)) {
//             echo '<script>alert("Fill all the required fields");</script>';
//             echo '<script>window.location.href="' . base_url('user/add') . '";</script>';
//             exit(); // Prevent further execution
//         }

//         // Check if email or mobile already exist
//         if ($this->user_model->isEmailExist($email)) {
//             echo '<script>alert("Email already exists");</script>';
//             echo '<script>window.location.href="' . base_url('user/add') . '";</script>';
//         } elseif ($this->user_model->isMobileExist($mobile)) {
//             echo '<script>alert("Mobile already exists");</script>';
//             echo '<script>window.location.href="' . base_url('user/add') . '";</script>';
//         } elseif ($this->user_model->isMobileExist($mobile) || $this->user_model->isEmailExist($email)) {
//             echo '<script>alert("Email and Mobile already exist");</script>';
//             $this->load->view('user/add_user');
//         } else {
//             $data = array(
//                 'username' => $username,
//                 'birthday' => $birthday,
//                 'email' => $email,
//                 'mobile' => $mobile,
//                 'address' => $address,
//                 'password' => $password,
//             );

//             $status = $this->user_model->insertUser($data);

//             if ($status == true) {
//                 echo '<script>alert("User added successfully ");</script>';
//             } else {
//                 echo '<script>alert("Error adding user");</script>';
//             }
//             echo '<script>window.location.href="' . base_url('user/add') . '";</script>';
//         }
//     } else {
//         $this->load->view('user/add_user');
//     }
// }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $this->input->post('username');
            $birthday = $this->input->post('birthday');
            $email = $this->input->post('email');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $password = $this->input->post('password');

            // Check if required fields are filled
            if (empty($username) || empty($birthday) || empty($email) || empty($mobile) || empty($password)) {
                echo 'alert(' . json_encode(['error' => 'fill all the Required fields']) . '.error);';
                //redirect('user/add');
                return; // Prevent further execution
            }

            // Check if email or mobile already exist

            if ($this->user_model->isEmailExist($email)) {
                echo '<script>';
                echo 'alert(' . json_encode(['error' => 'Email already exists']) . '.error);';
                echo '</script>';
                //echo '<script>window.location.href="' . base_url('user/add') . '";</script>';
                return;
           }
           if ($this->user_model->isMobileExist($mobile)) {
            echo '<script>';
            echo 'alert(' . json_encode(['error' => 'mobile already exists']) . '.error);';
            echo '</script>';
            //echo '<script>window.location.href="' . base_url('user/add') . '";</script>';
            return;
       }
       if ($this->user_model->isMobileExist($mobile) || $this->user_model->isEmailExist($email)) {
            echo 'alert(' . json_encode(['error' => 'Email and mobile already exists']) . '.error);'; 
           //echo '<script>window.location.href="' . base_url('user/add') . '";</script>';

            return;
        }
           
           
            // if ($this->user_model->isMobileExist($mobile)) {
            //     echo 'alert(' . json_encode(['error' => 'mobile already exists']) . '.error);';
            //     //echo '<script>window.location.href="' . base_url('user/add') . '";</script>';
            //     return;
            // } elseif ($this->user_model->isMobileExist($mobile) || $this->user_model->isEmailExist($email)) {
            //     echo 'alert(' . json_encode(['error' => 'Email and mobile already exists']) . '.error);'; 
            //    //echo '<script>window.location.href="' . base_url('user/add') . '";</script>';

            //     return;
            // } 
            else {
                $data = array(
                    'username' => $username,
                    'birthday' => $birthday,
                    'email' => $email,
                    'mobile' => $mobile,
                    'address' => $address,
                    'password' => $password,
                );

                $status = $this->user_model->insertUser($data);

                if ($status == true) {
                    echo 'alert(' . json_encode(['error' => 'User added Successfully']) . '.error);';
                    echo '<script>window.location.href="' . base_url('user/add') . '";</script>';
                    return;
                } else {
                    echo 'alert(' . json_encode(['error' => 'error']) . '.error);';
                    return;
                }
            }
        } else {
            $this->load->view('user/add_user');
        }
    }

// login code
    public function login()
    {
        $this->load->view('User/login');
    }

	public function loginnow()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
	
			if ($this->form_validation->run() == true) {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				//$password = sha1($password);
	
				$this->load->model('user_model');
				$status = $this->user_model->checkPassword($password, $email);
	
				if ($status == 'Approved') {
					// Successful login for approved account
					$userDetails = $this->user_model->getUserByEmail($email); // Fetch user details by email
	
					if ($userDetails) {
						// Set session data
						$session_data = array(
							'email' => $userDetails['email'],
							'id' => $userDetails['id'],
							'name' => $userDetails['username'],
							'address' => $userDetails['address'],
							'mobile' => $userDetails['mobile']
						);
						$this->session->set_userdata('UserLoginSession', $session_data);
	
						// Pass user details to view
						$this->load->view('user_dashboard', ['user' => $userDetails]);
					} else {
						echo '<script>alert("User details not found.");</script>';
						echo '<script>window.location.href="' . base_url('user/login') . '";</script>';
						exit();
					}
				} elseif ($status == 'Un Approved') {
					echo '<script>alert("Your account is not approved.");</script>';
					echo '<script>window.location.href="' . base_url('user/login') . '";</script>';
					exit();
				} elseif ($status == 'Relieved') {
					echo '<script>alert("Your account is Relieved.");</script>';
					echo '<script>window.location.href="' . base_url('user/login') . '";</script>';
					exit();
				} else {
					echo '<script>alert("Wrong email and password.");</script>';
					echo '<script>window.location.href="' . base_url('user/login') . '";</script>';
					exit();
				}
			} else {
				// Form validation failed
				echo '<script>alert("Fill all required fields.");</script>';
				echo '<script>window.location.href="' . base_url('user/login') . '";</script>';
				exit();
			}
		}
	}
	

// view database

    public function index()
    {

        $data['users'] = $this->user_model->getUsers();
        $this->load->view('user/index', $data);
    }
    function edit($id)
    {
        $data['user'] = $this->user_model->getUser($id);
        $data['id']=$id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $data = array(
                'username' => $username,
                'email' => $email,
                'mobile' => $mobile,
                'address' => $address,
            );

            $status =  $this->user_model->updateUser($data, $id);
            if ($status == true) {
                $this->session->set_flashdata('success', 'successfully Updated');
                redirect(base_url('user/index/'.$id));
            } else {
                $this->session->set_flashdata('error', 'Error');
                $this->load->view('user/edit_user');
            }
        }

        $this->load->view('user/edit_user',$data);
    }
    public function delete($id)
    {
        if (is_numeric($id)) {
            $status = $this->user_model->deleteUser($id);
            if ($status == true) {
                $this->session->set_flashdata('deleted', 'successfully Deleted');
                redirect(base_url('user/index/'));
            } else {
                $this->session->set_flashdata('error', 'Error');
                redirect(base_url('user/index/'));
            }
        }
    }
    public function dashboard()
    {
        $this->load->view('User/dashboard');
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url('user/login'));
    }
    public function active_status_user($id)
    {
        $data['status'] = 'Relieved';
        $this->db->where('id', $id);
        $result = $this->db->update('users', $data);
        if ($result == 'Approved') {
            $this->session->set_flashdata('success', "Status has been change successfully");
            $this->session->set_flashdata('success', 'Status has been change successfully');

        } else {
            $this->session->set_flashdata('danger', 'Status not update successfully');
            $this->session->set_flashdata('danger', 'Status not update successfully');
            // echo"failed";
        }
        redirect('user/index');
    }

    public function deactiv_status_user($id)
    {
        $data['status'] = 'Approved';
        $this->db->where('id', $id);
        $result = $this->db->update('users', $data);
        if ($result == 'Approved') {
            $this->session->set_flashdata('success', "Status has been change successfully");
            $this->session->set_flashdata('success', 'Status has been change successfully');
        } else {
            $this->session->set_flashdata('danger', 'Status not update successfully');
            $this->session->set_flashdata('danger', 'Status not update successfully');
            // echo"failed";
        }
        redirect('user/index');
    }

    public function forget_password()
    {
        $this->load->view('User/forget_password');
    }

    public function resetpassword()
    {
        $this->load->view('User/set_password');
    }

    public function loginnow1()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('birthday', 'birthday', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');

            if ($this->form_validation->run() == true) {
                $birthday = $this->input->post('birthday');
                $mobile = $this->input->post('mobile');
                $email = $this->input->post('email');

                $data = array(
                    'birthday' => $birthday,
                    'mobile' => $mobile,
                    'email' => $email,
                );

                $this->load->model('user_model');
                $status = $this->user_model->checkPassword1($birthday, $mobile, $email);

                if ($status == 'Approved') {
                    $this->db->where($data);
                    $query = $this->db->get('users')->row();
                    $userid = $query->id;
                    $this->session->set_userdata("id", $userid);
                    redirect(base_url('user/resetpassword'));
                } elseif ($status == 'Un Approved') {
                    echo '<script>alert("Your account is not approved.");</script>';
                    echo '<script>window.location.href="' . base_url('user/login') . '";</script>';
                    exit();
                } elseif ($status == 'Relieved') {
                    echo '<script>alert("Your account is Relieved.");</script>';
                    echo '<script>window.location.href="' . base_url('user/login') . '";</script>';
                    exit();
                } else {
                    echo '<script>alert("Wrong email and password.");</script>';
                    echo '<script>window.location.href="' . base_url('user/login') . '";</script>';
                    exit();
                }
            } else {
                // Form validation failed
                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url('user/forget_password'));
            }
        }
    }

    public function change_password()
    {
        $old_pass = $this->input->post('current_pass');
        $new_pass = $this->input->post('new_pass');
        $user_id = $this->session->userdata('id');

        if ($old_pass == $new_pass) {

            $this->db->where('id', $user_id);
            $this->db->set('password', $new_pass);
            $res = $this->db->update('users');
            // print_r($res); die;

            if ($res == true) {
                echo '<script>alert("updated password successfully.");</script>';
                echo '<script>window.location.href="' . base_url('user/login') . '";</script>';
            }
        } else {
            echo '<script>alert("Mismatch password.");</script>';
            echo '<script>window.location.href="' . base_url('user/resetpassword') . '";</script>';
        }

    }
}
