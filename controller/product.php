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

// if (empty($_GET)) {


//     if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//         try {
//             $productQuery = $readDatabase->prepare('SELECT * from products');
//             $productQuery->execute();

//             $productRowCount = $productQuery->rowCount();


//             if ($productRowCount === 0) {
//                 $response = new Response(false, 404, "Products not found", false, []);
//                 $response->send();
//                 exit;
//             }

//             $products = array();

//             // while ($row = $productQuery->fetch(PDO::FETCH_ASSOC)) {
//             //     $productCategory = $row['category'];

//             //     if ($productCategory === "books") {
//             //         $weight = DatabaseProcessing::additionalInfos('books', $row['id'])->fetch(PDO::FETCH_ASSOC);
//             //         $book = new Book($row['name'], $row['price'], $row['category'], $row['sku'], $weight['weight']);
//             //         $book->setId($row['id']);
//             //         $bookFullData = $book->getFullData();
//             //         $products[] = $bookFullData;
//             //     } // else if ($productCategory === "dvds") {
//                 //     $dvdQuery = DatabaseProcessing::additionalInfos('dvds', $row['id']);
//                 //     $size = $dvdQuery->fetch(PDO::FETCH_ASSOC)['size'];
//                 //     $dvd = new Dvd($row['name'], $row['price'], $row['category'], $row['sku'], $size);
//                 //     $dvd->setId($row['id']);
//                 //     $dvdFullData = $dvd->getFullData();
//                 //     $products[] = $dvdFullData;
//                 // } else if ($productCategory === "furnitures") {
//                 //     $furnitureQuery = DatabaseProcessing::additionalInfos('furnitures', $row['id']);
//                 //     $furnitureData = $furnitureQuery->fetch(PDO::FETCH_ASSOC);
//                 //     print_r($furnitureData);
//                 //     $furniture = new Furniture($row['name'], $row['price'], $row['category'], $row['sku'],  $furnitureData['weight'], $furnitureData['height'], $furnitureData['length']);
//                 //     $furniture->setId($row['id']);
//                 //     $furnitureFullData = $dvd->getFullData();
//                 //     $products[] = $furnitureFullData;
//                 // }
//             }

//             DatabaseProcessing::sendResponse($productRowCount, $products);
//         } catch (ProductException $exception) {
//             $response = new Response(false, 500, $exception->getMessage(), false, []);
//         } catch (PDOException $exception) {
//             $response = new Response(false, 500, "Failed to get product", false, []);
//         }
//     } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
//         try {
//             $deleteQuery = $writeDatabase->prepare('DELETE FROM products WHERE id = :productId');
//             $deleteQuery->bindParam(':productId', $productId, PDO::PARAM_INT);
//             $deleteQuery->execute();
//             $rowCount = $deleteQuery->rowCount();

//             if ($rowCount === 0) {
//                 $response = new Response(false, 404, "Product not found", false, []);
//                 $response->send();
//                 exit;
//             }
//         } catch (PDOException $exception) {
//             $response = new Response(false, 500, "failed to delete task", false, []);
//             $response->send();
//             exit;
//         }
//     }
// }
