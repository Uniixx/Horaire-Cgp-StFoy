const { Permissions } = require("discord.js");
const Config = require('../models/Config');

module.exports = async(client, member) => {
    const conf = await Config.findOne({
        where: {
            guildId: member.guild.id
        }
    });

    const defaultChannel = member.guild.channels.cache.find(channel => channel.permissionsFor(guild.me).has(Permissions.FLAGS.SEND_MESSAGES));

    if (conf.welcomechannel !== null) {
        defaultChannel = member.guild.channels.find(channel => channel.id === conf.welcomechannel);
    }

    defaultChannel.send(`Welcome ${member.user} to this server.`).catch(console.error);
}