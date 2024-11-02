<?php

require_once "fileUploadProc.php";

class listFilesProc {
    public function getFileNames($type) {
        /* CREATE AN INSTANCE OF THE PDOMETHODS CLASS */
        $pdo = new PdoMethods();

        /* CREATE THE SQL */
        $sql = "SELECT * FROM pdf_files";

        // PROCESS THE SQL AND GET THE RESULTS
        $records = $pdo->selectNotBinded($sql);

        /* IF THERE WAS AN ERROR DISPLAY MESSAGE */
        if ($records == 'error') {
            return 'There has been an error processing your request';
        } else {
            if (count($records) != 0) {
                if ($type == 'list') {
                    return $this->createList($records); // Call the createList method
                }
                if ($type == 'input') {
                    return $this->createInput($records);
                }
            } else {
                return 'No files found';
            }
        }
    }

    /* This method creates the list of files */
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