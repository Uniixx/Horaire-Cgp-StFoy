const moment = require("moment");
moment.locale('en');

class dateHelper {
    static convertDateToUTC(time) {
        return moment.utc(time);
    }
}

module.exports.dateHelper = dateHelper;