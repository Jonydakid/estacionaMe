<?php
class Pages extends CI_Controller{

	public function view($page = 'home')
	{
		if(file_exists(dirname(dirname(__FILE__)).'/views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        }

        public function index()
        {
                $data['title'] = 'Home';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav');
                $this->load->view('pages/home');
                $this->load->view('templates/footer', $data);
        }

        }
