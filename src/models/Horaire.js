const { DataTypes, Model } = require('sequelize');

module.exports = class Horaire extends Model {
    static init(sequelize) {
        return super.init({
            id: {
                type: DataTypes.INTEGER,
                autoIncrement: true,
                primaryKey: true
            },
            day: {
                type: DataTypes.STRING
            },
            month: {
                type: DataTypes.STRING
            },
            startingtime: {
                type: DataTypes.STRING
            },
            endingtime: {
                type: DataTypes.STRING
            },
            time: {
                type: DataTypes.STRING
            },
            classname: {
                type: DataTypes.STRING
            },
            classroom: {
                type: DataTypes.STRING
            },
            teachername: {
                type: DataTypes.STRING
            }
        }, {
            tableName: 'horaires',
            timestamps: true,
            sequelize
        })
    }
}