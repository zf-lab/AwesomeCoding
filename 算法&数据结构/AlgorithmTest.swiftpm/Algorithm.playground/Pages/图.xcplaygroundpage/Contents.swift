//: [Previous](@previous)

import Foundation

// 散列表+队列 (有向边)
// N:Node节点， W：Weight权重
class Graph<N: Hashable, W> {
    
    private var adjacencyList = [N: Queue<Edge<W>>]()
    
    struct Edge<W> {
        var node: N
        var weight: W?
    }
    
    func addNode(_ node: N) {
        if adjacencyList[node] == nil {
            adjacencyList[node] = Queue<Edge<W>>()
        }
    }
    
    func addEdge(from source: N, to destination: N, weight: W? = nil) {
        let edge = Edge(node: destination, weight: weight)
        adjacencyList[source]?.enqueue(edge)
    }
    
    func edgesQueue(from source: N) -> Queue<Edge<W>>? {
        return adjacencyList[source]
    }
    
    func showEdges(from source: N) {
        guard var queue = edgesQueue(from: source) else {
            return
        }
        
        while !queue.isEmpty {
            if let edge = queue.dequeue() {
                print("edge: \(source) && \(edge.node)")
            }
        }
    }
    
}

struct Queue<T> {
    
    private var array = [T]()
    
    var isEmpty: Bool {
        return array.isEmpty
    }
    
    mutating func enqueue(_ element: T) {
        array.append(element)
    }
    
    mutating func dequeue() -> T? {
        if isEmpty {
            return nil
        } else {
            return array.removeFirst()
        }
    }
    
}

class PersonGraph: Graph<String, Int> {
    
}

var graph = PersonGraph()
graph.addNode("zhao")
graph.addNode("qian")
graph.addNode("sun")
graph.addNode("li")
graph.addNode("zhou")
graph.addNode("wu")
graph.addNode("zheng")
graph.addNode("wang")
graph.addEdge(from: "zhao", to: "sun")
graph.addEdge(from: "sun", to: "li", weight: 2)
graph.addEdge(from: "li", to: "wu")
graph.addEdge(from: "wu", to: "zheng")
graph.addEdge(from: "zheng", to: "wang")
graph.addEdge(from: "sun", to: "wang")

graph.showEdges(from: "zhao")
graph.showEdges(from: "sun")

// 最短认识 wang的路径


// 1. 邻接表实现图

//使用散列表存储每个节点的邻接表。邻接表存储每个节点的出边。
//
//优点是添加边和获取节点的邻居时间复杂度为 O(1)。
//
//缺点是占用空间大,每个节点都需要存储对应的邻居节点。

struct TableGraph {
  private var adjList = [Int: [Int]]()

  mutating func addEdge(_ source: Int, _ dest: Int) {
    adjList[source, default: []].append(dest)
  }
  
  func neighbors(_ node: Int) -> [Int] {
    return adjList[node, default: []]
  }
}

// 2. 邻接矩阵实现图

//使用二维数组存储任意两个节点之间的连接情况。
//
//优点是判断两个节点之间是否存在边非常快捷,时间复杂度 O(1)。
//
//缺点是占用空间大,需要为所有可能的边都分配空间。

struct MetrixGraph {
  private var adjMatrix = [[Int]]()

  mutating func addEdge(_ source: Int, _ dest: Int) {
    adjMatrix[source][dest] = 1
  }

  func hasEdge(_ source: Int, _ dest: Int) -> Bool {
    return adjMatrix[source][dest] == 1
  }
}


extension TableGraph {
    
    // 广度优先
    
    func bfs(start: Int) {
      
      var visited = Set<Int>()
      var queue = Queue<Int>()
      
      visited.insert(start)
      queue.enqueue(start)
      
      while !queue.isEmpty {
          
        let node = queue.dequeue()!
        
        print(node)
        
        if let neighbors = adjList[node] {
          for neighbor in neighbors {
            if !visited.contains(neighbor) {
              visited.insert(neighbor)
              queue.enqueue(neighbor)
            }
          }
        }
      }
    }
}

