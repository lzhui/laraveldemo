# laravel快速入门
> 此次教程laravel 为5.2的版本
### 一.安装laravel项目
```
composer create-project laravel/laravel --prefer-dist laraveldemo
```
### 二.配置数据库
> 创建数据库后修改 .env 配置文件

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
### 三.数据迁移生成操作表
> 迁移（Migrations）是一种数据库的版本控制。
> 下面以创建学生表的迁移为例
#### 1. 生成基本的迁移文件

```
php artisan make:migration create_students_table --create=students 
```
> 带上--create参数可以使生成的迁移文件中带有表名和基本字段
#### 2. 修改迁移文件
```php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('age')->unsigned();
            $table->integer('sex')->unsigned()->defalut(10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
```
#### 3. 填充数据
> Laravel提供的填充类（seed）可以模拟大量的数据立刻插入表而无需手动通过表单提交

```
php artisan make:seeder StudentsTableSeeder

```
执行如上命令将会在将会在database/seeds目录下生成一个StudentsTableSeeder.php填充文件。此时修改代码如下

```php
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 使用查询构造器
        DB::table('students')->insert([
            ['name' => 'linzenghui', 'age' => 18, 'sex' => 20],
            ['name' => 'lixuefeng', 'age' => 20, 'sex' => 30],
            ['name' => 'panqihui', 'age' => 21, 'sex' => 30],
            ['name' => 'lvlinlin', 'age' => 22, 'sex' => 30],
            ['name' => 'liguohong', 'age' => 19, 'sex' => 30],
        ]);
    }
}

```
修改完代码执行以下命令就完成了数据的填充

```
php artisan db:seed --class=StudentsTableSeeder
```
#### 4. MVC代码
1）生成StudentController

```
php artisan make:controller StudentController

```
2) 生成model

```
php artisan make:model Student
```
3) 详细代码见源码
