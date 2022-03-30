const Horaire = require('../models/Horaire');

exports.run = (client, message, args) => {
    message.channel.send("pong!").catch(console.error);
}

exports.name = "horaire";