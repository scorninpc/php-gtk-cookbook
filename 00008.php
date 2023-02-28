<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-change-gtklabel-font-family-font-size-and-font-color
 */
Gtk::init();

$window = new GtkWindow();
$window->set_size_request(500, 500);
$window->set_title("PHP-GTK");

// create a box
$vbox = new GtkBox(GtkOrientation::VERTICAL);
$vbox->set_border_width(10);

// pack a blank label to populate
$vbox->pack_start(new GtkLabel(), TRUE, TRUE, 10);

// create the label
$label = new GtkLabel("My first line\nThis is the second line");
$vbox->pack_start($label, FALSE, FALSE, 10);

// set font description
$label->modify_font('Arial Italic 24');

// set font color
$label->override_color(GtkStateType::NORMAL, "#cd9c41");

// set background color
$label->override_background_color(GtkStateType::NORMAL, "#c54e48");

// pack a blank label to populate
$vbox->pack_start(new GtkLabel(), TRUE, TRUE, 10);

// add to window
$window->add($vbox);

// connect to signal that close program
$window->connect("destroy", function() {
	Gtk::main_quit();
});

// show all and start
$window->show_all();
Gtk::main();