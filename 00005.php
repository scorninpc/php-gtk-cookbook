<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-display-a-tree-structure-with-gtktreeview
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
	$column1 = new GtkTreeViewColumn("Contacts", new GtkCellRendererText(), "text", 0);
	$treeview->append_column($column1);

// create model
$model = new GtkTreeStore(GObject::TYPE_STRING);
$treeview->set_model($model);
 
	// add values the root
	$iter = $model->append(NULL, ["Pessoal"]);
	var_dump($iter);
		$model->append($iter, ["Bruno"]);
		$model->append($iter, ["Natália"]);
	
		// add sub
		$iter = $model->append($iter, ["Mobile"]);
			$model->append($iter, ["Maria"]);
			$model->append($iter, ["Sven"]);

	// add values the root
	$iter = $model->append(NULL, ["Professional"]);
	$model->append($iter, ["Sven"]);
	$model->append($iter, ["Maria"]);
	$model->append($iter, ["Bruno"]);
	$model->append($iter, ["Natália"]);


// add to window
$window->add($vbox);

// connect to signal that close program
$window->connect("destroy", function() {
	Gtk::main_quit();
});

// show all and start
$window->show_all();
Gtk::main();