<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-show-alerts-using-gtkdialog
 */

Gtk::init();

$window = new \GtkWindow();
$window->set_title("PHP-GTK");
$window->set_size_request(500, 500);

// create a box
$vbox = new \GtkBox(GtkOrientation::VERTICAL);
$vbox->set_border_width(10);

// create the label
$label = new \GtkLabel("Your name");
$label->set_xalign(0);
$vbox->pack_start($label, FALSE, TRUE, 5);

// create the entry
$entry = new \GtkEntry();
$vbox->pack_start($entry, FALSE, TRUE, 5);

// create the button
$button = \GtkButton::new_with_label("show the alert");
$vbox->pack_start($button, FALSE, TRUE, 5);

// add a label only to complete the window area
$vbox->pack_start(new GtkLabel(""), TRUE, TRUE, 0);

// add to window
$window->add($vbox);

// connect the button to click signal
$button->connect("clicked", function() use ($entry, $window) {
	// get text
	$name = $entry->get_text();

	if(strlen($name) == 0) {
		$dialog = GtkMessageDialog::new_with_markup($window, GtkDialogFlags::MODAL, GtkMessageType::ERROR, GtkButtonsType::OK, "you need to add a valid name");
		$dialog->run();
		$dialog->destroy();
	}
	else {
		$dialog = GtkMessageDialog::new_with_markup($window, GtkDialogFlags::MODAL, GtkMessageType::INFO, GtkButtonsType::OK, "thank you to type the correct name " . $name);
		$dialog->run();
		$dialog->destroy();
	}

});

// connect to signal that close program
$window->connect("destroy", function() {
	Gtk::main_quit();
});


$window->show_all();
Gtk::main();