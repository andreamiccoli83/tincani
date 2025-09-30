import AppForm from '../app-components/Form/AppForm';

Vue.component('post-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                body:  '' ,
                short_body:  '' ,
                category_id:  '' ,
                social_id:  '' ,
                enabled:  false ,
                link:  '' ,
                published_at:  '' ,
            },
            mediaCollections: ['cover', 'gallery', 'pdf']

        }
    }

});