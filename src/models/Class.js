const { DataTypes, Model } = require('sequelize');

module.exports = class config extends Model {
    static init(sequelize) {
        return super.init({
            classID: {
                type: DataTypes.INTEGER,
                autoIncrement: true,
                primaryKey: true
            },
            horaireID: {
                type: DataTypes.INTEGER,
            },
            name: { type: DataTypes.STRING },
            teacher: { type: DataTypes.STRING },
            room: { type: DataTypes.STRING },
            startingTime: { type: DataTypes.TIME },
            endingTime: { type: DataTypes.TIME },
            suffix: { type: DataTypes.STRING }
        }, {
            tableName: 'class',
            timestamps: false,
            sequelize
        });
    }
}