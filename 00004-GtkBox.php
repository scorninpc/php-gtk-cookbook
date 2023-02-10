<?php

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);

// create a box
$vbox = new \GtkBox(GtkOrientation::VERTICAL);

// create the label and add to the box
$label = new \GtkLabel("box area 1");
$vbox->pack_start($label, TRUE, TRUE, 0);

// create the label and add to the box
$label = new \GtkLabel("box area 2");
$vbox->pack_start($label, TRUE, TRUE, 0);

// create the label and add to the box
$label = new \GtkLabel("box area 3");
$vbox->pack_start($label, TRUE, TRUE, 0);

// add label to window
$window->add($vbox);

$window->show_all();
Gtk::main();