<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-set-title-and-icon-of-gtkwindow
 */

Gtk::init();

// create the window
$window = new \GtkWindow();

// set window size
$window->set_size_request(500, 500);

// set title of window
$window->set_title("PHP-GTK");

// set window icon from pixbuf
$pixbuf = GdkPixbuf::new_from_file("/home/bruno/Desktop/logo.png");
$window->set_icon($pixbuf);

// set icon from file
// $window->set_icon_from_file("/home/bruno/Desktop/logo.png");

// create a box
$vbox = new \GtkBox(GtkOrientation::VERTICAL);

// add a label only to complete the window area
$vbox->pack_start(new GtkLabel(""), TRUE, TRUE, 0);

// add to window
$window->add($vbox);

// connect to signal that close program
$window->connect("destroy", function() {
	Gtk::main_quit();
});

// show all and start loop main
$window->show_all();
Gtk::main();