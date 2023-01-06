<?php

require_once 'lib_Math_Discrete.php';

function array_Graph_1_6(): array {
    // формула Excel ="['"& A1 & "', '" & B1 & "', " & C1 & "],"
    // граф на рисунке 1.6
    return [
        ['A', 'B', 3],
        ['A', 'F', 2],
        ['B', 'C', 3],
        ['B', 'G', 6],
        ['C', 'G', 1],
        ['C', 'E', 2],
        ['C', 'D', 3],
        ['D', 'E', 5],
        ['E', 'C', 2],
        ['E', 'G', 3],
        ['E', 'F', 4],
        ['F', 'G', 3],
        ['G', 'B', 6],
        ['G', 'C', 1],
        ['G', 'E', 4],
        ['G', 'F', 3],
    ];
}

/**
 * алгоритм Прима (также известный как алгоритм Ярника) представляет собой жадный алгоритм, который находит минимальное связующее дерево для взвешенного неориентированного графа. Это означает, что он находит подмножество ребер, которое образует дерево, включающее каждую вершину, где общий вес всех ребер в дереве минимизирован.
 */
function graph_Prim_Test() {

    $arr_Graph = array_Graph_1_6();

    $arr_Way = graph_Prim($arr_Graph);
    assert(is_array($arr_Way));
}

function graph_Vertex_Edges_Test() {
    echo 'graph_Vertex_Edges_Test($arr_Graph,$vertex)';
    $arr_Graph = array_Graph_1_6();
    $vertex    = 'A';
    $arr_A     = [
        ['A', 'B', 3],
        ['A', 'F', 2]];
    $arr_Diff  = [];

    $arr_Edges = graph_Vertex_Edges($arr_Graph, $vertex);
    $arr_Diff  = array_diff($arr_Graph, $arr_Edges);
    assert(count($arr_Diff) == 0);
}

function graph_Edges_Min_Test() {
    echo 'graph_Edges_Min_Test()';
    $arr_A = [
        ['A', 'B', 3],
        ['A', 'F', 2]];

    $arr = graph_Edges_Min($arr_A);
    assert($arr[2] == 2);
}

function vector_Characteristic_Test() {
    echo 'vector_Characteristic_Test($arr_Histack,$arr_Needle)';
    $arr_Histack = [1, 2, 3];
    $arr_Needle  = [1, 3];

    $result = vector_Characteristic($arr_Histack, $arr_Needle);
    assert($result[1] == 0);
}

vector_Characteristic_Test();
// graph_Edges_Min_Test();
// graph_Vertex_Edges_Test();
// graph_Prim_Test();