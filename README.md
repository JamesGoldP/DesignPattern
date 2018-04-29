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

## 适配器模式
像将mysql,mysqli,pdo3种可以用适配器模式统一成一致，类似的场景还有caches适配器，将memcache,redis,file,apc等不同的缓存函数，统一成一致。

## 策略模式
#### 定义
将一组特定的行为和算法封装成类，以适应特定的上下文环境，这种模式就是策略模式

#### 实际应用举例

假如一个电商网站系统，针对男性女性用户要各自跳转到不同的商品类目，并且所有广告位展示不同的广告。

假设需要增加一个推荐位，之后再要求增加一个vip策略

传统模式：

```php

class Page{

	public $strategy;  //策略类型

	public function index()
	{
		$femaleClass = new Core\FemaleUserStrategy();
		$maleClass = new Core\maleUserStrategy();
		$vipClass = new Core\vipUserStrategy();
		
		echo 'AD'.'<br/>';
	 	$sex = isset($_GET['sex']) ? trim($_GET['sex']) : '';
		if( $sex =='female' ){		
			$femaleClass->showAD();
		} else if( $sex == 'vip' ){
			$vipClass->showAD();
		} else {
			$maleClass->showAD();
		}

		echo '<br/>';
		echo 'Cateogry'.'<br/>';
		if( $sex =='female' ){		
			$femaleClass->showCategory();
		} else if( $sex == 'vip' ){
			$vipClass->showCategory();
		} else {
			$maleClass->showCategory();
		}

		echo 'posid'.'<br/>';
		if( $sex =='female' ){		
			$femaleClass->showPosid();
		} else if( $sex == 'vip' ){
			$vipClass->showPosid();
		} else {
			$maleClass->showPosid();
		}


	}


}


$data = new Page();
$sex = isset($_GET['sex']) ? trim($_GET['sex']) : '';
$data->index();
```

如果使用策略模式的话

```php
class Page{

	public $strategy;  //策略类型

	public function index()
	{
	 	echo 'AD'.'<br/>';
	 	$this->strategy->showAD();
	 	echo '<br/>';

	 	echo 'Cateogry'.'<br/>';
	 	$this->strategy->showCategory();
	 	echo '<br/>';

	 	echo 'posid'.'<br/>';
	 	$this->strategy->showPosid();	
	}

	public function setStrategy($strategy)
	{
		$this->strategy = $strategy;
	}

}


$data = new Page();
$sex = isset($_GET['sex']) ? trim($_GET['sex']) : '';
if( $sex =='female' ){
	$strategy = new Core\FemaleUserStrategy();
} elseif( $sex == 'vip' ){
	$strategy = new Core\vipUserStrategy();
} else {
	$strategy = new Core\MaleUserStrategy();
}
$data->setStrategy($strategy);
$data->index();
```

#### 使用策略模式可以实现Ioc,依赖导致、控制反转

在写Page类的时候，并不需要去定义好所依赖的类，里面没有它的代码，最终在代码执行过程中，才将关系进行绑定，这种设计模式在我们面向对象的设计之中经常要用到这个，因为面向对象很重要的一个思路就是**解耦**。

如果两个类是互相依赖的关系，那么它们之间的关系就是**紧耦合**设计，使用策略模式进行一个依赖倒置之后，我们就可以很方便去替换其中一个类。

## 数据映射模式（Data Mapper Pattern）
通过改变类的属性就能操作好数据。

## 观察者模式(Observer Pattern)
#### 定义
当一个状态发生改变时，依赖它的对象全部会受到通知，并自动更新。

### 简单实例

我们让所有客户端订阅我们的服务端，那么当我们的服务端有更新信息的时候，就通知客户端去更新。这里的服务端就是被观察者，客户端就是观察者。

## 原型模式（Prototype Pattern）

#### 定义

利用克隆来生成一个大对象，减少创建时的初始化等操作占用开销



## 装饰器模式（Decorator  Pattern）

#### 定义

允许向一个已有的对象添加新的功能或部分内容，同时又不改变其结构。属于结构型模式，它是作为现有的类的一个包装。

## 迭代器模式（Iterator Pattern）

#### 定义

在不需要了解内部实现的前提下，遍历一下聚合对象的内部元素。

## 代理模式

#### 定义

在客户端与实体之间建立一个代理对象(Proxy)，客户端对实体进行操作全部委派给代理对象，隐藏实体的具体实现细节。