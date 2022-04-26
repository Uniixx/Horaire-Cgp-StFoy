const Horaire = require('../models/Horaire');

const moment = require('moment');
moment.locale('en');

class horaireHelper {
    static async findHoraire(data) {
        return await Horaire.findOne({
            where: {
                guildId: data.guildId,
                day: parseInt(data.day),
                month: data.month
            }
        })
    }
}

module.exports.horaireHelper = horaireHelper;