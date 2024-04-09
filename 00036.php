<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-add-action-on-enter
 */
Gtk::init();

$entries = [];

$window = new GtkWindow();
$window->set_size_request(500, 500);
$window->set_title("PHP-GTK");

// create a box
$vbox = new GtkBox(GtkOrientation::VERTICAL);
$vbox->set_border_width(10);

// create a label and entry
$label = new GtkLabel("Name");
$label->set_xalign(0);
$entry = new GtkEntry();
$entry->set_name("Name");
$entries[] = $entry;
$vbox->pack_start($label, FALSE, FALSE, 0);
$vbox->pack_start($entry, FALSE, FALSE, 10);

// create a label and entry
$label = new GtkLabel("Phone");
$label->set_xalign(0);
$entry = new GtkEntry();
$entry->set_name("Phone");
$entries[] = $entry;
$vbox->pack_start($label, FALSE, FALSE, 0);
$vbox->pack_start($entry, FALSE, FALSE, 10);

// create a label and entry
$label = new GtkLabel("Birth Date");
$label->set_xalign(0);
$entry = new GtkEntry();
$entry->set_name("Date");
$entries[] = $entry;
$vbox->pack_start($label, FALSE, FALSE, 0);
$vbox->pack_start($entry, FALSE, FALSE, 10);

// create a label and entry
$label = new GtkLabel("Genre");
$label->set_xalign(0);
$entry = new GtkEntry();
$entry->set_name("Genre");
$entries[] = $entry;
$vbox->pack_start($label, FALSE, FALSE, 0);
$vbox->pack_start($entry, FALSE, FALSE, 10);

// create a label and entry
$button = GtkButton::new_with_label("Save");
$button->connect("clicked", "onSave"); // connect to function onSave
$vbox->pack_start($button, FALSE, FALSE, 0);

// function to save
function onSave($button)
{
	global $entries, $window;

	foreach($entries as $entry) {
		$text = $entry->get_text();

		if(strlen($text) == 0) {

			$name = $entry->get_name();

			$dialog = GtkMessageDialog::new_with_markup($window, GtkDialogFlags::MODAL, GtkMessageType::ERROR, GtkButtonsType::OK, $name . " required");
			$dialog->run();
			$dialog->destroy();

			return FALSE;
		}
		
	}
}

// add a blank label to fill the window
$vbox->pack_start(new GtkLabel(""), TRUE, TRUE, 10);

// add to window
$window->add($vbox);

// connect to signal that close program
$window->connect("destroy", function() {
	Gtk::main_quit();
});

// show all and start
$window->show_all();
Gtk::main();
