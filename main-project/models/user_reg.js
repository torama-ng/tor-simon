const express = require('express');
const bodyParser = require('body-parser');
const Cryptr = require('cryptr');
const cryptr = new Cryptr('myTotalySecretKey');
const router = express.Router();
const mongoose = require('mongoose');
const express_validator = require('express-validator');
const db = require('../models/db');
const connectFlash = require('connect-flash');
const auth = require('../models/auth');
const userModel = require('../models/users_model');




let app = express();


//var walkSync = walk.walkSync('videos');
const allVideos = require('../randomFilePicker');
var videosSync = [];
videosSync = allVideos.findVideos('videos');

mongoose.connect('mongodb://localhost:27017/simon_data');


//app.use(express.json());
app.use(bodyParser.urlencoded({extended:false}));
app.use(bodyParser.json());

// express validator middleware
app.use(express_validator());

// Express Validator
app.use(express_validator({
    errorFormatter: function(param, msg, value) {
        var namespace = param.split('.')
        , root    = namespace.shift()
        , formParam = root;
  
      while(namespace.length) {
        formParam += '[' + namespace.shift() + ']';
      }
      return {
        param : formParam,
        msg   : msg,
        value : value
      };
    }
  }));
  
  
  



  // registration form
router.get('/', function(req, res,next) {
    res.render( 'user_reg',  {
        
      });
   
  
});



                // submit registration form....
        router.post('/', function(req , res , next){ 
            // check form validation if errors
          req.checkBody('user_name', 'username is required.').notEmpty();
          req.checkBody('user_email', ' Enter a valid email.').isEmail();
          req.checkBody('fullname', 'full name is required.').notEmpty();
          req.checkBody('user_password', ' mis-matched password').isLength({min :4}).equals(req.body.user_password2);

        let errors = req.validationErrors(); 
          if (errors){
            req.flash('error_msg', 'Invalid form credentials!')
            res.render('user_reg', {
                errors : errors
            });
    
  

        }else{
          let checKemail = req.body.user_email;
          userModel.findOne({email: checKemail}).then((currentUser)=>{
            if(currentUser){
              // user already in our database
            let error_mesg = "email has been taken";
            res.render('user_reg', { errors : error_mesg});
              console.log('  error message = '+ error_mesg);
            
                  }else{
                  
                // if no errors  register user here
                let username = req.body.user_name;
                let email = req.body.user_email;
                let fullname = req.body.fullname;
                let password = req.body.user_password;

                
                // create new schema object for new user
                const encrypted_data = cryptr.encrypt(password);
                new userModel({
                  username : username,
                  email : email,
                  fullname : fullname,
                  password : encrypted_data }).save().then((newUser) =>{
      console.log('new  user stored  '+newUser );
      let suc_info = 'Thank You for signing up, you can now login.';
        res.render('reg_complete', {
          name : fullname
        });
      }); 
    }});
         // const decryptedString = cryptr.decrypt(encryptedString);
                                              }
                                            }
                                              );
      
  

module.exports = router;