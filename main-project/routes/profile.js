var express = require('express');
const mongoose = require('mongoose');
var router = express.Router();
const bodyParser = require('body-parser');
const Cryptr = require('cryptr');
const userModel = require('../models/users_model');
const indexRoute = require('./index');

mongoose.connect('mongodb://localhost:27017/simon_data');


router.use(bodyParser.json());
router.use(bodyParser.urlencoded({extended:false}));

// let profileSchema = new mongoose.Schema({
//     name : {
//         first : String, 
//         lastname : String
//     },
//     gender : { type : Number, max : 3},
//     age : Number
// });


// router.get('/:username' , function(req, res){
  
//    // var name = req.params.username;
//     res.render('profile',{username :name});
// });
 router.get('/googleuser', function(req , res){
     console.log(req.session.user);
     res.render('profile', {
         name : req.user.username
     });
 })
router.get('/', function(req, res){
   let profile_user = req.session.user;
    let profile_email =profile_user.email;
 // console.log(profile_email);
 userModel.find({email : profile_email }).then((user) =>{
    if(user){
        console.log('the user :' + user);
        console.log(user.country);
   
        res.render('profile', {
           
        });
       
    }else{
        console.log('no user in db');
    }
   
 })
    

   
});




router.get('/edit_profile', function(req, res){
    res.render('profile_edit');
});


module.exports = router;