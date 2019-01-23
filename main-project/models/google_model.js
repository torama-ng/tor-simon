const mongoose =require('mongoose');
const Scheme = mongoose.Schema;

const userSchema = new Scheme({
    username : String,
    google_id : String,
    image : String,
    date: {
        type: Date,
        default: Date.now
      }
});


const User  = mongoose.model('google_user', userSchema);

module.exports = User;