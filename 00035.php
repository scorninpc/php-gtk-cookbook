<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/style-gtklabel-with-css
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
$label->set_name("mylabel");

// pack a blank label to populate
$vbox->pack_start(new GtkLabel(), TRUE, TRUE, 10);

// add to window
$window->add($vbox);

// create and add CSS
$css_provider = new GtkCssProvider();
$css_provider->load_from_data("
	#mylabel {
		background: #1a87ce;
		color: #FFF;
		font-size: 30px;
		font-weight: bold;
		font-style: italic;
		text-decoration: line-through;
		text-shadow: 4px 4px #000;
	}
");
 
$style_context = new GtkStyleContext();
$style_context->add_provider_for_screen($css_provider, 600);

// connect to signal that close program
$window->connect("destroy", function() {
	Gtk::main_quit();
});

// show all and start
$window->show_all();
Gtk::main();