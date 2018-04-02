<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class List_Blog extends CI_Model {

	    function listBlog()
		{
			$artikel = array(
				'artikel1' => array('judul' => "What's a Framework?",'isi'=> "A framework provides functionalities/solution to the particular problem area. Definition from wiki: A software framework, in computer programming, is an abstraction in which common code providing generic functionality can be selectively overridden or specialized by user code providing specific functionality."),
				'artikel2' => array('judul1' => "What's a Bootstrap?", 'isi1' => "Bootstrap is a free and open-source front-end web framework for designing websites and web applications. It contains HTML- and CSS-based design templates for typography, forms, buttons, navigation and other interface components, as well as optional JavaScript extensions."),
				'artikel3' => array('judul2' => "What's a JavaScript?", 'isi2' => "JavaScript is a scripting or programming language that allows you to implement complex things on web pages — every time a web page does more than just sit there and display static information for you to look at — displaying timely content updates, interactive maps, animated 2D/3D graphics, scrolling video")
			);

			return $artikel;
		}
	}
?>