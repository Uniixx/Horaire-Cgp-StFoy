const moment = require('moment');

exports.run = (client, message, args) => {
    let timeNow = moment().format('h:mm').toString();
    console.log(timeNow);
    let cour = cours.find(c => c.heure < timeNow);
    console.log(cour);
}

exports.name = "cour";