<?php
// Pure PHP way
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
// I prefer this way. Taking a sringified version of JS object.
// data2 = JSON.stringify(jsObj) 
$data2 = '[ 
    { 
        "id": 0,
        "title": "What is Closure?",
        "options": ["Function", "Scope", "Object", "Context"],
        "answer": "Scope"
    },
    {
        "id": 1,
        "title": "What is Let scoped?",
        "options": ["Global", "Local", "Block", "Function"],
        "answer": "Block"
    },
    {
        "id": 2,
        "title": "What will be output of console.log([2,`Hi`]+7)",
        "options": ["2Hi7", "2,Hi,7", "NaN", "2,Hi7"],
        "answer": "2,Hi7"
     }
]';
header('Access-Control-Allow-Origin: *'); // Required for fetching data by XMLHttpRequest
header('Access-Control-Allow-Methods: *'); // Required to make delete/put request by XMLHttpRequest
header('Content-Type: application/json; charset=utf-8'); // Used for implicit type declaration
echo json_encode($data); 
#echo json_encode(json_decode($data2));
//It's like JSON.stringify(JSON.parse(stringfiedObj)). Can be used for json validation. You can also use `echo $data2;` for simplicity
#echo $data2;
exit();
?>