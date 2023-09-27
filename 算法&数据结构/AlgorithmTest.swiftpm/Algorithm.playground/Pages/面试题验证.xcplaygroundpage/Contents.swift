//: [Previous](@previous)

import UIKit

var greeting = "Hello, playground"

//: [Next](@next)

// swift值捕获
func test() {
    var a = 10
    let block = {
        a += 10
    }
    
    a += 5
    print("a = \(a)")
    block()
    print("a = \(a)")
}

test()

// 串形队列执行时机
let thread = Thread.current
print("current = \(thread)")

print("123")
DispatchQueue.main.async {
    print("456")
}

print("789")

print("end")

// 类型擦除 和反射机制
let number: Any = 0

struct Person {
    var name: String
    var age: Int
}

let john = Person(name: "John", age: 30)
let danny: Any = john
let mirror = Mirror(reflecting: danny)

for (label, value) in mirror.children {
    print("Property: \(label ?? "") = \(value)")
}

