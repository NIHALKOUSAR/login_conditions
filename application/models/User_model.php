<?php 

class User_model extends CI_Model
{
    function insertUser($data)
    {
        $this->db->insert('users',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }
    function checkPassword($password, $email) {
		$query = $this->db->query("SELECT * FROM users WHERE password = '$password' AND email = '$email'");
	
		if ($query->num_rows() == 1) {
			$user = $query->row();
	
			if ($user->status == 'Approved') {
				return 'Approved';
			} elseif ($user->status == 'Un Approved') {
				return 'Un Approved';
			}
            elseif ($user->status == 'Relieved') {
				return 'Relieved';
			}
             else {
				return 'status_mismatch';
			}
		}
    }



    function checkPassword1($birthday, $mobile, $email ) {
		$query = $this->db->query("SELECT * FROM users WHERE birthday = '$birthday' AND mobile ='$mobile' AND email = '$email' ");
	
		if ($query->num_rows() == 1) {
			$user = $query->row();
	
			if ($user->status == 'Approved') {
				return 'Approved';
			} elseif ($user->status == 'Un Approved') {
				return 'Un Approved';
			}
            elseif ($user->status == 'Relieved') {
				return 'Relieved';
			}
             else {
				return 'status_mismatch';
			}
		}
    }

    function getUsers()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }
    function getUser($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('users');
        return $query->row();

    }

    function updateUser($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('users',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }
    function deleteUser($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('users');
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }
     // forget passsword
     function checkCurrentPassword($currentPassword)
	{
		$userid = $this->session->userdata('LoginSession')['id'];
		$query = $this->db->query("SELECT * from users WHERE id='$userid' AND password='$currentPassword' ");
		if($query->num_rows()==1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updatePassword($password)
	{
		$userid = $this->session->userdata('LoginSession')['id'];
		$query = $this->db->query("update  users set password='$password' WHERE id='$userid' ");
		
	}
	public function isEmailExist($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }
	public function getUserByEmail($email)
{
    $this->db->where('email', $email);
    $query = $this->db->get('users'); // Assuming 'users' is your table name
    return $query->row_array(); // Return the result as an associative array
}

    public function isMobileExist($mobile) {
        $this->db->where('mobile', $mobile);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }

	// function validateEmail($email)
	// {
	// 	$query = $this->db->query("SELECT * FROM users WHERE email='$email'");
	// 	if($query->num_rows() == 1)
	// 	{
	// 		return $query->row();
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }

	// function updatePasswordhash($data,$email)
	// {
	// 	$this->db->where('email',$email);
	// 	$this->db->update('users',$data);
	// }
	
	// function getHahsDetails($hash)
	// {
	// 	$query =$this->db->query("select * from users WHERE hash_key='$hash'");
	// 	if($query->num_rows()==1)
	// 	{
	// 		return $query->row();
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}

	// }

	// function validateCurrentPassword($currentPassword,$hash)
	// {
	// 	$query = $this->db->query("SELECT * FROM users WHERE password='$currentPassword' AND hash_key='$hash'");
	// 	if($query->num_rows()==1)
	// 	{
	// 		return true;
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }

	// function updateNewPassword($data,$hash)
	// {
	// 	$this->db->where('hash_key',$hash);
	// 	$this->db->update('users',$data);
	// }

	 
	// public function updatePassword1($userId, $newPassword) {
    //     // Assuming you have a field named 'password' in your users table
    //     $data = array(
    //         'password' => password_hash($newPassword, PASSWORD_DEFAULT)
    //     );

    //     $this->db->where('id', $userId);
    //     $this->db->update('users', $data);

    //     return ($this->db->affected_rows() > 0);
    // }
	// public function updateUser1($data, $id) {
    //     // Assuming you have a table named 'users'
    //     $this->db->where('id', $id);
    //     $this->db->update('users', $data);

    //     // Check if the update was successful
    //     return $this->db->affected_rows() > 0;
    // }
}
     
?>
