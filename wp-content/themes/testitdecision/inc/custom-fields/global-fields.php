<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
$tels_labels= array(
    'plural_name'   => 'Номера телефонов',
    'singular_name' => 'номер телефона',
);
Container::make('theme_options', 'contacts', 'Контакты  / Social / Locations')
    ->set_icon('dashicons-phone')
    ->add_fields([
        Field::make('image', 'logo_adress', 'Иконка адреса')->set_width(30)->set_value_type('url'),
        Field::make('text', 'title_adress', 'Заголовок над адресом')->set_width(30),
        Field::make('text', 'adress', 'Адрес')->set_width(30),
        Field::make('image', 'logo_tels', 'Иконка телефонов')->set_width(30)->set_value_type('url'),
        Field::make('text', 'title_tel', 'Заголовок над телефоном')->set_width(30),
        Field::make( 'complex', 'tels', 'Номера телефонов' )
            ->setup_labels( $tels_labels )
            ->add_fields( array(
                    Field::make( 'text', 'tel', 'Номер телефона' )
                        ->help_text( 'Вводите номер по примеру (000) 000 00 00' ),
                )
            )->set_width(30),
        Field::make('image', 'logo_time', 'Иконка времени работы')->set_width(30)->set_value_type('url'),
        Field::make('text', 'title_time', 'Заголовок временем работы')->set_width(30),
        Field::make('text', 'time_work', 'Время работы')->set_width(30),
        Field::make('image', 'logo_email', 'Иконка E-mail')->set_width(30)->set_value_type('url'),
        Field::make('text', 'title_email', 'Заголовок e-mail')->set_width(30),
        Field::make('text', 'e-mail', 'E-mail')
            ->set_help_text('E-mail')->set_width(30),
    ]);

