# OOP

**OOP** ( Viết tắt của Object Oriented Progamming ) - Lập trình hướng đối tượng là một phương pháp lập trình dựa trên
khái niệm lớp và đối tượng. OOP tập trung hơn vào cái đối tượng hơn là khai thác logic để thao tác chúng, giúp code dẽ
quản lý, tái sử dụng được và dễ bảo trì

## Một vài khái niệm cơ sở về OOP

### Class và Object

**Đối tượng (Object)**

Đối tượng trong OOP bao gồm 2 thành phần chính:

- Thuộc tính (Attribute): là những thông tin, đặc điểm của đối tượng

- Phương thức (Method): là những hành vi mà đối tượng có thể thực hiện

```php
<?php
<?php
class Fruit {
  // Properties
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
  function set_color($color) {
    $this->color = $color;
  }
  function get_color() {
    return $this->color;
  }
}

$apple = new Fruit();
$apple->set_name('Apple');
$apple->set_color('Red');
echo "Name: " . $apple->get_name();
echo "<br>";
echo "Color: " . $apple->get_color();
?>
```

**Lớp (Class):**

Lớp là sự trừu tượng hóa của đối tượng. Những đối tượng có những đặc tính tương tự nhau sẽ được tập hợp thành một lớp.
Lớp cũng sẽ bao gồm 2 thông tin là thuộc tính và phương thức.

Một đối tượng sẽ được xem là một thực thể của lớp.

```php
<?php
class Fruit {
  // Properties
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

$apple = new Fruit();
$banana = new Fruit();
$apple->set_name('Apple');
$banana->set_name('Banana');

echo $apple->get_name();
echo "<br>";
echo $banana->get_name();
?>
```

## Ưu điểm của lập trình hướng đối tượng OOP

- OOP mô hình hóa những thứ phức tạp dưới dạng cấu trúc đơn giản.
- Code OOP có thể sử dụng lại, giúp tiết kiệm tài nguyên.
- Giúp sửa lỗi dễ dàng hơn. So với việc tìm lỗi ở nhiều vị trí trong code thì tìm lỗi trong các lớp (được cấu trúc từ
  trước) đơn giản và ít mất thời gian hơn.
- Có tính bảo mật cao, bảo vệ thông tin thông qua đóng gói.
- Dễ mở rộng dự án.

## 4 đặc tính cơ bản của OOP

### Tính đóng gói (Encapsulation)

Tính đóng gói cho phép che giấu thông tin và những tính chất xử lý bên trong của đối tượng. Các đối tượng khác không thể
tác động trực tiếp đến dữ liệu bên trong và làm thay đổi trạng thái của đối tượng mà bắt buộc phải thông qua các phương
thức công khai do đối tượng đó cung cấp.

Tính chất này giúp tăng tính bảo mật cho đối tượng và tránh tình trạng dữ liệu bị hư hỏng ngoài ý muốn.

![img](https://itviec.com/blog/wp-content/uploads/2020/09/oop-la-gi-1.jpg)

### Tính kế thừa (Inheritance)

Đây là tính chất được sử dụng khá nhiều. Tính kế thừa cho phép xây dựng một lớp mới (lớp Con), kế thừa và tái sử dụng
các thuộc tính, phương thức dựa trên lớp cũ (lớp Cha) đã có trước đó.

Các lớp Con kế thừa toàn bộ thành phần của lớp Cha và không cần phải định nghĩa lại. Lớp Con có thể mở rộng các thành
phần kế thừa hoặc bổ sung những thành phần mới.

```php
interface Animal {
  public function makeSound();
}

class Cat implements Animal {
  public function makeSound() {
    echo "Meow";
  }
}

$animal = new Cat();
$animal->makeSound();
?>
```

### Tính đa hình (Polymorphism)

Tính đa hình trong lập trình OOP cho phép các đối tượng khác nhau thực thi chức năng giống nhau theo những cách khác
nhau.

```php
<?php  
class Module  
{  
    function produce(){}  
}  

class Product extends Module  
{  
function produce()  
    {  
    print "Product has been generated.</br>";  
    }  
}  

class Brand extends Module  
{  
    function produce()  
    {  
     print "Brand has been generated.</br>";  
    }  
}  

class Category extends Module  
{  
    function produce()  
    {  
        print "Category has been generated.";  
    }  
}  
   
$results=array(2);  
  
$results[0]=new Product();  
$results[1]=new Brand();  
$results[2]=new Category();  
  
for($i=0;$i<3;$i++)  
{  
    $results[$i]->produce();  
}  
?>  
```

### Tính trừu tượng (Abstraction)

Tính trừu tượng giúp loại bỏ những thứ phức tạp, không cần thiết của đối tượng và chỉ tập trung vào những gì cốt lõi,
quan trọng.

```php
<?php
// Parent class
abstract class Car {
  public $name;
  public function __construct($name) {
    $this->name = $name;
  }
  abstract public function intro() : string; 
}

// Child classes
class Audi extends Car {
  public function intro() : string {
    return "Choose German quality! I'm an $this->name!"; 
  }
}

class Volvo extends Car {
  public function intro() : string {
    return "Proud to be Swedish! I'm a $this->name!"; 
  }
}

class Citroen extends Car {
  public function intro() : string {
    return "French extravagance! I'm a $this->name!"; 
  }
}

// Create objects from the child classes
$audi = new audi("Audi");
echo $audi->intro();
echo "<br>";

$volvo = new volvo("Volvo");
echo $volvo->intro();
echo "<br>";

$citroen = new citroen("Citroen");
echo $citroen->intro();
?>
```

### Hàm __construct

Một hàm tạo cho phép bạn khởi tạo các thuộc tính của đối tượng khi tạo đối tượng.

```php
<?php
class Fruit {
  public $name;
  public $color;

  function __construct($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

$apple = new Fruit("Apple");
echo $apple->get_name();
?>
```

### Hàm __destruct

Một trình hủy được gọi khi đối tượng bị hủy hoặc tập lệnh bị dừng hoặc thoát.

```php
<?php
class Fruit {
  public $name;
  public $color;

  function __construct($name) {
    $this->name = $name;
  }
  function __destruct() {
    echo "The fruit is {$this->name}.";
  }
}

$apple = new Fruit("Apple");
?>
```

### Access Modifiers

Các thuộc tính và phương thức có thể có các công cụ sửa đổi quyền truy cập kiểm soát nơi chúng có thể được truy cập.

- **public** - thuộc tính hoặc phương thức có thể được truy cập từ mọi nơi. Đây là mặc định.
- **protected** - thuộc tính hoặc phương thức có thể được truy cập trong lớp và bởi các lớp dẫn xuất từ lớp đó.
- **private** - thuộc tính hoặc phương thức CHỈ có thể được truy cập trong lớp.

```php
<?php
class Fruit {
  public $name;
  protected $color;
  private $weight;
}

$mango = new Fruit();
$mango->name = 'Mango'; // OK
$mango->color = 'Yellow'; // ERROR
$mango->weight = '300'; // ERROR
?>
```

### Class Constants

Không thể thay đổi các hằng sau khi nó được khai báo.

Hằng số lớp có thể hữu ích nếu bạn cần xác định một số dữ liệu hằng số trong một lớp.

Hằng số lớp được khai báo bên trong một lớp với từ khóa const.

Chúng ta có thể truy cập một hằng số từ bên ngoài lớp bằng cách sử dụng tên lớp theo sau là toán tử phân giải phạm
vi (: :) theo sau là tên hằng số, như ở đây:

```php
<?php
class Goodbye {
  const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";
}

echo Goodbye::LEAVING_MESSAGE;
?>
```


