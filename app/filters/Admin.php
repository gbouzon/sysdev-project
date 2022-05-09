<?php
    namespace app\filters;

        #[\Attribute]
        class Admin {

            function execute() {
                if (isset($_SESSION['role']) && $_SESSION['role'] != 1) {
                    header('location:/User/login');
                    return true;
                }

                return false;
            }
        }