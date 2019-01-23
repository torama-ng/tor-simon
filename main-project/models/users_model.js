const mongoose = require('mongoose');

let userSchema = new mongoose.Schema({
    username : {
        type: String
    },
    email : {
        type : String
    },
    fullname : {
        type : String
    },
    password : {
        type : String
    },
    image: 
      { data: Buffer, contentType: String  , default: ''
    },
    contact_number : {
        type : String , required : false , default: ''
    },
    designation : {
        type : String , required : false , default : ''
    },
    specialization : {
        type : String , required : false , default : ''
    },
    date: {
        type: Date,
        default: Date.now
      }
});

 let user = mongoose.model('user_details', userSchema);

module.exports = user;