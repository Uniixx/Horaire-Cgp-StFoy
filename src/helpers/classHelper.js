const Class = require('../models/Class');

class classHelper {
    static async getAllClasses(horaireId) {
        return await Class.findAll({
            where: {
                horaireID: horaireId
            }
        });
    }
}

module.exports.classHelper = classHelper;