<?php
require_once('classes/Pdo_methods.php');

function init() {
    global $elementsArr;

    if (isset($_POST['delete'])) {
        if (isset($_POST['chkbx'])) {
            $error = false;
            foreach ($_POST['chkbx'] as $id) {
                $pdo = new PdoMethods();

                // Delete admin record
                $sql = "DELETE FROM admins WHERE id=:id";
                $bindings = [
                    [':id', $id, 'int']
                ];

                $result = $pdo->otherBinded($sql, $bindings);

                if ($result === 'error') {
                    $error = true;
                    break;
                }
            }
        }
    }

    return getForm($error ?? false);
}

function getForm($error) {
    global $elementsArr;

    $pdo = new PdoMethods();
    $sql = "SELECT * FROM admins";
    $admins = $pdo->selectNotBinded($sql);

    if (count($admins) === 0) {
        return ["<p>No admins available to delete</p>", ""];
    }

    // Table rows for admins
    $adminRows = "";
    foreach ($admins as $admin) {
        $adminRows .= "<tr>
            <td>{$admin['name']}</td>
            <td>{$admin['email']}</td>
            <td>{$admin['status']}</td>
            <td><input type='checkbox' name='chkbx[]' value='{$admin['id']}' /></td>
        </tr>";
    }

    // Acknowledgement message
    $acknowledgement = $error ? "<p style='color: red;'>Could not delete the admin(s)</p>" : "<p>Admin(s) deleted successfully!</p>";

    // The form and table
    $form = <<<HTML
        <form method="post" action="index.php?page=deleteAdmin">
            <h1>Delete Admin</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Select to Delete</th>
                    </tr>
                </thead>
                <tbody>
                    $adminRows
                </tbody>
            </table>
            <button type="submit" name="delete" class="btn btn-danger">Delete Admin(s)</button>
        </form>
HTML;

    return [$acknowledgement, $form];
}
?>
