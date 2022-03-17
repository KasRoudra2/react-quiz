<?php
$quizes = include 'database.php';

header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: *'); 
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($quizes);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $decoded = json_decode(file_get_contents('php://input'),true);
    if(isset($decoded)) {
        $title = $decoded["title"];
        $options = $decoded["options"];
        $answer = $decoded["answer"];
    } 
    else if(isset($_POST["title"])) {
        $title = $_POST["title"];
        $options = explode(",", $_POST["options"]);
        $answer = $_POST["answer"];
    }
    else {
        $title = "Random";
        $options = ["Rand1", "Rand2", "Rand3","Rand4"];
        $answer = "Rand3";
        return null;
    };
    $new = [
        "id"=> count($quizes),
        "title"=> $title,
        "options"=> $options,
        "answer"=> $answer
    ];
    array_push($quizes, $new);
    file_put_contents('database.php',  '<?php return ' . var_export($quizes, true) . ';');
    echo json_encode($new);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $output = json_decode(file_get_contents('php://input'), true);
    $id = $output['id'];
    $body = $output["body"];
    $new = [
        "id"=> $id,
        "title"=> $body["title"],
        "options"=> $body["options"],
        "answer"=> $body["answer"]
    ];
    $quizes[$id] = $new;
    file_put_contents('database.php',  '<?php return ' . var_export($quizes, true) . ';');
    echo json_encode($body);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $output = json_decode(file_get_contents('php://input'), true);
    $id = $output['id'];
    $deleted = \array_splice($quizes, $id, 1);
    foreach ($quizes as $value) {
        $quizes[array_search($value, $quizes)]["id"] = array_search($value, $quizes);
    }
    file_put_contents('database.php',  '<?php return ' . var_export($quizes, true) . ';');
    echo json_encode($deleted);
}
?>