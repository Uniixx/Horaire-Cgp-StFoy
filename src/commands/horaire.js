const Horaire = require('../models/Horaire');
const sequelize = require('../database/db');
const { DataTypes } = require('sequelize');
const HoraireModel = require('../models/Horaire')(sequelize, DataTypes);
const moment = require('moment');
require('moment/locale/fr.js');
moment.locale('fr');

exports.run = (client, message, args) => {
    console.log(moment.now());
    console.log(HoraireModel.find(1));
}

exports.name = "horaire";