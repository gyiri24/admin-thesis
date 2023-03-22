<?php

return [
    'userManagement' => [
        'title'          => 'Felhasználók kezelése',
        'title_singular' => 'Felhasználók kezelése',
    ],
    'permission' => [
        'title'          => 'Jogosultságok',
        'title_singular' => 'Jogosultság',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Elnevezés',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Szerepkörök',
        'title_singular' => 'Szerepkör',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Név',
            'title_helper'       => ' ',
            'permissions'        => 'Jogosultságok',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'slug'               => 'Rövidítés',
            'slug_helper'        => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Felhasználók',
        'title_singular' => 'Felhasználó',
        'fields'         => [
            'id'                        => 'Azonosító',
            'id_helper'                 => ' ',
            'name'                      => 'Név',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email cím érvényesítve',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Jelszó',
            'password_helper'           => ' ',
            'roles'                     => 'Szerepkör',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'verified'                  => 'Évényesítve',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
            'first_name'                => 'Keresztnév',
            'first_name_helper'         => ' ',
            'last_name'                 => 'Vezetéknév',
            'last_name_helper'          => ' ',
            'amount'                    => 'Keretösszeg',
            'amount_helper'             => ' ',
            'transaction'               => 'Transaction',
            'transaction_helper'        => ' ',
            'newsletter'                => 'Hírlevél',
            'newsletter_helper'         => ' ',
        ],
    ],
    'rating' => [
        'title'          => 'Értkékelések',
        'title_singular' => 'Értkékelések',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'rating'            => 'Értékelés',
            'rating_helper'     => ' ',
            'comment'           => 'Megjegyzés',
            'comment_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'service'           => 'Szolgáltatás',
            'service_helper'    => ' ',
        ],
    ],
    'service' => [
        'title'          => 'Szolgáltatások',
        'title_singular' => 'Szolgáltatások',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Név',
            'name_helper'       => ' ',
            'qr_code'           => 'Qr kód',
            'qr_code_helper'    => ' ',
            'price'             => 'Ár',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'duration'          => 'Hossz',
            'duration_helper'   => ' ',
            'user'              => 'Dolgozó',
            'user_helper'       => ' ',
        ],
    ],
    'transaction' => [
        'title'          => 'Tranzakciók',
        'header'          => 'Tranzakció',
        'title_singular' => 'Tranzakciók',
        'fields'         => [
            'id'                => 'Azonosító',
            'id_helper'         => ' ',
            'user'              => 'Vendég',
            'employee'          => 'Dolgozó',
            'user_helper'       => ' ',
            'price'             => 'Ár',
            'price_helper'      => ' ',
            'created_at'        => 'Időpont',
            'created_at_helper' => ' ',
            'updated_at'        => 'Utolsó módosítás dátuma',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'service'           => 'Szolgáltatás',
            'service_helper'    => ' ',
        ],
    ],

];
