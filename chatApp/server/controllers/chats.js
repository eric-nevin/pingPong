var mongoose = require('mongoose');
var Chat = mongoose.model('Chat');
module.exports = (function() {
 return {
  index: function(req, res) {
    console.log(req.body);
     Chat.find({$where: "this.group_id == " + req.params.id}, function(err, results) {
       if(err) {
         console.log(err);
       } else {
         res.json(results);
       }
    })
  },
  create: function(req, res) {
    Chat.create({content: req.body.content, sender: req.body.sender, group_id: req.body.group_id, created_at: req.body.created_at}, function(err, results) {
      if(err) {
        console.log(err);
      } else {
        Chat.find({$where: "this.group_id ==" + req.body.group_id}, function(err, results) {
          if(err) {
            console.log(err);
          } else {
            res.json(results);
          }
        })
      }
    })
  }
 }
})();

