<?php
require 'Pdo_Methods.php';
class FilesUploadProc extends PdoMethods{

    public function addFileName(){
        $pdo = new PdoMethods();

        // Check if the file has been uploaded
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            // Retrieve the filename from the file upload
            $fileName = $_FILES['file']['name'];

            /* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
            $sql = "INSERT INTO pdf_files (filename, file) VALUES (:filename, :file)";

            /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
            $bindings = [
                [':filename', $_POST['filename'], 'str'],
                [':file', $fileName, 'str'] // Use $fileName for the file
            ];

            /* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
            $result = $pdo->otherBinded($sql, $bindings);

            /* HERE I AM RETURNING EITHER AN ERROR STRING OR A SUCCESS STRING */
            if ($result === 'error') {
                return 'There was an error adding the file';
            } else {
                return 'File has been added';
            }
        } else {
            return "No file uploaded or file upload error.";
        }
    }

    /*THIS FUNCTION TAKES THE DATA FROM THE DATABASE AND RETURN AN UNORDERED LIST OF THE DATA*/
    private function createList($records){
        $list = '<ul>';
        foreach ($records as $row){
            $list .= "<li><a target='_blank' href='PDF_Files/{$row['file']}'>{$row['filename']}</a></li>"; // Corrected the array access
        }
        $list .= '</ul>';
        return $list;
    }

    public function backToMain() {
        // This method currently does nothing; you might want to implement it or remove it.
    }
}
