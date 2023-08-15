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


// 转换
class Person: NSObject {

}

extension NSObject {
    func run() {
        print("run ")
    }
    
    class func fly() {
        print("FLy")
    }
}

let person = Person()
person.run()
Person.fly()

let event = UIEvent()
let reponder = UIResponder()
