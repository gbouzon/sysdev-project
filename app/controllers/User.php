<?php
    namespace app\controllers;
   
        class User extends \app\core\Controller {
            
            #[\app\filters\Login]
            public function index($user_id) {
                $myUser = new \app\models\User();
                if ($user_id == $_SESSION['user_id']) 
                    $myUser = $myUser->getById($user_id);
                else
                    $myUser = $myUser->getById($_SESSION['user_id']);
                $this->view('User/index', $myUser);
            }

            function login() { 
                if (!isset($_POST['action'])) {
                    $this->view('User/login'); 
                }                 
                else { 
                    $user = new \app\models\User();
                    $user = $user->get($_POST['email']);
                    if ($user) {
                        if (password_verify($_POST['password'], $user->password_hash)) {
                            $_SESSION['email'] = $user->email;
                            $_SESSION['user_id'] = $user->user_id;
                            $_SESSION['role'] = $user->role;

                            if ($user->role == 0) {
                                $cart = new \app\controllers\Cart();
                                $cart = $cart->createCart();
                            }

                            header('location:/Main/products/');                      
                        }
                        else 
                            $this->view('User/login', "Incorrect email/password combination.");
                    }    
                    else 
                        $this->view('User/login', "Incorrect email/password combination.");
                }
            }
        
            function register() { 
                // isset = determines if a variable is set and is not 
                if (!isset($_POST['action']))  // isset[button]
                    $this->view('User/register');
                else { 
                    $newUser = new \app\models\User();
                    $newUser->email = trim($_POST['email']);
                    $newUser->first_name = trim($_POST['first_name']);
                    $newUser->last_name = trim($_POST['last_name']);
                    $newUser->role = 0; //only customers can register so this is always 0
        
                    if (!$newUser->exists() && $_POST['password'] == $_POST['password_confirm']) {
                        $newUser->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
                        $newUser->insert();
                        header('location:/User/login'); 
                    } else {
                        $this->view('User/register', "The user account with that email already exists.");
                    }
                }
            }

            #[\app\filters\Login]
            function update($user_id) {
                $user = new \app\models\User();
                $user = $user->getById($user_id);//get the specific user
                if ($user_id == $_SESSION['user_id']) {
                    if (!isset($_POST['action'])){
                        $this->view('User/update', $user);
                    } else {
                        $user->email = trim($_POST['email']);
                        $user->first_name = trim($_POST['first_name']);
                        $user->last_name = trim($_POST['last_name']);

                        $user->update();
                        header('location:/User/index/' . $_SESSION['user_id']);
                    }
                }
                else
                    header('location:/User/update/' . $user_id); // in case manipulating the url
            }

            #[\app\filters\Login]
            function delete($user_id) {
                if ($user_id == $_SESSION['user_id']) {
                    $user = new \app\models\User();
                    $user = $user->getById($user_id);

                    $user = $user->delete($user_id);
                    $this->logout();    
                }
            }
        
            #[\app\filters\Login]
            function logout() {
                session_destroy(); //deletes the session ID and all data
                header('location:/Main/index');
            }
        }