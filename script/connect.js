document.addEventListener('DOMContentLoaded', function (){
	var client = new WebSocket('ws://' + IP + ':' + PORT);
	client.onopen = function (arg){
		console.log('Connected', client, arg);
		client.send('Hi server!');
	}
	client.onmessage = function (arg){
		console.log(arg);
	}
	client.onerror = function (arg){
		console.log('There is an error!', arg);
	}
	client.onclose = function (arg){
		console.log('Discconnected!', arg);
	}
});