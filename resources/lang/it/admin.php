<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'activated' => 'Activated',
            'email' => 'Email',
            'first_name' => 'First name',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'last_name' => 'Last name',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
            'will_be_published' => 'Post will be published at',
            'sort' => 'Sort'
        ],

        'columns' => [
            'id' => 'ID',
            'body' => 'Descrizione',
            'short_body' => 'Descrizione breve',
            'category_id' => 'Categoria',
            'enabled' => 'Visibile',
            'link' => 'Link',
            'published_at' => 'Pubblicato il',
            'social_id' => 'Social',
            'title' => 'Titolo',
            
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'category' => 'Category',
            
        ],
    ],

    'social' => [
        'title' => 'Socials',

        'actions' => [
            'index' => 'Socials',
            'create' => 'New Social',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'icon' => 'Icon',
            'social' => 'Social',
            
        ],
    ],

    'book' => [
        'title' => 'Books',

        'actions' => [
            'index' => 'Books',
            'create' => 'New Book',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'anno' => 'Anno',
            'author' => 'Author',
            'coauthor' => 'Coauthor',
            'editore' => 'Editore',
            'link_two' => 'Editore Link',
            'link_three' => 'Amazon Link',
            'title' => 'Title',
            'description' => 'Descrizione'
            
        ],
    ],

    'song' => [
        'title' => 'Songs',

        'actions' => [
            'index' => 'Songs',
            'create' => 'New Song',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            
        ],
    ],

    'profile' => [
        'title' => 'About',

        'actions' => [
            'index' => 'About',
            'create' => 'New About',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'bio' => 'Bio',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];