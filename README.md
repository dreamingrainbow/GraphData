# GraphData
A Graph Data Structure in PHP
$myGraph = new Graph();
```php
echo ('<pre>');

$myGraph->addVertex('Butters');
$carmen = $myGraph->addVertex('Carmen');
var_dump($myGraph->contains('Butters'), 'true');
var_dump($myGraph->contains('Carmen'), 'true');
var_dump($myGraph->contains('Ben'), 'false');
$ben = $myGraph->addVertex('Ben');
var_dump($myGraph->contains('Ben'), 'true');
var_dump($myGraph->checkIfEdgeExists($ben, $carmen), 'false');
$mango = $myGraph->addVertex('mango', [$ben]);
var_dump($myGraph->checkIfEdgeExists($mango, $ben), 'true');
$myGraph->removeVertex('Ben');
var_dump($myGraph->contains('Ben'), 'false');
var_dump($myGraph->checkIfEdgeExists($mango, $ben), 'true');
var_dump($myGraph);
echo ('</pre>');
```
