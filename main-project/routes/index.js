var express = require('express');
var router = express.Router();
const bodyParser = require('body-parser');
const Cryptr = require('cryptr');
const userModel = require('../models/users_model');
const express_validator = require('express-validator');
const passport = require('passport');
const cryptr = new Cryptr('myTotalySecretKey');
const facebookStrategy = require('passport-facebook');
const configAuth = require('../models/auth');
const twitterAuth = require('../models/twitter_keys');
const TwitterStrategy = require('passport-twitter').Strategy;
 const googlePassport = require('../social_auth/passport_google');
const GoogleStrategy = require('passport-google-oauth20');
const googleKeys = require('../models/appKeys');
const mongoose = require('mongoose');
const localStrategy = require('passport-local').Strategy;
const googleModel = require('../models/google_model');

// connect my mongodb
mongoose.connect('mongodb://localhost:27017/simon_data');

// serialize user
passport.serializeUser((user, done) =>{
  done(null, user.id); 
});
passport.deserializeUser((id, done) =>{
  googleModel.findById(id).then((user)=>{
    done(null, user); 
  // req.session.user = user;
  });

});


//const walk = require('../walk.js');
router.use(passport.initialize());
router.use(bodyParser.json());
router.use(bodyParser.urlencoded({extended:false}));



        // Express Validator
        router.use(express_validator({
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


      // facebook login strategy
      passport.use(new facebookStrategy({
          clientID: configAuth.facebookAuth.client_id,
          clientSecret: configAuth.facebookAuth.client_secret,
          callbackURL: configAuth.facebookAuth.call_back_url},
        function(accessToken, refreshToken, profile, done) {
          userModel.findOrCreate("user", function(err, user) {
            if (err) { return done(err); }
            done(null, user);
           });
        }
      ));

        //     /auth/facebook/callback
        router.get('/auth/facebook', passport.authenticate('facebook'));
        router.get('/auth/facebook/callback',
          passport.authenticate('facebook', { successRedirect: '/randomVideos',
                                              failureRedirect: '/' }));



        // twiiter login strategy
        passport.use(new TwitterStrategy({
          consumerKey: twitterAuth.twitterKey.TWITTER_CONSUMER_KEY,
          consumerSecret: twitterAuth.twitterKey.TWITTER_CONSUMER_SECRET,
          callbackURL: "http://127.0.0.1:5500/auth/twitter/callback"
        },
        function(token, tokenSecret, profile, done) {
          userModel.findOrCreate( 'user', function(err, user) {
            if (err) { return done(err); }
            done(null, user); });  } ));
            //twttier callback strategy   /auth/twitter/callback
            router.get('/auth/twitter', passport.authenticate('twitter'));
            router.get('/auth/twitter/callback',
              passport.authenticate('twitter', { successRedirect: '/randomVideos', failureRedirect: '/' }));



              
        // Google login Strsategy
          passport.use( new GoogleStrategy({ clientID: googleKeys.keys.ClientID,
       clientSecret: googleKeys.keys.client_secret, callbackURL: "	/auth/google/randomVideos" },
         function(accessToken,refreshToken,profile,done){
            
            // check if usr already exist
            googleModel.findOne({google_id : profile.id}).then((currentUser)=>{
              if(currentUser){ done(null, currentUser);
                req.session.user = currentUser;
                console.log('user  already a user  = '+ currentUser.username);
              }else{
                new googleModel({
                  username : profile.displayName,
                  google_id : profile.id }).save().then((newUser) =>{
                  console.log('new google user  '+ newUser);
                 // req.session.user = newUser;
                  done(null, newUser);
                });
              }
              });
              }));
                
          router.get('/auth/google',
            passport.authenticate('google', { scope: ['profile'] }));
          // failed authentication redirect

          router.get('/auth/google/randomVideos', 
            passport.authenticate('google', { failureRedirect: '/' }),
            function(req, res) {
             
          // res.send(req.user);
          // console.log(req.user.username);
            res.redirect('/profile/googleuser');
          
            });
                
         

/* GET home page. */
router.get('/', function(req, res, next){
 // check if user already logged in , then redirect back to home page
  if(req.session.user  || req.user){
   // username = req.session.user.username;
  
    res.redirect('/index_pro');

}else{ 
  res.render('login_view' ,{
    userObj: req.user || null	
  }); }
});

router.post('/',function(req,res, next){
 
    // get login form details...
    let email = req.body.user_email;
  let password = req.body.user_password;
        //  find user in database...
        
        userModel.findOne({email : email}, function(error, user){

    // if user user not found in database...
    if (!user){
        console.log(' user does not exist..');
        let fake_user_msg = 'User with this email does not exist!'
      
       res.render('login_view',{ user_error : fake_user_msg});
    }else if(user) { 

    let db_username = user.username;
    let db_password = user.password;
    const decrypt_pass = cryptr.decrypt(db_password);
    //console.log("password from database .." +decrypt_pass);
   
    let user_email = email;
    // if user is found, go to home page and asign session to user
    
    if (password === decrypt_pass){
     req.session.user = user;
    res.redirect('/index_pro'); 

    // videoFiles: videosSync,
    // recommended: videosSync[3],
    //   name : db_username

    }else{

        let log_error = 'Invalid Password!'
       res.render('login_view', {user_error : log_error });
      }
    
  }}) ;

});

router.get('/logout', function(request, response){
  request.session.destroy();
 // request.flash('thank you for using torama video portal');
  response.redirect('/');
});


            

module.exports = router;