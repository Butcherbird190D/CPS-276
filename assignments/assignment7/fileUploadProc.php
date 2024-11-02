<?php
require_once 'PdoMethods.php';
class FilesUploadProc extends PdoMethods {
    public function addFileName() {
        if (isset($_POST['file_name']) && isset($_FILES['uploadedFile'])) {
            $pdo = new PdoMethods();
            $sql = "INSERT INTO pdf_files (filename, file) VALUES (:filename, :file)";

            $bindings = [
                [':filename', $_POST['file_name'], 'str'],
                [':file', $_FILES['uploadedFile']['name'], 'str']
            ];

            $result = $pdo->otherBinded($sql, $bindings);

            if ($result === 'error') {
                $_SESSION['message'] = 'There was an error adding the file';
            } else {
                move_uploaded_file($_FILES['uploadedFile']['tmp_name'], "PDF_Files/" . $_FILES['uploadedFile']['name']);
                $_SESSION['message'] = 'File has been added';
            }
        }

        // Redirect back to the upload form
        header('Location: uploadForm.php'); // Change this to your upload form page
        exit();
    }
    private function createList($records) {
        $list = '<ul>';
        foreach ($records as $row) {
            $list .= "<li><a target='_blank' href='PDF_Files/{$row['file']}'>{$row['filename']}</a></li>";
        }
        $list .= '</ul>';
        return $list;
    }

    
}
?>