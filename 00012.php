<?php

/**
 * PHP-GTK Cookbook
 * 
 * https://andor.com.br/php-gtk/cook/how-to-use-markup-in-gtklabel
 */

Gtk::init();

$window = new \GtkWindow();
$window->set_size_request(500, 500);

// create the label
$label = new \GtkLabel("<u>underline</u> <i>italic</i> <b>bold</b> <span size=\"xx-large\" foreground=\"blue\">xx-large</span> <span size=\"small\" foreground=\"#00ff00\">small</span>");
$label->set_use_markup(TRUE);

// or create the label
// $label2 = new \GtkLabel();
$label2->set_markup("<u>underline</u> <i>italic</i> <b>bold</b> <span size=\"xx-large\" foreground=\"blue\">xx-large</span> <span size=\"small\" foreground=\"#00ff00\">small</span>");

// add button to window
$window->add($label2);

$window->show_all();
Gtk::main();