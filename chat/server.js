const express = require("express");
const app = express();
const server = require("http").Server(app);
const io = require("socket.io")(server);

app.set("view engine", "ejs");
app.use(express.static("public"));

app.get("/", (req, res) => {
    res.redirect(`/room`)
});

app.get("/:room", (req, res) => {
    // console.log("in room");
    res.render("room", { roomId: req.params.room })
});

const users = {}
let people=0;
var start_time=new Date();
start_time=start_time.getTime();

io.on("connection", socket => {
    socket.on('new-user', name => {
      users[socket.id] = name
      console.log("new-user");
      people=people+1;
      socket.broadcast.emit('user-connected', name)
      socket.broadcast.emit('update-people', people)
      socket.emit('update-people', people)
    })
    socket.on('send-chat-message', message => {
      console.log("send-chat-message");
      socket.broadcast.emit('chat-message', { message: message, name: users[socket.id] })
    })
    socket.on('send-command',cmd=>{
      console.log("send-command");
      if(cmd.cmd=="time")
      {
        var now=new Date();
        var diff = now.getTime() - start_time;
        var hours = parseInt(diff / 1000 / 60 / 60);
        diff -= hours * 1000 * 60 * 60;
        var minutes = parseInt(diff / 1000 / 60);
        diff -= minutes * 1000 * 60;
        var seconds = parseInt(diff / 1000);
        var resultTime = hours + " hr " + minutes + " min " + seconds + " sec ";

        trans_message(("streaming has been start for "+resultTime));
      }
      else if(cmd.cmd=="people")
      {
        trans_message(("now have "+people+" people are watching streaming"));
      }
      else if(cmd.cmd=="help")
      {
        trans_message("you can use \"people\",\"time\",\"info\"");
      }
      else if(cmd.cmd=="info")
      {
        trans_message("this is our streaming platform \n create by 王柏穎/簡應謙/李紹瑜");
      }
      else
      {
        socket.broadcast.emit('chat-message', { message: cmd.message, name: users[socket.id] })
        socket.emit('chat-message', { message: "unknown command", name: "" })
        socket.broadcast.emit('chat-message', { message: "unknown command", name: "" })
      }

      function trans_message(message_out)
      {
        socket.broadcast.emit('chat-message', { message: cmd.message, name: users[socket.id] })
        socket.broadcast.emit('chat-message', { message: message_out, name:"" })
        socket.emit('chat-message', { message: message_out, name:"" })
      }
    })
    socket.on('disconnect', () => {
      console.log("disconnect");
      socket.broadcast.emit('user-disconnected', users[socket.id])
      socket.broadcast.emit('update-people', people)
      people=people-1
      delete users[socket.id]
    })

    socket.on("join-room", (roomId, userId) => {
      console.log(roomId,userId);
      socket.join(roomId);

      //it's not able to work in new version socket.io
      // socket.to(roomId).broadcast.emit('user-connected', userId)
      socket.broadcast.to(roomId).emit("user-connected", userId)

      socket.on("disconnect", () => {
          socket.broadcast.to(roomId).emit("user-disconnected", userId)
      })
  });
});



server.listen(3000);
