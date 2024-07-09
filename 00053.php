<?php

	/**
	 * PHP-GTK Cookbook
	 * 
	 * https://andor.com.br/php-gtk/cook/open-a-file-chooser-with-gtkfilechooserdialog
	 */

	Gtk::init();

	$window = new GtkWindow();
	$window->set_size_request(500, 500);
	$window->set_title("PHP-GTK");

	// create container
	$vbox = new GtkBox(GtkOrientation::VERTICAL);
	$vbox->set_border_width(10);
	
	// simple space on container
	$vbox->pack_start(new GtkLabel(""), TRUE, TRUE, 0);

	// create the label
	$label = new GtkLabel("Choose a file:");
	$vbox->pack_start($label, FALSE, TRUE, 5);

	// button
	$button = GtkButton::new_with_label("Open Dialog");
	$vbox->pack_start($button, FALSE, TRUE, 5);
	$button->connect("clicked", function() use ($window, $label) {
		
		// configure file selection 
		$dialog = new GtkFileChooserDialog("Choose a file", $window, GtkFileChooserAction::OPEN, ["Cancel", GtkResponseType::CANCEL, "Ok", GtkResponseType::OK]);
		$dialog->set_current_folder($default_path);

		// run
		$result = $dialog->run();

		// get selected file
		if($result == GtkResponseType::OK) {

			$file = $dialog->get_filenames()[0];
			$label->set_text("File: " . $file);

		}

		// destroy
		$dialog->destroy();

	});

	// simple space on container
	$vbox->pack_start(new GtkLabel(""), TRUE, TRUE, 0);

	//
	$window->add($vbox);
	
	// connect to signal that close program
	$window->connect("destroy", function() {
		Gtk::main_quit();
	});

	// show all and start
	$window->show_all();
	Gtk::main();

