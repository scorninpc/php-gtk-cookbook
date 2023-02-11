<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-center-multiline-text-in-gtklabel
 */

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);

// create the label and center
$label = new \GtkLabel("My first line\nThis is the second line");
$label->set_justify(GtkJustification::CENTER);

// add label to window
$window->add($label);

$window->show_all();
Gtk::main();