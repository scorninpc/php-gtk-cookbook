<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-use-gtkbox-to-display-values-like-a-table-styling-columns
 */

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);
$window->set_title("PHP-GTK");

// create a box
$vbox = new \GtkBox(GtkOrientation::VERTICAL);
$vbox->set_border_width(10);


// create a line
$hbox = new \GtkBox(GtkOrientation::HORIZONTAL);
$hbox->set_homogeneous(TRUE);
$hbox->pack_start(new GtkLabel(" - "), TRUE, TRUE, 0);
$hbox->pack_start($label = new GtkLabel("Column A"), TRUE, TRUE, 0);
$label->set_name("heading");
$hbox->pack_start($label = new GtkLabel("Column B"), TRUE, TRUE, 0);
$label->set_name("heading");
$hbox->pack_start($label = new GtkLabel("Column C"), TRUE, TRUE, 0);
$label->set_name("heading");
$vbox->pack_start($hbox, FALSE, TRUE, 5);

// create a line
$hbox = new \GtkBox(GtkOrientation::HORIZONTAL);
$hbox->set_homogeneous(TRUE);
$hbox->pack_start($label = new GtkLabel("Line 1"), TRUE, TRUE, 0);
$label->set_name("heading");
$hbox->pack_start($label = new GtkLabel("Value A:1"), TRUE, TRUE, 0);
$label->set_name("values");
$hbox->pack_start($label = new GtkLabel("Value B:1"), TRUE, TRUE, 0);
$label->set_name("values");
$hbox->pack_start($label = new GtkLabel("Value C:1"), TRUE, TRUE, 0);
$label->set_name("values");
$vbox->pack_start($hbox, FALSE, TRUE, 5);

// create a line
$hbox = new \GtkBox(GtkOrientation::HORIZONTAL);
$hbox->set_homogeneous(TRUE);
$hbox->pack_start($label = new GtkLabel("Line 2"), TRUE, TRUE, 0);
$label->set_name("heading");
$hbox->pack_start($label = new GtkLabel("Value A:2"), TRUE, TRUE, 0);
$label->set_name("values");
$hbox->pack_start($label = new GtkLabel("Value B:2"), TRUE, TRUE, 0);
$label->set_name("values");
$hbox->pack_start($label = new GtkLabel("Value C:2"), TRUE, TRUE, 0);
$label->set_name("values");
$vbox->pack_start($hbox, FALSE, TRUE, 5);

// create a line
$hbox = new \GtkBox(GtkOrientation::HORIZONTAL);
$hbox->set_homogeneous(TRUE);
$hbox->pack_start($label = new GtkLabel("Line 3"), TRUE, TRUE, 0);
$label->set_name("heading");
$hbox->pack_start($label = new GtkLabel("Value A:3"), TRUE, TRUE, 0);
$label->set_name("values");
$hbox->pack_start($label = new GtkLabel("Value B:3"), TRUE, TRUE, 0);
$label->set_name("values");
$hbox->pack_start($label = new GtkLabel("Value C:3"), TRUE, TRUE, 0);
$label->set_name("values");
$vbox->pack_start($hbox, FALSE, TRUE, 5);

// create a line
$hbox = new \GtkBox(GtkOrientation::HORIZONTAL);
$hbox->set_homogeneous(TRUE);
$hbox->pack_start($label = new GtkLabel("Line 4"), TRUE, TRUE, 0);
$label->set_name("heading");
$hbox->pack_start($label = new GtkLabel("Value A:4"), TRUE, TRUE, 0);
$label->set_name("values");
$hbox->pack_start($label = new GtkLabel("Value B:4"), TRUE, TRUE, 0);
$label->set_name("values");
$hbox->pack_start($label = new GtkLabel("Value C:4"), TRUE, TRUE, 0);
$label->set_name("values");
$vbox->pack_start($hbox, FALSE, TRUE, 5);

// create a line
$hbox = new \GtkBox(GtkOrientation::HORIZONTAL);
$hbox->set_homogeneous(TRUE);
$hbox->pack_start($label = new GtkLabel("Line 5"), TRUE, TRUE, 0);
$label->set_name("heading");
$hbox->pack_start($label = new GtkLabel("Value A:5"), TRUE, TRUE, 0);
$label->set_name("values");
$hbox->pack_start($label = new GtkLabel("Value B:5"), TRUE, TRUE, 0);
$label->set_name("values");
$hbox->pack_start($label = new GtkLabel("Value C:5"), TRUE, TRUE, 0);
$label->set_name("values");
$vbox->pack_start($hbox, FALSE, TRUE, 5);

// create a line
$hbox = new \GtkBox(GtkOrientation::HORIZONTAL);
$hbox->set_homogeneous(TRUE);
$hbox->pack_start($label = new GtkLabel("Line 6"), TRUE, TRUE, 0);
$label->set_name("heading");
$hbox->pack_start($label = new GtkLabel("Value A:6"), TRUE, TRUE, 0);
$label->set_name("values");
$hbox->pack_start($label = new GtkLabel("Value B:6"), TRUE, TRUE, 0);
$label->set_name("values");
$hbox->pack_start($label = new GtkLabel("Value C:6"), TRUE, TRUE, 0);
$label->set_name("values");
$vbox->pack_start($hbox, FALSE, TRUE, 5);


// add a label only to complete the window area
$vbox->pack_start(new GtkLabel(""), TRUE, TRUE, 0);

// add to window
$window->add($vbox);

// 
$css_provider = new GtkCssProvider();
$css_provider->load_from_data("
	
	#heading {
		background: #8c9da3;
		color: #000;
		border-right: 1px #000 solid;
	}

	#values {
		border-bottom: 1px #8c9da3 solid;
	}

");

$style_context = new GtkStyleContext();
$style_context->add_provider_for_screen($css_provider, 600);

// show all and start
$window->show_all();
Gtk::main();