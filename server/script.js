const PORT = 9002;

var numOfClients = 0;

new (require('ws').Server)({port: PORT}).on('connection', function (socket){
	socket.on('error', function (arg){
		console.log('Error!', arg);
	});
	
	socket.on('close', function (arg){
		console.log(--numOfClients, arg);
	});
	
	socket.on('message', function (arg){
		console.log('Client: ' + arg);
	});
	
	console.log(++numOfClients, 'connected!');
	
	setInterval(function (){
		this.clients.forEach(function (client){
			if(client !== socket){
				try{
					client.send('Broadcast: test!');
				} catch(e){
					console.log('Error in sending message!');
				}
			}
		});
	}.bind(this), 1000);
});
