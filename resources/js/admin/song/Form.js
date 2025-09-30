import AppForm from '../app-components/Form/AppForm';

Vue.component('song-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
            },
        }
    }

});