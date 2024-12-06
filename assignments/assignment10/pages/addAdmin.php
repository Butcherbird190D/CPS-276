<?php
require_once('classes/StickyForm.php');
$stickyForm = new StickyForm();

function init() {
    global $elementsArr, $stickyForm;

    if (isset($_POST['submit'])) {
        $postArr = $stickyForm->validateForm($_POST, $elementsArr);

        if ($postArr['masterStatus']['status'] == "noerrors") {
            return addData($_POST);
        } else {
            return getForm("", $postArr);
        }
    } else {
        return getForm("", $elementsArr);
    }
}

$elementsArr = [
    "masterStatus" => [
        "status" => "noerrors",
        "type" => "masterStatus"
    ],
    "name" => [
        "errorMessage" => "<span style='color: red; margin-left: 15px;'>Name cannot be blank and must be a standard name</span>",
        "errorOutput" => "",
        "type" => "text",
        "value" => "",
        "regex" => "name"
    ],
    "email" => [
        "errorMessage" => "<span style='color: red; margin-left: 15px;'>Email must be valid</span>",
        "errorOutput" => "",
        "type" => "text",
        "value" => "",
        "regex" => "email"
    ],
    "password" => [
    "errorMessage" => "<span style='color: red; margin-left: 15px;'>Password cannot be blank and must be at least 8 characters</span>",
    "errorOutput" => "",
    "type" => "password",
    "value" => "", // Leave value empty for security
    "regex" => "password"
],
    "status" => [
        "type" => "select",
        "options" => ["staff" => "Staff", "admin" => "Admin"],
        "selected" => "",
        "regex" => "" 
    ]
];

function addData($post) {
    global $elementsArr;
    require_once('classes/Pdo_methods.php');

    $pdo = new PdoMethods();
    $hashedPassword = password_hash($post['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO admins (name, email, password, status) VALUES (:name, :email, :password, :status)";
    $bindings = [
        [':name', $post['name'], 'str'],
        [':email', $post['email'], 'str'],
        [':password', $hashedPassword, 'str'],
        [':status', $post['status'], 'str']
    ];

    $result = $pdo->otherBinded($sql, $bindings);

    if ($result === "error") {
        return getForm("<p>There was a problem adding the admin.</p>", $elementsArr);
    } else {
        return getForm("<p>Admin added successfully!</p>", $elementsArr);
    }
}

function getForm($acknowledgement, $elementsArr) {
    global $stickyForm;
    $options = $stickyForm->createOptions($elementsArr['status']);

    $form = <<<HTML
        <form method="post" action="index.php?page=addAdmin">
        <h1>Add Admin</h1>
            <div class="form-group">
                <label for="name">Name{$elementsArr['name']['errorOutput']}</label>
                <input type="text" class="form-control" id="name" name="name" value="{$elementsArr['name']['value']}">
            </div>
            <div class="form-group">
                <label for="email">Email{$elementsArr['email']['errorOutput']}</label>
                <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}">
            </div>
            <div class="form-group">
                <label for="password">Password{$elementsArr['password']['errorOutput']}</label>
                <input type="password" class="form-control" id="password" name="password" value="{$elementsArr['password']['value']}">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    $options
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
HTML;

    return [$acknowledgement, $form];
}
?>
