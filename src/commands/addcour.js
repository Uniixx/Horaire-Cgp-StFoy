const moment = require('moment');
require('moment/locale/fr.js');
moment.locale('fr');

exports.run = (client, message, args) => {
    let cour = JSON.parse(args[0]);
    let date = moment(`2022-${cour.mois}-${cour.date} ${cour.heureDebut}`);
    console.log(cour.nom);
    message.reply(`Création du cour ${cour.nom.replace("_", " ")} le ${date.format('dddd')} ${date.format('D')} ${date.format('MMMM')} à ${date.hour()}:${date.minute()}`);
    // let date = moment(`${args[0]}-${args[1]}-${args[2]} ${args[3]}`, "YYYY-MM-DD h:mm");
    // message.reply(date.format('LLL'));
}

exports.name = "addcour";