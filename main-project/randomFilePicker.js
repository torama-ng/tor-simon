

const fs = require('fs');
const path = require('path');
const ffmpeg = require('fluent-ffmpeg');
const allVideos = require('./models/all_videos');
const mongoose = require('mongoose');
const Schema = mongoose.Schema;



var findVideos = function(dir,fileList){

fileList = fileList || [];
fs.readdir(dir,function(error, files){

    if(error) throw error;
    files.forEach(function(fileElements){
    

       fs.readdir(dir+'/'+fileElements, function(error2,videoFiles){

        if(error) throw error2;

        videoFiles.forEach(video =>{
     
            fileList.push(encodeURI(fileElements +'/' + video));
            
            splitpath = video.split(".");
            snapshot = splitpath[0];
            
            pathToFile = path.join(__dirname, "videos", fileElements, video);
            pathToSnapshot = path.join(__dirname, "thumbnails", `${snapshot}.jpg`);
            
            // Also a default node module
            require('child_process').exec(('ffmpeg -ss 00:00:25 -i ' + pathToFile + ' -vframes 1 -q:v 2 ' + pathToSnapshot), function () {
              //  console.log('Saved the thumb to:', pathToSnapshot);

            });

        });

       });


    });

});


return fileList;

};

module.exports = {findVideos};
