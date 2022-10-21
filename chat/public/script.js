const socket = io('http://localhost:3000')
const messageContainer = document.getElementById('message-container')
const messageForm = document.getElementById('send-container')
const messageInput = document.getElementById('message-input')

const videoGrid = document.getElementById("video-grid");
const myPeer = new Peer(undefined, {
  host: "/",
  port: "3001"
})
var cnt=0;
const peers = {};

const myVideo = document.createElement("video");
myVideo.muted = true;
navigator.mediaDevices.getUserMedia({
  video: true,
  audio: true
}).then(stream => {
  addVideoStream(myVideo, stream);

  myPeer.on("call", call => {
      call.answer(stream);
      const video = document.createElement("video");
      call.on("stream", userVidroStream => {
          addVideoStream(video, userVidroStream);
      })
  })
  
  socket.on("user-connected", userId => {
      console.log("user connected: " + userId);
      connectToNewUser(userId, stream);
  });
  
});

socket.on("user-disconnected", userId => {
  if(peers[userId])
  {
      console.log("user disconnected: " + userId);
      peers[userId].close();
  }
})

socket.on("update-people",people=>{
  var people_num=document.getElementById("people-cnt")
  console.log("update people")
  people_num.innerText=(10+people)*100
})

myPeer.on("open", id => {
  socket.emit("join-room", ROOM_ID, id);
});

function connectToNewUser(userId, stream) {
  const call = myPeer.call(userId, stream);
  const video = document.createElement("video")
  call.on("stream", userVideoStream => {
      addVideoStream(video, userVideoStream);
  })
  call.on("close", () => {
      video.remove();
  })

  peers[userId] = call;
}


function addVideoStream(video, stream) {
  // try{
  //   const stream_tag=document.getElementById("stream-tag");
  //   stream_tag.remove();
  // }
  // catch (e) {
  // }

  video.srcObject = stream;
  video.addEventListener("loadedmetadata", () => {
      if(cnt<=2)
      {
        video.play();
        console.log("start streaming!");
        
        console.log(cnt)
      }
      
  });
  if(cnt<=2)
  {
    videoGrid.append(video);
    console.log("ASDASDASDASDASDASD")
  }  
}





const name = setUserName()
var box, scrollId, boxHeight;
appendMessage(name+' joined')
socket.emit('new-user', name)
messageInput.focus();

socket.on('chat-message', data => {
  console.log("chat-message")
  if(data.name=="")
  {
    appendMessage(`${data.message}`)
  }
  else
  {
    appendMessage(`${data.name}: ${data.message}`)
  }  
})

socket.on('user-connected', name => {
  if(name.length<20)
  {
    appendMessage(`${name} connected`)
    console.log("user-connected")
  }
  
})

socket.on('user-disconnected', name => {
  if(name.length<20)
  {
    appendMessage(`${name} disconnected`)
    console.log("user-disconnected")
  }
  
})

messageForm.addEventListener('submit', e => {
  e.preventDefault()
  let message = messageInput.value
  //command
  if(message[0]=='!')
  {
    var cmd="";
    for(let space=1;space<10;space++)
    {
      if(message[space]==" " | message[space]==undefined)
      {
        break;
      }
      else
      {
        cmd=cmd+message[space];
      }
    }

    appendMessage(`You: ${message}`)
    socket.emit('send-command', {cmd:cmd,message:message})
    messageInput.value = ''
  }
  // transmit message
  else
  {
    message=message_filter(message)

    appendMessage(`You: ${message}`)
    socket.emit('send-chat-message', message)
    messageInput.value = ''
  }  

  messageInput.focus();
})

function appendMessage(message) {
  const messageElement = document.createElement('div')
  messageElement.innerText = message
  messageContainer.append(messageElement)
  
  messageContainer.scrollTop=messageContainer.scrollHeight;

}

function setUserName() {
  let myName = prompt('Please enter your name.');
  while(!myName || myName === null) 
  {
    myName = prompt('you need to enter your name.');
  } 
  
  return myName
}

var filter=['fuck','shit','幹你娘','幹','靠杯']
function message_filter(message)
{
  for(let x=0;x<filter.length;x++)
  {
    var change="";
    for(let y=0;y<filter[x].length;y++)
    {
      change=change+"*"
    }
    message=message.replaceAll(filter[x],change)
  }

  return message
}

var like_flag=0;
document.getElementById("likeButton").onclick = function() {  
  if(like_flag==0)
  {
    appendMessage(`You liked the streaming`)
    socket.emit('send-chat-message', "liked the streaming")
    like_flag=1;
  }
  else
  {
    appendMessage(`You have been liked`)
  }
};  