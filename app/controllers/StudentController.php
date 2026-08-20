<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        $_SESSION['student_access'] = true;

        $student = [
            'name' => 'Jay Karl Dazzle Digno',
            'course' => 'BS Information Technology',
            'student_id' => '00056',
            'year' => '3rd Year',
            'section' => 'F2',
            'email' => 'dazzlejayberocil07@gmail.com',
            'contact' => '09553164150'
        ];

        $this->call->view('index', [
            'student' => $student
        ]);
    }

    public function profile()
    {
        $student = [
            'name' => 'Jay Karl Dazzle Digno',
            'course' => 'BS Information Technology',
            'student_id' => '00056',
            'year' => '3rd Year',
            'section' => 'F2',
            'email' => 'dazzlejayberocil07@gmail.com',
            'contact' => '09553164150'
        ];

        $this->call->view('profile', [
            'student' => $student
        ]);
    }
}