import AppForm from '../app-components/Form/AppForm';

Vue.component('book-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                anno:  '' ,
                author:  '' ,
                coauthor:  '' ,
                editore:  '' ,
                link:  '' ,
                link_two:  '' ,
                link_three:  '' ,
                title:  '' ,
                description:  '' ,
            },
            mediaCollections: ['copertina', 'doc']

        }
    }

});