const db = require('../database/db').sequelize;
module.exports = (client) => {
    console.log(`Ready to serve in ${client.channels.cache.size} channels on ${client.guilds.cache.size} servers, for a total of ${client.users.cache.size} users.`);
    db.authenticate().then(() => {
        console.log("Database is connected");
    }).catch(err => console.log(err));
}