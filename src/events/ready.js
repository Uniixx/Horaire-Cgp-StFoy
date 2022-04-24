const db = require('../database/db');
const Config = require('../models/Config');
const Horaire = require('../models/Horaire');
const Class = require('../models/Class');

module.exports = (client) => {
    console.log(`Ready to serve in ${client.channels.cache.size} channels on ${client.guilds.cache.size} servers, for a total of ${client.users.cache.size} users.`);
    db.authenticate().then(() => {
        console.log("Database is connected");
        Config.init(db);
        Config.sync();
        Horaire.init(db);
        Horaire.sync();
        Class.init(db);
        Class.sync();
    }).catch(err => console.log(err));
}