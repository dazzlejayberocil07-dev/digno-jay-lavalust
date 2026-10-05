<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ReactController extends Controller
{
    public function index()
    {
        $indexPath = ROOT_DIR . 'public/dist/index.html';
        if (file_exists($indexPath)) {
            header('Content-Type: text/html; charset=UTF-8');
            echo file_get_contents($indexPath);
            exit;
        }

        // Fallback to student view if dist index doesn't exist yet
        $this->call->view('student/index');
    }
}
