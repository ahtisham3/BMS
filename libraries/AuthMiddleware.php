<?php
class AuthMiddleware {

protected $CI;

public function __construct() {
    $this->CI =& get_instance();
}

public function checkAuth() {
    if (! $this->CI->session->userdata('logged_in')) {
        redirect('login'); // Redirect to login page if not logged in
    }
}
}
?>