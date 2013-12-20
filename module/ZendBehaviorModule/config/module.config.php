<?php
return array(
		'controllers' => array(
				'invokables' => array(
						'ZendBehaviorModule\Controller\Behavior' => 'ZendBehaviorModule\Controller\BehaviorController',
				),
		),
		'router' => array(
				'routes' => array(
						'album' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/behavior[/:action][/:id]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id'     => '[0-9]+',
										),
										'defaults' => array(
												// Change this value to reflect the namespace in which
												// the controllers for your module are found
												'controller'    => 'ZendBehaviorModule\Controller\Behavior',
												'action'        => 'index',
										),

								),
						),
				),
		),
		'view_manager' => array(
				'template_path_stack' => array(
						'zend-Behavior-module' => __DIR__ . '/../view',
						'read-form' => __DIR__ . '/../view',
				),
		),
);
