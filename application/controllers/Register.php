<?php
 function index() {
        $this->data['pagebody'] = 'register'; // this is the view we want shown


        $this->render();
    }

    function register(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->user->checkUser($username);
        if($result[0] != null){
            
        }else{
            $data = array(
                'player' => $username,
                'Peanuts' => '100',
                'Password' => $password,
                'Role' => 'user',
                'Avatar' => '',
            );
            $this->user->insertUser($data);
        }
        redirect('/', 'refresh');

    }


