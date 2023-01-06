<?php

/**
 * алгоритм Прима (также алгоритм Ярника)
 * жадный алгоритм, находит минимальное связующее дерево для взвешенного неориентированного графа.
 * находит подмножество ребер, которое образует дерево, включающее каждую вершину,
 * где общий вес всех ребер в дереве минимизирован.
 * алгоритм поиска минимального остовного дерева (minimum spanning tree, MST
 * НЕ путай с кратчайшим путём
 */
function graph_Prim(array $arr_Graph): array {

    $arr_Way = [];

    $arr_Graph_Count = count($arr_Graph);

    for ($i = 0; $i < $arr_Graph_Count; $i++) {

        $arr_Edges = graph_Vertex_Edges($arr_Graph, $arr_Graph[$i][0]);

        if (count($arr_Edges) > 0)
            $arr_Way[] = graph_Edges_Min($arr_Edges);
    }

    return $arr_Way;
}

/**
 * массив рёбер вершины
 */
function graph_Vertex_Edges(array $arr_Graph, string $vertex): array {

    static $arr_Vertex = [];

    $arr_Edges = [];

    if (!isset($arr_Vertex[$vertex])) {

        $arr_Vertex[$vertex] = 0;

        foreach ($arr_Graph as $arr1d) {

            // вторая вершина не должа быть в обработанных
            if (!isset($arr_Vertex[$arr1d[1]]))

                if ($arr1d[0] == $vertex)
                    $arr_Edges[] = $arr1d;
        }
    }
    return $arr_Edges;
}

/**
 * вернуть вершину с наимменьшим "весом"
 */
function graph_Edges_Min(array $arr_Edges): array {

    $arr_Edges_Count = count($arr_Edges);
    $edge_Min        = PHP_INT_MAX;
    $index_Min       = PHP_INT_MAX;

    for ($i = 0; $i < $arr_Edges_Count; $i++) {

        if ($arr_Edges[$i][2] < $edge_Min) {

            $edge_Min  = $arr_Edges[$i][2];
            $index_Min = $i;
        }
    }
    return $arr_Edges[$index_Min] ?? [];
}

/**
 * вектор характерический
 * путем последовательного удаления из основной последовательности элементов,
 * которые не входят в подпоследовательность
 */
function vector_Characteristic(array $arr_Histack, array $arr_Needles): array {

    $arr_Char = [];

    $arr_Histack_Count = count($arr_Histack);

    for ($i = 0; $i < $arr_Histack_Count; $i++) {
        $arr_Char[$i] = (int)in_array($arr_Histack[$i], $arr_Needles);
    }

    return $arr_Char;
}
