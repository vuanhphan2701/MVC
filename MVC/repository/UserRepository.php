<?php
class userRepository extends Repository
{
    private $db = null;
    private $userModel = null;
    function __construct()
    {
        $this->db = new Repository();
        $this->userModel = new User();
    }
    //----------------------------------------------- MAP DATA TO MODEL  -----------------------------------------------------------
    function mapDataToModel($value, $fields = [])
     {
            if (empty($fields) || in_array('id', $fields)) {
                $this->userModel->setId($value->id);
            }
            if (empty($fields) || in_array('userName', $fields)) {
                $this->userModel->setUsername($value->user_name);
            }
            if (empty($fields) || in_array('password', $fields)) {
                $this->userModel->setPassword($value->password);
            }
            if (empty($fields) || in_array('name', $fields)) {
                $this->userModel->setName($value->name);
            }
            if (empty($fields) || in_array('phone', $fields)) {
                $this->userModel->setPhone($value->phone);
            }
            if (empty($fields) || in_array('email', $fields)) {
                $this->userModel->setEmail($value->email);
            }
            if (empty($fields) || in_array('image', $fields)) {
                $this->userModel->setImage($value->image);
            }
            if (empty($fields) || in_array('gender', $fields)) {
                $this->userModel->setGender($value->gender);
            }
            if (empty($fields) || in_array('status', $fields)) {
                $this->userModel->setStatus($value->status);
            }
            if (empty($fields) || in_array('created_at', $fields)) {
                $this->userModel->setCreated_at($value->created_at);
            }
            if (empty($fields) || in_array('updated_at', $fields)) {
                $this->userModel->setUpdated_at($value->updated_at);
            }
        }
    
   //----------------------------------------------- FETCH DATA FROM DATABASE  -----------------------------------------------------------


    //fetch login
    function fetchLoginData($user_name, $password)
    {
        return $this->db->setquery('select*from users where user_name=? && password=?')->loadrow([$user_name, $password]);
    }
    // fetch list
    function fetchListData()
    {
        return  $this->db->setquery('select*from users where status != 0')->loadrows();
    }
    // fetch get User By Id
    function fetchUserByIdData($id)
    {
        return $this->db->setquery('select*from users where status !=0 and id =?')->loadrow([$id]);
    }
    // fetch update user data
    function fetchUpdateData($id, $password, $user_name, $name, $image, $email, $gender, $phone, $status)
    {
        return $this->db->setquery('update users set user_name=?,password=?, name=?, gender=?,image=?,email=?, phone=?, status=? where id =?')->save([$user_name, $password, $name, $gender, $image, $email, $phone, $status, $id]);
    }
    // fetch remove user data
    function fetchRemoveUserData($id, $user)
    {
        return $this->db->setquery('update users set status= 0 where id=? and user_name!=?')->save([$id, $user]);
    }
    // fetch search User
    function fetchSearchUserData($user_name)
    {
        return $this->db->setquery('select * from users where user_name like ? and status !=0')->loadrows([$user_name]);
    }
    // fetch history
    function fetchHistoryData()
    {
        return $this->db->setquery('select*from users where status = 0')->loadrows();
    }
    // fetch restore 
    function fetchRetrieveDeletedUsersData($id)
    {
        return  $this->db->setquery('update users set status =2 where id=?')->save([$id]);
    }
    // fetch remove user permanently data
    function fetchRemoveUserPermanentlyData($id)
    {
        return  $this->db->setquery('delete from users where id =?')->save([$id]);
    }
    // fetch add new user data
    function fetchAddNewUserData($user_name, $password, $name, $email, $phone, $image, $status, $created_at, $updated_at, $gender)
    {
        return $this->db
            ->setquery('insert into users(`user_name`, `password`, `name`, `phone`, `email`, `image`, `gender`, `status`, `created_at`, `updated_at`) values (?,?,?,?,?,?,?,?,?,?)')
            ->save([$user_name, $password, $name, $phone, $email, $image, $gender,  $status, $created_at, $updated_at]);
    }

    //----------------------------------------------- USE -----------------------------------------------------------
    function logIn($user_name, $password): array
    {
        $users = [];
        $value = $this->fetchLoginData($user_name, $password);
        $this->mapDataToModel($value, ['id', 'image', 'status', 'userName', 'password', 'name']);
        $users[] = $this->userModel;
        return $users;
    }

    function list(): array
    {
        $users = [];
        $lists = $this->fetchListData();
        foreach ($lists as $value) {
            $this->mapDataToModel($value, ['id', 'image', 'userName', 'gender', 'name', 'phone', 'email', 'status']);
            $users[] = clone  $this->userModel;
            $this->userModel->reset();
        }
        return $users;
    }

    function removeUser($id, $user)
    {
        return  $this->fetchRemoveUserData($id, $user);
    }

    function getUserById($id): array
    {
        $value = $this->fetchUserByIdData($id);
        $users = [];
        $this->mapDataToModel(
            $value,
            [
                'id',
                'password',
                'userName',
                'name',
                'image',
                'gender',
                'phone',
                'email',
                'status'
            ]
        );
        $users[] =  $this->userModel;
        return $users;
    }

    function update($id, $password, $user_name, $name, $image, $email, $gender, $phone, $status)
    {
        return $this->fetchUpdateData($id, $password, $user_name, $name, $image, $email, $gender, $phone, $status);
    }

    function profile($id): array
    {
        $value = $this->fetchUserByIdData($id);
        $users = [];
        $this->mapDataToModel($value, ['id', 'password', 'userName', 'name', 'image', 'gender', 'phone', 'email', 'status']);
        $users[] = $this->userModel;
        return $users;
    }

    function search($user_name): array
    {
        $lists = $this->fetchSearchUserData($user_name);
        $users = [];
        foreach ($lists as  $value) {
            $this->mapDataToModel($value, ['id', 'image', 'userName', 'gender', 'name', 'phone', 'email', 'status']);
            $users[] = clone $this->userModel;
            $this->userModel->reset();
        }
        return $users;
    }

    function history(): array
    {
        $users = [];
        $lists = $this->fetchHistoryData();
        foreach ($lists as  $value) {
            $this->mapDataToModel($value, ['id', 'image', 'userName', 'gender', 'name', 'phone', 'email', 'status']);
            $users[] = clone  $this->userModel;
            $this->userModel->reset();
        }
        return $users;
    }

    function retrieveDeletedUsers($id)
    {
        return  $this->fetchRetrieveDeletedUsersData($id);
    }

    function removeUserPermanently($id)
    {
        return  $this->fetchRemoveUserPermanentlyData($id);
    }


    function addNewUser($user_name, $password, $name, $email, $phone, $image, $status, $created_at, $updated_at, $gender)
    {
        return $this->fetchAddNewUserData($user_name, $password, $name, $email, $phone, $image, $status, $created_at, $updated_at, $gender);
    }
}
