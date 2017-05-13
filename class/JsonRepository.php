<?php


class JsonRepository {

    protected $jsonUrl;
    protected $jasonArrayData;

    public function setJsonFile () {
        try {
            $this->jsonUrl = file_get_contents("./pub/products.json");
        } catch (PDOException $e) {
            echo "Error al cargar el archivo " .$e->getMessage();
        }
    }

    public function setJsonDataInFile () {
        $this->jasonArrayData = json_decode($this->jsonUrl, true);
    }

    public function getJsonArrayData() {
        return $this->jasonArrayData;
    }


}