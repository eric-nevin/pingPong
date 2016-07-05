var express = require('express');
var path = require('path');
var app = express();
var bodyParser = require('body-parser');
var mongoose = require('mongoose');
var jwt = require('jsonwebtoken');



app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, '/client/static')));
app.use(bodyParser.urlencoded({extended: true}));

require('./server/config/mongoose.js');
var routes_setter = require('./server/config/routes.js');
routes_setter(app);


var server = app.listen(8000, function() {
  console.log('cool stuff on: 8000');
});

var io = require('socket.io').listen(server);

io.sockets.on('connection', function (socket) {
  console.log("WE ARE USING SOCKETS!");
  console.log(socket.id);
    socket.on("submit_chat", function (data){
    console.log('Someone clicked a button!  Reason: ' + data.reason);
    socket.broadcast.emit('server_response', {response: "sockets are the best!"});
})
})




