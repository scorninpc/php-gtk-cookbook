<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-add-action-on-enter
 */
Gtk::init();

$window = new GtkWindow();
$window->set_size_request(500, 500);
$window->set_title("PHP-GTK");

// create a box
$vbox = new GtkBox(GtkOrientation::VERTICAL);
$vbox->set_border_width(10);

// create a label and entry
$label = new GtkLabel("Name");
$label->set_xalign(0);
$entry = new GtkEntry();
$entry->connect("activate", "onEnter"); // connect to activate signal
$vbox->pack_start($label, FALSE, FALSE, 0);
$vbox->pack_start($entry, FALSE, FALSE, 10);

// create a label and entry
$label = new GtkLabel("Phone");
$label->set_xalign(0);
$entry = new GtkEntry();
$entry->connect("activate", "onEnter"); // connect to activate signal
$vbox->pack_start($label, FALSE, FALSE, 0);
$vbox->pack_start($entry, FALSE, FALSE, 10);

// create a label and entry
$label = new GtkLabel("Birth Date");
$label->set_xalign(0);
$entry = new GtkEntry();
$entry->connect("activate", "onEnter"); // connect to activate signal
$vbox->pack_start($label, FALSE, FALSE, 0);
$vbox->pack_start($entry, FALSE, FALSE, 10);

// create a label and entry
$label = new GtkLabel("Genre");
$label->set_xalign(0);
$entry = new GtkEntry();
$entry->connect("activate", "onEnter"); // connect to activate signal
$vbox->pack_start($label, FALSE, FALSE, 0);
$vbox->pack_start($entry, FALSE, FALSE, 10);

// function to activate
function onEnter($entry)
{
	var_dump("Enter pressed");
}

// add a blank label to fill the window
$vbox->pack_start(new GtkLabel(""), TRUE, TRUE, 10);

// add to window
$window->add($vbox);

// connect to signal that close program
$window->connect("destroy", function() {
	Gtk::main_quit();
});

// show all and start
$window->show_all();
Gtk::main();