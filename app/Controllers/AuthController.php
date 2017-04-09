<?php

namespace App\Controllers;


class AuthController extends Controller
{
    public function login()
    {
        // todo Login user
    }

    public function logout()
    {
        // todo Logout user
    }

    public function signup()
    {
        // todo Sign up user
    }

    public function getlogin($req, $res, $args)
    {
        $data = $req->getParsedBody();

        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);

        if(isset($email) && isset($password))
        {
            $result = $this->db->select('users', '*', ['email' => $email]);

            if(password_verify($password, $result['password'])){

                $_SESSION = [
                    'email'             => $email,
                    'allowedPatchSize'  => $result['allowedPatchSize'],
                    'accountTYpe'       => $result['accountTYpe'],
                    'usedPatches'       => $result['usedPatches'],
                ];

            } else {

            }
        } else
        {

        }
    }

    public function getsignup($req, $res, $args)
    {
        $data = $req->getParsedBody();

        $email    = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);

        if(!isset($email) && !isset($password)){ return 'Oops, either the email or password was missing'; }

        $rows = $this->db->select('users', '*', ['email' => $email]);

        if(count($rows) === 0)
        {
            $this->db->insert("users", [
                'email'     => $email,
                'password'  => password_hash($password, PASSWORD_BCRYPT),
                'patchUsed' => 0,
                'patchAvail'=> 10,
                'type'      => 0,
            ]);

            return 'Created your account. Login to your account.';
        } else {
            return 'This email is already registered';
        }
    }
}