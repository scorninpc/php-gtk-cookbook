<?php

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);

// create the button
$button = \GtkButton::new_with_label("My first line\nThis is the second line");

// get label and justify
$label = $button->get_child();
$label->set_justify(GtkJustification::CENTER);

// add button to window
$window->add($button);

$window->show_all();
Gtk::main();