<?php

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);

$label = new \GtkLabel("My first line\nThis is the second line");
$label->set_justify(GtkJustification::RIGHT);

$window->add($label);

$window->show_all();
Gtk::main();