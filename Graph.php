<?php
class GraphNode {
    private $_value;
    private $_edges;
    public function __construct($value, $edges) {
        $this->_value = $value;
        $this->_edges = $edges;
    }
    public function __call($name, $args) {
        switch($name) {
            case 'edges' :
                $this->_edges = $args;
                return $this;
        }
    }
    public function __get($name) {
        switch($name) {
            case 'value':
                return $this->_value;
            case 'edges':
                return $this->_edges;
            case 'numberOfEdges':
                return count($this->_edges);
        }
    }
    public function removeEdge($edge){
        unset($this->_edges[array_search($edge, $this->_edges)]);
    }
    public function pushToEdges($newEdge) {
        array_push($this->_edges, $newEdge);
    } 
}

class Graph {
    private $_vertices = [];
    public function addVertex($value, $edges = []) {
        $newGraphNode = new GraphNode($value, $edges);
        foreach($newGraphNode->edges as $vertex) {
            $this->addEdge($newGraphNode, $vertex);
        }
        if (count($this->_vertices) === 1) {
            $this->addEdge($newGraphNode, $this->_vertices[0]);
          }
        array_push($this->_vertices, $newGraphNode);
        return $newGraphNode;
    }
    public function contains($value) {
        $this->value = $value;
        $this->containsBoolean = null;
        array_walk($this->_vertices, function($vertex){ 
            if(!isset($this->containsBoolean))
            if ($vertex->value === $this->value) $this->containsBoolean = true;
        });

        if(is_null($this->containsBoolean)) {
            unset($this->containsBoolean, $this->value);
            return false;
        }
        $x = $this->containsBoolean;
        unset($this->containsBoolean, $this->value);
        return $x !== null ? true: false;
    }
    public function removeVertex($value) {
        if(!count($this->_vertices)) return false;
        if(!$this->contains($value)) return false;
        $this->value = $value;
        $this->listToRemoveFrom = [];
        $this->_vertices = array_filter($this->_vertices, function($vertex){
            if($vertex->value === $this->value)
            $this->listToRemoveFrom = $vertex->edges;
            return ($vertex->value !== $this->value);
        });
        array_walk($this->listToRemoveFrom, function($vertex) {
            $vertex->removeEdge($this->value);
        });
        unset($this->value, $this->listToRemoveFrom);
    }
    public function checkIfEdgeExists($fromVertex, $toVertex) {
        foreach($fromVertex->edges as $edge) {
            if ($toVertex->value === $edge->value) return true;
        }
        return false;
    }
    public function addEdge($fromVertex, $toVertex) {
        if(!$this->checkIfEdgeExists($fromVertex, $toVertex)){ $fromVertex->pushToEdges($toVertex);}
        if(!$this->checkIfEdgeExists($toVertex, $fromVertex)){ $toVertex->pushToEdges($fromVertex);}
    }
}
