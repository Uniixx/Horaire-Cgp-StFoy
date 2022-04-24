'use strict';

const { ButtonPaginator } = require('@psibean/discord.js-pagination');
const moment = require('moment');
moment.locale('en');

const errors = require("../../messages.json");

const horaireHelper = require('../helpers/horaireHelper').horaireHelper;
const pageHelper = require('../helpers/pageHelper').pageHelper;
const classHelper = require('../helpers/classHelper').classHelper;

const { SlashCommandBuilder } = require('@discordjs/builders');

module.exports = {
    data: new SlashCommandBuilder()
        .setName('getclasses')
        .setDescription('Replies with the given classes of the day (default is today)')
        .addIntegerOption(option => option.setName("day").setDescription("Day of the week")),
    async execute(interaction) {
        let pages = [];
        let date = moment();
        let choosenDay = interaction.options.getInteger('day');
        let horaire = null;
        let classes = null;

        horaire = await horaireHelper.findHoraire({
            guildId: interaction.guild.id,
            day: choosenDay ? parseInt(choosenDay) : null
        }, false);

        if (horaire) {
            classes = await classHelper.getAllClasses(horaire.horaireID);
            pageHelper.createPages(classes)
            pages = pageHelper.pages;
        }

        if (choosenDay) date = moment().set('date', choosenDay);

        const isWeekend = (date.isoWeekday() === 6 || date.isoWeekday() === 7);

        if (isWeekend) {
            interaction.editReply(errors.NoWeekend);
            return;
        }

        if (!horaire) {
            interaction.editReply(errors.NotFoundHoraire.replace("%day%", choosenDay));
            return;
        }

        if (classes.length === 0) {
            interaction.editReply(errors.NotFoundClasses.replace("%day%", choosenDay));
            return;
        }

        const buttonPaginator = new ButtonPaginator(interaction, { pages });
        await buttonPaginator.send();
    },
};