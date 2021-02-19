# Run

1. 下载源代码

```
git clone https://github.com/cexll/hyperf-jsonrpc-demo.git
```

安装consul 在当前目录新建consul目录,子目录创建 data etc 目录 
在etc里面 编辑配置 例: web.json

```json
{
    "service": {
        "id": "CalculatorService",
        "name": "CalculatorService",
        "address": "server2.ip.server2.ip",
        "tags": [
            "webapi"
        ],
        "port": 9502
    }
}

```

启动 consul  命令如下

```bash
consul agent -dev -ui -config-dir=./etc -data-dir=./data -client=0.0.0.0
```

2.
启动consul之后将代码下载好依赖 
```bash
composer install
```

3.
下载好之后 cp 一个 .env , 便启动

```bash
php bin/hyperf.php start
```

4. 
两个服务都启动之后,在消费者接口测试
```
curl http://localhost:9301/index/index
```
