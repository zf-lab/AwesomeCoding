import UIKit

// MARK: 排序算法（升序）

// 快速排序：
// 选择一个基准值(pivot),通常选择第一个元素或者最后一个元素
// 比较元素与基准值的大小,大于基准值放右边,小于基准值放左边
// 对左右两部分递归进行快速排序

// 0. 退出条件 arr.count>1 else return
// 1. 选择中间值pivot支点
// 2. > pivot的数组arr1， < pivot的数组arr2， = pivot的arr3
// 3. 拼接arr 返回

// 时间复杂度：最好的情况时 O(nlog2(n))
// 空间复杂度：O(n)

// 场景：适合大规模数据排序

func quickSort<T: Comparable>(_ arr: [T]) -> [T] {
    guard arr.count > 1 else {
        return arr
    }
    
    let pivot = arr[0]
    let arr1 = arr.filter { $0 > pivot }
    let arr2 = arr.filter { $0 == pivot}
    let arr3 = arr.filter { $0 < pivot }
    
    return quickSort(arr3) + arr2 + quickSort(arr1)
}

let unsortedArray = [10, 2, 5, 3, 7, 6]
let sortedArray = quickSort(unsortedArray) // [2, 3, 5, 6, 7, 10]

// 选择排序： **
// 选择最大放头

// 0. 退出条件 arr.count>1 else return arr
// 1. 找max 放数组sortArr
// 2. 返回 max + selectSort（arr）+ min

// 时间复杂度：O（n^2）
// 空间复杂度：O(1)
// 场景：几乎不用
func selectionSort<T: Comparable>(_ arr: [T]) -> [T] {
    guard arr.count > 1 else {
        return arr
    }
    
    var sortArr = [T]()
    var arr = arr
    while(arr.count > 0) {
        var minIndex = 0
        var min = arr[minIndex]
        for index in 0 ..< arr.count {
            let value = arr[index]
            if min > value {
                min = value
                minIndex = index
            }
        }
        sortArr.append(min)
        arr.remove(at: minIndex)
    }
    
    return sortArr
}

let selectionArray = selectionSort(unsortedArray) // [2, 3, 5, 6, 7, 10]
 
// 冒泡排序：
// 比较大者前置

// 0. 循环遍历数组arr（count）次选取最大，i从0 ..< count
// 1. 循环遍历数组 arr j从i +1 到 count 排序置换

// 时间复杂度：O（n^2）
// 空间复杂度：O(1)
// 场景：小规模数据排序

func bubbleSort<T: Comparable>(_ arr: [T]) -> [T] {
    let count = arr.count
    var arr = arr
    for i in 0 ..< count {
        for j in i+1 ..< count {
            if arr[i] > arr[j] {
                let temp = arr[i]
                arr[i] = arr[j]
                arr[j] = temp
            }
        }
    }
    return arr
}

let bubbleArray = bubbleSort(unsortedArray)

// 插入排序
// 将数组分为有序和无序两部分,每次从无序数组中取出第一个元素,插入到有序数组中的合适位置。

// 时间复杂度：O（n^2）
// 空间复杂度：O(1)
func insertionSort<T: Comparable>(_ arr: [T]) -> [T] {
    let count = arr.count
    var result = arr
    for i in 1..<count  {
        var j = i
        while j > 0 && result[j] < result[j-1] {
            let value = result[j]
            result.remove(at: j)
            result.insert(value, at: j-1)
            j -= 1
        }
    }
    return result
}

let insertionArray = insertionSort(unsortedArray)
print("sort array = \(insertionArray)")

// 归并排序
// 分治思想，分解为有序表，合并为有序表

// 分解 mergeSort
// guard arr.count > 1 else { return arr }
// let sort1 = mergeSort(arr[0..<middle])
// let sort2 = mergeSort(arr[middle..<count)
// return merge(sort1, sort2)
// 合并 merge
// var leftIndex = 0
// var rightIndex = 0
// var result = [T]()
// while leftIndex < sort1.count && rightIndex < sort2.count {
//      if sort1[leftIndex] < sort2[rightIndex] {
//          result.append(sort1[leftIndex])
//          leftIndex += 1
//      } else {
//          result.append(sort2[rightIndex])
//          rightIndex += 1
//      }
//  }
//  sort1\sort2剩余元素追加

// 时间复杂度: O(nlog2(n))
// 空间复杂度: O(n)
// 场景：空间换时间，排序时间复杂度优于O(n^2)
func mergeSort<T: Comparable>(_ arr: [T]) -> [T] {
    guard arr.count > 1 else {
        return arr
    }
    
    let middle = arr.count / 2
    let left = mergeSort(Array(arr[0..<middle]))
    let right = mergeSort(Array(arr[middle..<arr.count]))
    
    return merge(leftArray: left, rightArray: right)
}

func merge<T: Comparable>(leftArray: [T], rightArray: [T]) -> [T] {
    var result: [T] = []
    var leftIndex = 0
    var rightIndex = 0
    while leftIndex < leftArray.count && rightIndex < rightArray.count {
        if leftArray[leftIndex] > rightArray[rightIndex] {
            result.append(rightArray[rightIndex])
            rightIndex += 1
        } else {
            result.append(leftArray[leftIndex])
            leftIndex += 1
        }
    }
    
    while leftIndex < leftArray.count {
        result.append(leftArray[leftIndex])
        leftIndex += 1
    }
    
    while rightIndex < rightArray.count {
        result.append(rightArray[rightIndex])
        rightIndex += 1
    }
    
    return result
}

print("unsort array =\(unsortedArray)")
let mergeArray = mergeSort(unsortedArray)
print("merged array =\(mergeArray)")

// 堆排序
// 1.将数组构建成一个大顶堆/小顶堆
// 2.每次取出堆顶元素,与最后一个元素交换位置,然后调整堆产生新的堆顶
// 3. 重复步骤2,直到堆大小为1

// 时间复杂度：最坏 O(nlog2(n)) 空间复杂度O(1)
// 场景：时间复杂度要求为O(nlog2(n))

func heapSort<T: Comparable>(_ arr: [T]) -> [T] {
    
    var array = arr
    // 构建大顶堆
    for i in stride(from: (array.count - 2) / 2, through: 0, by: -1) {
        siftDown(&array, i, array.count)
    }
    
    // 排序,将大顶堆转换成升序数组
    for i in stride(from: array.count - 1, through: 1, by: -1) {
        array.swapAt(0, i) // 交换0，i元素
        siftDown(&array, 0, i)
    }
    return array
}

// 下滤操作,保持大顶堆性质
func siftDown<T: Comparable>(_ array: inout [T], _ index: Int, _ upTo: Int) {
    
    var parent = index
    while true {
        let left = 2 * parent + 1
        let right = 2 * parent + 2
        var candidate = parent
        
        if left < upTo && array[left] > array[candidate] {
            candidate = left
        }
        
        if right < upTo && array[right] > array[candidate] {
            candidate = right
        }
        
        if candidate == parent {
            return
        }
        
        array.swapAt(parent, candidate)
        parent = candidate
    }
}

let heapArray = heapSort(unsortedArray)
print("heap arrary = \(heapArray)")

// MARK: - 查询算法

// 二分查找
// 升序表，从中间查找，> 则在左侧查找，< 在右侧查找

// while循环格式
// 0. var start = 0; var end = arr.count - 1; var targetIndex = -1
// 1. while(start <= end)
// 2. 找出中间index = (end - start) / 2 + start(取整) 中间值center = arr[index]
// 3. if center == target targetIndex = index break ;else if center > target; end = index - 1 else start = index + 1
// 4. 循环到1

func binarySearch<T: Comparable>(_ arr: [T], target: T) -> Int {
    var start = 0
    var end = arr.count - 1
    var targetIndex = -1
    while start <= end {
        var index = (end - start) / 2 + start
        var center = arr[index]
        if center == target {
            targetIndex = index
            break
        }else if center > target {
            end = index - 1
        } else {
            start = index + 1
        }
    }
    return targetIndex
}

let target = 10
let index = binarySearch(bubbleArray, target: target)
if index == -1 {
    print("bubbleArray= \(bubbleArray), 未找到\(target) ")
}else {
    print("bubbleArray= \(bubbleArray), index= \(index), value =\(selectionArray[index])")
}

// Hash查找

//时间复杂度:
//
// 平均时间复杂度 O(1)
// 最坏时间复杂度 O(n)
// 空间复杂度: O(n)
// 注意hash函数冲突的问题

struct HashTable<Key: Hashable, Value> {

  private var array = Array<Node?>(repeating: nil, count: 10)

  struct Node {
    let key: Key
    let value: Value
  }

  mutating func insert(_ key: Key, _ value: Value) {
    let index = key.hashValue % array.count
    array[index] = Node(key: key, value: value)
  }

  mutating func get(_ key: Key) -> Value? {
    let index = key.hashValue % array.count
    return array[index]?.value
  }
}

// 模式匹配算法

// KMP算法
func charAt(_ s: String, _ index: Int) -> Character {
  let i = s.index(s.startIndex, offsetBy: index)
  return s[i]
}

func kmpSearch(_ haystack: String, _ needle: String) -> Int? {
    
    let n = haystack.count
    let m = needle.count
    
    // 1. 构建needle的部分匹配表
    var partialMatch = [Int](repeating: 0, count: m)
    var prefixEnd = 0
    var suffixEnd = 1
    
    while suffixEnd < m {
        if charAt(needle, prefixEnd) == charAt(needle, suffixEnd) {
            partialMatch[suffixEnd] = prefixEnd + 1
            suffixEnd += 1
            prefixEnd += 1
        } else if prefixEnd == 0 {
            suffixEnd += 1
        } else {
            prefixEnd = partialMatch[prefixEnd - 1]
        }
    }
    
    // 2. 对haystack字符串匹配
    var textIndex = 0
    var patternIndex = 0
    while textIndex < n && patternIndex < m {
        if charAt(haystack, textIndex) == charAt(needle, patternIndex) {
            textIndex += 1
            patternIndex += 1
        } else if patternIndex == 0 {
            textIndex += 1
        } else {
            patternIndex = partialMatch[patternIndex - 1]
        }
    }
    
    return patternIndex == m ? textIndex - m : nil
}

let haystack = "BBC ABCDAB ABCDABCDABDE"
let needle = "ABCDABD"
let match = kmpSearch(haystack, needle) // 15
print("match index =\(match ?? 0)")

// []配对识别,并将中间的子字符串识别输出 (使用栈结构)

func substring(from str: String, start: Int, end: Int) -> String {

  let startIndex = str.index(str.startIndex, offsetBy: start)
  let endIndex = str.index(str.startIndex, offsetBy: end)

  return String(str[startIndex...endIndex])
}

func parseNestedBrackets(from string: String) {
    
    var stack = [Int]()
    
    for (index, char) in string.enumerated() {
        
        if char == "[" {
            stack.append(index)
        } else if char == "]" {
            if let leftIndex = stack.popLast() {
                let substring = substring(from: string, start: leftIndex, end: index)
                print(substring)
            } else {
                print("右括号]没有匹配的左括号[")
                break
            }
        }
    }
    
    if !stack.isEmpty {
        print("左括号[没有匹配的右括号]")
    }
}

let test = "Hello [World [Swift]] is [cool]"

parseNestedBrackets(from: test)

// World [Swift]
// Swift
// cool
