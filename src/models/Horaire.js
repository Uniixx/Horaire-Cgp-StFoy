const { DataTypes, Model } = require('sequelize');

module.exports = class config extends Model {
    static init(sequelize) {
        return super.init({
            id: {
                type: DataTypes.INTEGER,
                autoIncrement: true,
                primaryKey: true
            },
            guildId: { type: DataTypes.STRING },
            day: { type: DataTypes.INTEGER },
            month: { type: DataTypes.INTEGER },
            year: { type: DataTypes.INTEGER }
        }, {
            tableName: 'horaire',
            timestamps: false,
            sequelize
        });
    }
}