<?php
/**
 * Created by PhpStorm.
 * User: alphaman
 * Date: 4/5/17
 * Time: 3:29 AM
 */

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

        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);

        if(isset($username) && isset($password))
        {
            $result = $this->db->select('users', '*', ['username' => $username]);

            if(password_verify($password, $result['password'])){

                $_SESSION = [
                    'username'          => $username,
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

    public function getsignup()
    {
        // todo Get signup method via POST method
    }
}