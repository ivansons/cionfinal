<?php

namespace Drupal\simple_menu_permissions;

use Drupal\system\Entity\Menu;

/**
 * Provides dynamic permissions for different menu's.
 */
class SimpleMenuPermissionsPermissions {

	/**
	 * Returns an array of menu permissions.
	 *
	 * @return array
	 *   The menu permissions.
	 */
	public function SimpleMenuPermissionsPermissions() {
		$perms = [];

		// Load the existing menus.
		$menus = Menu::loadMultiple();

		// Add the permission to create new menus.
		$perms['create new menu'] = [
			'title' => t('Create new menu'),
		];

		foreach ($menus as $menu) {
			// Add the permissions for each menu.
			$perms += $this->BuildPermissions($menu);
		}

		return $perms;
	}

	/**
	 * Returns an array of menu permissions.
	 *
	 * @param $menu
	 * @return array
	 *	 The menu permissions.
	 */
	protected function BuildPermissions($menu) {
		// Define and return all permissions that are available for each menu.
		return [
			'view ' . $menu->id() . ' menu in menu list' => [
				'title' => t('View %menu_name menu in the menu list', [
					'%menu_name' => $menu->label(),
				]),
			],
			'edit ' . $menu->id() . ' menu' => [
				'title' => t('Edit %menu_name menu', [
					'%menu_name' => $menu->label(),
				]),
			],
			'delete ' . $menu->id() . ' menu' => [
				'title' => t('Delete %menu_name menu', [
					'%menu_name' => $menu->label(),
				]),
			],
			'add new links to ' . $menu->id() . ' menu' => [
				'title' => t('Add new links to %menu_name menu', [
					'%menu_name' => $menu->label(),
				]),
			],
			'edit links in ' . $menu->id() . ' menu' => [
				'title' => t('Edit links in %menu_name menu', [
					'%menu_name' => $menu->label(),
				]),
			],
			'delete links in ' . $menu->id() . ' menu' => [
				'title' => t('Delete links in %menu_name menu', [
					'%menu_name' => $menu->label(),
				]),
			],
		];
	}
}
