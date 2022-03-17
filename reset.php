<?php
$data = [
    [ 
       "id"=> 0,
       "title"=> 'What is Closure?',
       "options"=> ['Function', 'Scope', 'Object', 'Context'],
       "answer"=> 'Scope'
    ],
    [
       "id"=> 1,
       "title"=> 'What is Let scoped?',
       "options"=> ['Global', 'Local', 'Block', 'Function'],
       "answer"=> 'Block'
    ],
    [
        "id"=> 2,
        "title"=> "What will be output of console.log([2,`Hi`]+7)",
        "options"=> ["2Hi7", "2,Hi,7", "NaN", "2,Hi7"],
        "answer"=> "2,Hi7"
    ]
];
file_put_contents('database.php',  '<?php return ' . var_export($data, true) . ';');
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: *'); 
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data); 
exit();
?>