<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-put-link-inside-gtklabel
 */

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);

// create the label
$label = new \GtkLabel("you can find more about me <a href=\"https://andor.com.br/php-gtk/cookbook\">clicking here</a>");
$label->set_use_markup(TRUE);

// add button to window
$window->add($label);

$window->show_all();
Gtk::main();