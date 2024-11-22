<?php

namespace app\Controller;

include 'app/Traits/ApiResponseFormatter.php';
include 'app/Models/Doa.php';

use app\Models\Doa;
use app\Traits\ApiResponseFormatter;

class DoaController
{
    use ApiResponseFormatter;

    public function index()
    {
        $doaModel = new Doa();
        $response = $doaModel->findAll();
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        $doaModel = new Doa();
        $response = $doaModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        if (json_last_error()) {
            return $this->apiResponse(400, "Error invalid input", null);
        }

        $doaModel = new Doa();
        $response = $doaModel->create([
            "judul" => $inputData['judul'],
            "isi" => $inputData['isi']
        ]);

        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        if (json_last_error()) {
            return $this->apiResponse(400, "Error invalid input", null);
        }

        $doaModel = new Doa();
        $response = $doaModel->update([
            "judul" => $inputData['judul'],
            "isi" => $inputData['isi']
        ], $id);

        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id)
    {
        $doaModel = new Doa();
        $response = $doaModel->delete($id);

        return $this->apiResponse(200, "success", $response);
    }
}