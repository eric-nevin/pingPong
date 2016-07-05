var chats = require('./../controllers/chats.js');
var users = require('./../controllers/users.js');


  module.exports = function(app) { 
    app.get('/chats/:id', function(req, res) {
      chats.index(req, res);
      console.log(req.params.id);
    })
    app.post('/chat', function(req, res) {
      chats.create(req, res);
    })
    app.get('/users', function(req, res) {
      users.index(req, res);
    })
    app.post('/user', function(req, res) {
      users.create(req, res);
      res.redirect('/login');
    })
    app.post('/login', function(req, res) {
      users.auth(req, res);
    })

  };