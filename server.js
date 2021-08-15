
const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const logger = require('morgan');
const mainRoutes = require('./routes/main');
const path = require('path');

require("dotenv").config();

var cookieParser = require('cookie-parser');

const app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }))

app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use('/', mainRoutes);

// mongoose.connect(process.env.MONGODB_URI || 'mongodb://127.0.0.1:27017/HomeOwner')
//   .then(()=> {
//     console.log('Database connected');
//   })
//   .catch((error)=> {
//     console.log('Error connecting to database');
// });

mongoose.connect(process.env.MONGODB_URI || 'mongodb://127.0.0.1:27017/HomeOwner', {useNewUrlParser: true, useUnifiedTopology: true,}, (err) => {
  if (err)
      console.error(err);
  else
      console.log("Connected to the mongodb"); 
});

app.listen(process.env.PORT || 3000 ,function() {
  if(process.env.PORT) console.log('listening on 8000');
  else console.log('listening on 3000');
})
