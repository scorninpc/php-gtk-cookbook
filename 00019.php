<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-use-gtkcombobox
 */

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);

// create a box
$vbox = new \GtkBox(GtkOrientation::VERTICAL);

// create the label and add to the box
$label = new \GtkLabel("User");
$vbox->pack_start($label, FALSE, TRUE, 0);

// create model
$model = new GtkListStore(GObject::TYPE_INT, GObject::TYPE_STRING);

	// add some values
	$model->append([1, "scorninpc"]);
	$model->append([2, "admin"]);
	$model->append([3, "bruno"]);

// create the GtkComboBox
$combo = GtkComboBox::new_with_model($model);

	// add column
	$renderer = new GtkCellRendererText();
	$combo->pack_start($renderer, TRUE);
	$combo->add_attribute($renderer, "text", 1);

// $combo->set_id_column(1);
$vbox->pack_start($combo, FALSE, TRUE, 0);

	// connect to change signal
	$combo->connect("changed", function($widget) {

		// get model and selected iter
		$model = $widget->get_model();
		$iter = $widget->get_active_iter();

		// get values of model
		$iduser = $model->get_value($iter, 0);
		$user = $model->get_value($iter, 1);

		var_dump("User " . $user . " with id " . $iduser);
	});

// add a label only to complete the window area
$vbox->pack_start(new GtkLabel(""), TRUE, TRUE, 0);

// add box to window
$window->add($vbox);

$window->show_all();
Gtk::main();