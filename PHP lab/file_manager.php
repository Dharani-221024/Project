<?php
$uploadDir = __DIR__ . '/uploads/';

// Ensure uploads directory exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$message = '';

// Handle File Upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileToUpload'])) {
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    if (!empty($fileName)) {
        $targetFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            $message = "File '$fileName' uploaded successfully.";
        } else {
            $message = "Error uploading your file.";
        }
    } else {
        $message = "Please select a file to upload.";
    }
}

// Handle File Deletion
if (isset($_GET['delete'])) {
    $fileToDelete = $uploadDir . basename($_GET['delete']);
    if (is_file($fileToDelete) && unlink($fileToDelete)) {
        $message = "File deleted successfully.";
    } else {
        $message = "Error deleting file.";
    }
}

// Handle File Download
if (isset($_GET['download'])) {
    $fileToDownload = $uploadDir . basename($_GET['download']);
    if (is_file($fileToDownload)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($fileToDownload) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fileToDownload));
        readfile($fileToDownload);
        exit;
    } else {
        $message = "File not found.";
    }
}

// Get uploaded files
$files = [];
if (is_dir($uploadDir)) {
    $dirContent = scandir($uploadDir);
    foreach ($dirContent as $file) {
        if ($file !== '.' && $file !== '..') {
            $files[] = [
                'name' => $file,
                'size' => filesize($uploadDir . $file),
                'modified' => filemtime($uploadDir . $file),
            ];
        }
    }
}

// Helper to format bytes
function formatBytes($bytes, $precision = 2) {
    if ($bytes === 0) return '0 B';
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 
    $bytes /= pow(1024, $pow);
    return round($bytes, $precision) . ' ' . $units[$pow]; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #444;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            background-color: #e2f3e5;
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: 4px;
        }
        .upload-section {
            padding: 20px;
            border: 1px dashed #ccc;
            margin-bottom: 20px;
            border-radius: 4px;
            background-color: #fafafa;
        }
        .upload-section input[type="file"] {
            margin-bottom: 10px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
        a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        .delete-link {
            color: #dc3545;
        }
        .empty {
            text-align: center;
            color: #777;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>File Manager</h1>

    <?php if ($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <div class="upload-section">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" required>
            <br>
            <button type="submit" class="btn">Upload</button>
        </form>
    </div>

    <h2>Uploaded Files</h2>
    
    <?php if (count($files) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Last Modified</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($files as $file): ?>
                    <tr>
                        <td><?= htmlspecialchars($file['name']) ?></td>
                        <td><?= formatBytes($file['size']) ?></td>
                        <td><?= date("Y-m-d H:i:s", $file['modified']) ?></td>
                        <td>
                            <a href="?download=<?= urlencode($file['name']) ?>">Download</a>
                            <a href="?delete=<?= urlencode($file['name']) ?>" class="delete-link" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="empty">No files uploaded yet.</div>
    <?php endif; ?>
</div>

</body>
</html>
