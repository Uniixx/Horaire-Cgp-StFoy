const { DataTypes, Model } = require('sequelize');

module.exports = class config extends Model {
    static init(sequelize) {
        return super.init({
            configId: {
                type: DataTypes.INTEGER,
                autoIncrement: true,
                primaryKey: true
            },
            guildId: { type: DataTypes.STRING },
            prefix: { type: DataTypes.STRING },
            welcomechannel: { type: DataTypes.STRING },
            logchannel: { type: DataTypes.STRING },
        }, {
            tableName: 'config',
            timestamps: false,
            sequelize
        });
    }
}