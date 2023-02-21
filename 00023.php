<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-set-format-in-gtktreeview
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
	$column1 = new GtkTreeViewColumn("#", new GtkCellRendererText(), "text", 0);
	$treeview->append_column($column1);

	// columns
	$column2 = new GtkTreeViewColumn("Name", new GtkCellRendererText(), "text", 1);
	$treeview->append_column($column2);

	// value
	$column3 = new GtkTreeViewColumn("Value", $renderer = new GtkCellRendererText(), "text", 2);
	$treeview->append_column($column3);
	$column3->set_cell_data_func($renderer, function($column, $renderer, $model, $iter) {

		// get value of column
		$value = $model->get_value($iter, 2);
		
		// format
		$renderer->set_property("text", "R$ " . number_format($value, 2, ",", "."));
	});

// create model
$model = new GtkListStore(GObject::TYPE_INT, GObject::TYPE_STRING, GObject::TYPE_DOUBLE);
$treeview->set_model($model);

// add some values
$model->append([1, "scorninpc", 30]);
$model->append([2, "admin", 28.18]);
$model->append([3, "bruno", "92.82"]);


// add to window
$window->add($vbox);

// connect to signal that close program
$window->connect("destroy", function() {
	Gtk::main_quit();
});

// show all and start
$window->show_all();
Gtk::main();

die();