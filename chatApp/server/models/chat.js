var mongoose = require('mongoose');
var ChatSchema = new mongoose.Schema({
  content: String,
  sender: String,
  group_id: String,
  created_at: String
});
mongoose.model('Chat', ChatSchema);