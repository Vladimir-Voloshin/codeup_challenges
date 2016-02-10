Red colored entries have no solution yet<br/>
<?php

echo('<link rel="stylesheet" type="text/css" href="/main.css">');

class Index{
    public function printSolutionLink($folder, $solved){
        print("<a class='solutionLink$solved' href='./$folder/solution.php'>$folder</a>" . "<br/>");
    }
}

$index = new Index();
$files = scandir('./');
$files = preg_filter('/^[^\.].*/', '$0', $files);
$files = array_filter($files, "is_dir");

foreach($files as $file){
    $index->printSolutionLink($file, file_exists($file.'/solution.php'));
}