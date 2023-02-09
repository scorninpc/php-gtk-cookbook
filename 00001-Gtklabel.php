<?php

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);

// create the label
$label = new \GtkLabel("My first line\nThis is the second line");

// justity to right
$label->set_justify(GtkJustification::RIGHT);

// add label to window
$window->add($label);

$window->show_all();
Gtk::main();