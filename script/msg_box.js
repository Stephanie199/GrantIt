var grayScreen = document.createElement('div');
grayScreen.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
grayScreen.style.position = 'fixed';
grayScreen.style.left = grayScreen.style.top = '0';
grayScreen.style.display = 'none';
grayScreen.style.width = grayScreen.style.height = '100%';
grayScreen.style.zIndex = '1001';

var alertMsgBox = document.createElement('div');
alertMsgBox.style.maxWidth = '25%';
alertMsgBox.style.backgroundColor = '#faa';
alertMsgBox.style.borderRadius = '20px';
alertMsgBox.style.margin = '12.5% auto 0 auto';
alertMsgBox.style.padding = '20px';
alertMsgBox.textContent = 'Put your message here!';
alertMsgBox.style.fontFamily = 'Segoe UI, Tahoma';
alertMsgBox.style.fontSize = '12pt';
alertMsgBox.style.display = 'none';
alertMsgBox.style.border = '2px solid #f33';

var notifMsgBox = document.createElement('div');
notifMsgBox.style.maxWidth = '25%';
notifMsgBox.style.backgroundColor = '#ffa';
notifMsgBox.style.borderRadius = '20px';
notifMsgBox.style.margin = '6.25% auto 0 auto';
notifMsgBox.style.padding = '20px';
notifMsgBox.textContent = 'Put your message here!';
notifMsgBox.style.fontFamily = 'Segoe UI, Tahoma';
notifMsgBox.style.fontSize = '12pt';
notifMsgBox.style.display = 'none';
notifMsgBox.style.border = '2px solid #ff0';

grayScreen.appendChild(alertMsgBox);
grayScreen.appendChild(notifMsgBox);
document.body.appendChild(grayScreen);

grayScreen.onclick = function (arg){
	this.style.display = 'none';
	alertMsgBox.style.display = 'none';
	notifMsgBox.style.display = 'none';
};

function createAlert(msg){
	alertMsgBox.textContent = msg;
	grayScreen.style.display = 'block';
	alertMsgBox.style.display = 'block';
}

function createNotif(msg){
	notifMsgBox.textContent = msg;
	grayScreen.style.display = 'block';
	notifMsgBox.style.display = 'block';
}