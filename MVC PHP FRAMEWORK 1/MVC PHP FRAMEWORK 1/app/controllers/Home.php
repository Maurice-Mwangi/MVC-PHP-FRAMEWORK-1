<?php 


class Home
{

    use Controller;
    
    public function index()
    {
        
        $user = new User;

        // $arr['user_names'] = 'Ndwiga Muchiri';
        // $arr['email_address'] = "Ndwiga@gmail.com";

        $data = $user->getAllRow();

        show_array($data);

        $this->view('home');
    }

}