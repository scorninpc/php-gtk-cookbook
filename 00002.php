<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-display-data-using-gtktreeview
 */

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);

// create the treeview
$treeview = new GtkTreeView();
$scroll = new GtkScrolledWindow();
$scroll->add($treeview);

	// columns
	$column1 = new GtkTreeViewColumn("Name", new GtkCellRendererText(), "text", 0);
	$treeview->append_column($column1);

	$column2 = new GtkTreeViewColumn("Phone", new GtkCellRendererText(), "text", 1);
	$treeview->append_column($column2);

	$column3 = new GtkTreeViewColumn("Genre", new GtkCellRendererText(), "text", 2);
	$treeview->append_column($column3);

// create model
$model = new GtkListStore(GObject::TYPE_STRING, GObject::TYPE_STRING, GObject::TYPE_STRING);
$treeview->set_model($model);

	// add values
	$model->append(["Bruno", "+55 43 9 9282-2039", "M"]);
	$model->append(["Natália", "+55 17 8273-0293", "F"]);
	$model->append(["Maria", "+49 4190-8140", "F"]);
	$model->append(["Sven", "+49 0291-2450", "M"]);


// add scrooled panel to window
$window->add($scroll);

$window->show_all();
Gtk::main();