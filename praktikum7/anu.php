function Dijkstra(Graph, source):
for each vertex v in Graph:
dist[v] := infinity;
previous[v] := undefined;
end for

dist[source] := 0;
Q := the set of all nodes in Graph;