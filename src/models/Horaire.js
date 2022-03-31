const db = require('../database/db')

module.exports = (sequelize, DataTypes) => {
    console.log(sequelize)
    return db.define('horaires', {
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
        },
        created_at: {
            type: DataTypes.DATE,
            defaultValue: DataTypes.NOW
        },
        updated_at: {
            type: DataTypes.DATE,
            defaultValue: DataTypes.NOW
        }
    }, {
        tableName: 'horaires',
        timestamps: true,
    })
};