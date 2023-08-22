//: [Previous](@previous)

import Foundation

"""
    核心思想:
    回溯算法是一种搜索所有可能解的算法。它通过构建搜索树,系统地遍历所有解决方案,并在到达解决方案时回退,继续尝试不同的路径。
    
    回溯算法(参数)
      初始化解向量解={null}
      函数回溯(步数k):
        如果步数k==解向量长度,表示找到一个完整解,记录解
        否则:
          遍历当前所有可选的状态i
          将状态i加入解向量解
          回溯(k+1)
          移出状态i
    调用回溯(0)
    
时间复杂度: O(n!),遍历整棵解空间树

空间复杂度: O(n),递归栈空间

缺点:
时间和空间复杂度都很高
无法利用问题结构进行剪枝

使用场景:
棋盘问题、数独等全排列需要穷举的场景
深度优先遍历一个解空间

"""

func backtrack(n: Int) {

  var solution = [Int]()

  func dfs(_ k: Int) {
    if k == n {
      // 找到一个解
      print(solution)
    } else {
      // 遍历每个分支
      for i in 1...n {
        solution.append(i)
          dfs(k+1)
        solution.removeLast()
      }
    }
  }

  dfs(0)
}

let n = 3
backtrack(n: n)
