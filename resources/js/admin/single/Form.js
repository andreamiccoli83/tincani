import AppForm from '../app-components/Form/AppForm';

Vue.component('single-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                description:  '' ,
                info:  '' ,
                link_songs:  '' ,
                link_spotify:  '' ,
                enabled:  false ,
            },
            mediaCollections: ['singolo', 'doc']
        }
    }

});