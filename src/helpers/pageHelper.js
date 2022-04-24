const { MessageEmbed } = require('discord.js');
const dateHelper = require('../helpers/dateHelper').dateHelper;

class pageHelper {
    pages = [];
    static createPages(classes) {
        this.pages = [];
        for (let i = 0; i < classes.length; i++) {
            let classe = classes[i];
            let embed = new MessageEmbed();
            embed.setTitle(classe.name);
            embed.setDescription(`This class is given by ${classe.teacher}`);
            embed.addField("Room", classe.room, true);
            embed.addField("Starting", dateHelper.convertDateToUTC(classe.startingTime).format("h:mm"), true);
            embed.addField("Ending", dateHelper.convertDateToUTC(classe.endingTime).format("h:mm"), true);
            embed.addField("Suffix", classe.suffix, true);
            embed.setFooter(`Classes for ${dateHelper.convertDateToUTC(classe.startingTime).format('dddd')} ${dateHelper.convertDateToUTC(classe.startingTime).format('Do')} ${dateHelper.convertDateToUTC(classe.startingTime).format('MMMM')}`);
            this.pages.push(embed);
        }
    }
}

module.exports.pageHelper = pageHelper;