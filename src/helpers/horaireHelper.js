const Horaire = require('../models/Horaire');

const moment = require('moment');
moment.locale('en');

class horaireHelper {
    static async findHoraire(data, isToday) {
        return await Horaire.findOne({
            where: {
                guildId: data.guildId,
                day: isToday ? parseInt(moment().format("D")) : parseInt(data.day)
            }
        })
    }
}

module.exports.horaireHelper = horaireHelper;