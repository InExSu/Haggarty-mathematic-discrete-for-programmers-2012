<?php

/**
 * алгоритм Прима (также алгоритм Ярника)
 * жадный алгоритм, находит минимальное связующее дерево для взвешенного неориентированного графа.
 * находит подмножество ребер, которое образует дерево, включающее каждую вершину,
 * где общий вес всех ребер в дереве минимизирован.
 * алгоритм поиска минимального остовного дерева (minimum spanning tree, MST
 */
function graph_Prim(array $arr_Graph): array {

    $arr_Edges = [];
    $arr_Way   = [];

    $arr_Graph_Count = count($arr_Graph);

    for ($i = 0; $i < $arr_Graph_Count; $i++) {
        $arr_Edges[] = graph_Vertex_Edges($arr_Graph, $arr_Graph);
        $arr_Way[]   = graph_Edges_Min();
    }

    return $arr_Way;

}

/**
 * для алгоритма Прима - для вершины найти реобро
 */
function graph_Vertex_Edges(array $arr_Graph, string $vertex): array {

}

/**
 * вернуть вершину с наимменьшим "весом"
 */
function graph_Edges_Min(array $arr_Edges): array {

}