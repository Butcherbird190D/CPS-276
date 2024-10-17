<?php
class Directories {

    public function createDirectoryAndFile($directoryName, $fileContent) {
        $baseDir = 'directories/';
        $dirPath = $baseDir . $directoryName;

        // Check if the directory already exists
        if (is_dir($dirPath)) {
            return [
                'status' => 'error',
                'message' => 'A directory already exists with that name.'
            ];
        }

        // Try to create the directory
        if (!mkdir($dirPath, 0777, true)) {
            return [
                'status' => 'error',
                'message' => 'Failed to create the directory.'
            ];
        }

        // Create the file within the new directory
        $filePath = $dirPath . '/readme.txt';
        if (file_put_contents($filePath, $fileContent) === false) {
            return [
                'status' => 'error',
                'message' => 'Failed to create the file.'
            ];
        }

        // Success, return the success message and file path
        return [
            'status' => 'success',
            'message' => 'Directory and file created successfully.',
            'path' => $filePath
        ];
    }
}
?>
