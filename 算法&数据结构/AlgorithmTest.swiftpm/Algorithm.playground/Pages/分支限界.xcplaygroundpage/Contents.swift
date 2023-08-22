//: [Previous](@previous)

import Foundation

"""
分支限界
核心思想:
    在解空间树上搜索最优解的方法。它通过递归地分割问题的可行解空间,并在分割的每一步计算一个界限,来判断这一子空间是否包含最优解,如果不包含可以直接剪枝。
伪代码：
    分支限界算法(问题):
    1. 初始化解空间S包含全部可能解
    2. 初始化当前最优解best = 无穷大
    3. 函数搜索(S):
       如果S为空:
          返回
       选择S中的一个子集Si
       计算Si的下界lb
       如果lb ≥ best:
          剪枝返回
       否则:
          搜索(Si)
          如果Si包含更优解,更新best
          剪枝移除不包含最优解的Si
    4. 调用搜索(S)
时间复杂度: O(b^d) ,b为分支因子,d为树深度

空间复杂度: O(bd),存储树节点

缺点: 计算复杂,需要精确设计界限函数

使用场景: TSP,资源分配等组合优化问题
"""

// TSP问题分支限界
func branchAndBoundTSP(n: Int, costMatrix: [[Int]]) -> [Int] {

  var bestPath: [Int] = []
  var bestCost = Int.max

  func backtrack(currPath: [Int], currCost: Int) {
    
    if currPath.count == n {
      // 找到一个完整路径
      if currCost < bestCost {
        // 更新最优解
        bestPath = currPath
        bestCost = currCost
      }
    } else {
      // 尝试每个可能的下一城市
      for nextCity in 1..<n {
        if !currPath.contains(nextCity) {
          // 计算新增成本
          let newCost = currCost + costMatrix[currPath.last!][nextCity]
          
          // 剪枝:如果成本已超过当前最优,则跳过
          if newCost < bestCost {
              backtrack(currPath: currPath + [nextCity], currCost: newCost)
          }
        }
      }
    }
  }
  
  backtrack(currPath: [0], currCost: 0)
  
  return bestPath
}

// 测试数据
// 有5个城市,成本矩阵costTable给出了任意两城市间的距离成本。
// 调用branchAndBoundTSP来求解旅行商问题,获得最优路径optimalPath

let numOfCities = 5
let costTable = [
  [0, 10, 8, 7, 5],
  [10, 0, 6, 4, 3],
  [8, 6, 0, 5, 9],
  [7, 4, 5, 0, 6],
  [5, 3, 9, 6, 0]
]

// 调用函数
let optimalPath = branchAndBoundTSP(n: numOfCities, costMatrix: costTable)

print("Optimal path is: \(optimalPath)")
