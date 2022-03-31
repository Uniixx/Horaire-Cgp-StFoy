require('dotenv').config();
const Sequelize = require('sequelize');
const db = {
    sequelize: null,
    Sequelize: null
};

const sequelize = new Sequelize(process.env.DB_NAME, process.env.DB_USER, process.env.DB_PASS, {
    dialect: 'mysql',
    host: process.env.DB_HOST
});

db.Sequelize = Sequelize;
db.sequelize = sequelize;
db.horaires = require('../models/Horaire')(sequelize, Sequelize.DataTypes);

module.exports = db;