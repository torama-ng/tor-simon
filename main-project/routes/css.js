var express = require('express');
var router = express.Router();
const walk = require('../walk.js');
console.log(__dirname);
var walkSync = [];
walkSync = walk.walkSync('videos/css');

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('view', { 
    videoTitle: 'Css Videos',
    videoFiles: walkSync,
    videoDir: 'css',
    name : req.session.user.username

  });
});



module.exports = router;
