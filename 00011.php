<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-style-gtkbutton-with-css
 */

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);
$window->set_title("PHP-GTK");

// create a box
$vbox = new \GtkBox(GtkOrientation::VERTICAL);
$vbox->set_border_width(10);

// create the button
$button = GtkButton::new_with_label("Button 1");
$vbox->pack_start($button, FALSE, TRUE, 10);

// create the button
$button = GtkButton::new_with_label("Button 2");
$button->set_name("button1");
$vbox->pack_start($button, FALSE, TRUE, 10);

// create the button
$button = GtkButton::new_with_label("Button 3");
$vbox->pack_start($button, FALSE, TRUE, 10);

// add a label only to complete the window area
$vbox->pack_start(new GtkLabel(""), TRUE, TRUE, 0);

// add to window
$window->add($vbox);

$css_provider = new GtkCssProvider();
$css_provider->load_from_data("
	
	#button1 {
		background: red;
		border-radius: 0;
		color: #000;
	}
	#button1:hover {
		background: blue;
		color: #fff;
	}
	#button1:active {
		background: yellow;
		color: #000;
	}
");

$style_context = new GtkStyleContext();
$style_context->add_provider_for_screen($css_provider, 600);

$window->show_all();
Gtk::main();