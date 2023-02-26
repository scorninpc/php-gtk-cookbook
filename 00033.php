<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-set-color-on-gtktreeview-column-header-with-css
 */
Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);
$window->set_title("PHP-GTK");

// create a box
$vbox = new \GtkBox(GtkOrientation::VERTICAL);
$vbox->set_border_width(10);

// create the treeview, added it inside a scrolled window, and pack scrolled windows to box
$treeview = new GtkTreeView();
$scroll = new GtkScrolledWindow();
$scroll->add($treeview);
$vbox->pack_start($scroll, TRUE, TRUE, 0);
 
	// columns
	$renderer = new GtkCellRendererText();
	$column1 = new GtkTreeViewColumn("Name", $renderer, "text", 0);
	$column1->get_button()->set_name("my_column1"); // add custom name to button inside column
	$treeview->append_column($column1);
 
	$renderer = new GtkCellRendererText();
	$column2 = new GtkTreeViewColumn("Phone", $renderer, "text", 1);
	$column2->get_button()->set_name("my_column2"); // add custom name to button inside column
	$treeview->append_column($column2);
 
	$renderer = new GtkCellRendererText();
	$column3 = new GtkTreeViewColumn("Genre", $renderer, "text", 2);
	$column3->get_button()->set_name("my_column3"); // add custom name to button inside column
	$treeview->append_column($column3);

 
// create model
$model = new GtkListStore(GObject::TYPE_STRING, GObject::TYPE_STRING, GObject::TYPE_STRING);
$treeview->set_model($model);
 
	// add values
	$model->append(["Bruno", "+55 43 9 9282-2039", "M"]);
	$model->append(["Natália", "+55 17 8273-0293", "F"]);
	$model->append(["Maria", "+49 4190-8140", "F"]);
	$model->append(["Sven", "+49 0291-2450", "M"]);


// add to window
$window->add($vbox);

// create and add CSS
$css_provider = new GtkCssProvider();
$css_provider->load_from_data("
	#my_column1 {
		background: #1a87ce;
		border: none;
		color: #000;
	}
	#my_column2 {
		background: #cd9c41;
		border: none;
		color: #000;
	}
	#my_column3 {
		background: #c54e48;
		border: none;
		color: #000;
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