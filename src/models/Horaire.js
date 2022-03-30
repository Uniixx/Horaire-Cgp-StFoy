const { DataTypes, Model } = require('sequelize');

module.exports = class Horaire extends Model {
    static init(sequelize) {
        return super.init({
            horaireId: {
                type: DataTypes.INTEGER,
                primaryKey: true
            }
        }, {
            tableName: 'horaires',
            sequelize
        })
    }
}