<?php

function dfs($graph, $start, &$visited, &$result) {
    $visited[$start] = true;
    $result .= $start . ' ';

    foreach ($graph[$start] as $neighbor) {
        if (!$visited[$neighbor]) {
            dfs($graph, $neighbor, $visited, $result);
        }
    }
}

function performDFS() {
    $input = $_POST['gf_input']; // Assuming you are submitting the form using POST method
    $lines = explode(';', $input);
    $graph = [];

    // Build adjacency list representation of the graph
    foreach ($lines as $line) {
        list($v1, $v2) = explode(' ', trim($line));
        $graph[$v1][] = $v2;
        $graph[$v2][] = $v1; // Assuming undirected graph, remove this line if directed
    }

    $startVertex = trim($_POST['start_vertex']); // Assuming you have a start vertex input field

    $visited = [];
    foreach (array_keys($graph) as $vertex) {
        $visited[$vertex] = false;
    }

    $result = "";
    dfs($graph, $startVertex, $visited, $result);

    echo $result;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    performDFS();
}

?>
