const mongoose = require('mongoose');
const Schema = mongoose.Schema;

//Create Schema
const VideoSchema = new Schema({
    name: { 
        type: String,
        required: true
  
    },
    title: {
        type: String,
        required: false
    },
  
    date_updated: {
        type: Date,
        default: Date.now
    }

});


module.exports  = mongoose.model('all_videos',VideoSchema,'videos');

