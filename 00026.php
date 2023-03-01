<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-add-combobox-inside-a-gtktreeview-with-gtkcellrenderercombo
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
 
	// column 1
	$column1 = new GtkTreeViewColumn("Name", new GtkCellRendererText(), "text", 0);
	$treeview->append_column($column1);

	// column 2
	$column2 = new GtkTreeViewColumn("Phone", new GtkCellRendererText(), "text", 1);
	$treeview->append_column($column2);
 
	// column 3
	$column3 = new GtkTreeViewColumn("Genre", $renderer = new GtkCellRendererCombo(), "text", 2);  // use GtkCellRendererCombo
	$treeview->append_column($column3);
 
		// create model of combobox
		$genres_model = new GtkListStore(GObject::TYPE_STRING);
		$genres_model->append([""]);
		$genres_model->append(["F"]);
		$genres_model->append(["M"]);

		$renderer->set_property('editable', TRUE); // set renderer editable
		$renderer->set_property('model', $genres_model); // add the model to combo
		$renderer->set_property('text-column', 0); // tell what column of model is visible on combo
		$renderer->set_property('has-entry', FALSE); // remove entry of combo
		$renderer->connect("edited", function($renderer, $path, $new_text) use ($treeview) {
			// get model from treeview
			$model = $treeview->get_model();

			// get iter from path
			$iter = $model->get_iter_from_string($path);
			if($iter) {
				// set the new value
				$model->set_value($iter, 2, $new_text); 
			}
		}); // connect to edited signal

// create model of GtkTreeView
$model = new GtkListStore(GObject::TYPE_STRING, GObject::TYPE_STRING, GObject::TYPE_STRING);
$treeview->set_model($model);
 
	// add values
	$model->append(["Bruno", "+55 43 9 9282-2039", "M"]);
	$model->append(["Natália", "+55 17 8273-0293", "F"]);
	$model->append(["Maria", "+49 4190-8140", "F"]);
	$model->append(["Sven", "+49 0291-2450", "M"]);


// add to window
$window->add($vbox);

// connect to signal that close program
$window->connect("destroy", function() {
	Gtk::main_quit();
});

// show all and start
$window->show_all();
Gtk::main();