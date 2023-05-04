<?php

require_once "database.php";
require_once "../model/Book.php";
require_once "../model/Dvd.php";
require_once "../model/Furniture.php";
require_once "../model/Product.php";
require_once "../model/Response.php";
require_once "../Helpers/DatabaseProcessing.php";

try {
    $writeDatabase = Database::connectWriteDatabase();
    $readDatabase = Database::connectReadDatabase();
} catch (PDOException $exception) {
    error_log("Connection Error: " . $exception, 0);
    $response = new Response(false, 500, "Database connection error", false, []);
    $response->send();
    exit;
}

if (array_key_exists("productId", $_GET)) {
    $productId = $_GET["productId"];

    if ($productId == "" || !is_numeric($productId)) {
        $response = new Response(false, 400, "Product ID cannot be blank or must be numeric", false, []);
        $response->send();
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        try {
            $productQuery = $readDatabase->prepare('SELECT id, name, price, category, sku from products where id = :productId');
            $productQuery->bindParam(':productId', $productId, PDO::PARAM_INT);
            $productQuery->execute();
            $productRowCount = $productQuery->rowCount();

            if ($productRowCount === 0) {
                $response = new Response(false, 404, "Product not found", false, []);
                $response->send();
                exit;
            }

            while ($row = $productQuery->fetch(PDO::FETCH_ASSOC)) {
                $productCategory = $row['category'];
               

                switch ($productCategory) {
                    case "books":
                        $bookQuery = DatabaseProcessing::additionalInfos('books', $productId);
                        $weight = $bookQuery->fetch(PDO::FETCH_ASSOC)['weight'];
                        $book = new Book($row['name'], $row['price'], $row['category'], $row['sku'], $weight);
                        $book->setId($row['id']);
                        $bookFullData = $book->getFullData();
                        DatabaseProcessing::sendResponse($productRowCount, $bookFullData);
                        break;
                    case "dvds":
                        $dvdQuery = DatabaseProcessing::additionalInfos('dvds', $productId);
                        $size = $bookQuery->fetch(PDO::FETCH_ASSOC)['size'];
                        $dvd = new Dvd($row['name'], $row['price'], $row['category'], $row['sku'], $size);
                        $dvd->setId($row['id']);
                        $dvdFullData = $dvd->getFullData();
                        DatabaseProcessing::sendResponse($productRowCount, $dvdFullData);
                        exit;
                        break;
                    case "furnitures":
                        $furnitureQuery = DatabaseProcessing::additionalInfos('furnitures', $productId);
                        $width = $bookQuery->fetch(PDO::FETCH_ASSOC)['width'];
                        $height = $bookQuery->fetch(PDO::FETCH_ASSOC)['height'];
                        $length = $bookQuery->fetch(PDO::FETCH_ASSOC)['length'];
                        $furniture = new Furniture($row['name'], $row['price'], $row['category'], $row['sku'], $width, $height, $length);
                        $furniture->setId($row['id']);
                        $furnitureFullData = $dvd->getFullData();
                        DatabaseProcessing::sendResponse($productRowCount, $furnitureFullData);
                        exit;
                        break;
                }
            }
        } catch (ProductException $exception) {
            $response = new Response(false, 500, $exception->getMessage(), false, []);
        } catch (PDOException $exception) {
            $response = new Response(false, 500, "Failed to get product", false, []);
        }
    }
}
