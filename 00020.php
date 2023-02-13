<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-use-gtkcomboboxtext
 */

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);

// create a box
$vbox = new \GtkBox(GtkOrientation::VERTICAL);

// create the label and add to the box
$label = new \GtkLabel("User");
$vbox->pack_start($label, FALSE, TRUE, 0);

// create the GtkComboBoxText
$entry = GtkComboBoxText::new_with_entry();
$vbox->pack_start($entry, FALSE, TRUE, 0);

	// add some values
	$entry->append_text("scorninpc");
	$entry->append("0002", "admin");
	$entry->append("0003", "bruno");

	// connect to change signal
	$entry->connect("changed", function($widget) {
		var_dump($widget->get_active_text());
	});

// add a label only to complete the window area
$vbox->pack_start(new GtkLabel(""), TRUE, TRUE, 0);

// add box to window
$window->add($vbox);

$window->show_all();
Gtk::main();