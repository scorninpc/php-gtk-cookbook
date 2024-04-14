<?php

	/**
	 * PHP-GTK Cookbook
	 * 
	 * https://andor.com.br/php-gtk/cook/working-with-gtknotebook-and-tabs
	 */
	Gtk::init();


	$window = new GtkWindow();
	$window->set_size_request(500, 500);
	$window->set_title("PHP-GTK");

	// create the notebook
	$notebook = new GtkNotebook();
	$window->add($notebook);
	
	// add page 1
	$notebook->append_page(GtkButton::new_with_label("Container 1"), new GtkLabel("Page 1"));

	// add page 2
	$notebook->append_page(GtkButton::new_with_label("Container 2"), new GtkLabel("Page 2"));
	
	// connect to signal that close program
	$window->connect("destroy", function() {
		Gtk::main_quit();
	});

	// show all and start
	$window->show_all();
	Gtk::main();
