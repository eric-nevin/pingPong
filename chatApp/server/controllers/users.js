var mongoose = require('mongoose');
var User = mongoose.model('User');
var jwt = require('jsonwebtoken');
module.exports = (function() {
 return {

  index: function(req, res) {
    User.findById ({_id: req.body.id}, function(err, results) {
      if(err) {
        console.log(err);
      } else {
        res.json(results);
      }
    })
  },

  create: function(req, res) {
    User.create({ name: req.body.name }, function(err, results) {
      if(err) {
        console.log(err);
      } else {
        User.findById({_id: results._id}, function(err, results) {
          if(err) {
            console.log(err);
          } else {
              var token = jwt.sign(results, 'secretAuth', { expiresIn: 86400
              });
              console.log(token);
            }              
          })
        }
      })
    }
  }
})();

