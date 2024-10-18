<?php
class Directories {

    public function createDirectoryAndFile($directoryName, $fileContent) {
        $dir = 'directories/'; 
        $dirPath = $dir . $directoryName; 

        
        if (is_dir($dirPath)) {
            return [
                'status' => 'error',
                'message' => 'A directory already exists with that name.'
            ];
        }

        
        if (!mkdir($dirPath, 0777, true)) {
            return [
                'status' => 'error',
                'message' => 'Failed to create the directory.'
            ];
        }

        
        $filePath = $dirPath . '/readme.txt';
        if (!file_put_contents($filePath, $fileContent)) {
            return [
                'status' => 'error',
                'message' => 'Failed to create the file.'
            ];
        }

        
        return [
            'status' => 'success',
            'message' => 'Directory and file created successfully.',
            'path' => $filePath
        ];
    }
}
?>
