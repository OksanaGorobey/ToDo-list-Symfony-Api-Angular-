
curl -XGET http://localhost:8080/api/1/task/list

curl -XGET http://localhost:8080/api/epic/list


curl -XPOST -H "Content-Type: application/json"  -d '{"title": "test1","description":"jhgdsh","epic":1}'  http://localhost:8080/api/task/add

curl -XPOST -H "Content-Type: application/json"  -d '{"title": "test1"}'  http://localhost:8080/api/epic/add 