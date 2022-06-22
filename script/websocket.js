// Init Websocket Connexion
const socket = new WebSocket("ws://127.0.0.1:2569");


// Event when the WebSocket is open
socket.onopen = function() 
{  
    console.log("WebSocket: New connexion");
};

// Event when the WebSocket is close
socket.onclose = function() 
{
    console.log("WebSocket: Disconnexion");
};

// Event when the WebSocket had a error
socket.onerror = function(error) 
{
    console.error(error);
};

socket.onmessage = function(message)
{
    const messageInfos = message.data.split(';');
    addMessageTemplate(messageInfos[0], messageInfos[1])
};


// Add new message to the chat
function addMessageTemplate(message, sender){
    var Chat = document.getElementById('Ragnarok_Chat');

    var messageValues = message.split(';');
    
    var newMessage = document.createElement("p");
        newMessage.class = "chatMessage";
        newMessage.innerText= messageValues[0];
        Chat.appendChild(newMessage);
}

function sendMessage(){
    var MessageToSend = document.getElementById('inputText').value; 
    MessageToSend += ";" + document.getElementById('User_pseudo').textContent;
    socket.send(MessageToSend);
}