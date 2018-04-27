大话PHP设计模式学习笔记(Design Pattern)
----


## 3种基本设计模式：

- 工厂模式：工厂方法或者类生成对象，而不是在代码中直接new

- 单利模式：使某个类的对象允许创建一个

- 注册模式：全局共享和交换对象

## 工厂模式

传统模式：每个类都需要去new一下，当类名和参数改变时就需要每个地方进行修改。
工厂模式：当类名和参数改变时只需要去工厂类里面改变。



## 单例模式

传统模式：某个类new之后都是一个新的对象。

如Database new 3遍之后：

```
$db1 = new \Core\Database();
$db2 = new \Core\Database();
$db3 = new \Core\Database();
var_dump($db1);
var_dump($db2);
var_dump($db3);
```

output:

```
object(Core\Database)#1 (0) {}
object(Core\Database)#2 (0) {}
object(Core\Database)#3 (0) {}
```

后面#的数字表示不同对象?

单例模式：只创建一个对象，之后再需要使用的话使用同一个对象。（不允许new，然后使用一个新的方法来使用前一个对象）

```
$db1 = \Core\Database::getInstance();
$db2 = \Core\Database::getInstance();
$db3 = \Core\Database::getInstance();
var_dump($db1);
var_dump($db2);
var_dump($db3);
```

## 注册树模式
结合工厂模式和单例模式，初始化的时候将需要的类放到全局树中，然后每次用到直接去取就行，不用在用工厂模式和单例模式去new。
