<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-create-menus
 */
Gtk::init();

$window = new GtkWindow();
$window->set_size_request(500, 500);
$window->set_title("PHP-GTK");

// create a box
$vbox = new GtkBox(GtkOrientation::VERTICAL);
$vbox->set_border_width(0);

// create menu bar
$menubar = new GtkMenuBar();
$vbox->pack_start($menubar, FALSE, FALSE, 0);

	// create submenu File
	$menu = new GtkMenu();
	$menu->append($menu_item=GtkMenuItem::new_with_label("New file"));
	$menu->append($menu_item=GtkMenuItem::new_with_label("New folder"));
	$menu->append($menu_item=GtkMenuItem::new_with_label("Open file"));
	$menu->append($menu_item=GtkMenuItem::new_with_label("Open folder"));
	$menu->append(new GtkSeparatorMenuItem());
	$menu->append($menu_item=GtkMenuItem::new_with_label("Exit"));

	$menu_item->connect("activate", function($widget) { // connect menu to event activate
		Gtk::main_quit();
	});

	$menuitem = GtkMenuItem::new_with_label("File"); // create menu file
	$menuitem->set_submenu($menu); // set the sub menu on menuitem

	$menubar->append($menuitem); // append menu File to menubar

	// create submenu Help
	$menu = new GtkMenu();
	$menu->append($menu_item=GtkMenuItem::new_with_label("About"));

	$menuitem = GtkMenuItem::new_with_label("Help"); // create menu help
	$menuitem->set_submenu($menu); // set the sub menu on menuitem

	$menubar->append($menuitem); // append menu About to menubar


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