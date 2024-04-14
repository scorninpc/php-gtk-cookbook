<?php

	/**
	 * PHP-GTK Cookbook
	 * 
	 * https://andor.com.br/php-gtk/cook/create-a-context-menu-in-gtknotebook
	 */
	Gtk::init();

	$window = new GtkWindow();
	$window->set_size_request(500, 500);
	$window->set_title("PHP-GTK");

	// create the notebook
	$notebook = new GtkNotebook();
	$window->add($notebook);
	
	// add page 1
	$eventbox = new GtkEventBox();
	$eventbox->add(new GtkLabel("Page 1"));
	$notebook->append_page($a = GtkButton::new_with_label("Container 1"), $eventbox);
	$eventbox->show_all();

	$eventbox->connect("button-release-event", function($widget, $event) {

		// right click
		if($event->button->button == 3) {

			// create menu
			$menu = new GtkMenu();
			$menu->append(GtkMenuItem::new_with_label("Menu Item 1"));
			$menu->append(GtkMenuItem::new_with_label("Menu Item 2"));
			$menu->append(GtkMenuItem::new_with_label("Menu Item 3"));
			$menu->show_all();
			
			// show menu
			$menu->popup_at_pointer($event);
		}

	});

	// add page 2
	$notebook->append_page(GtkButton::new_with_label("Container 2"), new GtkLabel("Page 2"));
	
	// connect to signal that close program
	$window->connect("destroy", function() {
		Gtk::main_quit();
	});

	// show all and start
	$window->show_all();
	Gtk::main();
