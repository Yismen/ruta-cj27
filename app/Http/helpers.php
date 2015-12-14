<?php

/**
 * add a nested form with the option to delete passed model
 * 
 * @param  [string] $route     Route name
 * @param  string $parameter Route parameter
 * @param  array  $options   the set of options to update current options
 * @return form             the form to be presente in the form
 */
function delete_button($route, $parameter = null, $options = [])
{
	$settings = [
		'class'        => 'btn btn-link',
		'type'         => 'submit', 
		'name'         => 'deleteBtn',
		'label'        => "<i class='text-danger fa fa-remove'></i>",
		'method'       => 'DELETE',
		'form_name'    => 'delete_form', 
		'form_display' => 'inline-block',
		'style' => ''
	];

	if (trim($settings['class']) == 'btn btn-link') {
		$settings['style'] = 'padding: 0px';
	} else {
		$settings['label'] =  "Delete";
	}
	
	
	$options = array_merge($settings, $options);

	$form = Form::open(
		[
			'route'     => [$route, $parameter],
			'method'    => $options['method'], 
			'form_name' => $options['form_name'], 
			'id'        => $options['form_name'],
			'style'     => 'display: '.$options['form_display']
		], $parameter);
		$form .= Form::button(
				$options['label'], 
				[
					'class' => $options['class'], 
					'type'  => $options['type'], 
					'id'    => $options['name'], 
					'name'  => $options['name'],
					'style'  => $options['style'],
					
				]
			);

	return $form .= Form::close();

}

function delete_form_x($route, $parameters, $options)
{
	
}

