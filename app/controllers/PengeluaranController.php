<?php

class PengeluaranController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    // List all pengeluaran
    public function index()
    {
        $pengeluaran = $this->model->getAllPengeluaran();
        require_once '../app/views/listPengeluaran.php';
    }

    // Add pengeluaran
    public function add($data)
    {
        if ($this->model->addPengeluaran($data)) {
            header("Location: /pengeluaran");
        } else {
            echo "Gagal menambahkan pengeluaran.";
        }
    }

    // Delete pengeluaran
    public function delete($id)
    {
        if ($this->model->deletePengeluaran($id)) {
            header("Location: /pengeluaran");
        } else {
            echo "Gagal menghapus pengeluaran.";
        }
    }
}
