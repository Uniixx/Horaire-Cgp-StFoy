const { Client, Intents, Collection } = require('discord.js');

require('dotenv').config();

const fs = require('fs');

const token = process.env._TOKEN;

const prefix = process.env._PREFIX;

const client = new Client({ intents: [Intents.FLAGS.GUILDS, Intents.FLAGS.GUILD_MESSAGES] });

client.commands = new Collection();

client.config = {
    "prefix": prefix
}


const events = fs.readdirSync('./src/events').filter(file => file.endsWith('.js'));

for (const file of events) {
    const eventName = file.split(".")[0];
    const event = require(`./src/events/${file}`);
    console.time(`Loaded ${eventName} in`);
    client.on(eventName, event.bind(null, client));
    console.timeEnd(`Loaded ${eventName} in`);
}

const commands = fs.readdirSync('./src/commands').filter(file => file.endsWith('.js'));

for (const file of commands) {
    const commandName = file.split(".")[0];
    const command = require(`./src/commands/${file}`);
    console.time(`Loaded ${commandName} in`);
    client.commands.set(commandName, command);
    console.timeEnd(`Loaded ${commandName} in`);
}

client.login(token);