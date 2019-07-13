var http = require('http');

http.createServer(function (req, res) {

	if(req.url == "/home")
  	{
		res.writeHead(200, {"Content-Type": "text/html"});
		res.write("<h1>Welcome to the home page</h1>");
  	} 
	else if(req.url == "/getData")
	{
		res.writeHead(200, {"Content-Type": "application/json"});
		res.write('{"name":"George Wieland","Class":"CS313"}');
	}
	else
	{
		res.writeHead(404, {"Content-Type": "text/html"});
		res.write("Page Not Found");
	}  
		
	res.end();

}).listen(8888);