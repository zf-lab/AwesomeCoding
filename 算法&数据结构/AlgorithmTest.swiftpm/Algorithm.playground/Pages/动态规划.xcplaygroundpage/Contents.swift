//: [Previous](@previous)

import Foundation

"""
动态规划算法的核心思想是将问题分解成若干个子问题,并保存子问题的解,避免重复计算。

时间复杂度分析:
动态规划算法的时间复杂度与状态数和状态转移关系相关。状态数为N,转移关系为M,则时间复杂度一般为O(NM)。

空间复杂度分析:
需要存储子问题解,因此空间复杂度与状态数N相关,一般为O(N)。

应用场景分析:

优化路径问题,如旅行商问题
资源配置问题,如背包问题
序列规划问题,如字符串编辑距离
"""

// 经典：斐波那契数列问题
func fib(_ n: Int) -> Int {
  if n <= 1 {
    return n
  }

  var dp = Array(repeating: 0, count: n+1)
  dp[1] = 1

  for i in 2...n {
    dp[i] = dp[i-1] + dp[i-2]
  }

  return dp[n]
}

_ = (0..<10).map{ print(fib($0)) }

// 经典：矩阵链相乘顺序问题
// 给定多个矩阵,要求计算将它们链式相乘的最佳parentheses方式,使得总的计算量最小
// 最佳parentheses方式：指的是在矩阵链相乘问题中,用括号表示矩阵乘法的计算顺序,使得总的计算量最小的一种括号表示法

/*
 动态规划解法:

 定义子问题:OPT(i,j)表示计算$A_iA_{i+1}...A_j$的最优计算量
 状态转移方程: OPT(i,j) = min{OPT(i,k) + OPT(k+1,j) + p_{i-1}p_kp_j}, ∀i <= k < j
 初始条件和边界:
 OPT(i,i) = 0
 OPT(i,i+1) = p_{i-1}p_ip_{i+1}
 计算顺序:
 从小问题开始,逐渐计算更大的子问题
 用自底向上的方法计算OPT(i,j)
 时间复杂度分析:

 状态数:O(n^2)
 每个状态计算:O(n)
 所以总时间复杂度为O(n^3)
 空间复杂度: O(n^2)
 存储OPT(i,j)表格需要O(n^2)空间。

 */

func matrixChainOrder(_ p: [Int]) -> Int {
  
  let n = p.count - 1
  var m = [[Int]](repeating: [Int](repeating: 0, count: n), count: n)
  var s = [[Int]](repeating: [Int](repeating: 0, count: n), count: n)

  for l in 2...n {
    for i in 0..<n-l+1 {
      let j = i + l - 1
      m[i][j] = Int.max
      for k in i...j-1 {
        let q = m[i][k] + m[k+1][j] + p[i]*p[k+1]*p[j+1]
        if q < m[i][j] {
          m[i][j] = q
          s[i][j] = k
        }
      }
    }
  }
  return m[0][n-1]
}


// 输入矩阵链长度数组
//A1 是 10 x 100
//A2 是 100 x 5
//A3 是 5 x 50

let p = [10, 100, 5, 50]

// 调用函数计算最佳计算顺序
let minCost = matrixChainOrder(p)

// 输出结果
print("Minimum cost is: \(minCost)")


"""
优缺点:

分支限界法:
优点:可以获得精确最优解
缺点:时间和空间复杂度高
动态规划:
优点:通过子问题重复利用降低复杂度
缺点:必须满足最优子结构
回溯算法:
优点:可以寻找所有解
缺点:时间和空间复杂度都很高
使用场景:

分支限界法:组合优化问题的精确求解,如旅行商问题
动态规划:存在重叠子问题和最优子结构的问题,如背包问题
回溯算法:求解排列组合等需要穷举的问题,如N皇后
算法关系:

分支限界法可以利用动态规划的思想来进行剪枝
回溯算法可以看作是一种暴力搜索法,也可以应用动态规划进行优化
动态规划通过存储结果避免重叠子问题出现在回溯算法中
"""
