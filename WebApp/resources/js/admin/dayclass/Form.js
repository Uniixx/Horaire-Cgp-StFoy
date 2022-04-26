import AppForm from '../app-components/Form/AppForm';

Vue.component('dayclass-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                endingTime:  '' ,
                horaireID:  '' ,
                name:  '' ,
                room:  '' ,
                startingTime:  '' ,
                suffix:  '' ,
                teacher:  '' ,
                
            }
        }
    }

});