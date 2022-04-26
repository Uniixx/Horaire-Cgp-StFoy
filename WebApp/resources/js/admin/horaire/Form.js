import AppForm from '../app-components/Form/AppForm';

Vue.component('horaire-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                day:  '' ,
                guildId:  '' ,
                month:  '' ,
                year:  '' ,
                
            }
        }
    }

});