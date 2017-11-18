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
var_dump($myGraph->checkIfEdgeExists($mango, $ben), 'false');
var_dump($myGraph);
echo ('</pre>');

bool(true)
string(4) "true"
bool(true)
string(4) "true"
bool(false)
string(5) "false"
bool(true)
string(4) "true"
bool(false)
string(5) "false"
bool(true)
string(4) "true"
bool(false)
string(5) "false"
bool(false)
string(5) "false"
object(Graph)#1 (1) {
  ["_vertices":"Graph":private]=>
  array(3) {
    [0]=>
    object(GraphNode)#2 (2) {
      ["_value":"GraphNode":private]=>
      string(7) "Butters"
      ["_edges":"GraphNode":private]=>
      array(1) {
        [0]=>
        object(GraphNode)#3 (2) {
          ["_value":"GraphNode":private]=>
          string(6) "Carmen"
          ["_edges":"GraphNode":private]=>
          array(1) {
            [0]=>
            *RECURSION*
          }
        }
      }
    }
    [1]=>
    object(GraphNode)#3 (2) {
      ["_value":"GraphNode":private]=>
      string(6) "Carmen"
      ["_edges":"GraphNode":private]=>
      array(1) {
        [0]=>
        object(GraphNode)#2 (2) {
          ["_value":"GraphNode":private]=>
          string(7) "Butters"
          ["_edges":"GraphNode":private]=>
          array(1) {
            [0]=>
            *RECURSION*
          }
        }
      }
    }
    [3]=>
    object(GraphNode)#5 (2) {
      ["_value":"GraphNode":private]=>
      string(5) "mango"
      ["_edges":"GraphNode":private]=>
      array(0) {
      }
    }
  }
}
```
