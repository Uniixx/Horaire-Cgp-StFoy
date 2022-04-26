import AppForm from '../app-components/Form/AppForm';

Vue.component('config-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                guildId:  '' ,
                logchannel:  '' ,
                prefix:  '' ,
                welcomechannel:  '' ,
                
            }
        }
    }

});