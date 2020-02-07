<?php
    include('../models/userModel.php');
    $user = new UserModel();

    $user->signUp("222.222.222-22","d","123","100","12.123-11","funcionario");

?>