<?php

$path = "index.php?page=welcome";



$nav = <<<HTML
    <nav style="background-color: #f8f9fa; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        <ul style="list-style-type: none; margin: 0; padding: 0; display: flex; justify-content: center; gap: 15px;">
            <li><a href="index.php?page=welcome" style="text-decoration: none; color: #007bff; padding: 5px;">Welcome</a></li>
            <li><a href="index.php?page=addContact" style="text-decoration: none; color: #007bff; padding: 5px;">Add Contact</a></li>
            <li><a href="index.php?page=deleteContacts" style="text-decoration: none; color: #007bff; padding: 5px;">Delete contact(s)</a></li>
            <li><a href="index.php?page=addAdmin" style="text-decoration: none; color: #007bff; padding: 5px;">Add Admin</a></li>
            <li><a href="index.php?page=deleteAdmin" style="text-decoration: none; color: #007bff; padding: 5px;">Delete Admin</a></li>
            <li><a href="index.php?page=Logout" style="text-decoration: none; color: #007bff; padding: 5px;">Logout</a></li>
        </ul>
    </nav>
HTML;



if(isset($_GET)){
    if($_GET['page'] === "addContact"){
        require_once('pages/addContact.php');
        $result = init();
    }
    
    else if($_GET['page'] === "deleteContacts"){
        require_once('pages/deleteContacts.php');
        $result = init();
    }

    else if($_GET['page'] === "welcome"){
        require_once('pages/welcome.php');
        $result = init();

    }

    else if($_GET['page'] === "addAdmin"){
        require_once('pages/addAdmin.php');
        $result = init();

    }

    else if($_GET['page'] === "deleteAdmin"){
        require_once('pages/deleteAdmin.php');
        $result = init();

    }

    else {
        header('location: '.$path);
    }
}

else {
    header('location: '.$path);
}



?>