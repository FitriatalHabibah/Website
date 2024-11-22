<?php

namespace app\Routes;

include 'app/Controller/DoaController.php';

use app\Controller\DoaController;

class DoaRoutes
{
    public function handle($method, $path)
    {
        // Rute GET untuk mengambil semua doa
        if ($method == "GET" && $path == '/api/doa') {
            $controller = new DoaController();
            echo $controller->index();
        }

        // Rute GET untuk mengambil doa berdasarkan ID
        if ($method == "GET" && strpos($path, "/api/doa/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1]; // Mengambil ID dari URL

            $controller = new DoaController();
            echo $controller->getById($id);  // Panggil getById dengan ID yang diterima
        }

        // Rute POST untuk menambah doa baru
        if ($method == "POST" && $path == "/api/doa") {
            $controller = new DoaController();
            echo $controller->insert();
        }

        // Rute PUT untuk memperbarui doa
        if ($method == "PUT" && strpos($path, "/api/doa/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];  // Mengambil ID dari URL

            $controller = new DoaController();
            echo $controller->update($id);
        }

        // Rute DELETE untuk menghapus doa
        if ($method == "DELETE" && strpos($path, "/api/doa/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];  // Mengambil ID dari URL

            $controller = new DoaController();
            echo $controller->delete($id);
        }
    }
}
