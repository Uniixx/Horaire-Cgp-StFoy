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
        let today = moment();
        let choosenDay = interaction.options.getInteger('day');
        let horaire = null;
        let classes = null;

        if (choosenDay) date = moment().set('date', choosenDay);

        console.log(choosenDay);
        console.log(today.format("D"));

        if (date < today && choosenDay < today.format("D")) {
            date = date.add(1, 'month');
        }

        choosenDay = choosenDay ? parseInt(choosenDay) : moment().format("D")

        horaire = await horaireHelper.findHoraire({
            guildId: interaction.guild.id,
            day: choosenDay ? parseInt(choosenDay) : moment().format("D"),
            month: date.month() + 1
        });

        if (horaire) {
            if (date < today) {
                date = date.add(1, 'month');
            }
            classes = await classHelper.getAllClasses(horaire.id);
            pageHelper.createPages(classes)
            pages = pageHelper.pages;
        }

        const isWeekend = (date.isoWeekday() === 6 || date.isoWeekday() === 7);

        if (isWeekend) {
            interaction.editReply(errors.NoWeekend);
            return;
        }

        if (!horaire) {
            interaction.editReply(errors.NotFoundHoraire.replace("%day%", choosenDay).replace("%month%", date.format("MMMM")));
            return;
        }

        if (classes.length === 0) {
            interaction.editReply(errors.NotFoundClasses.replace("%day%", choosenDay).replace("%month%", date.format("MMMM")));
            return;
        }

        const buttonPaginator = new ButtonPaginator(interaction, { pages });
        await buttonPaginator.send();
    },
};