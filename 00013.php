<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-use-gtktable-to-list-values
 */

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);

// create the table
$table = new \GtkTable(0, 0, TRUE);

	// line 1
	$table->attach(new GtkLabel(" "), 0, 1, 0, 1, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);	// col1
	$table->attach(new GtkLabel("A"), 1, 2, 0, 1, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);	// col2
	$table->attach(new GtkLabel("B"), 2, 3, 0, 1, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);	// col3
	$table->attach(new GtkLabel("C"), 3, 4, 0, 1, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);	// col4

	// line 2
	$table->attach(new GtkLabel("1"), 0, 1, 1, 2, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);
	$table->attach(new GtkLabel("-"), 1, 2, 1, 2, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);
	$table->attach(new GtkLabel("-"), 2, 3, 1, 2, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);
	$table->attach(new GtkLabel("-"), 3, 4, 1, 2, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);

	// line 3
	$table->attach(new GtkLabel("2"), 0, 1, 2, 3, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);
	$table->attach(new GtkLabel("-"), 1, 2, 2, 3, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);
	$table->attach(new GtkLabel("-"), 2, 3, 2, 3, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);
	$table->attach(new GtkLabel("-"), 3, 4, 2, 3, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);

	// line 4
	$table->attach(new GtkLabel("3"), 0, 1, 3, 4, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);
	$table->attach(new GtkLabel("-"), 1, 2, 3, 4, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);
	$table->attach(new GtkLabel("-"), 2, 3, 3, 4, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);
	$table->attach(new GtkLabel("-"), 3, 4, 3, 4, GtkAttachOptions::EXPAND, GtkAttachOptions::FILL, 2, 3);

// add table to window
$window->add($table);

$window->show_all();
Gtk::main();