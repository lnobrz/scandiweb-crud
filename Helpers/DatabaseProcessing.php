<?php
include_once "../controller/database.php";

class DatabaseProcessing
{

    public static function additionalInfos(string $category, int $productId)
    {
        try {
            $writeDatabase = Database::connectWriteDatabase();
            $readDatabase = Database::connectReadDatabase();
           
        } catch (PDOException $exception) {
            error_log("Connection Error: " . $exception, 0);
            $response = new Response(false, 500, "Database connection error", false, []);
            $response->send();
            exit;
        }
        switch($category){
            case "books":
                $query = $readDatabase->prepare('SELECT * FROM books WHERE product_id = :productId');
                break;
            case "dvds":
                 $query = $readDatabase->prepare('SELECT * FROM dvds WHERE product_id = :productId');
                 break;
            case "furnitures":
                 $query = $readDatabase->prepare('SELECT * FROM furnitures WHERE product_id = :productId');
                 break;
        }
        $query->bindParam(':productId', $productId, PDO::PARAM_INT);
        $query->execute();
        
        return $query;
    }

    public static function sendResponse($productRowCount, $productFullData)
    {

        $returnData = array();
        $returnData['rows_returned'] = $productRowCount;
        $returnData['product'] = $productFullData;
        $response = new Response(true, 200, "Product returned successfully", true, $returnData);
        $response->send();
        exit;
    }
}
