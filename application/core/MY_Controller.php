<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 */
class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;    // identifier for our content
    protected $choices = array(// our menu navbar
        'Home' => '/', 'Portfolio' => '/portfolio', 'About' => '/assembly'
    );

    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    //Constructor
    // I moved the login junk to constructor form render - ALex
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['pagetitle'] = 'battle bots';

        $sessionPlayer = $this->input->post('sessionPlayer');
        if ($sessionPlayer !== null) {
            if ($this->Players->exists($sessionPlayer)) {
                $this->session->set_userdata('sessionPlayer', $sessionPlayer);
                $this->session->set_userdata('logged_in', true);
            } else {
                $this->session->set_userdata('sessionPlayer', '');
                $this->session->set_userdata('logged_in', false);
            }
        }
    }

    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    //renderer
    //
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    function render() {
        if ($this->session->userdata('logged_in')) {
            $this->data['sessionPlayer'] = $this->session->userdata('sessionPlayer');
            $this->data['login'] = $this->parser->parse('logged_in', $this->data, true);
        } else {
            $this->data['login'] = $this->parser->parse('logged_out', $this->data, true);
        }


        $this->data['menubar'] = build_menu_bar($this->choices);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }

}

/* End of file MY_Controller.php */
 /* Location: application/core/MY_Controller.php */ 
