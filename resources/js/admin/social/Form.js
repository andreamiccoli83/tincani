import AppForm from '../app-components/Form/AppForm';

Vue.component('social-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                social:  '' ,
            },
            mediaCollections: ['icona']
        }
    }

});