let handleMemberJoined = async (MemberId) => {
    //the memberId is uid
    console.log("A new member has joined the room:", MemberId)

    addMemberToDom(MemberId)

    let members = await channel.getMembers()
    updateMemberTotal(members)

    let { name } = await rtmClient.getUserAttributesByKeys(MemberId, ['name'])
    addBotMessageToDom(`Welcone to the room ${name}! 👋`)
}

let addMemberToDom = async (MemberId) => {
    let { name } = await rtmClient.getUserAttributesByKeys(MemberId, ['name'])

    let membersWrapper = document.getElementById("member__list");
    let memberItem = `<div class="member__wrapper" id="member__${MemberId}__wrapper">
                          <span class="green__icon"></span>
                          <p class="member_name">${name}</p>
                      </div>`

    membersWrapper.insertAdjacentHTML('beforeend', memberItem)
}

let updateMemberTotal = async (members) => {
    let total = document.getElementById("members__count")
    total.innerText = members.length;
}

let handleMemberLeft = async (MemberId) => {
    removeMemberFromDom(MemberId)

    let members = await channel.getMembers()
    updateMemberTotal(members)
}

let removeMemberFromDom = async (MemberId) => {
    let memberWrapper = document.getElementById(`member__${MemberId}__wrapper`)
    let name = memberWrapper.getElementsByClassName("member_name")[0].textContent
    memberWrapper.remove()

    addBotMessageToDom(`${name} has left the room`)
}

let handleChannelMessage = async (messageData, MemberId) => {
    console.log("A new message was received")
    let data = JSON.parse(messageData.text)

    if (data.type === "chat") {
        addMessageToDom(data.displayName,data.message)
    }
    else if(data.type === "user_left"){
        document.getElementById(`user-container-${data.uid}`).remove()

        if (userIdInDisplayFrame === `user-container-${data.uid}`) {
            displayFrame.style.display = null
    
            for (let i = 0; i < videoFrames.length; i++) {
                videoFrames[i].style.height = "300px";
                videoFrames[i].style.width = "300px";
            }
        }
    
    }
}

let sendMessage = async (e) => {
    e.preventDefault()

    let message = e.target.message.value
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
        bot_cmd(cmd,0);
    }
    else if(message!="")
    {
        message=message_filter(message);

        channel.sendMessage({ text: JSON.stringify({ "type": "chat", "message": message, "displayName": displayName }) })

        addMessageToDom(displayName, message)
    }
    

    e.target.reset()
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

function bot_cmd(cmd,from){
    if(cmd=="time")
    {
        // var now=new Date();
        // var diff = now.getTime() - start_time;
        // var hours = parseInt(diff / 1000 / 60 / 60);
        // diff -= hours * 1000 * 60 * 60;
        // var minutes = parseInt(diff / 1000 / 60);
        // diff -= minutes * 1000 * 60;
        // var seconds = parseInt(diff / 1000);
        // var resultTime = hours + " hr " + minutes + " min " + seconds + " sec ";

        // trans_message(("streaming has been start for "+resultTime));
    }
    else if(cmd=="help")
    {
        if(from==0)
            addBotMessageToDom("you can use \"time\",\"info\"");
        else
            addBotMessageToDom_sub("you can use \"time\",\"info\"");
    }
    else if(cmd=="info")
    {
        if(from==0)
            addBotMessageToDom("this is our streaming platform \n create by 王柏穎/簡應謙/李紹瑜");
        else
            addBotMessageToDom_sub("this is our streaming platform \n create by 王柏穎/簡應謙/李紹瑜");
    }
    else
    {
        addBotMessageToDom("unknown command");
        
    }

}

let addMessageToDom = (name, message) => {
    let messagesWrapper = document.getElementById("messages")

    let newMessage = `<div class="message__wrapper">
                          <div class="message__body">
                              <strong class="message__author">${name}</strong>
                              <p class="message__text">${message}</p>
                          </div>
                      </div>`

    messagesWrapper.insertAdjacentHTML('beforeend', newMessage)

    let lastMessage = document.querySelector("#messages .message__wrapper:last-child")
    if (lastMessage) {
        lastMessage.scrollIntoView()
    }
}

let addBotMessageToDom = (botMessage) => {
    let messagesWrapper = document.getElementById("messages")

    let newMessage = `<div class="message__wrapper">
                          <div class="message__body__bot">
                              <strong class="message__author__bot">🤖 Mumble Bot</strong>
                              <p class="message__text__bot">${botMessage}</p>
                          </div>
                      </div> `

    messagesWrapper.insertAdjacentHTML('beforeend', newMessage)

    let lastMessage = document.querySelector("#messages .message__wrapper:last-child")
    if (lastMessage) {
        lastMessage.scrollIntoView()
    }
}

let leaveChannel = async () => {
    await channel.leave()
    await rtmClient.logout()
}

let getMembers = async () => {
    let members = await channel.getMembers()
    updateMemberTotal(members)

    for (let i = 0; i < members.length; i++) {
        addMemberToDom(members[i])
    }
}

window.addEventListener("beforeunload", leaveChannel);
let messageForm = document.getElementById("message__form")
messageForm.addEventListener('submit', sendMessage)



