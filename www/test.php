<?php
// phpinfo();
// // redis 测试
$redis = new Redis();
$redis->connect('myredis',6379);
echo "redis is running: ";
var_dump($redis->ping());
echo '-------------------<br>';

// mysql测试  docker新键的数据库中，需要自行新建数据库和表，这里已创建fastadmin库
// 连接的host要注意，与./nginx/default.conf中的php连接一样，不是ip，是docker-compose中配置的容器名，container_name

try {
    $conn = new PDO('mysql:host=mymysql;dbname=test_base;port=3306', 'root', '123456');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// 设置 PDO

    // $conn->exec("CREATE TABLE if not exists author (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,name VARCHAR(30) NOT NULL,lastname VARCHAR(30) NOT NULL,email VARCHAR(50))"); // 创建表

    // $ret = $conn->exec("insert into author (name,lastname,email) values ('亚历山大','a','123@123.com')");
    // foreach($conn->query('SELECT * from book',PDO::FETCH_ASSOC) as $row) {
    //     print_r($row);
    // }

    $sth = $conn->prepare("SELECT * FROM author limit 0,2");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    print_r($result);

    $conn = null;//关闭连接
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>